<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            <div class=" table-responsive">

                    @include('order.success_msg')


                <table id="example" class="table table-striped table-dark table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Order No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Address</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Price</th>

                            <th scope="col">Image</th>
                            <th scope="col">Shipped</th>
                            <th scope="col">Cancel</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if($orders->isEmpty())

                        <tr>
                            <td colspan="8" class=" text-danger font-weight-bold">
                                <h3>No data found for ship</h3>
                            </td>
                        </tr>

                        @else
                        @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->or_id}}</th>
                            <td>{{$order->name}}</td>
                            <td>{{$order->category}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->price+10}}</td>

                            <td>
                                <img src="pharmacy_medicine/{{$order->image}}" alt="Product Img">
                            </td>


                            <td>
                                <a title="Shipped" class="btn btn-success" href="{{url('shipped_order',$order->or_id)}}">
                                    <i class="fa fa-shipping-fast" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to cancel order')" title="Delete" class="btn btn-danger" href="{{url('canacel_order',$order->or_id)}}">
                                    <i class="fa fa-cancel" aria-hidden="true"></i>
                                </a>
                            </td>


                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>



            </div>
        </div>

        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>

    @include('admin.script')

</body>

</html>
