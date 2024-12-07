import os
import sys
from netmiko import ConnectHandler

def get_olt_connection(ip, username, password):
    """
    Establece una conexión a una OLT Huawei utilizando la biblioteca NetMiko.
    
    Parameters:
    ip (str): Dirección IP de la OLT
    username (str): Nombre de usuario para la conexión
    password (str): Contraseña para la conexión
    
    Returns:
    netmiko.base_connection.BaseConnection: Objeto de conexión con la OLT
    """
    device = {
        'device_type': 'huawei_vrp',
        'ip': ip,
        'username': username,
        'password': password
    }

    try:
        connection = ConnectHandler(**device)
        print("Conexión establecida con éxito.")
        return connection
    except Exception as e:
        print(f"Error al establecer la conexión: {e}")
        return None

if __name__ == "__main__":
    # Ejemplo de uso
    olt_ip = "192.168.1.100"
    olt_username = "JLALANGUI"
    olt_password = "51manT3c2076**%"

    olt_connection = get_olt_connection(olt_ip, olt_username, olt_password)
    if olt_connection:
        # Realizar operaciones en la OLT
        output = olt_connection.send_command('display version')
        print(output)
        olt_connection.disconnect()