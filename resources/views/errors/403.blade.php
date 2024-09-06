<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PAGINA NO ENCONTRADA</title>
    @vite(['resources/sass/404.scss',])
</head>
<body>
     <section class="wrapper">

         <div class="container">

             <div id="scene" class="scene" data-hover-only="false">


                 <div class="circle" data-depth="1.2"></div>

                 <div class="one" data-depth="0.9">
                     <div class="content">
                         <span class="piece"></span>
                         <span class="piece"></span>
                         <span class="piece"></span>
                     </div>
                 </div>

                 <div class="two" data-depth="0.60">
                     <div class="content">
                         <span class="piece"></span>
                         <span class="piece"></span>
                         <span class="piece"></span>
                     </div>
                 </div>

                 <div class="three" data-depth="0.40">
                     <div class="content">
                         <span class="piece"></span>
                         <span class="piece"></span>
                         <span class="piece"></span>
                     </div>
                 </div>

                 <p class="p404" data-depth="0.50">403</p>
                 <p class="p404" data-depth="0.10">403</p>

             </div>

             <div class="text">
                 <article>
                    <p>¡Vaya! Parece que te perdiste. <br>¡Vuelve a la página de inicio!</p>
                    <a href="{{'/'}}"><button>¡Volver!</button></a>
                 </article>
             </div>

         </div>
     </section>

</body>
<script>
            // Parallax Code
            var scene = document.getElementById('scene');
        var parallax = new Parallax(scene);
        </script>
</html>
