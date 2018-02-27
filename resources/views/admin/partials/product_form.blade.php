@extends('admin.master')

@section('adminContent')
<div class="row">
    <div class=" col-lg-12">
        <div class="card">
            <div class="card-header" data-background-color="green">
                @if(isset($oldProductData))
                <h4 class="title">Edit Product</h4>
                <p class="category">Change old product data</p>
                @else
                <h4 class="title">New Product</h4>
                <p class="category">Write an product for the blog</p>
                @endif
            </div>
            <div class="card-content">
                @if(isset($oldProductData))
                {!! Form::model($oldProductData,['url' => 'admin/save-product','method' => 'post','enctype'=> 'multipart/form-data']) !!}
                <input type="hidden" name="product_id" value="{{$oldProductData->product_id}}" />
                @else
                {!! Form::open(['url' => 'admin/save-product','method' => 'post','enctype'=> 'multipart/form-data']) !!}
                @endif
                <div class="row form-group is-focused">
                    <div class="col-sm-3">
                        {!! Form::label('product_title', 'Product Title',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-9">
                        {!! Form::text('product_title', null, ['class' => 'form-control form-input-custom','placeholder'=>"Someday I will master Laravel"]) !!}
                        
                    </div>
                </div>

                <div class="form-group">
                    
                    <div class="col-sm-9 col-sm-offset-3">
                        <img src="<?php if(isset($oldProductData)){ echo asset($oldProductData->product_image);}?>" class="img-responsive img-fluid" style="width: 150px"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                        {!! Form::label('product_image', 'Product Image',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-9 custom-file-input">
                        <input type="file" name="product_image" id="inputFile4"> 
                        <div class="input-group"> 
                            <div class="input-group-btn input-group-sm"> 
                                <button type="button" class="btn btn-primary"> 
                                    <i class="material-icons">attach_file</i> 
                                </button>
                            </div> 
                            
                            <input type="text" readonly="" class="form-control form-input-custom" placeholder="Select image file ..." value="<?php if(isset($oldProductData)){ echo $oldProductData->product_image;}?>"> 
                            
                            <input type="hidden" name="product_image_previous" value="<?php if(isset($oldProductData)){ echo $oldProductData->product_image;}?>"> 
                            
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::label('product_slug', 'Product URL friendly name',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-5">
                        {!! Form::text('product_slug', null, ['class' => 'form-control form-input-custom','placeholder'=>"someday-i-will-master-laravel"]) !!}
                        <strong>No space or special characters, will auto generate if empty</strong>
                    </div>
                </div>
                
                 <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::label('category_id', 'Product Category',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-3">
                        <?php
                        $cat = [];
                        foreach ($listCategories as $aCategory) {
                            $cat[$aCategory->category_id] = $aCategory->category_title;
                        }
                        ?>
                        @if(isset($oldProductData))
                        {!! Form::select('category_id', $cat, $oldProductData->category_id, ['class' => 'form-control form-input-custom']) !!}
                        @else
                        {!! Form::select('category_id', $cat, null, ['class' => 'form-control form-input-custom']) !!}
                        @endif
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::label('product_model', 'Model Name / Number',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-5">
                        {!! Form::text('product_model', null, ['class' => 'form-control form-input-custom']) !!}
                        
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-sm-3">
                        {!! Form::label('product_teaser', 'Product Preface',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::textarea('product_teaser', null, ['class' => 'form-control form-input-custom','rows'=>'4']) !!}
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-sm-3">
                        {!! Form::label('product_description', 'Full Product Description',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-9">
                        {!! Form::textarea('product_description', null, ['class' => 'ckeditor ','rows'=>'10']) !!}
                    </div>
                </div>

               
                
                <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::label('brand_id', 'Product Manufacturer / Brand',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-3">
                        <?php
                        $brnd = [];
                        foreach ($listBrands as $aBrand) {
                            $brnd[$aBrand->brand_id] = $aBrand->brand_title;
                        }
                        ?>
                        @if(isset($oldProductData))
                        {!! Form::select('brand_id', $brnd, $oldProductData->brand_id, ['class' => 'form-control form-input-custom']) !!}
                        @else
                        {!! Form::select('brand_id', $brnd, null, ['class' => 'form-control form-input-custom']) !!}
                        @endif
                    </div>
                </div>
                
                
                <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::label('product_price', 'Product Unit Price',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('product_price', null, ['class' => 'form-control form-input-custom','placeholder'=>"100.90"]) !!}                        
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::label('product_quantity', 'Quantity In Stock',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::number('product_quantity', null, ['class' => 'form-control form-input-custom','placeholder'=>"100"]) !!}                        
                  </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::label('product_minimum_order', 'Minimum Order Quantity',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::number('product_minimum_order', null, ['class' => 'form-control form-input-custom','placeholder'=>"100"]) !!}                        
                  </div>
                </div>
                
                 <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::label('product_reorder_level', 'Stock Re-Order Level',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::number('product_reorder_level', null, ['class' => 'form-control form-input-custom','placeholder'=>"100"]) !!}                        
                  </div>
                </div>
                
                

                <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::label('publication_status', 'Status',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-3">
                        <?php
                        $publicationOptions = [
                            0 => "Unpublished",
                            1 => "Published"
                        ];
                        ?>
                        @if(isset($oldProductData))
                        {!! Form::select('publication_status', $publicationOptions, $oldProductData->publication_status, ['class' => 'form-control form-input-custom']) !!}
                        @else
                        {!! Form::select('publication_status', $publicationOptions, 1, ['class' => 'form-control form-input-custom']) !!}
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>
                    </div>
                </div>

                {!! Form::close() !!}

                <div class="clearfix"></div>

            </div>
        </div>
    </div>    

</div>

@endsection