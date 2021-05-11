# Minisúper Solariatown - BD2
Proyecto BD2
## Descripción
El minisúper Solariatown se encuentra dirigido por los directores Eduardo Coronado Meza y Paola Itzel López Ramírez. Se busca un sistema web que pueda ser aplicado dentro de la tienda y se pueda visualizar desde los computadores de los trabajadores. Los directivos se encargan de dirigir a los encargados, los cuales dirigen a los cajeros que les dan servicio a los clientes del minisúper. Dentro del minisúper podemos encontrar los departamentos de Muebles,  Frutas y Verduras, Electrónica, Hogar, Juguetería, Deportes, Papelería, Jardinería, Ropa, Recursos Humanos y Finanzas.

Los directivos solicitan una base de datos que administre los productos, así como las zonas internas con sus directivos, encargados y cajeros.

Las tablas deben contener la siguiente información:
-	Usuario: Los datos que correspondan al usuario en cuestión (directivo, encargado o cajero), junto con su nombre de usuario y contraseña encriptada.
-	Director: Nombres y apellidos del directivo, su sexo y su fecha de contratación.
-	Encargado: Nombres y apellidos del encargado, su sexo y su fecha de contratación.
-	Departamento: Nombre del departamento y nombres y apellidos del encargado.
-	Producto: Nombre del producto, su precio y el departamento al que pertenece.
-	Cajero: Nombres y apellidos del cajero, su sexo, su fecha de contratación, su turno de trabajo y su caja que le corresponde. 

La base de datos debe permitir el acceso tanto a cajeros, directivos y encargados, sin embargo, solo los directivos tienen acceso completo. Los encargados solo pueden leer y modificar datos sobre la base de datos, mientras que los cajeros solo pueden leer sobre esta. De forma más precisa, los cajeros solo pueden visualizar los productos, los departamentos del minisúper y su propia información, mientras que los encargados pueden visualizar los productos, departamentos, a todos los cajeros y su propia información; así como pueden modificar los datos respectivos sobre todos los cajeros y los productos. Es importante destacar que toda modificación debe traer su respectiva descripción y fecha en la cual se realizó. Todo lo anterior administrado mediante usuarios, lo cual permite que los permisos se repartan fácilmente y no se hagan acciones erróneas en la base de datos.

Los limitantes dadas por los directivos indican que no pueden existir más de 4 cajeros, más de un encargado por departamento, que para la creación de un usuario es necesaria una identificación oficial, osease, la persona no pude ser menor de edad, que se pueda acceder a la base de datos a todas horas y que las contraseñas se encuentren protegidas por algún tipo de encriptación dentro de la base de datos. De igual forma, dichas contraseñas solo pueden cambiarse eliminando completamente el usuario y volviéndolo hacer, más que nada por temas de seguridad y comprobación de datos.

Esta base de datos debe contar con un sistema de log que permita visualizar los cambios hechos en esta, el cual debe ser almacenado en un archivo externo, también de estar conectada solo dentro de la sucursal, no puede ser accesible por fuera de la red interna del edificio. La copia de seguridad deberá hacerse de manera externa y deberá ser almacenada de igual forma en una USB o disco duro.

El sistema web traerá en sí mismo un sistema CRUD para el uso correcto de la base de datos. Como se mencionaron en los requerimientos anteriores, se tiene que los cajeros pueden leer los datos correspondientes a sus áreas, los encargados son capaces de aparte modificar e insertar datos, mientras que los directivos son, aparte, capaces de eliminar, todo gracias a la interfaz gráfica diseñada específicamente para el proyecto.

## DER

![DER](/img/DER.png)