<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
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
        $companies = Company::all();
        return view('pages.companies.index')->with('records', $companies);
    }

    public function create()
    {


        $Company=new  Company;
        $Company_Columns=$Company->getTableColumns();
        //print_r($class);
        return view('pages.companies.form',['company'=>$Company_Columns]);
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
          //  'logo' => 'required',
            'website' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else{

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $name = str_slug($request->name).'.'.$image->getClientOriginalExtension();
                $destinationPath = storage_path('app/public/images');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $logo = $name;
            }else{
                $destinationPath = storage_path('app/public/images');
                $logo="default.png";
            }


            $company_id=$request->input('company_id');
            if($company_id){
                $company=Company::find($company_id);
                $company->name=$request->input('name');
                $company->email=$request->input('email');
                $company->website=$request->input('website');
                if ($request->hasFile('logo')) {
                $company->logo=$logo;
                }
                $company->save();
                session()->flash('success', 'Successfully Updated.');
                return redirect()->back();
            }else{
                $company=new Company();
                $company->name=$request->input('name');
                $company->email=$request->input('email');
                $company->website=$request->input('website');
                $company->logo=$logo;
                $company->save();
                session()->flash('success', 'Successfully Added.');
                return redirect()->back();
            }
        }

    }



    public function edit($id)
    {


        $company = Company::find($id);

        return view('pages.companies.form',['company'=>$company]);
    }

    public function delete($id)
    {

        $company = Company::find($id);
        $company->delete();

        session()->flash('success', 'Successfully Deleted.');
        return redirect()->back();
    }

}
