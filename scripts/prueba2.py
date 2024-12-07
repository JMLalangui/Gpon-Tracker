import paramiko
import time
import re
from typing import List
import sys

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
            
            print(f"Conectando a {self.host}...")
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
            print("Conexión exitosa!")
            return True
            
        except Exception as e:
            print(f"Error de conexión: {str(e)}")
            return False

    def _enter_config_mode(self):
        self.send_command("enable")
        self.send_command("config")

    def send_command(self, command: str, wait_time: int = 1) -> str:
        if not self.shell:
            raise Exception("No hay conexión activa con la OLT")
            
        while self.shell.recv_ready():
            self.shell.recv(10000)
            
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

    def get_ont_info(self, frame: int, slot: int, port: int) -> str:
        interface_cmd = f"interface gpon {frame}/{slot}"
        self.send_command(interface_cmd)
        
        display_cmd = f"display ont info {port} all"
        output = self.send_command(display_cmd)
        
        lines = output.split('\n')
        formatted_output = []
        header_found = False
        
        for line in lines:
            if "F/S/P" in line:
                header_found = True
                formatted_output.append("  " + "-" * 77)
                formatted_output.append(line.rstrip())
                formatted_output.append("  " + "-" * 77)
            elif header_found and re.match(r'\s+\d+/\s*\d+/\d+\s+\d+', line):
                formatted_output.append(line.rstrip())
        
        return "\n".join(formatted_output)

    def disconnect(self):
        if self.client:
            self.client.close()
            print("Desconectado de la OLT")

def menu_principal():
    """Muestra el menú principal y obtiene la selección del usuario"""
    print("\n=== CONSULTA DE ONTs EN OLT HUAWEI ===")
    print("1. Consultar interfaz 0/0")
    print("2. Consultar interfaz 0/1")
    print("3. Salir")
    
    while True:
        try:
            opcion = input("\nSeleccione una opción (1-3): ")
            if opcion in ['1', '2', '3']:
                return opcion
            print("Opción inválida. Por favor, seleccione 1, 2 o 3.")
        except ValueError:
            print("Por favor, ingrese un número válido.")

def seleccionar_puerto() -> int:
    """Permite al usuario seleccionar un puerto GPON"""
    while True:
        try:
            puerto = int(input("\nIngrese el número de puerto (0-15): "))
            if 0 <= puerto <= 15:
                return puerto
            print("Puerto inválido. Debe estar entre 0 y 15.")
        except ValueError:
            print("Por favor, ingrese un número válido.")

def main():
    # Configuración de la OLT
    olt_config = {
        "host": "172.11.109.254",
        "username": "JLALANGUI",
        "password": "51manT3c2076**%"
    }
    
    # Crear instancia y conectar
    olt = HuaweiOLT(**olt_config)
    
    try:
        if olt.connect():
            while True:
                opcion = menu_principal()
                
                if opcion == '3':
                    print("\nSaliendo del programa...")
                    break
                
                # Determinar frame y slot basado en la selección
                frame = 0
                slot = 0 if opcion == '1' else 1
                
                # Seleccionar puerto
                puerto = seleccionar_puerto()
                
                print(f"\nObteniendo información de ONTs en Frame {frame}/Slot {slot}/Puerto {puerto}...")
                # Obtener y mostrar la información de ONTs
                ont_info = olt.get_ont_info(frame, slot, puerto)
                print("\nInformación de ONTs:")
                print(ont_info)
                
                # Preguntar si desea continuar
                continuar = input("\n¿Desea realizar otra consulta? (s/n): ").lower()
                if continuar != 's':
                    break
                
    except Exception as e:
        print(f"Error: {str(e)}")
    finally:
        olt.disconnect()

if __name__ == "__main__":
    main()