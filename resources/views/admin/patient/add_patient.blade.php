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

               @include('admin.success_msg')


                <form action="{{url('add_patient')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="text" class="form-control" name="patient_name" id="patient_name" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-5">
                            <select required name="patient_gender" style="color: white;" class="form-control">
                            <option value="Nothing" hidden>Select Gender</option>
                            <option value="0" >Male</option>
                                <option value="1">Female</option>
                                <option value="2">other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="number" class="form-control" name="patient_age" id="patient_age" placeholder="Enter Age">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="email" class="form-control" name="patient_email" id="patient_email" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="number" class="form-control" name="patient_phone_number" id="patient_phone_number" placeholder="Enter phone Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="text" class="form-control" name="patient_address" id="patient_address" placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Disease</label>
                        <div class="col-sm-5">
                            <input required style="color: white;" type="text" class="form-control" name="patient_disease" id="patient_disease" placeholder="Enter Disease">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Doctor</label>
                        <div class="col-sm-5">
                            <select required name="doctor_selected" style="color: white;" class="form-control">
                                <option value="Nothing" hidden>Select Specilist</option>
                                @foreach($doctor as $doctors)
                                <option value="{{$doctors->id}}">{{$doctors->name}} **SPC** {{$doctors->specialist}}</option>
                                @endforeach

                            </select>
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
