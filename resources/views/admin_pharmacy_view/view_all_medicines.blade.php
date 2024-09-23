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
                @include('user.success_msg')
                <table class="table table-striped table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
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

                        @foreach($data as $medicine_record)
                        <tr>
                            <th scope="row"> {{$count++}} </th>
                            <td>{{$medicine_record->name}}</td>
                            <td>{{$medicine_record->manufacturer}}</td>
                            <td>{{$medicine_record->category}}</td>
                            <td>{{$medicine_record->price}}</td>
                            <td>
                                <img src="pharmacy_medicine/{{$medicine_record->image}}" alt="Medicine img">
                            </td>

                            <td>
                                <a title="Upate" class="btn btn-success" href="{{url('edit_medicine_data',$medicine_record->id)}}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Are you sure you want to delete')" title="Delete" class="btn btn-danger" href="{{url('delete_medicine_data',$medicine_record->id)}}">
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
