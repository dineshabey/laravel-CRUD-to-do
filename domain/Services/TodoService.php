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
    public function storeAPI($data)
    {

        return $this->task->create($data->all());
    }
    public function store($data)
    {

        return $this->task->create($data);
    }
    public function delete($id)
    {
        $stack = $this->task->find($id);
        return $stack->delete();
    }

    public function statusUpdate($task_id)
    {
        $task = $this->task->find($task_id);
        if ($task->done == 1) {

            $task->done = 0;
        } else {
            $task->done = 1;
        }
        $task->update();
    }
    public function update(array $data, $task_id)
    {
        $task = $this->task->find($task_id);
        $task->update($this->dataRepalacement($task, $data));

        // $task->title = $data['title'];
        // $task->update();
    }
    public function updateAPI($data, $task_id)
    {
        $task = $this->task->findORFail($task_id);
        $title = $data['title'];
        return $task->update($data->all());
    }

    protected function dataRepalacement(Todo $task, $data)
    {
        return array_merge($task->toArray(), $data);
    }

    public function get($id)
    {
        return $this->task->findOrFail($id);
    }
}
