@extends('admin.master')

@section('adminContent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Catogires<a href="{{url('admin/add-category')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;New</a></h4>
                <p class="category">List of All Categories</p>
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <tr>
                            <th style="width: 30px; text-align: right">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="width: 200px">Status</th>
                            <th style="width: 130px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allCategories as $aCategory) { ?>
                            <tr>
                                <td class="text-right">{{$aCategory->category_id}}</td>
                                <td>{{$aCategory->category_title}}</td>
                                <td>{{$aCategory->category_description}}</td>
                                <td>
                                    @if ($aCategory->publication_status == 0)
                                    <i class="fa fa-eye-slash text-warning"></i> Unpublished
                                    @else
                                    <i class="fa fa-eye text-success"></i> Published
                                    @endif
                                </td>
                                <td class="td-actions text-right">
                                    
                                    <a href="{{url('/admin/edit-category/'.$aCategory->category_id)}}" type="button" rel="tooltip" title="" class="btn btn-primary btn-sm" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    
                                    <!--Show thumbs up button if unpublished,--> 
                                    @if ($aCategory->publication_status == 0)
                                    <a href="{{url('/admin/changestatus-category/1/'.$aCategory->category_id)}}" type="button" rel="tooltip" title="" class="btn btn-success btn-sm" data-original-title="Publish">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>
                                    @else
                                    <a href="{{url('/admin/changestatus-category/0/'.$aCategory->category_id)}}" type="button" rel="tooltip" title="" class="btn btn-warning btn-sm" data-original-title="Unpublish">
                                        <i class="fa fa-thumbs-down"></i>
                                    </a>
                                    @endif

                                    <a href="{{url('/admin/delete-category/del/'.$aCategory->category_id)}}" type="button" rel="tooltip" title="" class="btn btn-danger btn-sm confirmDelete" data-original-title="Delete">
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
                <h4 class="title">Recycle Bin</h4>
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <tr>
                            <th>Name</th>
                            <th></th>
                            <th>Category</th>
                            <th>Last Updated</th>
                            <th style="width: 30px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($deletedCategories as $aCategory) { ?>
                            <tr>
                                <td class="text-left">{{$aCategory->category_title}}</td>
                                <td class="text-left">{{$aCategory->category_description}}</td>
                                <td class="text-left">{{$aCategory->updated_at}}</td>
                                <td class="td-actions text-right">
                                    <a href="{{url('/admin/delete-category/undo/'.$aCategory->category_id)}}" type="button" rel="tooltip" title="" class="btn btn-primary btn-sm" data-original-title="Undo Delete">
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
</div>

@endsection