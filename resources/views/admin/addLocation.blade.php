@extends('app')
@section('head')
    <script>
        window.onload=function(){
            location.href = '/admin/list/{{ $kindId }}'
        }
    </script>
    @stop