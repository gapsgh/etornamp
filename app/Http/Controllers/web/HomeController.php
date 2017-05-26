<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Location;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd();
        //
        $category_level_1 = Category::where('level',1)->get()->toArray();

        $categories_forsale = Category::where('level',2)->get();
        
        $categories = [];
        foreach ($category_level_1  as $key => $category_1) {
            $parent_id = $category_1['id'];
            $category_level_2s = Category::where('parent_id',$parent_id)->where('level',2)->get()->toArray();
            $category_1['level2'] = $category_level_2s;
            $categories[] = $category_1;
        }
        // dd($categories);
        // 
        $featured_products = Product::where('premiun_status','<>',0)
                                    ->where('active_status','1')
                                    ->where('approval_status','1')
                                    ->with('image')
                                    ->with('category')
                                    ->with('rating')
                                    ->with('visitors')
                                    ->limit(10)
                                    ->get()->toArray();
        // dd($featured_products);
        // 
        $locations_l2s = Location::where('level',2)
                                ->with('product')->withCount('product')
                                ->orderBy('product_count', 'desc')
                                ->limit(48)->get();
        
        //All Locatioins for search
        $locations_all = json_encode(Location::select('id','name')->where('level',2)->get()->toJson());
      
        $locations = getLocations();

        return view('site.pages.home',compact('categories','featured_products','locations','locations_l2s','categories_forsale','locations_all'));
    }

    public function allfeatured()
    {
        $featured_products = Product::where('premiun_status','<>',0)
                                    ->where('active_status','1')
                                    ->where('approval_status','1')
                                    ->with('image')
                                    ->with('category')
                                    ->with('company')
                                    ->with('rating')
                                    ->with('visitors')
                                    ->with('producr_location_city')
                                    ->paginate(15);
        // dd($featured_products);
        return view('site.pages.featured_products',compact('featured_products'));
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
