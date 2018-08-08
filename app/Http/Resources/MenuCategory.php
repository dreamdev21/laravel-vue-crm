<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MenuCategory extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'resturant_menu_id' => $this->resturant_menu_id,
            'enabled' => $this->enabled
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
