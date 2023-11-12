<form action="{{ route('todo.update') }}" method="post">
    @csrf
    <div class="row">
        <div class="col sm-8">
            <div class="form-group">
                <input class="form-control" value="{{ $task->title }}" type="text" placeholder="Enter Task Name" name="title">
            </div>
        </div>
        <div class="col sm-4">
            <button class="btn btn-success" type="submit" name="submit">Update</button>
        </div>
    </div>
</form>
