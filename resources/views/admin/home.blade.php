<!DOCTYPE html>
<html lang="en">
  <head>
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

        @include('user.success_msg')

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    @include('admin.script')

  </body>
</html>
