@extends('admin.master')

@section('adminContent')


<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" data-background-color="green">
                <h4 class="title">Slider Images</h4>
                <p class="category">List of Images In slider</p>
            </div>
            <div class="card-content table-responsive">

                <table class="table">
                    <thead class="text-primary">
                        <tr>
                            <th style="width: 30px"></th>
                            <th style="width: 200px"></th>
                            <th>Filename</th>
                            <th style="width: 30px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliderImages as $index => $anImage)
                        <tr>
                            <td></td>
                            <td><image src="{{asset($anImage['dirname'].'/'.$anImage['basename'])}}" class="img-responsive grid-thumb"/></td>          
                            <td>{{$anImage['basename']}}</td>
                            <td class="td-actions text-right">
                                <a href="{{url('/admin/delete-slider-image/'.$anImage['basename'])}}" type="button" rel="tooltip" title="" class="btn btn-danger btn-sm confirmDelete" data-original-title="Delete">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>                               
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class=" col-md-4">
        <div class="card card-stats">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Add More Image</h4>
            </div>
            <div class="card-content">
                {!! Form::open(['url' => 'admin/upload-slider','method' => 'post', 'id' => 'slider_form', 'enctype'=> 'multipart/form-data']) !!}
                <div class="form-group">
                    <hr/>
                    <div class="col-sm-12 custom-file-input">
                        <input type="file" name="slider_images[]" multiple="" id="inputFile4" style="width: 100%"> 
                        <div class="input-group" style="width: 100%"> 
                            <div class="input-group-btn input-group-sm"> 
                                <button type="button" class="btn btn-primary"> 
                                    <i class="material-icons">collections</i>
                                </button>
                            </div> 

                            <input type="text" readonly="" class="form-control form-input-custom" placeholder="Select image file ..." value="" style="width: 100%"> 
                        </div>
                    </div>                    
                </div>
                <div class="row form-group text-left">
                    <div class="col-sm-12">
                        <hr/>
                        <p>
                            These Images are used in home page slider only.
                        </p>
                        <p>
                            If you wish to change product slider images, change in product edit page. If you wish to change category page slider images change it there.
                        </p>
                    </div>
                </div>
                {!! Form::close() !!}
                <script type="text/javascript">
                    document.getElementById("inputFile4").onchange = function () {
                        document.getElementById("slider_form").submit();
                    };
                </script>

                <div class="clearfix"></div>

            </div>
        </div>        
    </div>
</div>

<div class="row">

</div>


@endsection