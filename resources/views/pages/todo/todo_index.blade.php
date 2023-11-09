@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col sm-12 text-center">
                <h1 class="page-title">
                    To-Do-List
                </h1>
            </div>

            <form action="{{ route('todo.store') }}" method="post">
                <div class="row text-center">
                    <div class="col sm-8">

                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter Task Name" name="task">
                        </div>
                    </div>
                    <div class="col sm-4">
                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 5vh;
            font-size: 5rem;
            color: rgb(66, 202, 48);
        }
    </style>
@endpush
