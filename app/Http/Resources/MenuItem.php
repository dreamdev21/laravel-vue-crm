<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MenuItem extends Resource
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
            'description' => $this->description,
            'menu_categories_id' => $this->menu_categories_id,
            'price' => $this->price,
            'enabled' => $this->enabled,
            
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
