@extends('layouts.app')
@section('content')

    <h1>Confirmar Pedido</h1>

    <h4 class="text-center"> <strong>Total {{$carrito->total}}</strong></h4>
    <div class=" text-center mb-3"> 
        <form class="d-inline" method="POST" action="{{route('pedidos.store')}}">
            @csrf
            <button type="submit" class="btn btn-success">Confirmar orden</button>
    </form> </div>
    @empty($carrito)
        <div class="alert-warning">Sin productos</div>
    
    @else

        <div class = "table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        {{-- <th>id</th> --}}
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrito->productos as $item)
                    <tr>
                        @if ($item->urlImg!="default")
                        <td><img src="/storage{{$item->urlImg}}" width="150" height="100"/></td>
                            
                        @else
                            <td>sin imagen</td>
                        @endif
                        <td>{{$item->strNombre}}</td>
                        <td>{{$item->dcPrecio}}</td>
                        <td>{{$item->pivot->cantidad}}</td>
                        <td>{{$item->total}}</td>
                        
                        {{-- <th><img src="storage\app\{{$item->urlImg}}" alt="" width="100" height="100"></th> --}}
                       
                    </tr>
                    @endforeach


                </tbody>
            </table>
           

        </div>
    @endempty

@endsection
    
