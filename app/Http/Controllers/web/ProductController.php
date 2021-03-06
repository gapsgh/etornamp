<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Company;
use App\Category;
use App\ProductImage;
use App\ProductVisitors;
use App\Location;
use Image;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
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

        if(empty($company_details_data)){
            //send the ueser to the create Company page
             return redirect('companies/create')->with('info_message','You have to create a business profile to start listing!!');
        }
        
        $company_details = $company_details_data[0];

        $category_level_1 = Category::where('level',1)->get()->toArray();
        
        $categories = [];
        foreach ($category_level_1  as $key => $category_1) {
            $parent_id = $category_1['id'];
            $category_level_2s = Category::where('parent_id',$parent_id)->where('level',2)->get()->toArray();
            $category_1['level2'] = $category_level_2s;
            $categories[] = $category_1;
        }
        // dd($categories);
        
        //Collect the lacations
        $locations = getLocations();

        return view('site.admin.products.create',compact('categories','company_details','locations'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        // dd($request->all());
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
            $fields['active_status'] = 1;
        }
        if(empty($fields['certification_status'])){
            $fields['certification_status'] = 0;
        }
        if(empty($fields['premiun_status'])){
            $fields['premiun_status'] = 0;
            $fields['approval_status'] = 1;   //If the product is not featured, it does not need approval
        }elseif (!empty($fields['premiun_status']) and $fields['premiun_status'] != '0') {
            $fields['approval_status'] = 0;
        }else{
             $fields['approval_status'] = 1;   //If the product is not featured, it does not need approval
        }
        // dd($fields);
        
        //generate a unique code for the prduct
        $fields['code'] = $this->getProductCode();

        //Add the product 
        $product = Product::create($fields);

        if($product){
            $product_id = $product->id;
        }

        $filename = $this->save_image( $request->file('product_image1') );
        $image_data=[
                    'image' => $filename,
                    'priority' => 1,
                    'product_id' => $product_id
                    ];
        ProductImage::create($image_data);
        
        if(!empty($request->file('product_image2'))){
            $filename = $this->save_image( $request->file('product_image2') );
            $image_data=[
                        'image' => $filename,
                        'priority' => 2,
                        'product_id' => $product_id
                        ];
            ProductImage::create($image_data);
        }

        if(!empty($request->file('product_image3'))){
            $filename = $this->save_image( $request->file('product_image3') );
            $image_data=[
                        'image' => $filename,
                        'priority' => 3,
                        'product_id' => $product_id
                        ];
            ProductImage::create($image_data);
        }
        if(!empty($request->file('product_image4'))){
            $filename = $this->save_image( $request->file('product_image4') );
            $image_data=[
                        'image' => $filename,
                        'priority' => 4,
                        'product_id' => $product_id
                        ];
            ProductImage::create($image_data);
        }


        //if the user selects to go back to listing page or not
        if(empty($fields['return_to_page'])){
            return redirect('products/create/success');
        }else{
            return redirect('products/create')->with('success_message','Product Added!!');
        }
        


    }

    public function save_image($image,$update_image=0){
        // Add Product Images
        $Product_Image = $image;
        if($update_image != 0){
            $image_name = explode('.' ,$update_image )[0];
            $filename = $image_name.'.' . $Product_Image->getClientOriginalExtension();
        }else{
            $filename = date_timestamp_get(date_create()).'.' . $Product_Image->getClientOriginalExtension();
        }
        $destination_path = base_path() . '/public/uploads/product_images_raw/';
        $destination_actua_path = base_path() . '/public/uploads/product_images/';
        $destination_actua_path_large = base_path() . '/public/uploads/product_images_large/';
        $thumbnail_path = base_path() . '/public/uploads/product_images_thumb/';

        $watermark_path = base_path() . '/public/images/watermarks/full.png';
        $Product_Image->move($destination_path, $filename);
        
        $new_image = Image::make($destination_path.$filename);
        $large_image = Image::make($destination_path.$filename);
        $new_image_size = $new_image->filesize();
         if($new_image_size < 2000000){
            //Save the image with a 80% compression
            $new_image->save($destination_actua_path.$filename,80);
            $large_image->resize(816, null , function($ratio){$ratio->aspectRatio();})->insert($watermark_path, 'bottom-right', 10, 10)->save($destination_actua_path_large.$filename,90);
         }
         if(2000000 <= $new_image_size and $new_image_size <= 4000000){
            //Save the image with a 60% compression
            $new_image->save($destination_actua_path.$filename,50);
            $large_image->resize(816, null , function($ratio){$ratio->aspectRatio();})->insert($watermark_path, 'bottom-right', 10, 10)->save($destination_actua_path_large.$filename,70);

         }
         if(4000001 <= $new_image_size and $new_image_size <= 5000000){
            //Save the image with a 65% compression
            $new_image->save($destination_actua_path.$filename,35);
            $large_image->resize(816, null , function($ratio){$ratio->aspectRatio();})->insert($watermark_path, 'bottom-right', 10, 10)->save($destination_actua_path_large.$filename,65);
         }
         if(5000001 <= $new_image_size and $new_image_size <= 6000000){
            //Save the image with a 60% compression
            $new_image->save($destination_actua_path.$filename,30);
            $large_image->resize(816, null , function($ratio){$ratio->aspectRatio();})->insert($watermark_path, 'bottom-right', 10, 10)->save($destination_actua_path_large.$filename,55);
         }
         if(6000001 <= $new_image_size){
            //Save the image with a 50% compression
            $new_image->save($destination_actua_path.$filename,20);
            $large_image->resize(816, null , function($ratio){$ratio->aspectRatio();})->insert($watermark_path, 'bottom-right', 10, 10)->save($destination_actua_path_large.$filename,40);
         }

        $new_image->fit(400)->save($thumbnail_path.$filename);

        return $filename;

        }

    //generate random unique code for product
    public function getProductCode(){
        do{
            $rand = generateRandomString(8);
        }while(!empty(Product::where('code',$rand)->first()));
        return $rand;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDetails($id, $slug)
    {
        $product = Product::where('id',$id)
                            ->with('image')
                            ->with('category')
                            ->with('company.email','company.location','company.phone_number','company.company_location_city','company.company_account_type')
                            ->with('rating')
                            ->with('visitors')
                            ->with('visitors')
                            ->with('producr_location_city')
                            ->first();
        //Add one visitor
         $product_visitor =[ 'product_id' => $id];
            ProductVisitors::create($product_visitor);

        

        return view('site.pages.details_page',compact('id','product'));
    }

    public function show($id)
    {
        //
    }
    
    public function savesuccess()
    {
        //
        return view('site.admin.products.save_success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->with('producr_location_city')->get()->toArray();
        $categoris = Category::get()->toArray();

        if ( is_null($product) or empty($product) ) {
          App::abort(404);
        }
        $product = $product[0];
        $product_id = trim($product['id']);

        $product_images = ProductImage::where('product_id',$product_id)->get()->toArray();
       // dd($product_images);
       // 
       $category_level_1 = Category::where('level',1)->get()->toArray();
        
        $categories = [];
        foreach ($category_level_1  as $key => $category_1) {
            $parent_id = $category_1['id'];
            $category_level_2s = Category::where('parent_id',$parent_id)->where('level',2)->get()->toArray();
            $category_1['level2'] = $category_level_2s;
            $categories[] = $category_1;
        }

        //Collect the lacations
        $locations = getLocations();
        
        return view('site.admin.products.edit',compact('product','product_images','categories','locations'));
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
        // dd($fields);
        $product_id = $id;

        $product_details = Product::find($id)->toArray();
        $previous_product_premium_status = $product_details['premiun_status'];

        if ($fields['premiun_status'] != $previous_product_premium_status) {
            $fields['approval_status'] = "0";
        }
        if($fields['premiun_status'] == "0"){
            $fields['approval_status'] = 1;
        }

        $product = Product::find($id);
        $product->update($fields);

        // Add Product Images
        // 
        if(!empty($request->file('product_image1'))  and !empty($fields['product_image1_image'])){

            $this->save_image( $request->file('product_image1') , $fields['product_image1_image']);
           
        }elseif(!empty($request->file('product_image1'))  and empty($fields['product_image1_image'])){
            $image_data=[
                        'image' => $this->save_image( $request->file('product_image1') ),
                        'priority' => 1,
                        'product_id' => $product_id
                        ];
            ProductImage::create($image_data);
        }

        if(!empty($request->file('product_image2'))  and !empty($fields['product_image2_image'])){

            $this->save_image( $request->file('product_image2') , $fields['product_image2_image']);
           
        }elseif(!empty($request->file('product_image2'))  and empty($fields['product_image2_image'])){
            $image_data=[
                        'image' => $this->save_image( $request->file('product_image2') ),
                        'priority' => 2,
                        'product_id' => $product_id
                        ];
            ProductImage::create($image_data);
        }

        if(!empty($request->file('product_image3'))  and !empty($fields['product_image3_image'])){

            $this->save_image( $request->file('product_image3') , $fields['product_image3_image']);
           
        }elseif(!empty($request->file('product_image3'))  and empty($fields['product_image3_image'])){
            $image_data=[
                        'image' => $this->save_image( $request->file('product_image3') ),
                        'priority' => 3,
                        'product_id' => $product_id
                        ];
            ProductImage::create($image_data);
        }

        if(!empty($request->file('product_image4'))  and !empty($fields['product_image4_image'])){

            $this->save_image( $request->file('product_image4') , $fields['product_image4_image']);
           
        }elseif(!empty($request->file('product_image4'))  and empty($fields['product_image4_image'])){
            $image_data=[
                        'image' => $this->save_image( $request->file('product_image4') ),
                        'priority' => 4,
                        'product_id' => $product_id
                        ];
            ProductImage::create($image_data);
        }

        return redirect('account/dashboard/my-products')->with('success_message','Product Updated');
        
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
        $fields['active_status'] = 0;
        $product = Product::find($id);
        $product->update($fields);
        return redirect('account/dashboard/my-products')->with('success_message','Product Deleted');
    }
}
