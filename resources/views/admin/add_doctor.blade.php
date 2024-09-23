<!DOCTYPE html>
<html lang="en">

<head>
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

                @if(Session::has('message'))

                <div style="margin-inline: auto;" class="alert alert-warning alert-dismissible fade show col-7" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                @endif

                <form action="{{url('add_doctor_data')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="text" class="form-control" name="doctor_name" id="doctor_name" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Room No</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="number" class="form-control" name="doctor_room_no" id="doctor_room_no" placeholder="Enter Room No">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="email" class="form-control" name="doctor_email" id="doctor_email" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="number" class="form-control" name="doctor_phone_number" id="doctor_phone_number" placeholder="Enter phone Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Specilist</label>
                        <div class="col-sm-5">
                            <select required name="doctor_specialist" style="color: white;" class="form-control">
                                <option value="Nothing" hidden>select Specilist</option>
                                <option value="general">General Health</option>
                                <option value="cardiology">Cardiology</option>
                                <option value="dental">Dental</option>
                                <option value="neurology">Neurology</option>
                                <option value="orthopaedics">Orthopaedics</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="file" class="form-control" name="doctor_image" id="doctor_image" placeholder="Select Image">
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
