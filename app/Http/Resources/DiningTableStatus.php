<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class DiningTableStatus extends Resource
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
            'status' => $this->status
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
