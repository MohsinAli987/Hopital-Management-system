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
            transform: translate(-50%, 5%);
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
        <div class="col-lg-8 border p-3 main-section bg-white">
            @include('user.success_msg')
            <div class="row hedding m-0 pl-3 pt-0 pb-3">
                HMS Pharmacy
            </div>
            <div class="row m-0">
                <div class="col-lg-4 left-side-product-box pb-3">
                    <img src="pharmacy_medicine/{{$medicine->image}}" class="border p-3">
                    <span class="sub-img">

                    </span>
                </div>
                <div class="col-lg-8">
                    <div class="right-side-pro-detail border p-3 m-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <span>Medicine Name</span>
                                <p class="m-0 p-0">{{$medicine->name}}</p>
                            </div>
                            <div class="col-lg-12">
                                <p class="m-0 p-0 price-pro">${{$medicine->price}}</p>
                                <hr class="p-0 m-0">
                            </div>
                            <div class="col-lg-12 pt-2">
                                <h5>Category</h5>
                                <span>{{$medicine->manufacturer}}</span>
                                <hr class="m-0 pt-2 mt-2">
                            </div>
                            <div class="col-lg-12">
                                <p class="tag-section"><strong>Tag : </strong>{{$medicine->category}}</p>
                            </div>
                            <!-- <div class="col-lg-12">
                                <h6>Quantity :</h6>
                                <input type="number" class="form-control text-center w-100" value="1">
                            </div> -->
                            <div class="col-lg-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6 pb-2">
                                        <form method="POST" action="add_to_cart">
                                            @csrf
                                            <input name="product_id" hidden value="{{$medicine->id}}" type="text">
                                            <button title="Add To Cart" class="btn btn-danger w-100" type="submit">
                                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            </button>
                                            <!-- <a href="#" class="btn btn-danger w-100">Add To Cart</a> -->

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type='text/javascript'></script>
</body>

</html>
