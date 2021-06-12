<div class="card h-100"  >
    @if ($producto->urlImg!="default")
    <img class="card-img-top "  src="/storage{{$producto->urlImg}}" style="max-height:250px;" />
    
@else
<img class="card-img-top" height="250" src="/storage{{$producto->urlImg}}" style="max-height:250px;" />
@endif
<div class="card-body">
    <h4 class="card-title">{{$producto->strNombre}}</h4>
    <h5 class="card-text">{{$producto->strDescripcion}}</h5>
    <p class="card-text ">$ {{$producto->dcPrecio}}<p>
        @if (isset($carrito))
        <h4> Cantidad {{$producto->pivot->cantidad}} Precio $ {{$producto->total}}</h4>

            <form class="d-inline" method="POST" action="{{route('productos.carrito.destroy',['producto'=>$producto->id,'carrito'=>$carrito->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Eliminar</button>
            </form>
        @else
        <form class="d-inline" method="POST" action="{{route('productos.carrito.store',['producto'=>$producto->id])}}">
            @csrf
            <button type="submit" class="btn btn-success">Agregar a carrito</button>
    </form>
        @endif

        
    
</div>

</div>