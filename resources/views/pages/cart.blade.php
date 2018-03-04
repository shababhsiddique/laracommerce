@include('layouts.master')

@section('mainContent')

<!--Contact-->
<div class="col-md-12 wow fadeIn" data-wow-delay="0.2s">

    <h2 class="h2-responsive mt-4 font-bold text-center">Cart</h2>
    <hr>  
<!--    <pre>
<?php //print_r(Cart::content())?>
    </pre>-->
    <!--Shopping Cart table-->
    <div class="table-responsive">
        <table class="table product-table">
            <!--Table head-->
            <thead>
                <tr>
                    <th></th>
                    <th>Product</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>QTY</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
            </thead>
            <!--/Table head-->

            <!--Table body-->
            <tbody>

                <!--First row-->
                @foreach(Cart::content() as $rowId=>$row)
                <tr>
                    <th scope="row">
                        <img src="{{asset($row->options->image)}}" alt="Material Design for Bootstrap - example photo" class="img-fluid" style="height: 100px; width: auto">
                    </th>
                    <td>
                        <h5>
                            <strong>{{$row->name}}</strong>
                        </h5>
                        <p class="text-muted">by {{$row->options->brand}}</p>
                    </td>
                    <td>{{$row->options->model}}</td>
                    <td>{{$row->price}} Tk</td>
                    <td>
                        <strong class="qty">{{$row->qty}}</strong>
                        <div class="btn-group">
                            <?php
                            $qtup = $row->qty+1;
                            $qtdown = $row->qty-1;
                            ?>
                            <a href="{{url('cart-qtchange/'.$rowId.'/'.$qtup)}}" class="btn btn-default btn-tb waves-effect waves-light"><i class="fa fa-angle-up"></i></a>
                            <a href="{{url('cart-qtchange/'.$rowId.'/'.$qtdown)}}"  class="btn btn-default btn-tb waves-effect waves-light"><i class="fa fa-angle-down"></i></a>

                        </div>
                    </td>
                    <td>{{$row->subtotal}} $</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{url('cart-remove/'.$rowId)}}" class="btn btn-danger btn-tb waves-effect waves-light"><i class="fa fa-remove"></i></a>
                        </div>
                    </td>
                </tr>
                <!--/First row-->
                @endforeach                

                <!--Fourth row-->
                <tr>
                    <td colspan="3">
                        <h4>
                            <strong>Total</strong>
                        </h4>
                    </td>

                    <td colspan="4">
                        <h4 class="text-right">
                            <strong><?php echo Cart::subtotal(); ?> $</strong>
                        </h4>
                    </td>
                </tr>
                <!--/Fourth row-->

                <tr>
                    <td colspan="7" class="text-right">
                        <button type="button" class="btn btn-primary btn-rounded mb-3 waves-effect waves-light">Complete purchase
                            <i class="fa fa-angle-right right"></i>
                        </button>                                            
                    </td>
                </tr>

            </tbody>
            <!--/Table body-->
        </table>

    </div>
    <!--/Shopping Cart table-->

</div>
<!--/.cart items-->


@endsection