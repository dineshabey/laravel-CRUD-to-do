<?php

namespace domain\Services;
use App\Models\Todo;

class TodoService
{
    protected $task;
    public function __construct()

    {
        $this->task = new Todo();
    }

    public function all()
    {
        return $this->task->all();
    }
    public function store($data)
    {
        $this->task->create($data);
    }
    public function delete($id)
    {
        $stack = $this->task->find($id);
        $stack->delete();
    }

    public function statusUpdate($task_id)
    {
        $task = $this->task->find($task_id);
        $task->done = 1;
        $task->update();
    }
    public function update($id)
    {


        return redirect()->back();
    }
}
