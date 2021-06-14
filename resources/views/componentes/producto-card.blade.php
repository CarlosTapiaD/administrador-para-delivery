<div class="card h-100"  >
    <div id="carousel{{$producto->id}}" class="carousel slide carousel-fade">
        <div class="carousel-inner" >
          <div class=" carousel-item active">
                  
            <img  src="/storage{{$producto->urlImg}}"  class="d-block w-100 card-img-top" max-height="500">
        </div>
          
            @foreach ($producto->images as $item )
            <div class=" carousel-item ">
                  
              <img  src="/storage{{$item->path}}"  class="d-block w-100 card-img-top"  max-height="500">
          </div>
            @endforeach
            <a class="carousel-control-prev" href="#carousel{{$producto->id}}" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon "></span>
            </a>

            <a class="carousel-control-next" href="#carousel{{$producto->id}}" role="button" data-slide="next">
              <span class="carousel-control-next-icon "></span>
            </a>
        </div>
      </div>
      <div class="card-body">
    <h4 class="card-title">{{$producto->strNombre}}</h4>
    <p  class="card-text">{{$producto->strDescripcion}}</p>
</div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"> Precio ${{$producto->dcPrecio}} MXN</li>
        
      
      
        @if (isset($carrito))
        <li class="list-group-item">Cantidad {{$producto->pivot->cantidad}} Precio $ {{$producto->total}}</li>

            <form class="d-inline" method="POST" action="{{route  ('productos.carrito.destroy',['producto'=>$producto->id,'carrito'=>$carrito->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Eliminar</button>
            </form>
        @else
        <form class="d-inline m-3 " method="POST" action="{{route('productos.carrito.store',['producto'=>$producto->id])}}">
            @csrf
            <button type="submit" class="btn btn-success">Agregar a carrito</button>
    </form>
        @endif

        
    
    </ul>

</div>