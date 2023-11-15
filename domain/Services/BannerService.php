<?php

namespace domain\Services;

use App\Models\Banner;
use infrastructure\Facades\ImageFacade;

class BannerService
{
    protected $banner;
    public function __construct()

    {
        $this->banner = new Banner();
    }

    public function all()
    {
        return $this->banner->all();
    }
    public function store($data)
    {
        // dd($data);

        if (isset($data['images'])) {
            $image = ImageFacade::store($data['images'], [1, 2, 3, 4, 5]);
            $data['image_id'] = $image['created_images']->id;
        }
        $this->banner->create($data);
    }
    public function delete($id)
    {
        $stack = $this->banner->find($id);
        $stack->delete();
    }

    public function statusUpdate($banner_id)
    {
        $banner = $this->banner->find($banner_id);
        $banner->done = 1;
        $banner->update();
    }
    public function update(array $data, $banner_id)
    {
        $banner = $this->banner->find($banner_id);
        $banner->update($this->dataRepalacement($banner, $data));

        // $banner->title = $data['title'];
        // $banner->update();
    }

    protected function dataRepalacement(Banner $banner, $data)
    {
        return array_merge($banner->toArray(), $data);
    }

    public function get($id)
    {
        return $this->banner->find($id);
    }
}
