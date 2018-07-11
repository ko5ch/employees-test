@extends('layouts.tree')

@section('title', 'Tree')
@section('content')
    <div class="container">
        <h3>Employee Tree</h3>
        <hr/>
        <div class="row">
            <div class="col-md-10 col-md-offset-2" id="tree">
    <ul class="treetop">
        @each('employees.partials.employee', $employees, 'employee', 'employees.partials.employee-none')
    </ul>
            </div>
        </div>
    </div>
@endsection
@section('footerScripts')
    @parent
    <script src="{{ asset('js/employees_tree.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src='{{ asset('js/ajax.jquery.js') }}'></script>
@endsection    