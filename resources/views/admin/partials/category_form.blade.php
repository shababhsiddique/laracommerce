@extends('admin.master')

@section('adminContent')
<div class="row">
    <div class=" col-lg-12">
        <div class="card">
            <div class="card-header" data-background-color="green">
                <h4 class="title">Add Category</h4>
                <p class="category">create new category for products posts</p>
            </div>
            <div class="card-content">
                {!! Form::open(['url' => 'admin/save-category','method' => 'post','enctype'=> 'multipart/form-data']) !!}                
                <div class="row form-group is-focused">
                    <div class="col-sm-3">
                        <label class="custom-form-label">Category Title</label>
                    </div>
                    <div class="col-sm-9">
                        <input autofocus="" name="category_title" type="text" class="form-control form-input-custom">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-3">
                        {!! Form::label('category_image', 'Category Image',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-9 custom-file-input">
                        <input type="file" name="category_image" id="inputFile4"> 
                        <div class="input-group"> 
                            <div class="input-group-btn input-group-sm"> 
                                <button type="button" class="btn btn-primary"> 
                                    <i class="material-icons">attach_file</i> 
                                </button>
                            </div> 
                            
                            <input type="text" readonly="" class="form-control form-input-custom" placeholder="Select image file ..." value=""> 
                        </div>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="custom-form-label">Category Description</label>
                    </div>
                    <div class="col-sm-9">
                        <textarea name="category_description" class="form-control form-input-custom" rows="5"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label class="custom-form-label">Publication Status</label>
                    </div>
                    <div class="col-sm-3">
                        <select name="publication_status" class="form-control form-input-custom">
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Create</button>
                    </div>
                </div>


                {!! Form::close() !!}

                <div class="clearfix"></div>

            </div>
        </div>
    </div>

    

</div>

@endsection