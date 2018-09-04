<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('get_companies')->get()->all();

        return view('pages.employees.index')->with('records', $employees);
    }

    public function create()
    {


        $Employee=new  Employee;
        $Employee_Columns=$Employee->getTableColumns();
        $companies=Company::all()->pluck("name", 'id');
        return view('pages.employees.form',['employee'=>$Employee_Columns,'companies'=>$companies]);
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'email',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else{



            $employee_id=$request->input('employee_id');
            if($employee_id){
                $employee=Employee::find($employee_id);
                $employee->first_name=$request->input('first_name');
                $employee->last_name=$request->input('last_name');
                $employee->company_id=$request->input('company_id');
                $employee->email=$request->input('email');
                $employee->phone=$request->input('phone');
                $employee->save();
                session()->flash('success', 'Successfully Updated.');
                return redirect()->back();
            }else{
                $employee=new Employee();
                $employee->first_name=$request->input('first_name');
                $employee->last_name=$request->input('last_name');
                $employee->company_id=$request->input('company_id');
                $employee->email=$request->input('email');
                $employee->phone=$request->input('phone');
                $employee->save();
                session()->flash('success', 'Successfully Added.');
                return redirect()->back();
            }
        }

    }



    public function edit($id)
    {


        $employee = Employee::find($id);
        $companies=Company::all()->pluck("name", 'id');
        return view('pages.employees.form',['employee'=>$employee,'companies'=>$companies]);
    }

    public function delete($id)
    {

        $employee = Company::find($id);
        $employee->delete();

        session()->flash('success', 'Successfully Deleted.');
        return redirect()->back();
    }

}
