<tr>
    <th class="col-md-1 col-lg-1 col-sm-1">
        <a href="javascript:ajaxLoad('employees/list?field=id&sort={{Session::get("employee_sort")=="asc"?"desc":"asc"}}')">
            &#35;id
        </a>
        <i style="font-size: 12px"
           class="glyphicon  {{ Session::get('employee_field')=='id'?(Session::get('employee_sort')=='asc'
               ?'glyphicon-sort-by-order':'glyphicon-sort-by-order-alt'):'' }}">
        </i>
    </th>
<th class="col-md-2 col-lg-2 col-sm-2">Employee</th>
    <th class="col-md-1 col-lg-2 col-sm-2">
        <a href="javascript:ajaxLoad('employees/list?field=name&sort={{Session::get("employee_sort")=="asc"?"desc":"asc"}}')">
            Name
        </a>
        <i style="font-size: 12px"
           class="glyphicon  {{ Session::get('employee_field')=='name'?(Session::get('employee_sort')=='asc'
               ?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
        </i>
    </th>

    <th class="col-md-2 col-lg-2 col-sm-2">
        <a href="javascript:ajaxLoad('employees/list?field=start_day&sort={{Session::get("employee_sort")=="asc"?"desc":"asc"}}')">
            Arrived
        </a>
        <i style="font-size: 12px"
           class="glyphicon  {{ Session::get('employee_field')=='start_day'?(Session::get('employee_sort')=='asc'
               ?'glyphicon-sort':'glyphicon-sort'):'' }}">
        </i>
    </th>

    <th class="col-md-2 col-lg-2 col-sm-2">
        <a href="javascript:ajaxLoad('employees/list?field=position&sort={{Session::get("employee_sort")=="asc"?"desc":"asc"}}')">
            Position
        </a>
        <i style="font-size: 12px"
           class="glyphicon  {{ Session::get('employee_field')=='position'?(Session::get('employee_sort')=='asc'
               ?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}">
        </i>
    </th>

    <th class="col-md-1 col-lg-2 col-sm-1">
        <a href="javascript:ajaxLoad('employees/list?field=parent_id&sort={{Session::get("employee_sort")=="asc"?"desc":"asc"}}')">
            &#35;Boss
        </a>
        <i style="font-size: 12px"
           class="glyphicon  {{ Session::get('employee_field')=='parent_id'?(Session::get('employee_sort')=='asc'
               ?'glyphicon-sort-by-order':'glyphicon-sort-by-order-alt'):'' }}">
        </i>
    </th>

    <th class="col-md-2 col-lg-2 col-sm-3">
        <a href="javascript:ajaxLoad('employees/list?field=salary&sort={{Session::get("employee_sort")=="asc"?"desc":"asc"}}')">
            Salary
        </a>
        <i style="font-size: 12px"
           class="glyphicon  {{ Session::get('employee_field')=='salary'?(Session::get('employee_sort')=='asc'
               ?'glyphicon-sort-by-order':'glyphicon-sort-by-order-alt'):'' }}">
        </i>
    </th>

{{--     <th class="col-md-1 col-lg-1 col-sm-1">
        <a href="javascript:ajaxLoad('employees/list?field=lb&sort={{Session::get("employee_sort")=="asc"?"desc":"asc"}}')">
            LB
        </a>
        <i style="font-size: 12px"
           class="glyphicon  {{ Session::get('employee_field')=='lb'?(Session::get('employee_sort')=='asc'
               ?'glyphicon-sort-by-order':'glyphicon-sort-by-order-alt'):'' }}">
        </i>
    </th>

    <th class="col-md-1 col-lg-1 col-sm-1">
        <a href="javascript:ajaxLoad('employees/list?field=rb&sort={{Session::get("employee_sort")=="asc"?"desc":"asc"}}')" >
            RB
        </a>
        <i style="font-size: 12px"
           class="glyphicon  {{ Session::get('employee_field')=='rb'?(Session::get('employee_sort')=='asc'
               ?'glyphicon-sort-by-order':'glyphicon-sort-by-order-alt'):'' }}">
        </i>
    </th> --}}

    <th  colspan="2"  class="col-md-1 col-lg-2 col-sm-2">
        Action
    </th>
</tr>