<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

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
    public function filter($id, $slug)
    {
        //
        // dd('theo');
        $products = Product::where('category_id',$id)
                                    ->where('active_status','1')
                                    ->where('approval_status','1')
                                    ->with('image')
                                    ->with('category')
                                    ->with('company')
                                    ->with('rating')
                                    ->with('visitors')
                                    ->with('producr_location_city')
                                    ->orderByRaw("FIELD(premiun_status , '1', '2', '3', '0') ASC")
                                    ->paginate(15);

        return view('site.pages.filter_page',compact('products'));
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
