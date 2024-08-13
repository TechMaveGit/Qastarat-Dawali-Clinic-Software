@extends('front.layout.main_view')
@push('title')
    Terms | QASTARAT & DAWALI CLINICS
@endpush
@section('content-section')
    <style>
        .content_div {
            margin: 45px 0px;
        }

        .content_div h4 {
            color: rgb(0, 152, 183);
        }

        ul {
            list-style: disc;
            margin-left: 40px;
        }

        a{
         color: #0075db;
        }
    </style>
    <section id="hero-15" class="bg--scroll innerbannerSection hero-section"
        style="background-image: url({{ asset('/assets/images/new-images/page-title.jpg') }});">
        <div class="container">
            <!-- <div id="owl-carousel" class="service_slider owl-carousel owl-theme"></div> -->
            <div class="row d-flex ">

                <div class="col-lg-12">
                    <div class="center_section">
                        {{-- <h6 class="center_sub_title">Terms & Conditions</h6> --}}
                        <h1 class="center_title">Terms & Conditions</h1>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="row">
        <div class="col-md-12">
            <div class="container">

                <p>
                <div class="content_div">
                    <h4>Booking Policy</h4>
                    <p>All patients bookings are By appointment only. The clinic does not accept walk-in patients.</p>
                </div>

                <div class="content_div">
                    <h4>Healthcare Terms & Conditions</h4>
                    <p>All healthcare Services are Consultant based only. Our consultants are highly trained highly
                        experienced and board certified. Our practice is based on international standards and guidelines and
                        regularly updated parallel to scientific clinical evidence.</p>
                </div>

                <div class="content_div">
                    <h4>Services Provided</h4>
                    <p>This Whatsapp API will help the patients to the following
                    <ul>
                        <li>Receive appointment scheduling and reminders</li>
                        <li>Patient data management</li>
                        <li>Treatment tracking and documentation</li>
                        <li>Secure messaging between patients and healthcare providers</li>
                    </ul>
                    </p>
                </div>

                <div class="content_div">
                    <h4>Pricing</h4>
                    <p>Qastarat and Dawali Clinics reserves the right to cancel contracts based upon incorrect information
                        being displayed in relation to price or service at any point in time. Unless otherwise stated or
                        where required by local law, prices shall be stated in the currency of the Omani Riyal.</p>
                </div>

                <div class="content_div">
                    <h4>Disclaimer</h4>
                    <p>Qastarat and Dawali Clinics reserves the right to revoke any stated offer and to correct any errors,
                        inaccuracies or omissions. All services are subject to change without prior notice.</p>
                </div>

                <div class="content_div">
                    <h4>Privacy and Patient Confidentiality</h4>
                    <p>Patient privacy and confidentiality is important to us. Qastarat and Dawali Clinics are always
                        getting a consent before you share your details.</p>
                </div>

                <div class="content_div">
                    <h4>Contact us</h4>
                    <p>If you have any questions about these Terms, please contact us</p>
                    <p> Oman: <a href="tel:+968 9200 0230">+968 9200 0230</a></p>
                    <p> Dubai: <a href="tel:+971 581 114000">+971 581 114000</a></p>
                    <p> Saudi: <a href="tel:+966 56 060 0614">+966 56 060 0614</a></p>
                    <p> Bahrain: <a href="tel:+973 3360 0620">+973 3360 0620</a></p>
                    <p>Or email us at <a href="mailto:happy@qastaratclinics.com">happy@qastaratclinics.com</a></p>
                </div>

                </p>

            </div>
        </div>
    </div>
@endsection
