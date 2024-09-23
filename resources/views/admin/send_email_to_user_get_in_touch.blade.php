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

        <div class="container-fluid page-body-wrapper">

            <div role="alert" class="container" align="center" style="margin-top: 30px; text-align: left;">

                @include('admin.success_msg')



                <form action="{{url('send_mail_to_all_in_touch_msg',$data->id)}}" method="POST" >
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Greeting</label>
                        <div class="col-sm-5">
                            <input style="color: white;" type="text" class="form-control" name="greeting" id="Greeting" placeholder="Enter Greeting">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Body</label>
                        <div class="col-sm-5">
                            <textarea style="color: white;" class="form-control" name="body" placeholder="Enter Email Body"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Action Text</label>
                        <div class="col-sm-5">
                            <input style="color: white;" type="text" class="form-control" name="action_text" id="action_text" placeholder="Enter Action Text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Action Url</label>
                        <div class="col-sm-5">
                            <input style="color: white;" type="text" class="form-control" name="action_url" id="action_url" placeholder="Enter action URL">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">End Part</label>
                        <div class="col-sm-5">
                            <input style="color: white;" type="text" class="form-control" name="end_part" id="end_part" placeholder="Enter end part">

                        </div>
                    </div>



                    <button title="Send Mail" style="margin: 10px 0px 0px 146px; width: 70px;" type="submit" class="btn btn-success">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    </button>


                </form>
            </div>

        </div>

        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>

    @include('admin.script')

</body>

</html>
