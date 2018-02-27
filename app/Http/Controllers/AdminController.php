<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Article;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

session_start();

class AdminController extends Controller {

    //View Components Holder
    private $layout;

    public function __construct() {

        //Initialize Notifications View
        $this->layout['adminNotification'] = view('admin.common.notification');
    }

    /**
     * Check Authentication Status
     * @return type
     */
    private function authCheck() {
        $id = Session::get('admin_id');

        if ($id == NULL || $id == 0) {
            return Redirect::to('/admin')->send();
        }
    }

    /**
     * return slug
     * @param type $text
     * @return string
     */
    private function makeSlug($prefix,$text) {
        
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        //Add Prefix
        $text = $prefix.$text;
        
        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    /**
     * remove permissions from session
     * @return type
     */
    public function logout() {
        //Admin Logged In Session Flag
        Session::put('admin_loggedin', FALSE);

        //Admin informations
        Session::put('admin_id', 0);
        Session::forget('admin_name');

        //Message for Notification Builder
        Session::put('message', array(
            'title' => 'Logged Out, ',
            'body' => 'You are no longer logged in',
            'type' => 'warning'
        ));

        return Redirect::to('/admin');
    }

    /**
     * Landing Page
     * @return type
     */
    public function index() {

        $this->authCheck();

        //Load Component
        //Load Component
        $this->layout['adminContent'] = view('admin.partials.dashboard');

        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * Category Management Start
     */

    /**
     * Categories
     * @return type
     */
    public function addCategory() {

        $this->authCheck();

        //Load Component        
        $this->layout['adminContent'] = view('admin.partials.category_form');
//        $this->layout['site_title'] = "Add Category";
        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * Save Category
     * @param Request $request
     * @return type
     */
    public function saveCategory(Request $request) {

        $this->authCheck();

        $category = new Category;

        $category->category_title = $request->category_title;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;

        $redirectUrl = 'admin/list-category';

        /*
         * Image Upload
         */

        $files = $request->file('category_image');

        //File Is Selected, Proceed with upload
        if ($files) {

            $extension = $files->extension();

            $allowedExtensions = ['png', 'jpg', 'jpeg', 'bmp'];

            if (!( $request->file('category_image')->isValid() && (in_array($extension, $allowedExtensions)) )) {
                //File Upload Failed, 
                Session::put('message', array(
                    'title' => 'Invalid File Selected',
                    'body' => "Please select image file with png, jpg or bmp extension. With less than 2mb size",
                    'type' => 'danger'
                ));

                return Redirect::to($redirectUrl);
            }

            $filename = $files->getClientOriginalName();
            $customName = uniqid('cimg_') . "_" . str_replace(' ', '_', strtolower($category->category_title)) . "." . $extension;
            $imgUrl = 'public/images/categories/' . $customName;
            $destinationPath = base_path() . "/public/images/categories/";

            //Try upload
            $success = $files->move($destinationPath, $customName);

            if ($success) {

//                if (isset($request->article_id) && ($request->article_image_previous != "")) {
//                    $oldFileName = $request->article_image_previous;
//                    unlink($oldFileName);
//                }

                $category->category_image = $imgUrl;

                //If it is an edit , remove old file
            } else {

                //File Upload Failed, 
                Session::put('message', array(
                    'title' => 'Error',
                    'body' => "File Upload Failed",
                    'type' => 'danger'
                ));


                return Redirect::to($redirectUrl);
            }
        }



        $category->save();


        //Message for Notification Builder
        Session::put('message', array(
            'title' => 'Created Category',
            'body' => 'Created new category',
            'type' => 'success'
        ));


        return Redirect::to($redirectUrl);
    }

    /**
     * View All Categories
     * @return type
     */
    public function listAllCategory() {

        $this->authCheck();

        $allCategories = Category::where("deletion_status", 0)
                ->orderBy('category_id', 'DESC')
                ->get();

        $dltdArticles = Category::where("deletion_status", 1)
                ->orderBy('updated_at', 'DESC')
                ->get();

        //Load Component        
        $this->layout['adminContent'] = view('admin.partials.category_table')
                ->with('deletedCategories', $dltdArticles)
                ->with('allCategories', $allCategories);


        return view('admin.master', $this->layout);
    }

    /**
     * Delete Category By ID
     * @param type $id
     */
    public function deleteCategory($status, $id) {

        $this->authCheck();
        $category = Category::find($id);

        if ($status == "undo") {
            //Undo Delete

            $category->deletion_status = 0;
            $category->save();

            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Category Recycled',
                'body' => 'Category restored',
                'type' => 'success'
            ));
        } else {
            //Delete
            //if ($category->articles->isEmpty()) {
            if (true) {

                $category->deletion_status = 1;
                $category->save();

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Deleted Category',
                    'body' => 'Category removed',
                    'type' => 'success'
                ));
            } else {

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Cannot Delete Category',
                    'body' => 'Category currently under use',
                    'type' => 'danger'
                ));
            }
        }

        return Redirect::to('/admin/list-category');
    }

    /**
     * Change Status of this tag
     * @param type $status
     * @param type $id
     * @return type
     */
    public function changeCategoryStatus($status, $id) {

        $this->authCheck();

        $category = Category::find($id);
        $category->publication_status = $status;
        $category->save();


        if ($status == 0) {
            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Updated Category Status to unpublished',
                'body' => 'This tag will be invisible',
                'type' => 'info'
            ));
        } else {
            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Updated Category Status to published',
                'body' => 'This tag is now visible',
                'type' => 'info'
            ));
        }



        return Redirect::to('/admin/list-category');
    }

    /**
     * Edit Category
     * @param type $category_id
     */
    public function editCategory($category_id) {

        $this->authCheck();

        $oldCatData = Category::find($category_id);

        //Load Component        
        $this->layout['adminContent'] = view('admin.partials.category_editform')
                ->with('oldCategoryData', $oldCatData);

        //return view
        return view('admin.master', $this->layout);
    }

    public function updateCategory(Request $request) {

        $this->authCheck();

        $category = Category::find($request->category_id);

        $category->category_title = $request->category_title;
        $category->category_description = $request->category_description;

        $redirectUrl = 'admin/edit-category/' . $request->category_id;

        /*
         * Image Upload
         */

        $files = $request->file('category_image');

        //File Is Selected, Proceed with upload
        if ($files) {

            $extension = $files->extension();

            $allowedExtensions = ['png', 'jpg', 'jpeg', 'bmp'];

            if (!( $request->file('category_image')->isValid() && (in_array($extension, $allowedExtensions)) )) {
                //File Upload Failed, 
                Session::put('message', array(
                    'title' => 'Invalid File Selected',
                    'body' => "Please select image file with png, jpg or bmp extension. With less than 2mb size",
                    'type' => 'danger'
                ));

                return Redirect::to($redirectUrl);
            }

            $filename = $files->getClientOriginalName();
            $customName = uniqid('cimg_') . "_" . str_replace(' ', '_', strtolower($category->category_title)) . "." . $extension;
            $imgUrl = 'public/images/categories/' . $customName;
            $destinationPath = base_path() . "/public/images/categories/";

            //Try upload
            $success = $files->move($destinationPath, $customName);

            if ($success) {

                if (isset($request->category_image_previous) && ($request->category_image_previous != "")) {
                    unlink($request->category_image_previous);
                }

                $category->category_image = $imgUrl;

                //If it is an edit , remove old file
            } else {

                //File Upload Failed, 
                Session::put('message', array(
                    'title' => 'Error',
                    'body' => "File Upload Failed",
                    'type' => 'danger'
                ));


                return Redirect::to($redirectUrl);
            }
        }

        $category->save();


        //Message for Notification Builder
        Session::put('message', array(
            'title' => 'Created Updated',
            'body' => $request->category_name . ' Updated Successfully',
            'type' => 'success'
        ));


        return Redirect::to($redirectUrl);
    }

    /**
     * Category Management End
     * 
     */
    /**
     * Brand Management Start
     */

    /**
     * Add Brand
     */
    public function newBrand() {

        $this->authCheck();

        //Load Component        
        $this->layout['adminContent'] = view('admin.partials.brand_form');

        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * edit brand
     * @param type $brand_id
     */
    public function editBrand($brand_id) {

        $this->authCheck();

        $oldBrandData = Brand::find($brand_id);

        //Load Component        
        $this->layout['adminContent'] = view('admin.partials.brand_form')
                ->with('oldBrandData', $oldBrandData);

        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * Save Brand (form submit handler)
     * @param Request $request
     * @return type
     */
    public function saveBrand(Request $request) {

        $this->authCheck();

        if (isset($request->brand_id)) {
            //Its Update
            $brand = Brand::find($request->brand_id);
            $redirectUrl = '/admin/edit-brand/' . $request->brand_id;
        } else {
            //Its new
            $brand = new Brand;
            $redirectUrl = '/admin/list-brands';
        }


        $brand->brand_title = $request->brand_title;
        $brand->brand_description = $request->brand_description;


        $brand->publication_status = $request->publication_status;
        $brand->deletion_status = 0;

        $brand->save();

        if (isset($request->brand_id)) {

            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Updated Brand',
                'body' => "Brand has been updated",
                'type' => 'info'
            ));
        } else {

            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Added New Brand',
                'body' => "Brand has been created",
                'type' => 'success'
            ));
        }

        return Redirect::to($redirectUrl);
    }

    /**
     * List All Brands
     * @return type
     */
    public function listAllBrands() {

        $this->authCheck();

        $listBrands = Brand::where("deletion_status", 0)
                ->orderBy('brand_id', 'DESC')
                ->get();

        $deletedBrands = Brand::where("deletion_status", 1)
                ->orderBy('updated_at', 'DESC')
                ->get();


        //Load Component        
        $this->layout['adminContent'] = view('admin.partials.brand_table')
                ->with('allBrands', $listBrands)
                ->with('deletedBrands', $deletedBrands);


        return view('admin.master', $this->layout);
    }

    /**
     * Change Brand Status
     * @param type $status
     * @param type $id
     * @return type
     */
    public function changeBrandStatus($status, $id) {

        $this->authCheck();

        $brand = Brand::find($id);

        switch ($status) {
            case "del":

                $brand->deletion_status = 1;
                $brand->save();

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Deleted Brand',
                    'body' => 'Brand moved to trash',
                    'type' => 'success'
                ));
                break;
            case "rec":

                $brand->deletion_status = 0;
                $brand->save();


                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Brand Restored',
                    'body' => 'Brand moved back from trash',
                    'type' => 'success'
                ));
                break;
            case "pub":

                $brand->publication_status = 1;
                $brand->save();

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Updated Brand Status to published',
                    'body' => 'This brand is now visible',
                    'type' => 'success'
                ));
                break;
            default:

                $brand->publication_status = 0;
                $brand->save();

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Updated Brand Status to unpublished',
                    'body' => 'This brand will be invisible',
                    'type' => 'success'
                ));
                break;
        }

        return Redirect::to('/admin/list-brands');
    }

    /**
     * Brand Management End
     */
    /**
     * Product Management Start
     */

    /**
     * Create Product
     */
    public function newProduct() {

        $this->authCheck();

        $listCategories = Category::where('deletion_status', 0)->where('publication_status', 1)->get();
        $listBrands = Brand::where('deletion_status', 0)->where('publication_status', 1)->get();

        //Load Component        
        $this->layout['adminContent'] = view('admin.partials.product_form')
                ->with('listCategories', $listCategories)
                ->with('listBrands', $listBrands);

        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * Edit Product By ID
     * @param type $product_id
     * @return type
     */
    public function editProduct($product_id) {

        $this->authCheck();

        $listCategories = Category::where('deletion_status', 0)->where('publication_status', 1)->get();
        $listBrands = Brand::where('deletion_status', 0)->where('publication_status', 1)->get();

        $oldProductData = Product::find($product_id);

        //Load Component        
        $this->layout['adminContent'] = view('admin.partials.product_form')
                ->with('listCategories', $listCategories)
                ->with('listBrands', $listBrands)
                ->with('oldProductData', $oldProductData);

        //return view
        return view('admin.master', $this->layout);
    }

    /**
     * Common Add/Update submit function
     * @param Request $request
     * @return type
     */
    public function saveProduct(Request $request) {

        $this->authCheck();

        if (isset($request->product_id)) {
            //Its Update
            $product = Product::find($request->product_id);
            $redirectUrl = '/admin/edit-product/' . $request->product_id;
        } else {
            //Its new
            $product = new Product;
            $redirectUrl = '/admin/list-products';
        }


        /*
         * Image Upload
         */

        $files = $request->file('product_image');

        //File Is Selected, Proceed with upload
        if ($files) {

            $extension = $files->extension();

            $allowedExtensions = ['png', 'jpg', 'jpeg', 'bmp'];

            if (!( $request->file('product_image')->isValid() && (in_array($extension, $allowedExtensions)) )) {
                //File Upload Failed, 
                Session::put('message', array(
                    'title' => 'Invalid File Selected',
                    'body' => "Please select image file with png, jpg or bmp extension. With less than 2mb size",
                    'type' => 'danger'
                ));

                return Redirect::to($redirectUrl);
            }

            $filename = $files->getClientOriginalName();
            $customName = uniqid('pimg_') . "_" . str_replace(' ', '_', strtolower($request->product_title)) . "." . $extension;
            $imgUrl = 'public/images/products/' . $customName;
            $destinationPath = base_path() . "/public/images/products/";

            //Try upload
            $success = $files->move($destinationPath, $customName);

            if ($success) {

                //Delete Old iMage if edit and has old image
                if (isset($request->product_id) && ($request->product_image_previous != "")) {
                    $oldFileName = $request->product_image_previous;
                    unlink($oldFileName);
                }

                $product->product_image = $imgUrl;

                //If it is an edit , remove old file
            } else {

                //File Upload Failed, 
                Session::put('message', array(
                    'title' => 'Error',
                    'body' => "File Upload Failed",
                    'type' => 'danger'
                ));


                return Redirect::to($redirectUrl);
            }
        }



        /* Common Tasks */
        $product->product_title = $request->product_title;
        $product->product_teaser = $request->product_teaser;
        $product->product_description = $request->product_description;

        $product->product_slug = $request->product_slug;
        if ($product->product_slug == "") {
            //Need work here later
            $product->product_slug = $this->makeSlug($request->product_id,$request->product_title);
        }

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_model = $request->product_model;

        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_minimum_order = $request->product_minimum_order;
        $product->product_reorder_level = $request->product_reorder_level;

        $product->publication_status = $request->publication_status;

        $product->deletion_status = 0;

        $product->save();

        if (isset($request->product_id)) {

            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Updated Product',
                'body' => "Product has been updated",
                'type' => 'info'
            ));
        } else {

            //Message for Notification Builder
            Session::put('message', array(
                'title' => 'Created New Product',
                'body' => "Product has been created",
                'type' => 'success'
            ));
        }

        return Redirect::to($redirectUrl);
    }

    /**
     * List Articles Grid
     * @return type
     */
    public function listAllProduct() {

        $this->authCheck();

        $listProducts = Product::where("deletion_status", 0)
                ->orderBy('created_at', 'DESC')
                ->get();

        $deletedProducts = Product::where("deletion_status", 1)
                ->orderBy('updated_at', 'DESC')
                ->get();

        $featuredProducts = Product::where("featured_status", 1)
                ->where("deletion_status", 0)
                ->where("publication_status", 1)
                ->orderBy('updated_at', 'DESC')
                ->get();

        //Load Component        
        $this->layout['adminContent'] = view('admin.partials.product_table')
                ->with('allProducts', $listProducts)
                ->with('deletedProducts', $deletedProducts)
                ->with('featuredProducts', $featuredProducts);


        return view('admin.master', $this->layout);
    }

    /**
     * Alter a status of selected article, publish, delete, favourite
     * @param type $status
     * @param type $id
     * @return type
     */
    public function changeProductStatus($status, $id) {

        $this->authCheck();

        $product = Product::find($id);

        switch ($status) {
            case "fav":

                
                $product->featured_status = 1;
                $product->save();

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Product Set To Featured',
                    'body' => 'Product marked as featured',
                    'type' => 'success'
                ));
                break;
            case "unfav":

                
                $product->featured_status = 0;
                $product->save();

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Product Featured Flag Removed',
                    'body' => 'Product unmarked as featured',
                    'type' => 'success'
                ));
                break;
            case "del":

                $product->deletion_status = 1;
                $product->save();

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Deleted Product',
                    'body' => 'Product moved to trash',
                    'type' => 'success'
                ));
                break;
            case "rec":

                $product->deletion_status = 0;
                $product->save();

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Product Restored',
                    'body' => 'Product recycled back',
                    'type' => 'success'
                ));
                break;
            case "pub":

                $product->publication_status = 1;
                $product->save();

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Updated Product Status to published',
                    'body' => 'This product is now visible',
                    'type' => 'success'
                ));
                break;
            default:

                $product->publication_status = 0;
                $product->save();

                //Message for Notification Builder
                Session::put('message', array(
                    'title' => 'Updated Product Status to unpublished',
                    'body' => 'This product will be invisible',
                    'type' => 'success'
                ));
                break;
        }

        return Redirect::to('/admin/list-products');
    }

    /**
     * Product Management End
     */
   

    /**
     * For testing purposes
     * @return type
     */
    public function test() {

        //Message for Notification Builder
        Session::put('message', array(
            'title' => 'Welcome, ',
            'body' => 'You Have Successfully Logged In',
            'type' => 'primary'
        ));

        //Load Component
        return view('admin.partials.tables', $this->layout);
    }

}
