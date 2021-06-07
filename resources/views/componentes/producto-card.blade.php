@if ($producto->urlImg!="default")
<td><img src="/storage{{$producto->urlImg}}" width="200" height="100"/></td>
    
@else
    <td>sin imagen</td>
@endif
<h1>{{$producto->strNombre}}</h1>
<p>{{$producto->strDescripcion}}</p>
<h2>$ {{$producto->dcPrecio}}</h2>