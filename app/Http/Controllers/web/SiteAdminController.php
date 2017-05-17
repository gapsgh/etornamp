<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Email;
use App\PhoneNumber;
use App\Product;
use App\ProductImage;
use App\ProductVisitors;
use App\Location;

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
                                ->with('location')
                                ->with('location_city')
                                ->get()->toArray();
        // dd($company_details_data);
                                
        if(!empty($company_details_data)){
            $company_details = $company_details_data[0];
            //cleanup the email phone number and make it a simple array item hust like the others
            if(count($company_details['phone_number']) >0){
                $company_details['on_whatsapp'] = $company_details['phone_number'][0]['on_whatsapp'];
                $company_details['phone_number'] = $company_details['phone_number'][0]['number'];
            }else{
                $company_details['phone_number'] = '';
                $company_details['on_whatsapp'] = '0';
            }

            if(count($company_details['email']) >0){
                $company_details['email'] = $company_details['email'][0]['email'];
            }else{
                $company_details['email'] = '';
            }

            if(count($company_details['location']) >0){
                $company_details['location'] = $company_details['location'][0];
            }else{
                $company_details['location'] = ['lat'=>5.6037168,'lng'=>-0.1869644];
            }

            // dd($company_details_data);
        }else{
            //send the ueser to the create Company page
             return redirect('companies/create')->with('info_message','You have to create a business profile to start listing!!');
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

        $product_ids = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->pluck('id')->toArray();
        if(count($product_ids) < 1){
            $visitors = 0; //since products are 0 visitors are 0
        }else{
            //find the visitors for the cuurent customer/company
            $visitors = count(ProductVisitors::whereIn('product_id',$product_ids)
                                        ->get()->toArray())/2;

        }

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

        //Collect the lacations
        $locations_raw = Location::where('level',1)->get()->toArray();
            $locations = [];
            foreach ($locations_raw as $key => $location) {
                $sub_locations = Location::where('level',2)->where('parent_id',$location['id'])->get()->toArray();
                $location['sub_locations'] = $sub_locations;
                $locations[] = $location;
            }

         return view('site.admin.dash', compact('company_details',
                                            'company_logo_path',
                                            'products',
                                            'visitors',
                                            'locations',
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

            $product_ids = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->pluck('id')->toArray();
            if(count($product_ids) <1){
                $visitors = 0; //since products are 0 visitors are 0
            }else{
                //find the visitors for the cuurent customer/company
                $visitors = count(ProductVisitors::whereIn('product_id',$product_ids)
                                        ->get()->toArray());
            }
            
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

            return view('site.admin.products.product_list', compact('products','visitors','unapproved_products','approved_products'));
        }else{
            //send the ueser to the create Company page
             return redirect('companies/create')->with('info_message','You have to create a business profile to start listing!!');
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
            
            $product_ids = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->pluck('id')->toArray();
            if(count($product_ids) <1){
                $visitors = 0; //since products are 0 visitors are 0
            }else{
                //find the visitors for the cuurent customer/company
                $visitors = count(ProductVisitors::whereIn('product_id',$product_ids)
                                        ->get()->toArray());
            }
            
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

            return view('site.admin.products.product_list_unapproved', compact('products','visitors','unapproved_products','approved_products'));
        }else{
            //send the ueser to the create Company page
             return redirect('companies/create')->with('info_message','You have to create a business profile to start listing!!');
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

            $product_ids = Product::where('company_id','=',$company_id)
                                        ->where('active_status','1')
                                        ->pluck('id')->toArray();
            if(count($product_ids) <1){
                $visitors = 0; //since products are 0 visitors are 0
            }else{
                //find the visitors for the cuurent customer/company
                $visitors = count(ProductVisitors::whereIn('product_id',$product_ids)
                                        ->get()->toArray());
            }

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

            return view('site.admin.products.product_list_approved', compact('products','visitors','unapproved_products','approved_products'));
        }else{
            //send the ueser to the create Company page
             return redirect('companies/create');
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
