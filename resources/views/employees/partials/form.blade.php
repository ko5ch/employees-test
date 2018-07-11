
<div class="form-group">
{!! Form::label('name', 'Name:', ['class' => 'control-label col-xs-3']) !!}
    <div class="col-xs-8">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('position', 'Position:', ['class' => 'control-label col-xs-3']) !!}
    <div class="col-xs-8">
        {!! Form::text('position', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('salary', 'Salary:', ['class' => 'control-label col-xs-3']) !!}
    <div class="col-xs-8">
        {!! Form::text('salary', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('parent_id', 'Boss:', ['class' => 'control-label col-xs-3']) !!}
    <div class="col-xs-8">
        {!! Form::select('parent_id',  isset($employee) ? ["$employee->parent_id" => "Current"]: $employees ,null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('start_day', 'Start date:', ['class' => 'control-label col-xs-3']) !!}
    <div class="col-xs-8">
        {!! Form::date('start_day', date('Y-m-d'), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! ($targetForm == 'Edit') ? Form::label('photo', 'Photo:', ['class' => 'control-label col-xs-3']) : null !!}
    <div class="col-xs-8">
        {!! ($targetForm == 'Edit') ? Form::file('photo', ['class' => 'form-control']) : null  !!}
    </div>
</div>
<div class="form-group">
    <div class="col-xs-offset-3 col-xs-8">
        {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>