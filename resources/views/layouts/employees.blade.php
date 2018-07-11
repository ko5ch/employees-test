<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body>

@include('includes.header')

@yield('content')

@include('includes.footer')

@section('footerScripts')
    <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/1.3.7.tether.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-4.0.0-beta.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">
@show
</body>
</html>