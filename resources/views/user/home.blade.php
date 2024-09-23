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

    <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">Let's make your life happier</span>
                <h1 class="display-4">Healthy Living</h1>
                <a href="contact" class="btn btn-primary">Let's Consult</a>
            </div>
        </div>
    </div>


    <div class="bg-light">
        <div class="page-section py-3 mt-md-n5 custom-index">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-secondary text-white">
                                <span class="mai-chatbubbles-outline"></span>
                            </div>
                            <p><span>Chat</span> with a doctors</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-primary text-white">
                                <span class="mai-shield-checkmark"></span>
                            </div>
                            <p><span>One</span>-Health Protection</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="mai-basket"></span>
                            </div>
                            <p><span>One</span>-Health Pharmacy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .page-section -->

        <div class="page-section pb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1>Welcome to Your Health <br> Center</h1>
                        <p class="text-grey mb-4">The health information on this Web site is provided by the hospital solely for informational purposes as a public service to enhance customer service for our customers and to promote consumer health. It does not constitute medical advice and is not intended to be a substitute for proper medical care provided by a qualified health care professional. The hospital assumes no responsibility for any circumstances arising out of the use, misuse, interpretation or application of any information supplied on this site. Always consult with your health care professional for appropriate examinations, treatment, testing, and care recommendations. Do not rely on information on this site as a tool for self-diagnosis. If you have a specific medical condition, please contact your health care provider. Use of this Web site does not replace medical consultations with a qualified health or medical professional to meet the health and medical needs of you or a loved one. Please check with a physician or health professional if you suspect you are ill.

                            You exercise your own judgment when using or purchasing any product or selecting a health care professional through any site or service linked to this Web site.</p>
                        <a href="/about" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                        <div class="img-place custom-img-1">
                            <img src="../assets/img/bg-doctor.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->

    @include('user.doctordata')
    <!-- @include('user.latestnew') -->

    @auth
    @include('user.appointment')
    @endauth





    @include('user.banner')


    @include('user.footer')

    @include('user.script')



</body>

</html>
