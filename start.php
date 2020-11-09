<!DOCTYPE html>
<html>
    <head>
        <title>Maktub</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.8">
        <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/maktub.css" rel="stylesheet">
        <link href="css/header1.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="row justify-content-center">
            <main class="col-12 col-md-6 col-xl-4">
              <div class="comoJugar">
                  <p class="titulo">¿Cómo jugar?</p>
                  <p class="texto">
                    1. En la pantalla te va a aparecer un valor (puede ser número, una palabra o simbolos).
                    Tenés que pensar: ¿en qué secuencia o patrón el valor que figura en
                    pantalla ocupa o representa el número de nivel en que estás? (en algunos niveles
                    esta lógica puede variar un poco, pero... ¡la idea es hacerte pensar!)
                  </p>
                  <p class="texto">
                    2.  Una vez que lo descubras, pensá cuál sería el valor siguiente
                    en dicha secuencia.
                  </p>
                  <p class="texto">
                    3.  Completás en el campo el valor que pensaste y <strong>¡LISTO!</strong>
                    <br>
                    Ej: en el primer nivel, a 1 le sigue 2. Si el valor en
                    pantalla fuese "uno", deberias ingresar "dos".
                  </p>
                  <p class="texto"> La respuesta se debe ingresar sin tildes! Además, se distinguen
                    mayúsculas, minúsculas y espacios.<br>
                    Ahora sí, ¡a jugar!
                  </p>
                  <p class="texto">
                    ¿Necesitás una ayuda extra? Por si te perdés, debajo siempre te saldrá el número de
                    nivel en el que te encontrás.
                  </p>
              </div>
   
              <div class="row justify-content-center">
                    <form action="maktub.php" method="POST">
                        <input type="submit" class="botonJugar" name="jugar" value="Jugar">
                    </form>    
              </div>
            </main>  
        </div> 
    </body>
</html>           