@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col sm-12 text-center">
                <h1 class="page-title">
                    To-Do-List
                </h1>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 15vh;
            font-size: 5rem;
            color: rgb(66, 202, 48);
        }
    </style>
@endpush
