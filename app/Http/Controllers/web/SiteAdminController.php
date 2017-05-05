<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Email;
use App\PhoneNumber;
use App\Product;
use App\ProductImage;

class SiteAdminController extends Controller
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
        $user_id = '';
        if(\Auth::check()) {
            $user_id = \Auth::user()->id;
        }
        $company_details_data = Company::where('user_id','=',$user_id)
                                ->with('phone_number')
                                ->with('email')
                                ->get()->toArray();
        

        if(!empty($company_details_data)){
            $company_details = $company_details_data[0];
            //cleanup the email phone number and make it a simple array item hust like the others
            if(count($company_details['phone_number']) >0){
                $company_details['phone_number'] = $company_details['phone_number'][0]['number'];
            }else{
                $company_details['phone_number'] = '';
            }

            if(count($company_details['email']) >0){
                $company_details['email'] = $company_details['email'][0]['email'];
            }else{
                $company_details['email'] = '';
            }

        }else{
            // return view('site.admin.404');
        }
        $company_logo_path = '/uploads/logos/';


        $company_id = $company_details['id'];

        $products = Product::where('company_id','=',$company_id)
                                    ->where('active_status','1')
                                    ->with('image')
                                    ->with('category')
                                    ->with('rating')
                                    ->with('visitors')
                                    ->get()->toArray();
        
        $unapproved_products = Product::where('company_id','=',$company_id)
                                    ->where('active_status','1')
                                    ->where('approval_status','0')
                                    ->with('image')
                                    ->with('category')
                                    ->with('rating')
                                    ->with('visitors')
                                    ->get()->toArray();
        
        $approved_products = Product::where('company_id','=',$company_id)
                                    ->where('active_status','1')
                                    ->where('approval_status','1')
                                    ->with('image')
                                    ->with('category')
                                    ->with('rating')
                                    ->with('visitors')
                                    ->get()->toArray();

         return view('site.admin.dash', compact('company_details',
                                            'company_logo_path',
                                            'products',
                                            'unapproved_products',
                                            'approved_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function myproduct()
    {
        $user_id = '';
        if(\Auth::check()) {
            $user_id = \Auth::user()->id;
        }

        $company_details_data = Company::where('user_id','=',$user_id)->get()->toArray();
        if(!empty($company_details_data)){
            $company_details = $company_details_data[0];

            $company_id = $company_details['id'];

            $products = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->with('image')
                                        ->with('category')
                                        ->with('rating')
                                        ->with('visitors')
                                        ->get()->toArray();
            
            $unapproved_products = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->where('approval_status','0')
                                        ->with('image')
                                        ->with('category')
                                        ->with('rating')
                                        ->with('visitors')
                                        ->get()->toArray();
            
            $approved_products = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->where('approval_status','1')
                                        ->with('image')
                                        ->with('category')
                                        ->with('rating')
                                       ->with('visitors')
                                        ->get()->toArray();
            

            // dd($products);

            return view('site.admin.products.product_list', compact('products','unapproved_products','approved_products'));
        }

    }

    public function unapproved()
    {
        $user_id = '';
        if(\Auth::check()) {
            $user_id = \Auth::user()->id;
        }

        $company_details_data = Company::where('user_id','=',$user_id)->get()->toArray();
        if(!empty($company_details_data)){
            $company_details = $company_details_data[0];

            $company_id = $company_details['id'];

            $products = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->with('image')
                                        ->with('category')
                                        ->with('rating')
                                        ->with('visitors')
                                        ->get()->toArray();
            
            $unapproved_products = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->where('approval_status','0')
                                        ->with('image')
                                        ->with('category')
                                        ->with('rating')
                                        ->with('visitors')
                                        ->get()->toArray();
            
            $approved_products = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->where('approval_status','1')
                                        ->with('image')
                                        ->with('category')
                                        ->with('rating')
                                        ->with('visitors')
                                        ->get()->toArray();
            

            // dd($products);

            return view('site.admin.products.product_list_unapproved', compact('products','unapproved_products','approved_products'));
        }

    }

    public function approved()
    {
        $user_id = '';
        if(\Auth::check()) {
            $user_id = \Auth::user()->id;
        }

        $company_details_data = Company::where('user_id','=',$user_id)->get()->toArray();
        if(!empty($company_details_data)){
            $company_details = $company_details_data[0];

            $company_id = $company_details['id'];

            $products = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->with('image')
                                        ->with('category')
                                        ->with('rating')
                                        ->with('visitors')
                                        ->get()->toArray();
            
            $unapproved_products = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->where('approval_status','0')
                                        ->with('image')
                                        ->with('category')
                                        ->with('rating')
                                        ->with('visitors')
                                        ->get()->toArray();
            
            $approved_products = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->where('approval_status','1')
                                        ->with('image')
                                        ->with('category')
                                        ->with('rating')
                                        ->with('visitors')
                                        ->get()->toArray();
            

            // dd($products);

            return view('site.admin.products.product_list_approved', compact('products','unapproved_products','approved_products'));
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
