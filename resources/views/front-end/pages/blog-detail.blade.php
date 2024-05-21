@extends('front-end.layouts.master')

@section('breadcrumb-title')
    <span>{{ $blog->title }}</span>
@endsection

@section('breadcrumb-items')
    <a href="{{ route('blogs.index') }}">Blogs</a>
@endsection

@section('content')
<section class="blog-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
                <div class="blog-content">
                    <h2>{{ $blog->title }}</h2>
                    <div class="blog-meta">
                        <span>By {{ $blog->user->name }}</span>
                        <span>{{ $blog->created_at->format('F d, Y') }}</span>
                    </div>
                    <div class="blog-image mt-5">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; height: auto;">
                    </div>
                    <div class="blog-summary mt-5">
                        {!! $blog->summary !!}
                    </div>
                    <div class="blog-body mb-5 mt-5">
                        @foreach ($blog->body as $block)
                            @if ($block['type'] === 'section_title')
                                <{{ $block['data']['level'] }}>{{ $block['data']['title'] }}
                                    </{{ $block['data']['level'] }}>
                                @elseif ($block['type'] === 'paragraph')
                                    <p>{{ $block['data']['content'] }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
