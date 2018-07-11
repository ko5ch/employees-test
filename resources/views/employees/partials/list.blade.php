<div class="panel panel-default">
    
  <div class="panel-heading"><h4>Employee List</h4></div>
    
  <div class="panel-body">
    <!-- СREATE BUTTON -->
    <div class="pull-right">
      <a href="{{action('EmployeesController@create') }}" class="btn btn-primary pull-right">
        <i class="glyphicon glyphicon-plus-sign">&nbsp;Add Employee</i>
      </a>
    </div>
        <!-- SEARCH FIELD -->
      <div class="form-group">
        {{ csrf_field() }}
        <div class="input-group">
          <input class="form-control" id="search" value="{{ Session::get('employee_search') }}"
                 onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('employees/list')}}?ok=1&search='+this.value)"
                 placeholder="Search..." type="text">
          <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('employees/list')}}?ok=1&search='+$('#search').val())">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </div>
  </div>

  @if(isset($details)) 
        <!-- TABLE WITH DATA  -->
    <div class="table-responsive">
      <table class="table table-striped header-fixed" >
        <thead>

          @include('employees.partials.employee_table_head')
        </thead>

        @include('employees.partials.employee_table_content')
      </table>
    </div>
        <!-- Pagination Panel  -->
    <div class="navbar-fixed-bottom row-fluid">
      <div class="navbar-inner">
        <div class="container">
          <div class="pull-right">
            {{ $details->links() }}
          </div>
        </div>
      </div>
    </div>

  @else

  @include('employees.partials.employee-none')

  @endif
</div>

<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>

