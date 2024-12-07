import paramiko
import time
import re
from typing import List

class HuaweiOLT:
    def __init__(self, host: str, username: str, password: str, port: int = 22):
        self.host = host
        self.username = username
        self.password = password
        self.port = port
        self.client = None
        self.shell = None

    def connect(self) -> bool:
        try:
            self.client = paramiko.SSHClient()
            self.client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
            
            self.client.connect(
                hostname=self.host,
                username=self.username,
                password=self.password,
                port=self.port,
                look_for_keys=False,
                allow_agent=False
            )
            
            self.shell = self.client.invoke_shell()
            self.shell.settimeout(30)
            time.sleep(1)
            
            self.shell.recv(10000).decode('utf-8')
            self._enter_config_mode()
            return True
            
        except Exception as e:
            print(f"Error de conexión: {str(e)}")
            return False

    def _enter_config_mode(self):
        self.send_command("enable")
        self.send_command("config")

    def send_command(self, command: str, wait_time: int = 1) -> str:
        """
        Envía un comando a la OLT y retorna la respuesta completa, manejando la paginación.
        """
        if not self.shell:
            raise Exception("No hay conexión activa con la OLT")
            
        # Limpiar buffer
        while self.shell.recv_ready():
            self.shell.recv(10000)
            
        # Enviar comando
        self.shell.send(command + '\n')
        time.sleep(wait_time)
        
        # Recolectar toda la salida
        full_output = ""
        while True:
            if self.shell.recv_ready():
                chunk = self.shell.recv(10000).decode('utf-8')
                if "---- More" in chunk:
                    # Eliminar la línea del More del output
                    chunk = chunk.replace("---- More ( Press 'Q' to break ) ----", "")
                    full_output += chunk
                    # Enviar espacio para continuar
                    self.shell.send(' ')
                    time.sleep(0.5)
                else:
                    full_output += chunk
                    if command in full_output and not self.shell.recv_ready():
                        break
            else:
                time.sleep(0.1)
                if full_output and not self.shell.recv_ready():
                    break
                
        # Limpiar posibles caracteres especiales y líneas vacías extra
        clean_output = "\n".join(line for line in full_output.split('\n') if line.strip())
        return clean_output

    def get_ont_info(self, frame: int, slot: int, port: int) -> str:
        """
        Obtiene información de ONTs en un puerto GPON específico.
        """
        # Entrar en la interfaz GPON
        interface_cmd = f"interface gpon {frame}/{slot}"
        self.send_command(interface_cmd)
        
        # Obtener información de ONTs
        display_cmd = f"display ont info {port} all"
        output = self.send_command(display_cmd)
        
        # Formatear la salida para mostrar la tabla completa
        lines = output.split('\n')
        formatted_output = []
        header_found = False
        
        for line in lines:
            # Buscar el inicio de la tabla
            if "F/S/P" in line:
                header_found = True
                # Agregar la línea de separación
                formatted_output.append("  " + "-" * 77)
                # Agregar el encabezado
                formatted_output.append(line.rstrip())
                # Agregar la línea de separación después del encabezado
                formatted_output.append("  " + "-" * 77)
            # Si ya encontramos el encabezado y la línea contiene datos de ONT
            elif header_found and re.match(r'\s+\d+/\s*\d+/\d+\s+\d+', line):
                formatted_output.append(line.rstrip())
        
        return "\n".join(formatted_output)

    def disconnect(self):
        if self.client:
            self.client.close()

# Ejemplo de uso
if __name__ == "__main__":
    # Configuración de la OLT
    olt_config = {
        "host": "172.11.109.254",
        "username": "JLALANGUI",
        "password": "51manT3c2076**%"
    }
    
    # Crear instancia y conectar
    olt = HuaweiOLT(**olt_config)
    if olt.connect():
        try:
            # Obtener y mostrar la información de ONTs
            ont_info = olt.get_ont_info(0, 0, 4)
            print(ont_info)
        finally:
            olt.disconnect()