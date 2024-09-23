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
    @include('user.success_msg')

    <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">Contact</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Get in Touch</h1>

            <form method="POST" action="{{url('get_in_touch_msg')}}" class="contact-form mt-5">
            @csrf
            <div class="row mb-3">
                    <div class="col-sm-6 py-2 wow fadeInLeft">
                        <label for="fullName">Name</label>
                        <input name="name" type="text" id="fullName" class="form-control" placeholder="Full name..">
                    </div>
                    <div class="col-sm-6 py-2 wow fadeInRight">
                        <label for="emailAddress">Email</label>
                        <input required name="email" type="email" id="emailAddress" class="form-control" placeholder="Email address..">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp">
                        <label for="subject">Subject</label>
                        <input required name="subject" type="text" id="subject" class="form-control" placeholder="Enter subject..">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp">
                        <label for="message">Message</label>
                        <textarea  name="message" id="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary wow zoomIn">Send Message</button>
            </form>
        </div>
    </div>

    <div class="maps-container wow fadeInUp">

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13280.549066149113!2d73.1952321!3d33.6795097!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfef10fa74d46d99b!2sFederal%20Urdu%20University%20of%20Arts%2C%20Sciences%20%26%20Technology%2C%20Islamabad!5e0!3m2!1sen!2s!4v1653382211341!5m2!1sen!2s" width="1350" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>

    </div>

    @include('user.banner')


    @include('user.footer')

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/google-maps.js"></script>

    <script src="../assets/js/theme.js"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>

</body>

</html>
