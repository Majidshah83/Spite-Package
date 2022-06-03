<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->paginate(5);
        return view('companies.index',compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'picture'=> 'required',
            'detail' => 'required',
        ]);

   $company=new Company();
   if($request->hasfile('picture')){
           $file = $request->file('picture');
           $extension = $file->getClientOriginalExtension();
           $filename=  time().'.'. $extension;
           $file->move('uploads/conpany/', $filename);

           //$file->move(public_path('productimg/'), $filename);
           $company->picture=$filename;
   }
   $company->name=$request->name;
   $company->detail=$request->detail;
   $company->save();
   $companyid=$company->id;
   $user=new User();
   $user->email=$request->email;
   $user->password=Hash::make($request->password);
   $user->company_id=$companyid;
   $user->save();
        return redirect()->route('companies.index')
                        ->with('success','Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
