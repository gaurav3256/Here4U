@extends('front-end.layouts.master')

@section('title', 'Contact Us')

@section('breadcrumb-title', 'Contact Us')

@section('breadcrumb-items', 'Contact Us')

@section('content')
    <div style="margin-top:0px;" class="row no-margin">
        <iframe
            style="width:100%; border:0"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3556.835576490857!2d75.74064467522538!3d26.940426576630607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db3cf2299f6a7%3A0x7cc35cfde73f1c8a!2sHere4u%20Jaipur!5e0!3m2!1sen!2sin!4v1716043314148!5m2!1sen!2sin"
            height="450"
            frameborder="0" allowfullscreen>
        </iframe>
    </div>

    <div class="row contact-rooo no-margin">
        <div class="container">
            <div class="row">
                <div style="padding:20px" class="col-sm-7">
                    <h2>Contact Form</h2> <br>
                    <div id="response-message" class="alert" style="display: none;"></div>
                    <form id="contact-form">
                        @csrf
                        <div class="row cont-row">
                            <div class="col-sm-3"><label for="name">Enter Name </label><span>:</span></div>
                            <div class="col-sm-8">
                                <input type="text" id="name" name="name" placeholder="Enter Name" class="form-control input-sm mb-0" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row cont-row mt-3">
                            <div class="col-sm-3"><label for="email">Email Address </label><span>:</span></div>
                            <div class="col-sm-8">
                                <input type="email" id="email" name="email" placeholder="Enter Email Address" class="form-control input-sm mb-0" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row cont-row mt-3">
                            <div class="col-sm-3"><label for="phone">Mobile Number</label><span>:</span></div>
                            <div class="col-sm-8">
                                <input type="text" id="phone" name="phone" placeholder="Enter Mobile Number" class="form-control input-sm mb-0" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row cont-row mt-3">
                            <div class="col-sm-3"><label for="message">Enter Message</label><span>:</span></div>
                            <div class="col-sm-8">
                                <textarea rows="5" id="message" name="message" placeholder="Enter Your Message" class="form-control input-sm mb-0">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary btn-sm">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-5">
                    <div style="margin:50px" class="serv">
                        <h2 style="margin-top:10px;">Address</h2>
                        <address class="md-margin-bottom-40">
                            1b Shri Ram Nagar, Khirni Phatak Road,<br>
                            Near Maharana Pratap School,<br>
                            Kalwar road, Jhotwara,<br>
                            Jaipur, Rajasthan - 302012 <br>
                            Email: Here4u.jaipur@gmail.com</a><br>
                            Phone: +91 72199 99099 <br> +91 86194 12780
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#contact-form').on('submit', function (event) {
                event.preventDefault(); // Prevent default form submission

                // Clear previous error messages
                $('.error-text').remove();
                $('#response-message').removeClass('alert-success alert-danger').hide();

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('contact-us.store') }}",
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        if (response.success) {
                            $('#response-message').addClass('alert-success').text(response.message).show();
                            $('#contact-form')[0].reset(); // Reset form
                        } else {
                            $('#response-message').addClass('alert-danger').text('Something went wrong. Please try again later.').show();
                        }
                    },
                    error: function (response) {
                        // Clear previous error messages before displaying new ones
                        $('.error-text').remove();

                        if (response.status === 422) { // Validation error
                            $.each(response.responseJSON.errors, function (key, value) {
                                let inputElement = $('#' + key);
                                if (inputElement.next('.error-text').length === 0) {
                                    inputElement.after('<span class="text-danger error-text">' + value[0] + '</span>');
                                }
                            });
                        } else {
                            $('#response-message').addClass('alert-danger').text('An error occurred. Please try again later.').show();
                        }
                    }
                });
            });
        });
    </script>
@endsection

