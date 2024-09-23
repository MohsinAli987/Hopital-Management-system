<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.css')
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">


    @include('admin.patient.top_nav_bar')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>

    <div class="jumbotron text-center">
        <h1>Live Search of Patient</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6" style="    margin-bottom: 20px;">
                <input type="text" class="form-control" name="search" id="search" placeholder="Enter Email or phone Number">

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Gneder</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Disease</th>
                        <th>Doctor</th>
                    </tr>
                </thead>
                <tbody id="output">

                </tbody>
            </table>
        </div>
    </div>






    <script type="text/javascript">
        const table = document.getElementById("connt");
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                url: "{{URL::to('search')}}",
                method: 'get',
                data: {
                    'search': $value
                },

                success: function(data) {
                    // $('#connt').html(data);
                    $("#output").html(data);
                    // console.log(data);

                }
            });
        })
    </script>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>


</body>

</html>
