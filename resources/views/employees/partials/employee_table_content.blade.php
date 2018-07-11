<tbody>

@foreach($details as $employee) 

  @if($employee->id > 1) 
    <tr>
      <td>{{ $employee->id }}</td>
      <td><img src="/uploads/avatars/{{ $employee->photo }}"
               style="width: 150px; height: 150px; float: left; border-radius: 50%;">
      </td>
      <td>{{ $employee->name }}</td>
      <td><span class="text-nowrap">{{ $employee->start_day->toDateString() }}</span>
        <small class="text-nowrap">({{ $employee->start_day->diffForHumans() }})</small>
      </td>
      <td>{{ $employee->position }}</td>
      <td class="text-center">&#35;{{ $employee->parent_id }}
        <small class="text-nowrap">({{ $boss["$employee->parent_id"] }})</small>
      </td>
      <td>&#36;{{ $employee->salary }}</td>
{{--       <td>{{ $employee->lb }}</td>
      <td>{{ $employee->rb }}</td> --}}
      <td><a href="{{action('EmployeesController@edit', [$employee->id])}}"
             class="btn btn-warning">Edit</a>
      </td>
      <td>
        <form action="{{action('EmployeesController@destroy', [$employee->id])}}" method="post">
          {{ csrf_field() }}
          <input name="_method" type="hidden" value="DELETE">
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>

  @endif
@endforeach
</tbody>
