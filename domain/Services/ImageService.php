<?php

namespace domain\Services;

use App\Models\Image;

class ImageService
{
    protected $image;
    public function __construct()

    {
        $this->image = new Image();
    }

    public function all()
    {
        return $this->image->all();
    }
    public function store($data)
    {
        $this->image->create($data);
    }
    public function delete($id)
    {
        $stack = $this->image->find($id);
        $stack->delete();
    }

    public function statusUpdate($image_id)
    {
        $image = $this->image->find($image_id);
        $image->done = 1;
        $image->update();
    }
    public function update(array $data, $image_id)
    {
        $image = $this->image->find($image_id);
        $image->update($this->dataRepalacement($image, $data));

        // $image->title = $data['title'];
        // $image->update();
    }

    protected function dataRepalacement(Image $image, $data)
    {
        return array_merge($image->toArray(), $data);
    }

    public function get($id)
    {
        return $this->image->find($id);
    }
}
