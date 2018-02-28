@include('layouts.master')

@section('mainContent')

<div class="col-md-12">
    <div class="row">

        <!--Product-->
        <div class="col-lg-7 wow fadeIn" data-wow-delay="0.2s">

            <!--Carousel Wrapper-->
            <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
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
                        <img class="d-block w-100" src="{{asset($productDetails->product_image)}}" alt="First slide">
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset($productDetails->product_image)}}" alt="Second slide">
                    </div>
                    <!--/Second slide-->
                    <!--Third slide-->
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset($productDetails->product_image)}}" alt="Third slide">
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
        <!--/.Product-->

        <!--Info-->
        <div class="col-lg-5">

            <!--First row-->
            <div class="row wow fadeIn" data-wow-delay="0.4s">
                <div class="col-md-12">
                    <!--Product-->
                    <div class="product-wrapper">

                        <!--Product data-->

                        <h3 class="">{{$productDetails->product_title}}</h3>
                        <hr class="extra-margins">

                        <h2>
                            Tk: <span class="badge blue">{{$productDetails->product_price}}</span>
                        </h2>
                        <dl class="row mt-4">
                            <dt class="col-sm-3">Model</dt>
                            <dd class="col-sm-9">{{$productDetails->product_model}}</dd>

                            <dt class="col-sm-3"></dt>
                            <dd class="col-sm-9">{{$productDetails->product_teaser}}</dd>

                            <dt class="col-sm-3">Options</dt>
                            <dd class="col-sm-9">{{$productDetails->product_options}}</dd>

                            <dt class="col-sm-3">Brand</dt>
                            <dd class="col-sm-9">{{$productDetails->brand->brand_title}}</dd>
                        </dl>

                        <hr>
                        <button type="button" class="btn btn-danger btn-md">Add to cart</button>
                    </div>
                    <!--Product-->

                </div>
            </div>
            <!--/.First row-->

        </div>
        <!--/.Info-->
        
        <div class="col-lg-12 mt-5">
            <p>{!!$productDetails->product_description!!}</p>
        </div>

        <!--Reviews-->
        <div class="col-lg-12">

            <!--Grid row-->
            <div class="row mt-5">

                <!--Heading-->
                <div class="col reviews wow fadeIn" data-wow-delay="0.4s">
                    <h2 class="h2-responsive font-bold">Reviews</h2>
                </div>

                <!--First review-->
                <div class="media wow fadeIn" data-wow-delay="0.2s">
                    <a class="media-left" href="#">
                        <img class="rounded-circle ml-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-7.jpg" alt="Generic placeholder image">
                    </a>
                    <div class="media-body ml-4">
                        <h4 class="media-heading font-bold dark-grey-text">John Doe</h4>
                        <ul class="rating inline-ul list-unstyled">
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star grey-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star grey-text"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure
                            soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda.
                            Earum sit id ullam eum vel delectus!</p>
                    </div>
                </div>

                <!--Second review-->
                <br>
                <div class="media wow fadeIn" data-wow-delay="0.2s">
                    <a class="media-left" href="#">
                        <img class="rounded-circle ml-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="Generic placeholder image">
                    </a>
                    <div class="media-body ml-4">
                        <h4 class="media-heading font-bold dark-grey-text">Maria Casie</h4>
                        <ul class="rating inline-ul list-unstyled">
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure
                            soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda.
                            Earum sit id ullam eum vel delectus!</p>
                    </div>
                </div>

                <!--Second review-->
                <br>
                <div class="media wow fadeIn" data-wow-delay="0.2s">
                    <a class="media-left" href="#">
                        <img class="rounded-circle ml-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-10.jpg" alt="Generic placeholder image">
                    </a>
                    <div class="media-body ml-4">
                        <h4 class="media-heading font-bold dark-grey-text">Kate Snow</h4>
                        <ul class="rating inline-ul list-unstyled">
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fa fa-star grey-text"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi cupiditate temporibus iure
                            soluta. Quasi mollitia maxime nemo quam accusamus possimus, voluptatum expedita assumenda.
                            Earum sit id ullam eum vel delectus!</p>
                    </div>
                </div>

            </div>

            <hr/>
            <h3>Related Products</h3>
            <hr/>
            <!--Third row-->
            <div class="row">
                <!--First columnn-->
                <div class="col-lg-3">
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
                <div class="col-lg-3">
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
                <div class="col-lg-3">
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

                <!--Fourth columnn-->
                <div class="col-lg-3">
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
                <!--Fourth columnn-->
            </div>
            <!--/.Grid row-->

        </div>
        <!--/.Reviews-->

    </div>

</div>

@endsection