<h1>Trabajo Práctico N°2</h1>
<h2>Tecnologías del lado del servidor</h2>

<h3>Fecha de entrega: Chivilcoy:15/04/20</h3>

<h4>Objetivo: Entender cómo un formulario HTML se traduce en una petición HTTP y cómo la misma es procesada por una aplicación.</h4>

<h5>Teorico</h5>

1. Elabore una aplicación que presente al usuario un formulario implementado por HTML para la carga de los datos de una persona que solicita turno médico. El formulario deberá disponer de los siguientes campos:

a. Nombre del paciente (obligatorio)
b. Email (obligatorio)
c. Teléfono (obligatorio)
d. Edad
e. Talla de calzado (desde 20 a 45 enteros)
f. Altura (usando la herramienta de deslizador)
g. Fecha de nacimiento (obligatorio)
h. Color de pelo (Usando un elemento select con las opciones que usted considere adecuadas)
i. Fecha del turno (obligatorio)
j. Horario del turno (Entre las 8:00 hasta las 17:00 con turnos cada 15 minutos)
k. 2 botones: Enviar y Limpiar.

Todos los elementos del formulario deben validarse del lado de cliente y servidor, con el formato que mejor se ajuste y permitan HTML y PHP. Además, tomar en cuenta de validar que los datos ingresados se encuentren en los rangos especificados. ¿Por qué cree usted que se requiere validar los datos en ambos extremos de la comunicación?

Para poder correr la aplicación se debe levantar un servidor PHP en el directorio  <a href="Tp-2">Tp-2</a>.

La validación es necesaria hacerla tanto del lado cliente como del servidor ya que, la validación del lado cliente es para mejorar la experiencia del usuario al momento de ingresar los datos. Mientras tanto que la validación en el lado del servidor, se utiliza para aquellos usuarios maliciosos que saben saltear la validación de usuario y por lo tanto, pueden ingresar datos inválidos, erróneos, o hasta código.

2. Extienda el ejercicio anterior para que al enviar el formulario mediante el método POST se muestre al usuario un resumen del turno.

Cuando se envían los datos al hacer clik en el botón enviar, se muestra un resumen al usuario.

3. Realice las modificaciones necesarias para que el script del punto anterior reciba los datos mediante el método GET. ¿Qué diferencia nota? ¿Cuándo es conveniente usar cada método? Consejo: Utilice las herramientas de desarrollador de su Navegador (Pestaña Red) para observar las diferencias entre las diferentes peticiones.

Al utilizar GET para enviar los formularios al servidor, los datos viajan al servidor a través de la URL en forma de querystring. Mientras que cuando se utiliza el método POST, los datos están "ocultos" al cliente, en realidad, no aparecen en la URL, pero los datos pueden verse con el inspector de elementos de cualquier navegador. 
Es conveniente utilizar el método GET cuando se quiere obtener datos del servidor, mientras que el método POST cuando se quieren enviar datos del cliente al servidor para luego tomar una decisión en base a los valores recibidos.

4. Agregue al formulario un campo que permita adjuntar una imagen, y que la etiqueta del campo sea Diagnóstico. El campo debe validar que sea un tipo de imagen valido (.jpg o .png) y será optativo. La imagen debe almacenarse en un subdirectorio del proyecto y también debe mostrarse al usuario al mostrar el resumen del turno del ejercicio 2. ¿Qué sucede si 2 usuarios cargan imágenes con el mismo nombre de imagen? ¿Qué mecanismo implementar para evitar que un usuario sobrescriba una imagen con el mismo nombre?

Para lograr que los datos no se sobrescriban, se optó por cambiar el nombre de la imagen recibida por el ID asignado al turno con su extensión correspondiente, y luego poder vincular la imagen a través del ID con el turno.
Otro mecanismo que se pensó era guardar la imagen en subcarpetas nombradas con “idturno + TimeStamp + hash(nombre)"/nombre_imagen.extension , pero como no era necesario guardar el nombre la imagen se optó por el primer método, el cual es más sencillo de implementar. 

5. Utilice las herramientas para desarrollador del navegador y observe cómo fueron codificados por el navegador los datos enviados por el navegador en los dos ejercicios anteriores. ¿Qué diferencia nota?

Para poder enviar los "input=file" es necesario que en el formulario se incluya el atributo multipart/form-data, este cambia la forma en que se codifican los datos.

6. Agregar persistencia al sistema de turnos. Todos los datos del formulario deben almacenarse mediante algún mecanismo para poder ser recuperados posteriormente. Crear una nueva vista que le permita a un empleado administrativo visualizar todos los turnos en una tabla. La tabla debe incluir los siguientes campos: 
a. Fecha del turno 
b. Hora del turno 
c. Nombre del paciente 
d. Teléfono 
e. Email 
f. Link a la ficha del turno (la ficha se implementa en el siguiente punto) 

Esta página y la del formulario del punto 2 deben contar con una barra de navegación que permita ir a una u otra pantalla. Además, al procesar el formulario en el lado servidor, el sistema asigne un número de turno (que no debe repetirse). Para generar el sistema de persistencia, se aconseja estudiar algún mecanismo de serialización de datos. ¿Cómo relaciona la imagen del turno con los datos del turno? Comente alternativas que evaluó y opción elegida.

Para lograr la persistencia, se utilizó la serialización de datos mediante JSON, creando un único <a href= "turnos.json">archivo</a>, como un array de datos; para poder vincular los datos del usuario con la imagen subida, se añadió a la URL el parámetro "&id=" (completando la igualdad con el id proveniente del archivo de datos), el cual se puede obtener con $_GET(['id']), almacenando en el archivo la ruta de la imagen perteneciente al turno correspondiente.

7. Construya la vista de ficha de turno. Dicha vista debe permitir acceder al turno y mostrar todos sus datos, recuperados del mecanismo de persistencia elaborado en el punto anterior. ¿Cómo se identifica y discrimina un turno de otro? Debe funcionar el link a la ficha que se encuentra en la tabla de turnos. Recuerde agregar un enlace para volver a la tabla de turnos.

Cada turno tiene asignado un ID único, el cual se genera al dar de alta un nuevo turno.
