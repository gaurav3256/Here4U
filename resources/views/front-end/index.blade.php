@extends('front-end.layouts.master')

@section('content')
    <!-- Slider Starts Here -->
    @include('front-end.layouts.slider')
    <!-- Slider Ends Here -->

    <x-about-us />

    <!-- Events Start Here --->
    {{-- <section class="events">
        <div class="container">
            <div class="session-title row">
                <h2>Popular Causes</h2>
                <p>We are a non-profit organization dedicated to raising funds for child education.</p>
            </div>
            <x-events />
        </div>
    </section> --}}
    <!-- Events End Here --->

    <!-- Charity Number Starts Here --->
    <div class="doctor-message">
        <div class="inner-lay">
            <div class="container">
                <div class="row session-title">
                    <h2>Our Achievemtns in Numbers</h2>
                    <p>
                        Our journey has been marked by significant milestones and accomplishments. Here are some key numbers
                        that reflect our impact and dedication:
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
                    At Here4U, we are united by a shared passion for making a positive impact in our community. Our team
                    consists of dynamic and compassionate individuals, each bringing unique skills and perspectives to our
                    mission. Together, we work tirelessly to raise awareness, provide support, and create lasting change.
                    Meet the inspiring people behind Here4U.
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
                <h2>Our Blog</h2>
                <p>Stay updated with the latest news and stories from Here4U.</p>
            </div>
            <x-blogs :blogs="$blogs" />
        </div>
    </section>
@endsection
