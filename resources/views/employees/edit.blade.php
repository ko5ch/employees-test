@extends('layouts.employees')

@section('title', 'Edit')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-5 col-sm-7">
            <img src="/uploads/photos/{{ $employee->photo }}" style="width: 440px; height: 440px; border-radius: 1%;">
        </div>
        <div class="col-md-6 col-lg-5 col-sm-7">
            <div class="form-horizontal">
                <h1 class="col-md-offset-1"><strong>{!! strtoupper($employee->name) !!}</strong></h1>
                <hr/>
                <h3 class="col-md-offset-1">Edit employee</h3>
                {!! Form::model($employee, ['method' => 'PATCH', 'action'=>['EmployeesController@update', $employee->id], 'files' => true]) !!}

                @include('employees.partials.form', ['submitButtonText' => 'Update', 'targetForm' =>'Edit'])

                {!! Form::close() !!}
                @include('employees.partials.errors')
            </div>

        </div>
    </div>
</div>
@endsection
@section('footerScripts')
    @parent
    <script src=""></script>
@endsection