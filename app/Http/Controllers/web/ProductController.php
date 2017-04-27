<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Company;
use App\ProductImage;

class ProductController extends Controller
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
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.admin.products.create');
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
        // dd($request->file());
        //Get all the request field data
        $fields = $request->all();

        //Add the current user id to the request field list 
        if(\Auth::check()) {
            $user_id = \Auth::user()->id;
            $fields['user_id'] = $user_id;
            $company = Company::where('user_id',$user_id)->get()->toArray();
            
            if(!empty($company)){
                $company_id = $company[0]['id'];
                $fields['company_id'] = $company_id;
            }
           
        }

        if(empty($fields['bonus_percentage_single'])){
            $fields['bonus_percentage_single'] = 0;
        }
        if(empty($fields['bonus_percentage_bulk'])){
            $fields['bonus_percentage_bulk'] = 0;
        }
        if(empty($fields['bulk_price'])){
            $fields['bulk_price'] = 0;
        }
        if(empty($fields['active_status'])){
            $fields['active_status'] = 0;
        }
        if(empty($fields['certification_status'])){
            $fields['certification_status'] = 0;
        }
        if(empty($fields['premiun_status'])){
            $fields['premiun_status'] = 0;
        }



        //Add the product 
        $product = Product::create($fields);

        if($product){
            $product_id = $product->id;
        }

        // Add Company Logo
        $Product_Image = $request->file('product_image1');
        $filename = date_timestamp_get(date_create()).'.' . $Product_Image->getClientOriginalExtension();
        $destination_path = base_path() . '/public/uploads/product_images/';
        $Product_Image->move($destination_path, $filename);
        $image_data=[
                    'image' => $filename,
                    'priority' => 1,
                    'product_id' => $product_id
                    ];
        ProductImage::create($image_data);
        
        if(!empty($request->file('product_image2'))){
            $Product_Image = $request->file('product_image2');
            $filename = date_timestamp_get(date_create()).'.' . $Product_Image->getClientOriginalExtension();
            $destination_path = base_path() . '/public/uploads/product_images/';
            $Product_Image->move($destination_path, $filename);
            $image_data=[
                        'image' => $filename,
                        'priority' => 2,
                        'product_id' => $product_id
                        ];
            ProductImage::create($image_data);
        }
        if(!empty($request->file('product_image3'))){
            $Product_Image = $request->file('product_image3');
            $filename = date_timestamp_get(date_create()).'.' . $Product_Image->getClientOriginalExtension();
            $destination_path = base_path() . '/public/uploads/product_images/';
            $Product_Image->move($destination_path, $filename);
            $image_data=[
                        'image' => $filename,
                        'priority' => 3,
                        'product_id' => $product_id
                        ];
            ProductImage::create($image_data);
        }
        if(!empty($request->file('product_image4'))){
            $Product_Image = $request->file('product_image4');
            $filename = date_timestamp_get(date_create()).'.' . $Product_Image->getClientOriginalExtension();
            $destination_path = base_path() . '/public/uploads/product_images/';
            $Product_Image->move($destination_path, $filename);
            $image_data=[
                        'image' => $filename,
                        'priority' => 4,
                        'product_id' => $product_id
                        ];
            ProductImage::create($image_data);
        }

        return view('site.admin.products.create')->with('success_message','Product Added!!');
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
