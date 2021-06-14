@extends('layouts.app')

@section('content')

    

    <div  class="container">
        @empty($categoria)
        <div class="row">
            No hay menu    
        </div>    
       @else
       @foreach ($categoria as  $cat)
            @if (!$cat->productos->isEmpty())
                <div class="ms-12 m-3"><h1>{{$cat->strNombre}}</h1></div>
                <div class="row">
                        
                        @foreach ($cat->productos as $producto )
                                <div class=" col-lg-4 col-md-6 ms-12 mt-3">
                                    @include('componentes.producto-card')
                                </div>
                        @endforeach
                        
                    
                </div>
            @endif
        @endforeach
       @endempty
    </div>
    

@endsection

{{-- 
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
 --}}
