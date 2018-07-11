@extends('layouts.employees')

@section('title', 'Create')
@section('content')
 <div class="container">
    <h1>Create a New Employee</h1>
    <hr/>
    <div class="col-md-8 col-lg-7 col-sm-9">
    <div class="form-horizontal">

    {!! Form::open(['url'=>'employees']) !!}

        @include('employees.partials.form', ['submitButtonText' => 'Add Employee', 'targetForm' =>'Create'])

    {!! Form::close() !!}
    @include('employees.partials.errors')
    </div>
</div>
</div>
@endsection
@section('footerScripts')
    @parent
    <script src=""></script>
@endsection