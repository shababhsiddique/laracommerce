@extends('admin.master')

@section('adminContent')


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Brands</h4>
                <p class="category">List of All Users</p>                
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <tr>
                            <th style="width: 30px; text-align: right">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th style="width: 200px">Status</th>
                            <th style="width: 130px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allUsers as $aUser) { ?>
                        
                            <tr>
                                <td>{{$aUser->id}}</td>
                                <td>{{$aUser->name}}</td>
                                <td>{{$aUser->email}}</td>
                                <td>{{$aUser->mobile}}</td>
                                <td>                                        
                                    @if ($aUser->ban_status == 0)
                                    <span class="text-success"><i class="fa fa-thumbs-up"></i> Active</span>
                                    @else
                                    <i class="fa fa-thumbs-down text-danger"></i> Banned
                                    @endif
                                </td>
                                <td class="td-actions text-right">

                                 
                                    <!--Show thumbs up button if unpublished,--> 
                                    @if ($aUser->ban_status == 0)
                                    <a href="{{url('/admin/changestatus-user/ban/'.$aUser->id)}}" type="button" rel="tooltip" title="" class="btn btn-danger btn-sm confirmDelete" data-original-title="Ban">
                                        <i class="fa fa-thumbs-down"></i>
                                    </a>
                                    @else
                                    <a href="{{url('/admin/changestatus-user/unban/'.$aUser->id)}}" type="button" rel="tooltip" title="" class="btn btn-success btn-sm" data-original-title="Unban">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>
                                    @endif

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