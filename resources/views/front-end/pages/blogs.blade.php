@extends('front-end.layouts.master')

@section('breadcrumb-title')
    Our Blog
@endsection

@section('breadcrumb-items')
    Blog
@endsection

@section('content')
    <!-- Our Blog Starts Here --->
    <section class="our-blog">
        <div class="container">
            <x-blogs />
        </div>
    </section>
@endsection
