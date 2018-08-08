<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Resturant extends Resource
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
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'enabled' => $this->enabled
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
