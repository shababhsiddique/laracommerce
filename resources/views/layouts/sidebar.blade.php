@include('layouts.master')

@section('sidebarLeft')

<!--Sidebar-->
<div class="col-lg-3 wow fadeIn" data-wow-delay="0.2s">

    <div class="widget-wrapper">
        <div class="list-group z-depth-1">
            <a href="#" class="list-group-item waves-effect">Smartphone</a>
            <a href="#" class="list-group-item waves-effect">Laptop</a>
            <a href="#" class="list-group-item waves-effect">Camera</a>
            <a href="#" class="list-group-item waves-effect">Headphones</a>
            <a href="#" class="list-group-item waves-effect">Tablet</a>
            <a href="#" class="list-group-item waves-effect">Gadgets</a>
            <a href="#" class="list-group-item waves-effect">Toys</a>
            <a href="#" class="list-group-item waves-effect">Tools</a>
            <a href="#" class="list-group-item waves-effect">Home Appliances</a>
        </div>
    </div>

    <div class="widget-wrapper">
        <h4 class="h4-responsive font-bold mb-3 mt-4">Price:</h4>
        <br>
        <div class="list-group">
            <a href="#" class="list-group-item active">100$ - 399$</a>
            <a href="#" class="list-group-item">400$ - 899$</a>
            <a href="#" class="list-group-item">900$ - 1599$</a>
            <a href="#" class="list-group-item">1600$ - 7999$</a>
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