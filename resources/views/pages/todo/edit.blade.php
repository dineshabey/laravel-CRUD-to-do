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
