<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Cart;
use App\Models\Product;

class CartController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $layout;

    public function __construct() {

        $this->middleware('auth');

        $this->layout['shopNotification'] = view('layouts.notification');
    }

    public function index() {
        $this->layout['main_content'] = view('pages.cart');
        unset($this->layout['sidebar']);

        return view('layouts.master', $this->layout);
    }

    public function addToCart($product_id) {

        $product = Product::find($product_id);

        if ($product->product_quantity > $product->product_minimum_order) {
            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Added Product - ',
                'body' => $product->product_title,
                'type' => 'success'
            ));

            Cart::add([
                'id' => $product->product_id,
                'name' => $product->product_title,
                'qty' => $product->product_minimum_order,
                'price' => $product->product_price,
                'options' => [
                    'model' => $product->product_model,
                    'brand' => $product->brand->brand_title,
                    'image' => $product->product_image,
                ]
            ]);
        } else {
            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Sorry - ',
                'body' => $product->product_title . " is out of stock",
                'type' => 'success'
            ));
        }


        return Redirect::to('/');
    }

    public function changeCartQty($rowId, $newQty) {

        $item = Cart::get($rowId);
        $product = Product::find($item->id);

        if ($product->product_quantity > $newQty) {
            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Quantity Updated - ',
                'body' => $product->product_title,
                'type' => 'success'
            ));
            Cart::update($rowId, $newQty); // Will update the quantity
        } else {
            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Sorry - ',
                'body' => $product->product_title . " is out of stock",
                'type' => 'success'
            ));
        }

        return Redirect::to('/cart');
    }

    public function removeCartItem($rowId) {
        
        $item = Cart::get($rowId);
        Cart::remove($rowId);
        
        Session::put('message', array(
            'title' => 'Item Removed - ',
            'body' => $item->name." removed",
            'type' => 'success'
        ));
        
        return Redirect::to('/cart');
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
