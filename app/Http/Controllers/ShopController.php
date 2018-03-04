<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use DB;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ShopController extends Controller {

    private $layout;

    public function __construct() {

        $categories = Category::where("deletion_status", 0)
                ->where("publication_status", 1)
                ->get();

        $brands = Brand::where("deletion_status", 0)
                ->where("publication_status", 1)
                ->get();

        $this->layout['shopNotification'] = view('layouts.notification');
        //Initialize Sidebar Contents
        $this->layout['sidebar'] = view('layouts.sidebar', array(
            'categories' => $categories,
            'brands' => $brands
        ));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $listProducts = Product::where("deletion_status", 0)
                ->where("publication_status", 1)
                ->get();

        $featuredProducts = Product::where("deletion_status", 0)
                ->where("publication_status", 1)
                ->where("featured_status", 1)
                ->get();

        $sliderImages = array();
        $filesInFolder = File::files('public/images/slider');

        foreach ($filesInFolder as $path) {
            $sliderImages[] = pathinfo($path);
        }


        $this->layout['main_content'] = view('pages.index')
                ->with('listProducts', $listProducts)
                ->with('featuredProducts', $featuredProducts)
                ->with('sliderImages', $sliderImages);

        return view('layouts.master', $this->layout);
    }

    /**
     * List item by category
     * @param type $category_id
     * @return type
     */
    public function productCategory($category_id, $category_name) {

        $listProducts = Product::where("deletion_status", 0)
                ->where("publication_status", 1)
                ->where('category_id', $category_id)
                ->get();


        $this->layout['main_content'] = view('pages.search')
                ->with('listProducts', $listProducts);

        return view('layouts.master', $this->layout);
    }
    
    
    public function productByBrand($brand_id, $brand_name) {

        $listProducts = Product::where("deletion_status", 0)
                ->where("publication_status", 1)
                ->where('brand_id', $brand_id)
                ->get();


        $this->layout['main_content'] = view('pages.search')
                ->with('listProducts', $listProducts);

        return view('layouts.master', $this->layout);
    }

    /**
     * List item by search
     * @param type $query
     * @return type
     */
    public function productSearch(Request $request) {

        $variable = $request->get('q');
        $listProducts = DB::table('products')
                ->join('categories', 'categories.category_id', 'products.category_id')
                ->join('brands', 'brands.brand_id', 'products.brand_id')
                ->where('products.product_title', 'like', "%$variable%")
                ->orWhere(function ($query) use ($variable){
                    $query->where('categories.category_title', 'like', "%$variable%")
                            ->orwhere('brands.brand_title', 'like', "%$variable%")
                            ->orwhere('products.product_model', 'like', "%$variable%")
                            ->orwhere('products.product_options', 'like', "%$variable%")
                            ->orwhere('products.product_teaser', 'like', "%$variable%")
                            ->orwhere('products.product_description', 'like', "%$variable%");
                })
                ->where("products.deletion_status", 0)      //Compulsory Check
                ->where("products.publication_status", 1)   //Compulsory Check
                ->get();


        $this->layout['main_content'] = view('pages.search')
                ->with('listProducts', $listProducts);

        return view('layouts.master', $this->layout);
    }

    /**
     * View Product By ID
     * @param type $product_id
     * @return type
     */
    public function productDetails($product_id) {

        $productDetails = Product::find($product_id);

        unset($this->layout['sidebar']);

        $this->layout['main_content'] = view('pages.product')
                ->with('productDetails', $productDetails);

        return view('layouts.master', $this->layout);
    }

    /**
     * About Us Page
     * @return type
     */
    public function about() {

        $this->layout['main_content'] = view('pages.index');

        return view('layouts.master', $this->layout);
    }

    /**
     * Contact Us Page
     * @return type
     */
    public function contact() {

        $this->layout['main_content'] = view('pages.contact');
        unset($this->layout['sidebar']);

        return view('layouts.master', $this->layout);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
