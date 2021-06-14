@extends('layouts.app')
@section('content')
    @empty($productos)
        <div>sin productos</div>
    @else

    <div class="card" style="width: 18rem;">
      <div id="carousel{{$productos->id}}" class="carousel slide carousel-fade">
        <div class="carousel-inner" >
          <div class=" carousel-item ">
                  
            <img  src="/storage{{$productos->urlImg}}"  class="d-block w-100 card-img-top" alt="..."  max-height="500">
        </div>
          
            @foreach ($productos->images as $item )
            <div class=" carousel-item {{$loop->first ? 'active' : ''}}">
                  
              <img  src="/storage{{$item->path}}"  class="d-block w-100 card-img-top" alt="..."  max-height="500">
          </div>
            @endforeach
            <a class="carousel-control-prev" href="#carousel{{$productos->id}}" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon "></span>
            </a>

            <a class="carousel-control-next" href="#carousel{{$productos->id}}" role="button" data-slide="next">
              <span class="carousel-control-next-icon "></span>
            </a>
        </div>
      </div>
        {{-- <img  src="/storage{{$productos->urlImg}}"  class="card-img-top img-fluid" alt="..."> --}}
        <div class="card-body">
          <h5 class="card-title">{{$productos->strNombre}}</h5>
          <p class="card-text">{{$productos->strDescripcion}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"> Precio ${{$productos->dcPrecio}} MXN</li>
        </ul>
        <div class="card-body">
            <form class="d-inline" method="POST" action="{{route('productos.carrito.store',['producto'=>$productos->id])}}">
                @csrf
                <button type="submit" class="btn btn-success">Agregar a carrito</button>
        </form>
          {{-- <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a> --}}
        </div>
      </div>
      
      <div>
          
      </div>
               
            


    
    @endempty
    


    
@endsection