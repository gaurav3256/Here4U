<!--  Gallery Starts Here -->
<div id="portfolio" class="gallery">
    <div class="container">
        <div class="row">
            <div class="gallery-filter d-none d-sm-block">
                <button class="btn btn-default filter-button" data-filter="all">All</button>
                @foreach ($collections as $collection)
                    <button class="btn btn-default filter-button" data-filter="{{ Str::slug($collection->name) }}">
                        {{ $collection->name }}
                    </button>
                @endforeach
            </div>
            <br />

            @foreach ($collections as $collection)
                @foreach ($collection->media as $media)
                    @if (is_array($media->path))
                        <!-- Check if $media->path is an array -->
                        @foreach ($media->path as $image)
                            <div
                                class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 filter {{ Str::slug($collection->name) }}">
                                <img src="{{ asset('storage/' . $image) }}" class="img-responsive">
                            </div>
                        @endforeach
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
<!-- Gallery End -->
