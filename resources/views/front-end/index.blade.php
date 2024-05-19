@extends('front-end.layouts.master')

@section('content')
    <!-- Slider Starts Here -->
    @include('front-end.layouts.slider')
    <!-- Slider Ends Here -->

    <x-about-us />

    <!-- Events Start Here --->
    <section class="events">
        <div class="container">
            <div class="session-title row">
                <h2>Popular Causes</h2>
                <p>We are a non-profital & Charity raising money for child education</p>
            </div>
            <x-events />
        </div>
    </section>
    <!-- Events End Here --->

    <!-- Charity Number Starts Here --->
    <div class="doctor-message">
        <div class="inner-lay">
            <div class="container">
                <div class="row session-title">
                    <h2>Our Achievemtns in Numbers</h2>
                    <p>
                        We can talk for a long time about advantages of our Dental clinic before other medical treatment
                        facilities.
                        But you can read the following facts in order to make sure of all pluses of our clinic:
                    </p>
                </div>
                <!-- Charity Number Starts Here --->
                <div class="row">
                    <div class="col-sm-3 numb">
                        <h3>12+</h3>
                        <span>YEARS OF EXPEREANCE</span>
                    </div>
                    <div class="col-sm-3 numb">
                        <h3>1812+</h3>
                        <span>HAPPY CHILDRENS</span>
                    </div>
                    <div class="col-sm-3 numb">
                        <h3>52+</h3>
                        <span>EVENTS</span>
                    </div>
                    <div class="col-sm-3 numb">
                        <h3>48+</h3>
                        <span>FUNT RAISED</span>
                    </div>
                </div>
                <!-- Charity Number Ends Here --->
            </div>
        </div>
    </div>
    <!-- Charity Number Ends Here --->

    <!-- Our Team Starts Here --->
    <section class="our-team team-11">
        <div class="container">
            <div class="session-title row">
                <h2>Meet Our Dedicated Team</h2>
                <p>
                    At Here4U, we are driven by a shared passion for making a positive impact in our community. Our team is composed of dynamic and compassionate individuals, each bringing unique skills and perspectives to our mission. Together, we work tirelessly to raise awareness, provide support, and create lasting change. Get to know the inspiring people behind Here4U.
                </p>
            </div>
            <div class="row team-row">
                <div class="col-md-12">
                    <div class="single-usr">
                        <img src="{{ asset('assets/images/team/team.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Team Ends Here --->

    <!-- Our Blog Starts Here --->
    <section class="our-blog">
        <div class="container">
            <div class="row session-title">
                <h2> Our Blog </h2>
                <p>Take a look at what people say about US </p>
            </div>
            <x-blogs />
        </div>
    </section>
@endsection
