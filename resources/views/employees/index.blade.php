@extends('layouts.employees')

@section('title', 'List')
@section('content')
    <style>
        .loading {
            background: snow url('{{ asset('img/loader64.gif') }}') no-repeat center 65%;
            height: 64px;
            width: 64px;
            position: fixed;
            border-radius: 4px;
            left: 50%;
            top: 50%;
            margin: -40px 0 0 -50px;
            z-index: 2000;
            display: none;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="list">

                @include('employees.partials.list')

            </div>
        </div>
    </div>
    
    <div class="loading"></div>

@endsection
@section('footerScripts')
    @parent
    <script src="{{ asset('js/list.js') }}"></script>
@endsection    