<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller {

    private $layout;

    public function __construct() {

        //Initialize Sidebar Contents
        $this->layout['sidebar'] = view('layouts.sidebar', array());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->layout['main_content'] = view('pages.index');

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
