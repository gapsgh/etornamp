<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Location;
use App\Company;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Category::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
    public function show($id,$slug)
    {
        //
        //Get the current category details
        $category = Category::where('id',$id)->get()->toArray()[0];

        //Get the sub categories of the current category
        $sub_categories = Category::where('parent_id',$id)->where('level',2)->get()->toArray();


        return view('site.pages.sub_categories',compact('sub_categories','category'));
    }


        /**
     * Display the Filter page for a caegory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter($id, $slug){
        // dd('theo');
        $params = Input::get();

        $location_id_for_view = '';
        $seller_id_for_view = '';
        $sprice_for_view = '';
        $veiw_style = 'list';

        //Apply the location filter if set
        if(!empty($params['veiw'])){
            $veiw_style = $params['veiw'];
        }
        
        $products = Product::where('category_id',$id)
                                    ->where('active_status','1')
                                    ->where('approval_status','1');
       
       //Apply the location filter if set
        if(!empty($params['city'])){
            $location_id = $params['city'];
            $location_id_for_view = $params['city'];
            $products = $products->where('location_city',$location_id);
        }

        //Apply the Seller filter if set
        if(!empty($params['sid'])){
            $seller_id = $params['sid'];
            $seller_id_for_view = $params['sid'];
            $products = $products->where('company_id',$seller_id);
        }

        //Apply the Seller filter if set
        if(!empty($params['sprice'])){
            $sprice = $params['sprice'];
            $sprice_for_view = $params['sprice'];
            if($sprice == 'l2h'){
                $products = $products->orderBy('single_price', 'ASC');
            }
            if($sprice == 'h2l'){
                $products = $products->orderBy('single_price', 'DESC');
            }
            
        }

        $products = $products->with('image')
                            ->with('category')
                            ->with('company')
                            ->with('rating')
                            ->with('visitors')
                            ->with('producr_location_city')
                            ->orderByRaw("FIELD(premiun_status , '1', '2', '3', '0') ASC")
                            ->orderByRaw("FIELD(certification_status , '1', '0') ASC")
                            ->orderBy('created_at', 'DESC')
                            ->paginate(15);

        //Get the locations and the products related to them
        $locations = Location::whereHas('product', function($query) use ($id){
                            $query->where('category_id',$id);
                        
                        })->with(['product' => function($query) use ($id){
                                    $query->where('category_id',$id);

                        }])->get();
        
        
        //Get the count of all products in this category for the all locations product count
        $all_location_products_count = Product::where('category_id',$id)
                                                ->where('active_status','1')
                                                ->where('approval_status','1')
                                                ->paginate(15)
                                                ->total();

        //Get the locations and the products related to them
        $sellers = Company::whereHas('product', function($query) use ($id){
                            $query->where('category_id',$id);
                        
                        })->with(['product' => function($query) use ($id){
                                    $query->where('category_id',$id);

                        }])->get();
        $current_cat_id = $id;
        $current_cat_slug = $slug;
        return view('site.pages.filter_page',compact('products','locations','sellers','current_cat_id','current_cat_slug','all_location_products_count','location_id_for_view','seller_id_for_view','params','veiw_style','sprice_for_view'));
    }

    public function searchResults()
    {
        $params = Input::get();

        $slug = '';

        if(!empty($params['find']) and trim($params['find']) != ""){
            $slug = $params['find'];
        }

        

        $location_id_for_view = '';
        $seller_id_for_view = '';
        $sprice_for_view = '';
        $veiw_style = 'list';

        //Apply the location filter if set
        if(!empty($params['veiw'])){
            $veiw_style = $params['veiw'];
        }
        
        $products = Product::where('name','like','%'.$slug.'%')
                                    ->where('active_status','1')
                                    ->where('approval_status','1');
       
       //Apply the location filter if set
        if(!empty($params['city'])){
            $location_id = $params['city'];
            $location_id_for_view = $params['city'];
            $products = $products->where('location_city',$location_id);
        }

        //Apply the Seller filter if set
        if(!empty($params['sid'])){
            $seller_id = $params['sid'];
            $seller_id_for_view = $params['sid'];
            $products = $products->where('company_id',$seller_id);
        }

        //Apply the Seller filter if set
        if(!empty($params['sprice'])){
            $sprice = $params['sprice'];
            $sprice_for_view = $params['sprice'];
            if($sprice == 'l2h'){
                $products = $products->orderBy('single_price', 'ASC');
            }
            if($sprice == 'h2l'){
                $products = $products->orderBy('single_price', 'DESC');
            }
            
        }

        $products = $products->with('image')
                            ->with('category')
                            ->with('company')
                            ->with('rating')
                            ->with('visitors')
                            ->with('producr_location_city')
                            ->orderByRaw("FIELD(premiun_status , '1', '2', '3', '0') ASC")
                            ->orderByRaw("FIELD(certification_status , '1', '0') ASC")
                            ->orderBy('created_at', 'DESC')
                            ->paginate(15);

        //Get the locations and the products related to them
        $locations = Location::whereHas('product', function($query) use ($slug){
                            $query->where('name','like','%'.$slug.'%');
                        
                        })->with(['product' => function($query) use ($slug){
                                    $query->where('name','like','%'.$slug.'%');

                        }])->get();
        
        
        //Get the count of all products in this category for the all locations product count
        $all_location_products_count = Product::where('name','like','%'.$slug.'%')
                                                ->where('active_status','1')
                                                ->where('approval_status','1')
                                                ->paginate(15)
                                                ->total();

        //Get the locations and the products related to them
        $sellers = Company::whereHas('product', function($query) use ($slug){
                            $query->where('name','like','%'.$slug.'%');
                        
                        })->with(['product' => function($query) use ($slug){
                                    $query->where('name','like','%'.$slug.'%');

                        }])->get();

        $current_cat_slug = $slug;
        return view('site.pages.filter_page',compact('products','locations','sellers','current_cat_slug','all_location_products_count','location_id_for_view','seller_id_for_view','params','veiw_style','sprice_for_view'));
    }

    public function filter_by_location($location_id,$location_slug,$category_id,$category_slug){
        
    }


            /**
     * Display the Sub categories.
     */
    public function allsubs()
    {
        //Get the sub categories of the current category
        $sub_categories = Category::where('level',2)->get()->toArray();


        return view('site.pages.sub_categories',compact('sub_categories'));
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
