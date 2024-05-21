<div class="blog-row row">
    @if ($blogs->isEmpty())
        <div class="col-12">
            <div class="alert alert-info" role="alert">
                There are no blog posts available at the moment. Please check back later.
            </div>
        </div>
    @else
        @foreach ($blogs as $blog)
            <div class="col-md-4 col-sm-6">
                <div class="single-blog">
                    <figure>
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                    </figure>
                    <div class="blog-detail">
                        <small>By {{ $blog->user->name }} | {{ $blog->created_at->format('F d, Y') }}</small>
                        <h4>{{ $blog->title }}</h4>
                        <p>{{ Str::limit($blog->summary, 150) }}</p>
                        <div class="link">
                            <a href="{{ route('blogs.show', $blog->id) }}">Read more </a><i
                                class="fas fa-long-arrow-alt-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
