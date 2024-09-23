<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public" >
    @include('admin.css')
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

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

            <div role="alert" class="container" align="center" style="margin-top: 30px; text-align: left;">



                <form action="{{url('add_medicine',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input required value="{{$data->name}}" style="color: white;" type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Manufacturer</label>
                        <div class="col-sm-5">
                            <input required value="{{$data->manufacturer}}" style="color: white;" type="Text" class="form-control" name="manufacturer" id="manufacturer" placeholder="Enter Manufacturer">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-5">
                            <input required value="{{$data->category}}" style="color: white;" type="text" class="form-control" name="category" id="category" placeholder="Enter Category">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-5">
                            <input required value="{{$data->price}}" style="color: white;" type="number" class="form-control" name="price" id="price" placeholder="Enter Price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Old Image</label>

                        <div class="col-sm-5">
                            <img height="100px" width="100px" src="pharmacy_medicine/{{$data->image}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-5">
                            <input  style="color: white;" type="file" class="form-control" name="image" id="image" placeholder="Select Image">
                        </div>
                    </div>

                    <button title="Save" style="margin: 10px 0px 0px 146px;" type="submit" class="btn btn-success">
                        <i class="fa fa-save" aria-hidden="true"  ></i>
                    </button>


                </form>
            </div>

        </div>


        <!-- main-panel ends -->

        <!-- page-body-wrapper ends -->
    </div>

    @include('admin.script')

</body>

</html>
