<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> -->

</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')

        <!-- partial -->
        <div style="text-align:center;" class="container-fluid page-body-wrapper ">

            <div style="margin-top: 24px;" class="table-responsive col-12">
                @if(Session::has('message'))

                <div style="margin-inline: auto;" class="alert alert-warning alert-dismissible fade show col-7" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                @endif
                <table id="example" class="table table-striped table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Room No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Specialist</th>
                            <th scope="col">Image</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>

                        @if($doctor_data->isEmpty())

                        <tr>
                            <td colspan="8" class=" text-danger font-weight-bold">
                                <h3> No Data Found</h3>
                            </td>
                        </tr>

                        @else
                        <?php $count=1 ?>

                        @foreach($doctor_data as $doctors)


                        <tr>
                            <th scope="row">{{$count++}}</th>
                            <td>{{$doctors->name}}</td>
                            <td>{{$doctors->room_no}}</td>
                            <td>{{$doctors->email}}</td>
                            <td>{{$doctors->phone_number}}</td>
                            <td>{{$doctors->specialist}}</td>
                            <td> <img src="doctorimage/{{$doctors->image}}" alt="Doctor Image"> </td>
                            <td>
                                <a title="Update" class="btn btn-success" href="{{url('edit_doctor',$doctors->id)}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete')" href="{{url('delete_doctor',$doctors->id)}}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
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
