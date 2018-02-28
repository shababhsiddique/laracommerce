@extends('admin.master')

@section('adminContent')


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Products<a href="{{url('admin/new-product')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;New</a></h4>
                <p class="category">List of All Products</p>                
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <tr>
                            <th style="width: 30px; text-align: right">#</th>
                            <th style="width: 100px"></th>    
                            <th></th>    
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th style="width: 200px">Status</th>
                            <th style="width: 130px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allProducts as $anProduct) { ?>

                            <tr>
                                <td>{{$anProduct->product_id}}</td>                             
                                <td><image src="{{asset($anProduct->product_image)}}" class="img-responsive grid-thumb"/></td>          
                                <td><strong>{{$anProduct->product_title}}</strong></td>
                                <!--<td>{{substr(strip_tags($anProduct->product_teaser),0,70)}}...</td>-->
                                <td>{{$anProduct->category->category_title}}</td>
                                <td>{{$anProduct->brand->brand_title}}</td>
                                <td>{{$anProduct->product_model}}</td>
                                <td>                                    

                                    @if ($anProduct->featured_status == 1)
                                    <i class="fa fa-star text-warning"></i> / 
                                    @endif

                                    @if ($anProduct->publication_status == 0)
                                    <span class="text-danger"><i class="fa fa-eye-slash"></i> Unpublished</span>
                                    @else
                                    <i class="fa fa-eye text-success"></i> Published
                                    @endif
                                </td>
                                <td class="td-actions text-right">

                                    <a href="{{url('/admin/edit-product/'.$anProduct->product_id)}}" type="button" rel="tooltip" title="" class="btn btn-primary btn-sm" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <!--Show favourite button if currently not marked,--> 
                                    @if ($anProduct->featured_status == 0)
                                    <a href="{{url('/admin/changestatus-product/fav/'.$anProduct->product_id)}}" type="button" rel="tooltip" title="" class="btn btn-success btn-sm" data-original-title="Mar as Featured">
                                        <i class="fa fa-star"></i>
                                    </a>
                                    @else
                                    <a href="{{url('/admin/changestatus-product/unfav/'.$anProduct->product_id)}}" type="button" rel="tooltip" title="" class="btn btn-default btn-sm" data-original-title="Unmark As Featured">
                                        <i class="fa fa-star-o"></i>
                                    </a>
                                    @endif

                                    <!--Show thumbs up button if unpublished,--> 
                                    @if ($anProduct->publication_status == 0)
                                    <a href="{{url('/admin/changestatus-product/pub/'.$anProduct->product_id)}}" type="button" rel="tooltip" title="" class="btn btn-success btn-sm" data-original-title="Publish">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>
                                    @else
                                    <a href="{{url('/admin/changestatus-product/unp/'.$anProduct->product_id)}}" type="button" rel="tooltip" title="" class="btn btn-warning btn-sm" data-original-title="Unpublish">
                                        <i class="fa fa-thumbs-down"></i>
                                    </a>
                                    @endif

                                    <a href="{{url('/admin/changestatus-product/del/'.$anProduct->product_id)}}" type="button" rel="tooltip" title="" class="btn btn-danger btn-sm confirmDelete" data-original-title="Delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">                
                <h4 class="title">Discontinued</h4>
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <tr>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                            <th>Last Updated</th>
                            <th style="width: 30px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($deletedProducts as $anProduct) { ?>
                            <tr>
                                <td class="text-left">{{$anProduct->product_title}}</td>
                                <td class="text-left">{{$anProduct->category->category_title}}</td>
                                <td class="text-left">{{$anProduct->brand->brand_title}}</td>
                                <td class="text-left">{{$anProduct->updated_at}}</td>
                                <td class="td-actions text-right">
                                    <a href="{{url('/admin/changestatus-product/rec/'.$anProduct->product_id)}}" type="button" rel="tooltip" title="" class="btn btn-primary btn-sm" data-original-title="Undo Delete">
                                        <i class="fa fa-undo"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">                
                <h4 class="title">Featured Items</h4>              
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <tr>                            
                            <th></th>
                            <th></th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($featuredProducts as $anProduct) { ?>
                            <tr>
                                <td><image src="{{asset($anProduct->product_image)}}" class="img-responsive grid-thumb"/></td>
                                <td class="text-left">
                                    <strong>{{$anProduct->product_title}}</strong><br/>
                                    {{substr(strip_tags($anProduct->product_teaser),0,100)}}
                                </td>
                                <td class="text-left">{{$anProduct->updated_at}}</td>                                
                            </tr>
                        <?php } ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection