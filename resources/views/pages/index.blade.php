@include('layouts.master')

@section('mainContent')



<!--Main column-->
<div class="col-lg-9">

    <!--First row-->
    <div class="row wow fadeIn" data-wow-delay="0.4s">
        <div class="col-lg-12">
            <h3 class="">What's new?</h3>

            <!--Carousel Wrapper-->
            <div id="carousel-example-1z" class="z-depth-1-half carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item active">
                        <img src="https://mdbootstrap.com/img/Photos/Others/product1.jpg" alt="First slide" class="img-fluid rounded">
                        <div class="carousel-caption">
                            <h3 class="font-bold red-text">
                                <strong>New products!</strong>
                            </h3>
                            <br>
                        </div>
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                        <img src="https://mdbootstrap.com/img/Photos/Others/product2.jpg" alt="Second slide" class="img-fluid rounded">
                        <div class="carousel-caption">
                            <h3 class="font-bold red-text">
                                <strong>Get 10% discount!</strong>
                            </h3>
                            <br>
                        </div>
                    </div>
                    <!--/Second slide-->
                    <!--Third slide-->
                    <div class="carousel-item">
                        <img src="https://mdbootstrap.com/img/Photos/Others/product4.jpg" alt="Third slide" class="img-fluid rounded">
                        <div class="carousel-caption">
                            <h3 class="font-bold red-text">
                                <strong>All products 20% OFF</strong>
                            </h3>
                            <br>
                        </div>
                    </div>
                    <!--/Third slide-->
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </div>
    <!--/.First row-->
    <br>
    <h3 class="">Featured</h3>
    <hr class="extra-margins">

    <!--Third row-->
    <div class="row product-deck">

        @foreach ($featuredProducts as $aProduct)
        <!--First columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <a class="shop-card-link" href="{{url('product/'.$aProduct->product_id)}}">
                <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

                    <!--Card image-->
                    <div class="shop-card-image-holder" style="background-image: url('{{asset($aProduct->product_image)}}')">
    <!--                    <img class="img-fluid shop-card-image" src="{{asset($aProduct->product_image)}}" alt="{{$aProduct->product_title}}">-->
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

                        <a href="{{url('buy/'.$aProduct->product_id)}}" class="btn btn-primary btn-sm">Buy now </a>
                    </div>

                </div>
            </a>
            <!--/.Card-->
        </div>
        <!--First columnn-->        
        @endforeach

    </div>
    <!--/.Third row-->

    <br/>

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
                    <div class="shop-card-image-holder" style="background-image: url('{{asset($aProduct->product_image)}}')">
    <!--                    <img class="img-fluid shop-card-image" src="{{asset($aProduct->product_image)}}" alt="{{$aProduct->product_title}}">-->
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

                        <a href="ecommerce_product.html" class="btn btn-primary btn-sm">Buy now </a>
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