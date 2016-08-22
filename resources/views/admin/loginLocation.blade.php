@extends('app')

@section('head')
    <script>
        window.onload = function()
        {
            location.href = 'http://localhost:8000/login';
        }
    </script>
@stop