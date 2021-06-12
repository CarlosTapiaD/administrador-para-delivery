@extends('layouts.app')
@section('content')

    <h1>Detalle de pago</h1>

    <h4 class="text-center"> <strong>Total {{$pedido->total}}</strong></h4>
    <div class=" text-center mb-3"> 
        <form class="d-inline" method="POST" action="{{route('pedidos.pagos.store',['pedido'=>$pedido->id])}}">
            @csrf
            <button type="submit" class="btn btn-success">Pagar</button>
    </form> </div>

           

        

@endsection
    
