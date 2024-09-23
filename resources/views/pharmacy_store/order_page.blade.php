<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

    @include('user.css')
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>



    </header>
    @include('user.top_nav_bar')

    @include('user.success_msg')
    <div class=" table-responsive col-5 m-auto" style="background: #aecfff;">
        <table class="table table-bordered mt-4 text-center font-weight-bold">
            <!-- <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Tax</th>
                    <th scope="col">Deliver</th>
                    <th scope="col">Total</th>
                </tr>
            </thead> -->
            <tbody>

                <tr>
                    <td>Amount</td>
                    <td>${{$product}}</td>
                </tr>
                <tr>
                    <td>Deliver</td>
                    <td>$ 0</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td> $10</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>${{$product+10}}</td>
                </tr>
                <!-- <tr>
                    <td colspan="2">
                        <a href="" class="btn btn-success w-25">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                    </td>

                </tr> -->


            </tbody>

        </table>

        <form method="POST" action="save_order">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label ">Address</label>
                <div class="col-sm-10">
                    <input name="address" type="text" class="form-control bg-transparent" placeholder="Enter Address" required>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="gridRadios1" value="PayOnline">
                            <label class="form-check-label" for="gridRadios1">
                                Pay Online
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="gridRadios2" value="COD" checked>
                            <label class="form-check-label" for="gridRadios2">
                                COD
                            </label>
                        </div>

                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-2">Accept</div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input value="accept" class="form-check-input" type="checkbox" id="gridCheck1" required>
                        <label class="form-check-label" for="gridCheck1">
                            Term & Condition
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 m-auto text-center">

                    <button type="submit" class="btn btn-primary w-25">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
            </div>
        </form>

    </div>



    @include('user.script')



</body>

</html>
