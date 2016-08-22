@extends('app')
@section('head')
    <style>
        img{
            width: 100%;
        }
    </style>

    @stop

@section('body')
    <div id="content">
        <?php echo $info; ?>
    </div>
    <script>
        window.onload = function()
        {
            var h = document.getElementById('content').offsetHeight;
            alert(h);
        }
    </script>
@stop