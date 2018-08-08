<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Customer extends Resource
{

    public function toArray($request)
    {
     return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'enabled' => $this->enabled,
            ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
