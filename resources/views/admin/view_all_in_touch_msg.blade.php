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
                            <th scope="col">subject</th>
                            <th scope="col">message</th>
                            <th scope="col">Send Mail</th>
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

                        @foreach($data as $all_msg_data)
                        <tr>
                            <th scope="row">{{$count++}}</th>
                            <td>{{$all_msg_data->name}}</td>
                            <td>{{$all_msg_data->email}}</td>
                            <td>{{$all_msg_data->message}}</td>
                            <td>{{$all_msg_data->subject}}</td>

                            <td>
                                <a title="Reply" class="btn btn-success" href="{{url('view_user_get_in_touch_msg_email',$all_msg_data->id)}}">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to delete')" title="Delete" class="btn btn-danger" href="{{url('delete_in_touch_msg_data',$all_msg_data->id)}}">
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
