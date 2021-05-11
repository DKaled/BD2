# BD2
Proyecto BD2

<h2>Descripción</h2>
El minisúper *nombre* se encuentra dirigido por los directores Daniel López de la Torre y Claudia Rodríguez Santos. Se busca un sistema web que pueda ser aplicado dentro de la tienda y se pueda visualizar desde los computadores de los trabajadores. Los directivos se encargan de dirigir a los encargados, los cuales dirigen a los cajeros que les dan servicio a los clientes del minisúper. Dentro del minisúper podemos encontrar los departamentos de Muebles, Electrónica, Hogar, Juguetería, Deportes, Papelería, Jardinería, Ropa, Recursos Humanos y Finanzas.
Los directivos solicitan una base de datos que administre los productos, las zonas internas con sus directivos, encargados y cajeros, así como la entrada de clientes a la plataforma.

Las tablas deben contener la siguiente información:
    • Usuario: Nombres y apellidos del usuario, el CURP, fecha de nacimiento, un nombre de usuario y una contraseña encriptada.
    • Director: Nombres y apellidos de los directores, la fecha de contratación, el CURP y una contraseña encriptada. SUELDO
    • Encargado: Nombres y apellidos de los encargados, la fecha de contratación, el CURP, el departamento asignado y una contraseña encriptada. SUELDO
    • Departamento: Nombre del departamento y nombres y apellidos del encargado.
    • Producto: Nombre del producto, su precio y el departamento al que pertenece.
    • Cajero: Nombre y apellidos de los cajeros, CURP, la caja a trabajar, el turno, la fecha de contratación y la contraseña encriptada. SUELDO

La base de datos debe permitir el acceso tanto a cajeros, directivos y encargados, sin embargo, solo los directivos tienen acceso completo. Los encargados solo pueden leer, actualizar e insertar sobre la base de datos, mientras que los cajeros solo pueden leer sobre esta. De forma más precisa, los cajeros solo pueden visualizar los productos, los departamentos del minisúper y su propia información, mientras que los encargados pueden visualizar los productos, departamentos, a todos los cajeros y su propia información; así como pueden actualizar e insertar datos sobre todos los cajeros y los productos.

Los limitantes dadas por los encargado indican que no pueden existir más de 4 cajeros, más de un encargado por departamento, para la creación de un usuario es necesaria una identificación oficial, osease, la persona no pude ser menor de edad.


<h2>DER</h2>