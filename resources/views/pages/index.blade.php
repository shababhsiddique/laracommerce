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


    <!--Second row-->
    <div class="row">
        <!--First columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

                <!--Card image-->
                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h5 class="font-bold">
                        <strong>Product title</strong>
                        <span class="badge badge-danger">Sold out</span>
                    </h5>
                    <hr>
                    <h4>
                        <strong>1229$</strong>
                    </h4>
                    <!--Text-->
                    <p class="card-text mt-4">Some quick example text to build on the card title.
                    </p>

                    <a href="ecommerce_product.html" class="btn btn-primary btn-sm">Buy now </a>
                </div>

            </div>
            <!--/.Card-->
        </div>
        <!--First columnn-->

        <!--Second columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card mb-r wow fadeIn" data-wow-delay="0.4s">

                <!--Card image-->
                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/16.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h5 class="font-bold">
                        <strong>Product title</strong>
                        <span class="badge badge-info">New</span>
                    </h5>
                    <hr>
                    <h4>
                        <strong>150$</strong>
                    </h4>
                    <!--Text-->
                    <p class="card-text mt-4">Some quick example text to build on the card title.
                    </p>

                    <a href="ecommerce_product.html" class="btn btn-primary btn-sm">Buy now </a>
                </div>

            </div>
            <!--/.Card-->
        </div>
        <!--Second columnn-->

        <!--Third columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card mb-r wow fadeIn" data-wow-delay="0.6s">

                <!--Card image-->
                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/7.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h5 class="font-bold">
                        <strong>Product title</strong>
                        <span class="badge badge-pink">Bestseller</span>
                    </h5>
                    <hr>
                    <h4>
                        <strong>3100$</strong>
                    </h4>
                    <!--Text-->
                    <p class="card-text mt-4">Some quick example text to build on the card title.
                    </p>

                    <a href="ecommerce_product.html" class="btn btn-primary btn-sm">Buy now </a>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Third columnn-->
    </div>
    <!--/.Second row-->

    <!--Third row-->
    <div class="row">
        <!--First columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card mb-r wow fadeIn" data-wow-delay="0.2s">

                <!--Card image-->
                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/14.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h5 class="font-bold">
                        <strong>Product title</strong>
                        <span class="badge badge-danger">Sold out</span>
                    </h5>
                    <hr>
                    <h4>
                        <strong>1229$</strong>
                    </h4>
                    <!--Text-->
                    <p class="card-text mt-4">Some quick example text to build on the card title.
                    </p>

                    <a href="ecommerce_product.html" class="btn btn-primary btn-sm">Buy now </a>
                </div>

            </div>
            <!--/.Card-->
        </div>
        <!--First columnn-->

        <!--Second columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card mb-r wow fadeIn" data-wow-delay="0.4s">

                <!--Card image-->
                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/20.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h5 class="font-bold">
                        <strong>Product title</strong>
                        <span class="badge badge-danger">Sold out</span>
                    </h5>
                    <hr>
                    <h4>
                        <strong>150$</strong>
                    </h4>
                    <!--Text-->
                    <p class="card-text mt-4">Some quick example text to build on the card title.
                    </p>

                    <a href="ecommerce_product.html" class="btn btn-primary btn-sm">Buy now </a>
                </div>

            </div>
            <!--/.Card-->
        </div>
        <!--Second columnn-->

        <!--Third columnn-->
        <div class="col-lg-4">
            <!--Card-->
            <div class="card mb-r wow fadeIn" data-wow-delay="0.6s">

                <!--Card image-->
                <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/15.jpg" alt="Card image cap">

                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h5 class="font-bold">
                        <strong>Product title</strong>
                        <span class="badge badge-pink">Bestseller</span>
                    </h5>
                    <hr>
                    <h4>
                        <strong>3100$</strong>
                    </h4>
                    <!--Text-->
                    <p class="card-text mt-4">Some quick example text to build on the card title.
                    </p>

                    <a href="#" class="btn btn-primary btn-sm">Buy now </a>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Third columnn-->
    </div>
    <!--/.Third row-->

</div>
<!--/.Main column-->

@endsection