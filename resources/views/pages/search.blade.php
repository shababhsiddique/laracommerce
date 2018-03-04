@include('layouts.master')

@section('mainContent')



<!--Main column-->
<div class="col-lg-9">

    <h3 class="">All Products</h3>
    <hr class="extra-margins">

    <!--Third row-->
    <div class="row">
        @foreach ($listProducts as $aProduct)
        <!--First columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <a class="shop-card-link" href="{{url('product/'.$aProduct->product_id)}}">
                <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

                    <!--Card image-->
                    <div class="shop-card-image-parent">
                        <div class="shop-card-image-child" style="background-image: url('{{asset($aProduct->product_image)}}')">
                            <span class="shop-card-image-text">View</span>                            
                        </div>                        
                    </div>

                    <!--Card content-->
                    <div class="card-body">
                        <!--Title-->
                        <h5 class="font-bold shop-card-title">
                            <strong>{{$aProduct->product_title}}</strong>
                            <!--<span class="badge badge-danger">Sold out</span>-->
                        </h5>
                        <hr>
                        <h4 class="shop-card-price">
                            <strong>{{$aProduct->product_price}}-Tk</strong>
                        </h4>
                        <!--Text-->
                        <p class="card-text mt-4 shop-card-teaser">{!!$aProduct->product_teaser!!}</p>

                        <a href="{{url('/add-to-cart/'.$aProduct->product_id)}}" class="btn btn-primary btn-sm">Buy now </a>
                    </div>

                </div>                
            </a>
            <!--/.Card-->
        </div>
        <!--First columnn-->        
        @endforeach

    </div>
    <!--/.Third row-->

</div>
<!--/.Main column-->

@endsection