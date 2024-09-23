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
        <div style="text-align:center;" class="container-fluid page-body-wrapper ">

            <div class="table-responsive col-12">
                @if(Session::has('message'))

                <div style="margin-inline: auto;" class="alert alert-warning alert-dismissible fade show col-7" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                @endif
                <div class="conatiner">
                    <div class="row">
                    <table id="example" class="table table-striped table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">Doctor Name and Specialist</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Message</th>
                            <th scope="col">status</th>
                            <th scope="col">Send Email</th>
                            <th scope="col">Approved</th>
                            <th scope="col">UnApproved</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($data->isEmpty())

                        <tr>
                            <td colspan="8" class=" text-danger font-weight-bold">
                                <h3> No Data Found</h3>
                            </td>
                        </tr>

                        @else
                        <?php $count = 1 ?>


                        @foreach($data as $appoint)

                        <tr>
                            <th scope="row">{{$count++}} </th>
                            <td>{{$appoint->name}}</td>
                            <td>{{$appoint->email}}</td>
                            <td>{{$appoint->date}}</td>
                            <td>{{$appoint->doctor_name_and_specialist}}</td>
                            <td>{{$appoint->phone_number}}</td>
                            <td>{{$appoint->message}}</td>
                            <td>{{$appoint->status}}</td>
                            <td>
                                <a title="Send Mail" class="btn btn-success" href="{{url('view_email',$appoint->id)}}">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a title="Approved" class="btn btn-primary" href="{{url('approve_appointment',$appoint->id)}}">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a title="UnApproved" class="btn btn-danger" href="{{url('cancel_appointment',$appoint->id)}}">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                            </td>


                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>

    @include('admin.script')

</body>

</html>
