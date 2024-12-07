import paramiko
import time
import re
import json
from typing import List, Dict

class HuaweiOLT:
    def __init__(self, host: str, username: str, password: str, port: int = 22):
        self.host = host
        self.username = username
        self.password = password
        self.port = port
        self.client = None
        self.shell = None

    def connect(self) -> bool:
        """Conecta a la OLT usando SSH"""
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
            print("Conexión exitosa a la OLT")
            return True
        except Exception as e:
            print(f"Error de conexión: {str(e)}")
            return False

    def _enter_config_mode(self):
        """Entra en modo de configuración en la OLT"""
        self.send_command("enable")
        self.send_command("config")

    def send_command(self, command: str, wait_time: int = 1) -> str:
        """Envía un comando a la OLT y retorna la salida"""
        if not self.shell:
            raise Exception("No hay conexión activa con la OLT")
        
        self.shell.send(command + '\n')
        time.sleep(wait_time)
        
        full_output = ""
        while True:
            if self.shell.recv_ready():
                chunk = self.shell.recv(10000).decode('utf-8')
                if "---- More" in chunk:
                    chunk = chunk.replace("---- More ( Press 'Q' to break ) ----", "")
                    full_output += chunk
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
                
        clean_output = "\n".join(line for line in full_output.split('\n') if line.strip())
        return clean_output

    def get_ont_info(self, frame: int, slot: int, port: int) -> List[Dict[str, str]]:
        """Obtiene información de las ONTs y las organiza en una lista de diccionarios"""
        interface_cmd = f"interface gpon {frame}/{slot}"
        self.send_command(interface_cmd)
        
        display_cmd = f"display ont info {port} all"
        output = self.send_command(display_cmd)
        
        print("Salida del comando:", output)  # Imprimir salida completa para verificar

        lines = output.split('\n')
        ont_info = []
        header_found = False
        data_started = False  # Variable para indicar si hemos comenzado a recoger datos de la tabla

        for line in lines:
            if re.search(r'F/S/P\s+ONT\s+ID', line):
                header_found = True
                print("Cabecera de ONT detectada")  # Depuración
                continue

            if header_found:
                if re.match(r'^\s*\d+/\d+/\d+\s+\d+', line):  # Detecta una línea de datos de ONT
                    ont_data = re.split(r'\s+', line.strip())
                    print(f"Datos de ONT encontrados: {ont_data}")  # Depuración
                    if len(ont_data) >= 8:
                        ont_info.append({
                            "F/S/P": ont_data[0],
                            "ONT ID": ont_data[1],
                            "SN": ont_data[2],
                            "Control Flag": ont_data[3],
                            "Run State": ont_data[4],
                            "Config State": ont_data[5],
                            "Match State": ont_data[6]
                        })
                    data_started = True
                elif data_started and re.match(r'^---', line):  # Línea de separador, final de la tabla
                    print("Fin de la tabla de datos detectado")  # Depuración
                    break
                elif data_started:
                    print(f"Línea inesperada después de los datos: {line}")  # Depuración
        
        if ont_info:
            print("Datos de ONTs procesados exitosamente")
        else:
            print("No se encontraron datos de ONTs en la salida proporcionada.")
        
        return ont_info

    def save_ont_info_to_json(self, frame: int, slot: int, port: int, filename: str = "ont_info.json"):
        """Exporta los datos de ONTs a un archivo JSON"""
        ont_info = self.get_ont_info(frame, slot, port)
        if ont_info:
            with open(filename, 'w') as json_file:
                json.dump(ont_info, json_file, indent=4)
            print(f"Información de ONTs exportada a {filename}")
        else:
            print("No se encontraron datos de ONTs para exportar.")

    def disconnect(self):
        """Cierra la conexión SSH"""
        if self.client:
            self.client.close()
            print("Desconectado de la OLT")

def main():
    olt_config = {
        "host": "172.11.109.254",
        "username": "JLALANGUI",
        "password": "51manT3c2076**%"
    }
    
    olt = HuaweiOLT(**olt_config)
    
    try:
        if olt.connect():
            while True:
                frame = int(input("Ingrese el frame (por ejemplo, 0): "))
                slot = int(input("Ingrese el slot (por ejemplo, 0 o 1): "))
                port = int(input("Ingrese el puerto (por ejemplo, 0 a 15): "))
                
                olt.save_ont_info_to_json(frame, slot, port, "ont_info.json")
                
                continuar = input("\n¿Desea realizar otra consulta? (s/n): ").lower()
                if continuar != 's':
                    break
    except Exception as e:
        print(f"Error: {str(e)}")
    finally:
        olt.disconnect()

if __name__ == "__main__":
    main()
