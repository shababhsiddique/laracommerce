@extends('admin.master')

@section('adminContent')
<div class="row">
    <div class=" col-lg-12">
        <div class="card">
            <div class="card-header" data-background-color="green">
                @if(isset($oldBrandData))
                <h4 class="title">Edit Brand</h4>
                <p class="category">Edit Brand / Manufacturer</p>
                @else
                <h4 class="title">Add Brand</h4>
                <p class="category">Add Brand / Manufacturer</p>
                @endif
            </div>
            <div class="card-content">
                @if(isset($oldBrandData))
                {!! Form::model($oldBrandData,['url' => 'admin/save-brand','method' => 'post']) !!}
                <input type="hidden" name="brand_id" value="{{$oldBrandData->brand_id}}" />
                @else
                {!! Form::open(['url' => 'admin/save-brand','method' => 'post']) !!}
                @endif
                <div class="row form-group is-focused">
                    <div class="col-sm-3">
                        {!! Form::label('brand_title', 'Brand Title',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-9">
                        {!! Form::text('brand_title', null, ['class' => 'form-control form-input-custom','placeholder'=>"Samsung"]) !!}
                        @if ($errors->has('brand_title'))
                        <span class="material-input text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('brand_title') }}
                        </span>
                        @else
                        <span class="material-input">
                            Max 50 Characters
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-sm-3">
                        {!! Form::label('brand_description', 'Brand Description',['class' => 'custom-form-label']) !!}
                    </div>
                    <div class="col-sm-9">
                        {!! Form::textarea('brand_description', null, ['class' => 'ckeditor ','rows'=>'10']) !!}
                        @if ($errors->has('brand_description'))
                        <span class="material-input text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('brand_description') }}
                        </span>
                        @else
                        <span class="material-input">
                            Required
                        </span>
                        @endif
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
                        @if(isset($oldBrandData))
                        {{ Form::select('publication_status', $publicationOptions, $oldBrandData->publication_status, ['class' => 'form-control form-input-custom']) }}
                        @else
                        {{ Form::select('publication_status', $publicationOptions, 1, ['class' => 'form-control form-input-custom']) }}
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