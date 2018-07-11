<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employees;
use App\Http\Requests\EmployeeRequest;
use HttpResponse;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('employees.index');
    }

    public function getList(Request $request)
    {
//$request->session()->flush();
        if($request->ajax()){
        Session::put('employee_field', Input::has('field') ? Input::get('field') : (Session::has('employee_field')
            ? Session::get('employee_field') : 'name'));
        Session::put('employee_search', Input::has('ok') ? Input::get('search') : (Session::has('employee_search')
            ? Session::get('employee_search') : ''));
        Session::put('employee_sort', Input::has('sort') ? Input::get('sort') : (Session::has('employee_sort')
            ? Session::get('employee_sort') : 'asc'));

        $employees = Employees::where('name','LIKE', '%' . Session::get('employee_search') .'%') // Разделить по пробелам
            ->orWhere('name','LIKE', '%' . Session::get('employee_search') .'%')
            ->orWhere('position','LIKE', '%' . Session::get('employee_search') .'%')
            ->orWhere('salary','LIKE', '%' . Session::get('employee_search') .'%')
            ->orWhere('start_day','LIKE', '%' . Session::get('employee_search') .'%')
            ->orderBy(Session::get('employee_field'), Session::get('employee_sort'))->paginate(4);

        $bosses = Employees::all();
        $bosses = $bosses->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name'] ];
        });
        return view('employees.partials.list')
            ->with(['details' => $employees])->with('boss', $bosses);
            }

        return redirect()->action('EmployeesController@index');
    }

    public function show($pid = 0)
    {
        $child = Employees::oldest('lb')->child($pid)->get();

        return view('employees.show-tree')
            ->with(['employees' => $child]);
    }

    public function create()
    {
        $employees = Employees::all()->pluck('name', 'id');

        return view('employees.create',compact('employees'));
    }

    public function store(EmployeeRequest $request)
    {
        $input = $request->all();

        Employees::saveOnTree($input);

        return redirect('employees');
    }

    public function edit($id)
    {
/**         Uncomment if "move" option already exists
 *  and add << ,compact('employees') >> to view() as att
 *  and edit partials.form
 *        $employees = Employees::where('id', '!=', $id)
 *            ->get()
 *            ->pluck('full_name', 'id');
*/
        $employee = Employees::findOrFail($id);

        return view('employees.edit', compact('employee'));
    }

    public function destroy($id)
    {
        
        Employees::deleteFromTree($id);

        return redirect('employees');
    }

    public function update($id, EmployeeRequest $request)
    {
        $employee = Employees::findOrFail($id);

        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $id . '.' . $file->extension();
            $file->move(public_path() . '/uploads/photos/', $fileName);
            Image::make(public_path() . '/uploads/photos/' . $fileName)
                ->resize(150, 150)
                ->save(public_path() .'/uploads/avatars/' . $fileName);
            $employee->photo = $fileName;
            //$employee->save();
        }
        $employee->update($request->all());

       return redirect('employees');
    }

}
