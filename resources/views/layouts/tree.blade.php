<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Employees | @yield('title', 'Home Page')</title>

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css"/>
	{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/employees.css') }}" rel="stylesheet"> --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">
</head>
<body>

@include('includes.header')

@yield('content')

@include('includes.footer')

@section('footerScripts')

@show
</body>
</html>