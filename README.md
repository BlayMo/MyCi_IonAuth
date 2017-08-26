#MyCi_IonAuth


    Aplicación base realizada con Codeigniter 3.1.5 + IonAuth 2 para gestión de usuarios, grupos y acceso a modulos a nivel de usuario.
    La aplicación controla el acceso -login- y las tareas básicas -CRUD- a realizar en los módulos.
    Desarrollada bajo el pattern HMVC, cada módulo es una unidad lógica independiente, compuesta de modelo, vista y controlador.
    La base de datos contiene, entre otras, las siguientes tablas:
        - Permisos => Contiene los campos: usuarios, módulo, crear, ver, editar y sololectura.
                      Esta tabla  registra: quien -usuario-, donde -módulo- y como -crear,leer...- se accede.
        - Modulos =>  Contiene los campos: controller, grupo, descripcion.
                      Esta tabla  registra el controlador del módulo y el grupo al que pertenece dicho módulo. 
                      La información del campo 'descripcion' es el item que aparece en el menu de navegación.
        - Diario =>   Tabla de ejemplo con supuestos datos contables perteneciente al módulo 'Contabilidad'.
                      Esta tabla pertenece al grupo 'Contabilidad' y solo los usuarios pertenecientes a este grupo pueden acceder a este módulo.
                      La tabla 'permisos' registra por cada usuario del grupo, que autorizaciones de acceso  tiene cada uno. De esta forma un usuario
					  en un modulo determinado puede tener permisos para 'crear' y 'editar' y otro usuario solo 'sololectura'.
	
    El/los usuarios pertenecientes al grupo 'admin', tienen acceso total a todos los módulos. Es el "Administrator" el único que puede 'CRUD' en
    en las tablas de administracion : Permisos, users, grupos, módulos. Es además el único que puede modificar los permisos para los usuarios que no pertenecen
    al grupo 'admin'.	
