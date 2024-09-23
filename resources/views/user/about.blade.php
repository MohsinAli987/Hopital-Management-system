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

    <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">About Us</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->



    <div class="page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp">
                    <h1 class="text-center mb-3">Welcome to Your Health Center</h1>
                    <div class="text-lg">
                        <div class="et_pb_text_inner">
                            <h3 style="text-align: justify;">Department of Medical Education</h3>
                            <h4 style="text-align: justify;">Mission &amp; Vision:</h4>
                            <p style="text-align: justify;">“To provide quality education and training that will lead to the emergence of a qualified academic professional who comes up to the highest professional standards of the chosen specialty and at the same time has developed into a humane, communicative and practical individual “</p>
                            <h3 style="text-align: justify;">Departmental Profile:</h3>
                            <p style="text-align: justify;">The Medical Education department under the leadership of the Director works to ensure that our system of medical education establishes internationally acceptable criteria. Meets all the requirements of the College of Physicians &amp; Surgeons of Pakistan and other accreditation bodies, establishes clearly stated goals, puts in place plans of teaching with a clearly stated syllabus, and regularly monitors itself ensuring transparency in all aspects and continuous professional development.</p>
                            <p style="text-align: justify;">The stress is on the acquisition not only of medical skills and knowledge but equally so on the development of professionalism, a scientifically rigorous mind and the skills of managing one’s professional life.</p>
                            <p style="text-align: justify;">Our programs are as follows:</p>
                            <ul style="text-align: justify;">
                                <li>Undergraduate
                                    <ul>
                                        <li>Clerkship</li>
                                    </ul>
                                </li>
                                <li>Postgraduate
                                    <ul>
                                        <li>Internship (House Job)</li>
                                        <li>Residency</li>
                                        <li>Fellowship</li>
                                    </ul>
                                </li>
                            </ul>
                            <p style="text-align: justify;">The presence and continuous improvement of the physical infrastructure of the Hospital translate into the availability of most of the investigative, diagnostic and therapeutic equipment needed for the practice of modern medicine. Shifa International Hospital has state-of-the-art equipment for most of the specialties and indeed, some of the facilities available here are the only ones in the country. The laboratories of the Hospital have become the national benchmark in their field.</p>
                            <p style="text-align: justify;">There is no doubting the excellence of individual teachers and though individuals make a difference, Medical Education requires that all programs meet the same standards. This is only possible if there is a system in place that ensures the desired outcomes.</p>
                            <p style="text-align: justify;">It is through the rigorous application of this process that Shifa programs achieve excellence and continue to improve themselves.</p>
                            <p style="text-align: justify;">The office of Medical Education is responsible for:</p>
                            <ul style="text-align: justify;">
                                <li>Management of the learning environment and the quality of the training delivered</li>
                                <li>Provide oversight for the development, direction, and coordination of all medical education activities in the hospital (including but not limited to undergraduate, postgraduate, and continuous medical education)</li>
                                <li>Overseeing the administration of all Medical Education Programs at Shifa International Hospital Islamabad</li>
                                <li>Liaising with other internal groups and external organizations regarding Medical Education</li>
                                <li>Conducting internal program reviews of all Training Programs to ensure they meet the standards of the&nbsp;College of Physicians&nbsp;and Surgeons of Pakistan and other accreditation bodies</li>
                                <li>Promoting cross-disciplinary themes and workshops, and fostering collaboration among Training Programs</li>
                                <li>Contributing to the academic base of Medical Education</li>
                            </ul>
                            <p style="text-align: justify;">We are dedicated to the provision of a quality educational experience to enable the success of each trainee.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 mt-5">
                    @include('user.doctordata')
                </div>
            </div>
        </div>
    </div>

    @include('user.banner')


    @include('user.footer')


    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

</body>

</html>
