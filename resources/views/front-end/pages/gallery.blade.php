@extends('front-end.layouts.master')

@section('breadcrumb-title')
    Our Gallery
@endsection

@section('breadcrumb-items')
    Gallery
@endsection

@section('css')
    <style>
        .gallery_product {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .gallery_product.show {
            opacity: 1;
            transform: translateY(0);
        }

        .gallery_product.hide {
            opacity: 0;
            transform: translateY(20px);
        }
    </style>
@endsection

@section('content')
    <x-gallery :collections="$collections" />
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-button');
            const filterItems = document.querySelectorAll('.filter');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    filterItems.forEach(item => {
                        if (filter === 'all' || item.classList.contains(filter)) {
                            item.classList.remove('hide');
                            item.classList.add('show');
                        } else {
                            item.classList.remove('show');
                            item.classList.add('hide');
                        }
                    });
                });
            });
            // Trigger a click on the "All" button to show all items initially
            document.querySelector('.filter-button[data-filter="all"]').click();
        });
    </script>
@endsection
