@extends('layouts.app')

@section('content')

 <h4 class="text-center"> <strong>Total {{$carrito->total}}</strong></h4>
    

    <div  class="container">
        @if( !isset($carrito) || $carrito->productos->isEmpty())
        <div class="alet alert-warning">
            El carrito esta vacio
        </div>    
       @else
       <a class="btn btn-success mb-3"  href="{{route('pedidos.create')}}">Enviar Pedido</a>
        <div class="row">
            @foreach ($carrito->productos as  $producto)
                <div class=" col-lg-4 col-md-6 ms-12">
                   @include('componentes.producto-card')
                </div>
            @endforeach
        </div>
       
       @endif
    </div>
    
</body>
</html>
@endsection

