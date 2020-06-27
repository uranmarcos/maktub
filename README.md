# maktub
Juego de lógica desarrollado en una página web dinámica, creada con HTML, CSS, PHP y MySQL.
En cada nivel, se recibe en pantalla un valor que lo representa en base a alguna secuencia o patrón. El juego consiste en descifrar dicha lógica, y enviar el valor que seguiria en la misma.
Por ejemplo, en el primer nivel, se recibe en pantalla el valor "1". El valor que seguiria es "2". Al ingresarlo, se avanza de nivel y se recibe el valor "II", en representación del segundo nivel.
Ingresando "III", se avanza de nivel.
Si la respuesta es incorrecta se recibe un mensaje de error, aleatorio.
El juego cuenta con formulario de registro y login, almacena el nivel por usuario, permite recuperar la contraseña, brinda estadísticas por usuario(porcentaje de respuestas correctas, cantidad de respuestas incorrectas, nivel alcanzado, porcentaje de progreso del juego, etc).
Posee formulario de contacto permitiendo al usuario enviar mensajes.
Permite además reiniciar el juego por usuario, y volver al nivel 1.
También almacena en un archivo json las respuestas incorrectas que ingresan los usuarios.

Juego en desarrollo, falta generar aún la opción demo para probar los primeros niveles sin registrarse, además de retocar algunos detalles. Además está pendiente modificar el código PHP y utilizar funciones para las validaciones.


