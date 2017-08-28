# MyCi_IonAuth


Aplicación base realizada con Codeigniter 3.1.5 + IonAuth 2 para gestión de usuarios, grupos y acceso a modulos a nivel de usuario.
    
La aplicación controla el acceso -**Login/Logout**- y las tareas básicas -**CRUD**- a realizar en los módulos.
    
Desarrollada bajo el pattern HMVC, cada módulo es una unidad lógica independiente, compuesta de modelo, vista y controlador.

La base de datos contiene, entre otras, las siguientes tablas:
- **Permisos** => Contiene los campos: usuarios, módulo, crear, ver, editar y sololectura. Esta tabla  registra: quien -usuario-, donde -módulo- y como -crear,leer...- se accede.
- **Modulos** =>  Contiene los campos: controller, grupo, descripcion.
Esta tabla  registra el controlador del módulo y el grupo al que pertenece dicho módulo. 
La información del campo 'descripcion' es el item que aparece en el menu de navegación.
- **Diario** =>   Tabla de ejemplo con supuestos datos contables perteneciente al módulo 'Contabilidad'.
Esta tabla pertenece al grupo 'Contabilidad' y solo los usuarios pertenecientes a este grupo pueden acceder a este módulo.
La tabla **'permisos'** registra por cada usuario del grupo, que autorizaciones de acceso  tiene cada uno. De esta forma un usuario en un modulo determinado puede tener permisos para 'crear' y 'editar' y otro usuario solo 'sololectura'.


La estructura de la **BD**, tablas y datos de ejemplo se encuentra en **myci_ionauth.sql**.

El software empleado es el siguiente:

**PHP 7.1.6 + Codeigniter 3.1.5 + DataTables 1.10.13 + Bootstrap 3.3.7**

**Ion Auth 2 & harviacode/codeigniter-crud-generator**
	

Pantallas de la aplicación:
![P1.jpg](https://github.com/BlayMo/MyCi_IonAuth/blob/master/P1.jpg "Tabla de usuarios")    

[Ver Demo de la aplicacion](https://expresoweb.000webhostapp.com/MyCi_IonAuth/public/main "")

Todo el código se distribuye bajo licencia MIT. El software de terceros se distribuye con sus respectivas licencias.

Agradezco cualquier sugerencia, comentario y corrección de errores. 
Ni que decir tiene que el código que he depositado en este repositorio es infinitamente mejorable y optimizable.
Todo se ha desarrollado con 'corazón' y para ser compartido.
[Mi WebSite](https://expresoweb.joomla.com/contact"")

[Mail](expresoweb2015@gmail.com "")
