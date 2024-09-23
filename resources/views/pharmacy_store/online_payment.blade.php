<?php
$item_desc = '';
$tax = 10;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Stripe Payment Gateway</title>
    @include('user.css')
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
    <!-- jQuery -->
    <title>Stripe Payment </title>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-creditcardvalidator/1.0.0/jquery.creditCardValidator.js"></script>

    <script type="text/javascript" src="../js/payment.js"></script>


</head>

<body>

    <div class="back-to-top"></div>

    <header>



    </header>
    @include('user.top_nav_bar')

    @include('user.success_msg')

    <div class="container">
        <div class="row">
            <h2>Stripe Payment Gateway </h2>


            <div class="card">
                <div class=" card-header">Order Process</div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('stripe.post') }}"  class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="paymentForm">
                        @csrf

                        <!-- <form action="process.php" method="POST" id="paymentForm"> -->
                        <div class="row">
                            <div class="col-md-8" style="border-right:1px solid #ddd;">
                                <h4 align="center">Customer Details</h4>
                                <div class="form-group">
                                    <label><b>Card Holder Name <span class="text-danger">*</span></b></label>
                                    <input type="text" name="customerName" id="customerName" class="form-control" value="{{auth()->user()->name}}">
                                    <span id="errorCustomerName" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label><b>Email Address <span class="text-danger">*</span></b></label>
                                    <input type="text" name="emailAddress" id="emailAddress" class="form-control" value="{{auth()->user()->email}}">
                                    <span id="errorEmailAddress" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label><b>Address <span class="text-danger">*</span></b></label>
                                    <textarea name="customerAddress" id="customerAddress" class="form-control">{{auth()->user()->address}}</textarea>
                                    <span id="errorCustomerAddress" class="text-danger"></span>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><b>City <span class="text-danger">*</span></b></label>
                                            <input type="text" name="customerCity" id="customerCity" class="form-control" value="">
                                            <span id="errorCustomerCity" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><b>Zip <span class="text-danger">*</span></b></label>
                                            <input type="text" name="customerZipcode" id="customerZipcode" class="form-control" value="">
                                            <span id="errorCustomerZipcode" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><b>State </b></label>
                                            <input type="text" name="customerState" id="customerState" class="form-control" value="">
                                            <span id="errorCustomerState" class="text-danger"></span>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><b>Country <span class="text-danger">*</span></b></label>
                                            <input type="text" name="customerCountry" id="customerCountry" class="form-control">
                                            <span id="errorCustomerCountry" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4 align="center">Payment Details</h4>
                                <div class="form-group">
                                    <label>Card Number <span class="text-danger">*</span></label>
                                    <input  type="text" name="cardNumber" id="cardNumber" class="form-control" placeholder="1234 5678 9012 3456" maxlength="20" onkeypress="">
                                    <span id="errorCardNumber" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Expiry Month</label>
                                            <input type="text" name="cardExpMonth" id="cardExpMonth" class="form-control" placeholder="MM" maxlength="2" onkeypress="return validateNumber(event);">
                                            <span id="errorCardExpMonth" class="text-danger"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Expiry Year</label>
                                            <input type="text" name="cardExpYear" id="cardExpYear" class="form-control" placeholder="YYYY" maxlength="4" onkeypress="return validateNumber(event);">
                                            <span id="errorCardExpYear" class="text-danger"></span>
                                        </div>
                                        <div class="col-md-4">
                                            <label>CVC</label>
                                            <input type="text" name="cardCVC" id="cardCVC" class="form-control" placeholder="123" maxlength="4" onkeypress="return validateNumber(event);">
                                            <span id="errorCardCvc" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div align="center">

                                    @foreach($get_product_name as $product_detail)

                                    <?php $item_desc .= $product_detail->name.','; ?>

                                    <input type="hidden" name="price" value="{{$product_detail->price}}">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="item_details" value="{{$item_desc}}">
                                    <input type="hidden" name="item_number" value="{{$product_detail->id}}">
                                    <!-- <input type="hidden" name="order_number" value="SKA987654321"> -->
                                    @endforeach
                                    <input type="hidden" name="total_amount" value="{{$product_total+$tax}}">

                                    <input type="button" name="payNow" id="payNow" class="btn btn-success btn-sm" onclick="stripePay(event)" value="Pay Now" />

                                </div>
                                <br>
                            </div>
                            <div class="col-md-4">
                                <h4 align="center">Order Details</h4>
                                <div class="table-responsive" id="order_table">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                            @foreach($get_product_name as $product_detail)

                                            <tr>
                                                <td><strong>{{$product_detail->name}}</strong></td>
                                                <td>1</td>
                                                <td align="right">${{$product_detail->price}}</td>
                                                <td align="right">${{$product_detail->price}}</td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="3" align="right">Tax</td>
                                                <td align="right"><strong>${{$tax}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="right">Total</td>
                                                <td align="right"><strong>${{$product_total+$tax}}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="insert-post-ads1" style="margin-top:20px;">

    </div>
    </div>




</body>

</html>
