@extends('admin.master')

@section('adminContent')
<div class="row">
    <div class=" col-lg-8">
        <div class="card">
            <div class="card-header" data-background-color="green">
                <h4 class="title">Edit Category</h4>
                <p class="category">edit category</p>
            </div>
            <div class="card-content">
                {!! Form::open(['url' => 'admin/update-category','method' => 'post','enctype'=>'multipart/form-data']) !!}
                
                <input type="hidden" name="category_id" value="{{$oldCategoryData->category_id}}" />
                <div class="row form-group is-focused">
                    <div class="col-sm-3">
                        <label class="custom-form-label">Category Title</label>
                    </div>
                    <div class="col-sm-9">
                        <input autofocus="" name="category_title" type="text" class="form-control form-input-custom" value="{{$oldCategoryData->category_title}}">
                    </div>
                </div>
                
                <div class="form-group">
                    
                    <div class="col-sm-9 col-sm-offset-3">
                        <img src="<?php if(isset($oldCategoryData)){ echo asset($oldCategoryData->category_image);}?>" class="img-responsive img-fluid" style="width: 150px"/>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-3">
                        {!! Form::label('category_image', 'Category Images',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-9 custom-file-input">
                        <input type="file" name="category_image" id="inputFile4"> 
                        <div class="input-group"> 
                            <div class="input-group-btn input-group-sm"> 
                                <button type="button" class="btn btn-primary"> 
                                    <i class="material-icons">attach_file</i> 
                                </button>
                            </div> 
                            
                            <input type="text" readonly="" class="form-control form-input-custom" placeholder="Select image file ..." value="<?php if(isset($oldArticleData)){ echo $oldArticleData->article_image;}?>"> 
                            
                            <input type="hidden" name="category_image_previous" value="<?php if(isset($oldCategoryData)){ echo $oldCategoryData->category_image;}?>"> 
                            
                        </div>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="custom-form-label">Category Description</label>
                    </div>
                    <div class="col-sm-9">
                        <textarea name="category_description" class="form-control form-input-custom" rows="5">{{$oldCategoryData->category_description}}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Update</button>                        
                    </div>
                </div>

                {!! Form::close() !!}

                <div class="clearfix"></div>

            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Current Uses</h4>
                <p class="category">Here is a list of current posts under the category</p>
            </div>
           
            <div class="card-content table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Technology</td>
                            <td class="text-primary"><i class="fa fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Education</td>
                            <td class="text-primary"><i class="fa fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td>Services</td>
                            <td class="text-primary"><i class="fa fa-ban text-danger"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection