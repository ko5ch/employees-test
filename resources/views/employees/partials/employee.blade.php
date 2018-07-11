<li id="{{ $employee->id }}" class="item">{{ $employee->name }} ({{ $employee->position }})
    @if (($employee->rb - $employee->lb)>1)
        <a href="{{action('EmployeesController@show', [$employee->id]) }}" class="glyphicon glyphicon-menu-down"
           id="{{$employee->id}}"></a>
        <span><ul class="child"></ul></span>
    @endif
</li>