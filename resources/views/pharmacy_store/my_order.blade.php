<!doctype html>
<html>

<head>
    <base href="/base">
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Hospital Managment system</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">

    <link href='' rel='stylesheet'>
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">


    @include('user.css')
    @include('user.script')

    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
            background-color: #f5f5f5
        }

        .hedding {
            font-size: 20px;
            color: #ab8181;
        }

        .main-section {
            position: absolute;
            left: 50%;
            right: 50%;
            transform: translate(-50%, 0.3%);
        }

        .left-side-product-box img {
            width: 100%;
        }

        .left-side-product-box .sub-img img {
            margin-top: 5px;
            width: 83px;
            height: 100px;
        }

        .right-side-pro-detail span {
            font-size: 15px;
        }

        .right-side-pro-detail p {
            font-size: 25px;
            color: #a1a1a1;
        }

        .right-side-pro-detail .price-pro {
            color: #E45641;
        }

        .right-side-pro-detail .tag-section {
            font-size: 18px;
            color: #5D4C46;
        }

        .pro-box-section .pro-box img {
            width: 100%;
            height: 200px;
        }

        @media (min-width:360px) and (max-width:640px) {
            .pro-box-section .pro-box img {
                height: auto;
            }
        }
    </style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
</head>


<body oncontextmenu='return false' class='snippet-body'>

    @include('user.top_nav_bar')
    <div class="container">
        <div class="col-lg-8 border p-3 main-section bg-white ">
            @include('user.success_msg')

            <div class="  text-center">
                <div class="row hedding m-0 pl-3 pt-0 pb-3">
                    My Order List

                </div>
            </div>
            <div style="text-align:center;" class="container-fluid page-body-wrapper ">


                @foreach($orders as $products)
                <div class="row m-0">
                    <div class="col left-side-product-box pb-3">
                        <img src="pharmacy_medicine/{{$products->image}}" class="border p-3">
                        <span class="sub-img">

                        </span>
                    </div>
                    <div class="col-lg-8">
                        <div class="right-side-pro-detail border p-3 m-0 font-weight-bold">

                            <div class="col-lg-12">

                                <table class="table table-bordered">

                                    <tbody>

                                        <tr>
                                            <td>Name</td>
                                            <td>{{$products->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td>{{$products->category}}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>{{$products->status}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{$products->address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Method</td>
                                            <td>{{$products->payment_method}}</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Status</td>
                                            <td class=" text-danger">{{$products->payment_status}}</td>
                                        </tr>

                                        <tr class="table-info">
                                            <td>Total</td>
                                            <td class=" text-primary">${{$products->price+10}}</td>
                                        </tr>





                                    </tbody>

                                </table>

                                @if($products->status == 'shipped')
                                @if($products->status !== 'deliverd')
                                <table class="table table-bordered">
                                    <tbody>

                                        <tr class=" text-center">
                                            <td>
                                                <a href="{{url('order_recived_by_user',$products->or_id)}}" title="Recived">
                                                    <i class="fab fa-get-pocket fa-lg" aria-hidden="true"></i>
                                                </a>

                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                                @endif
                                @endif

                            </div>



                        </div>


                    </div>
                </div>
                <div class="col-lg-5 mt-3 ">
                    <div class="row">


                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <script type='text/javascript'></script>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>



</body>

</html>
