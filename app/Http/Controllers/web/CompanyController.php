<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Email;
use App\PhoneNumber;
use App\MapLocation;

use App\Http\Requests\companyRequest;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::check()) {
            $user_id = \Auth::user()->id;
            $company = Company::where('user_id',$user_id)->get()->toArray();
           
            if(!empty($company)){
                return redirect('account/dashboard')->with('warning_message', 'User Can Only Create One Company Account');
            }else{
                return view('site.admin.companies.create');
            }
        }else{
            return redirect('/login');
        }

        
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(companyRequest $request)
    {
        //Get all the request field data
        $fields = $request->all();

        //Add the current user id to the request field list 
        if(\Auth::check()) {
            $user_id = \Auth::user()->id;
            $fields['user_id'] = $user_id;
        }

        // Add Company Logo
        $logo = $request->file('logo');
        // $filename = $logo->getClientOriginalName();
        $filename = date_timestamp_get(date_create()).'.' . $logo->getClientOriginalExtension();
        $destination_path = base_path() . '/public/uploads/logos/';
        $logo->move($destination_path, $filename);

        $fields['logo'] = $filename;

        //Ceate the company 
        $company = Company::create($fields);

        // Add the currently created company id to the field list
        if($company){
            $fields['company_id'] = $company->id;
        }

        //save the company email and phone numbers
        Email::create($fields);
        PhoneNumber::create($fields);
        MapLocation::create($fields);


        return redirect('account/dashboard')->with('message', 'Account Created'); 
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
        //Get all the request field data
        $fields = $request->all();
        dd($fields);
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

        //Get all the request field data
        $fields = $request->all();
        // Add the currently created company id to the field list
        $fields['company_id'] = $id;

        //Add the current user id to the request field list 
        if(\Auth::check()) {
            $user_id = \Auth::user()->id;
            $fields['user_id'] = $user_id;
        }

        if(!empty($request->file())){
             // Add Company Logo
            $logo = $request->file('logo');
            // $filename = $logo->getClientOriginalName();
            $filename = date_timestamp_get(date_create()).'.' . $logo->getClientOriginalExtension();
            $destination_path = base_path() . '/public/uploads/logos/';
            $logo->move($destination_path, $filename);

            $fields['logo'] = $filename;
            Company::find($id)->update(['logo' => $filename]);

            return redirect('account/dashboard')->with('success_message', 'Company Logo Updated'); 
        }
        // dd($fields);
        if(!empty($fields['lat'])){ //this will tell us that the map settings is what the user wants to update
            //save the company email and phone numbers
            $MapLocation = MapLocation::where('company_id',$id);
            $MapLocation->delete();
            MapLocation::create($fields);

            return redirect('account/dashboard')->with('success_message', 'Map Location Updated'); 
        }

        

        //Update the company 
        $company = Company::find($id);
        $company->update($fields);

        

        //save the company email and phone numbers
        $email = Email::where('company_id',$id);
        $email->delete();
        Email::create($fields);

        $phone_number = PhoneNumber::where('company_id',$id);
        $phone_number->delete();
        PhoneNumber::create($fields);

        return redirect('account/dashboard')->with('success_message', 'Business/Company Details Updated'); 
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
