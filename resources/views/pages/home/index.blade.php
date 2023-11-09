@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col sm 12 text-center">
                <h1 class="page-title">Home Page</h1>
            </div>
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
