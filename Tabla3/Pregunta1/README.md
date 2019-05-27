# Redes 3 ESCOM - IPN
## Fault management Self-Assesment (table 4)
**Pregunta resuelta:**  
Does the organization have a ping poller which results in a fault being raised when a device fails to respond to a ping?
### Archivos 

Se crearon diferentes scripts para dar solución a la pregunta propuesta.

```
├── outputs
│   ├── hostsfound.list
│   ├── network_hosts.xml
│   └── subnets.list
├── requirements.txt
├── scripts
│   ├── message.txt
│   ├── mycontacts.txt
│   ├── obtenersubredes.py
│   ├── parse.py
│   └── ping.py
└── solution.sh

```
### Requisitos

A continuación enlistamos los requisitos para el correcto funcionamiento

```
* Nmap
* Python 2
* Python 3
* XSLT (opcional)
* Todo lo contenido en requirements.txt. Instalar con pip3 install -r requirements.txt.
```
***NOTA: Para enviar notificación a través de telegram es necesario contar con un bot (bot token ID y chat ID).***
## Funcionamiento
### Directorios
**scripts:** Este directorio contiene los scripts que hacen toda la magia.  
**outputs:** Directorio donde se almacenan las salidas de cada script.
### DDF
Diagrama de flujo de solution.sh (script integrador del proyecto).  
![Figura 1. Diagrama de flujo solution.sh](https://github.com/todmephis/redes3ESCOM/blob/master/Pregunta1/images/p1_1.png)  
### Scripts  
___
**solution.sh:**   
Se encarga de integrar la solución, manda a llamar al resto de scripts. Escrito en bash.    
Modo de ejecución:  
$chmod +x solution.sh  
$./solution.sh  
***NOTA: Los nombres de las salidas están en este script, los demás scripts los toman desde línea de argumentos.*** 
___ 
**obtenersubredes.py:**  
Se conecta algún router dentro de la topología para obtener la tabla de ruteo (Identificadores de red y máscaras notación CIDR), lo limpia para solo tener una salida como la sigueinte:  
```
192.168.1.0/24
192.168.2.0/24
192.168.3.0/24
```  
y lo guarda en un archivo en outputs/subnets.list.  
___
**parse.py**  
Limpia la salida (network_hosts.xml) del escaneo previo hecho con nmap (ver diagrama de flujo) para obtener como salida una lista de direcciones IP de todas las subredes detectadas con ***obtenersubredes.py***. La lista que genera la guarda en ***outputs/hostsfound.list*** y se ve como el siguiente ejemplo:  
```
192.168.2.1
192.168.2.39
192.168.2.5
192.168.2.6
192.168.2.8
```
___  
**ping.py**  
Toma como entrada el archivo ***outputs/hostsfound.list*** para hacer un pingpuller a cada dirección, su tarea es determinar si el host está abajo con lo cual (dependiendo al nivel) disparará alertas vía correo electrónico y por Telegram. Para lograr esto, hay que configurar en el script los datos del correo electrónico y el bot de Telegram y el chat ID con el cual se enviará el mensaje.   
***NOTA:  
Los archivos message.txt y mycontacts.txt son la plantilla para enviar el correo electrónico.***  
___   
Cada scipt puede ejecutarse de manera independiente si por alguna razón algo falla en el proceso de ejecución automática.  

## TODO  
### General  
- [ ] Arreglar bugs.
- [ ] Agregar validaciones.
- [ ] Detectar excepciones.


## Equipo

* **Iván Sánchez** @todmephis
* **Jorge Gibbs** @JorgeRGibbs
* **Gabriel Campos**
* **Luis Benitez**
* **Mauricio Rodriguez**

## License

This project is licensed under the GNU GENERAL PUBLIC LICENSE - see the [LICENSE.md](LICENSE) file for details

