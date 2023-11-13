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
                @csrf
                <div class="row">
                    <div class="col sm-8">

                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter Task Name" name="title">
                        </div>
                    </div>
                    <div class="col sm-4">
                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $task->title }}</td>
                                <td>
                                    @if ($task->done == 1)
                                        <span class="badge text-bg-success">Completed</span>
                                    @else
                                        <span class="badge text-bg-warning">Not completed</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a type="button" class="btn btn-danger"
                                            href= '{{ route('todo.delete', $task->id) }}''>Delete</a>
                                        <button type="button" class="btn btn-warning">Middle</button>
                                        <a type="button" class="btn btn-success"
                                            href={{ route('todo.update', $task->id) }}>Update</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
