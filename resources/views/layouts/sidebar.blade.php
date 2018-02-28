@include('layouts.master')

@section('sidebarLeft')

<!--Sidebar-->
<div class="col-lg-3">

    <div class="widget-wrapper">
        <div class="list-group z-depth-1">
            @foreach($categories as $aCategory)
            <a href="{{url('/products/'.$aCategory->category_id.'/'.$aCategory->category_title)}}" class="list-group-item waves-effect">{{$aCategory->category_title}}</a>
            @endforeach
        </div>
    </div>

    <div class="widget-wrapper">
        <h4 class="h4-responsive font-bold mb-3 mt-4">Price:</h4>
        <div class="list-group">
            <a href="#" class="list-group-item active">100$ - 399$</a>
            <a href="#" class="list-group-item">400$ - 899$</a>
            <a href="#" class="list-group-item">900$ - 1599$</a>
            <a href="#" class="list-group-item">1600$ - 7999$</a>
        </div>
    </div>
    
    <div class="widget-wrapper">
        <h4 class="h4-responsive font-bold mb-3 mt-4">Brands:</h4>
        <div class="list-group">
            @foreach($brands as $aBrand)
            <a href="#" class="list-group-item">{{$aBrand->brand_title}}</a>
            @endforeach
        </div>
    </div>


    <div class="widget-wrapper wow fadeIn" data-wow-delay="0.4s">
        <h4 class="h4-responsive font-bold">Subscription form:</h4>
        <br>
        <div class="card">
            <div class="card-body">
                <p>
                    <strong>Subscribe to our newsletter</strong>
                </p>
                <p>Once a week we will send you a summary of the most useful news</p>
                <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="form1" class="form-control">
                    <label for="form1">Your name</label>
                </div>
                <div class="md-form">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="text" id="form2" class="form-control">
                    <label for="form2">Your email</label>
                </div>
                <button class="btn btn-info btn-md">Submit</button>

            </div>
        </div>
    </div>

</div>
<!--/.Sidebar-->

@endsection