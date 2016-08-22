@extends("app")
@section("content")
    {{ $name }}
    @if($name == "name2")
        2
    @else
        5
    @endif
    @for($i=1;$i<10;$i++)
        {{ $i  }}
    @endfor

@stop