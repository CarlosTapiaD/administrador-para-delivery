<div class="card"  >
    @if ($producto->urlImg!="default")
    <img class="card-img-top" src="/storage{{$producto->urlImg}}" />
    
@else
<img class="card-img-top" src="/storage{{$producto->urlImg}}" />
@endif
<div class="card-body">
    <h4 class="card-title">{{$producto->strNombre}}</h4>
    <h5 class="card-text">{{$producto->strDescripcion}}</h5>
    <p class="card-text"> {{$producto->dcPrecio}}<p>
        <a href="#" class="btn btn-primary">Comprar</a>
</div>

</div>