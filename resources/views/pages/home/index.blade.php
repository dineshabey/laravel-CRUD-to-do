@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col sm 12 text-center">
                <h1 class="page-title">Home Page</h1>
            </div>
        </div>

        <div class="row justify-content-center">
            @forelse ($banners as $banner)
                <div class="card " style="width: 18rem; margin:5px">
                    @isset($banner->images->name)
                        <img src="{{ config('images.access_path') }}/{{ $banner->images->name }}" alt="banner images"
                            height="90%" style="padding:5px">
                    @else
                        <h3>No Image</h3>
                    @endisset

                    <div class="card-body">
                        <h5 class="card-title">{{ $banner->title }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <h2 class="text-danger">
                        No Banner Found !
                    </h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection


@push('css')
    <style>
        .page-title {
            padding-top: 5vh;
            font-size: 5rem;
            color: blueviolet;
        }
    </style>
@endpush
