<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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

        <div style="text-align:center;" class="container-fluid page-body-wrapper ">

            <div style="margin-top: 20px;" class="table-responsive col-12">
                @if(Session::has('message'))

                <div style="margin-inline: auto;" class="alert alert-warning alert-dismissible fade show col-7" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                @endif
                <table class="table table-striped table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">User Type</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>

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
                        @php
                        $count=1
                        @endphp
                        @foreach($data as $user)
                        <tr>
                            <th scope="row">{{$count++}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                <?php
                                if ($user->user_type == '0') {
                                    echo ("User");
                                }
                                if ($user->user_type == '1') {
                                    echo ("Admin");
                                }
                                if ($user->user_type == '2') {
                                    echo ("Doctor");
                                }
                                if ($user->user_type == '3') {
                                    echo ("Patient");
                                }
                                if ($user->user_type == '4') {
                                    echo ("Staff");
                                }
                                if ($user->user_type == '5') {
                                    echo ("Manager");
                                }
                                ?>
                            </td>
                            <td>
                                <a title="Upate" class="btn btn-success" href="{{url('edit_user_data',$user->id)}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to delete')" title="Delete" class="btn btn-danger" href="{{url('delete_user_data',$user->id)}}">
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
