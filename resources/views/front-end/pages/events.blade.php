@extends('front-end.layouts.master')

@section('breadcrumb-title')
    Popular Causes
@endsection

@section('breadcrumb-items')
    Events
@endsection

@section('content')
    <!-- Events Start Here --->
    <section class="events">
        <div class="container">
            <x-events />
        </div>
    </section>
    <!-- Events End Here --->
@endsection
