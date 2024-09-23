<?php

use App\Models\Doctor; ?>
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
               @include('admin.success_msg')
                <table id="example" class="table table-striped table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Disease</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>


                        </tr>
                    </thead>
                    <tbody>

                        @if($patient->isEmpty())

                        <tr>
                            <td colspan="8" class=" text-danger font-weight-bold">
                                <h3> No Data Found</h3>
                            </td>
                        </tr>

                        @else
                        <?php $count = 1 ?>

                        @foreach($patient as $patients)


                        <tr>
                            <th scope="row">{{$count++}}</th>
                            <td>{{$patients->name}}</td>
                            <td>
                            <?php
                                if ($patients->gender == '0') {
                                    echo ("Male");
                                }
                                if ($patients->gender == '1') {
                                    echo ("Female");
                                }
                                if ($patients->gender == '2') {
                                    echo ("Other");
                                }

                                ?>
                            </td>
                            <td>{{$patients->age}}</td>
                            <td>{{$patients->email}}</td>
                            <td>{{$patients->phone_number}}</td>
                            <td>{{$patients->address}}</td>
                            <td>{{$patients->disease}}</td>
                            <td>
                                <?php
                                $p_id = $patients->doctor;
                                $pt = Doctor::find($p_id);
                                ?>
                                {{$pt->name}}
                            </td>

                            <td>
                                <a title="Update" class="btn btn-success" href="{{url('edit_patient',$patients->id)}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete')" href="{{url('delete_patient',$patients->id)}}">
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
