<!DOCTYPE html>
<html lang="en">

<head>

    @include('user.css')

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        @include('user.top_nav_bar')
    </header>

    <div style="margin-inline:auto ;" class="col-9">
        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Success !</strong> {{ session('message') }}
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr style="text-align: center;">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Doctor Name and Specialist</th>
                        <th scope="col">Status</th>
                        <th scope="col">Cancel Appointment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach($appointment as $appointments)

                    <tr style="text-align: center;">
                        <th scope="row">{{$count++}}</th>
                        <td>{{$appointments->name}}</td>
                        <td>{{$appointments->date}}</td>
                        <td>{{$appointments->doctor_name_and_specialist}}</td>
                        <td>{{$appointments->status}}</td>
                        <td>
                            <a title="Delete" class=" btn btn-danger" href="{{url('delete_appointment',$appointments->id)}}" onclick="return confirm('Are you Sure You want to delete')">

                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

</body>

</html>
