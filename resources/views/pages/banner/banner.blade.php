@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col sm-12 text-center">
                <h1 class="page-title">
                    Banner Images
                </h1>
            </div>

            <form action="{{ route('banner.store') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col sm-8">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Enter Banner Title" name="title">
                        </div>
                    </div>
                    <div class="col sm-8">
                        <div class="form-group">
                            <input class="form-control" type="file" placeholder="Enter Banner Title" name="images"
                                accept="image/jpg,image/png ">
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
                            <th scope="col">Banner Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $key => $banner)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $banner->title }}</td>
                                @isset($banner->images->name)
                                    <td><img src="{{ config('images.access_path') }}/{{ $banner->images->name }}" width="100px"
                                            alt="">
                                    </td>
                                @endisset
                                <td>
                                    Image not found
                                </td>

                                <td>
                                    @if ($banner->status == 0)
                                        <span class="badge text-bg-warning">Draft</span>
                                    @else
                                        <span class="badge text-bg-success">Publish</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a type="button" class="btn btn-danger"
                                            href= '{{ route('banner.delete', $banner->id) }}''>Delete</a>
                                        <a type="button" class="btn btn-success"
                                            href={{ route('banner.updateStatus', $banner->id) }}>Update</a>

                                        <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            onclick="taskEditModal({{ $banner->id }})">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('components.popup.popup')

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


@push('js')
    <script>
        function taskEditModal(task_id) {
            var data = {
                task_id: task_id,
            };

            $.ajax({
                url: '{{ route('banner.edit') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: '',
                data: data,
                success: function(response) {
                    $('#taskEdit').modal('show');
                    $('#taskEditContent').html(response);
                }
            });
        }
    </script>
@endpush
