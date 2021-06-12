@extends('layouts.app')

@section('content')

    

    <div  class="container">
        @empty($productos)
        <div class="row">
            No hay menu    
        </div>    
       @else
        <div class="row">
            @foreach ($productos as  $producto)
                <div class=" col-lg-4 col-md-6 ms-12">
                   @include('componentes.producto-card')
                </div>
            @endforeach
        </div>
       
       @endempty
    </div>
    
</body>
</html>
@endsection

