<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Menu</title>
</head>
<body>

    

    <div  class="container">
        @empty($productos)
        <div class="row">
            No hay menu    
        </div>    
       @else
        <div class="row">
            @foreach ($productos as  $producto)
                <div class="col  m ">
                   @include('componentes.producto-card')
                </div>
            @endforeach
        </div>
       
       @endempty
      </div>
    
</body>
</html>

