<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Reservation extends Resource
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
            'reservation_date' => $this->reservation_date,
            'customer_id' => $this->customer_id,
            'dining_table_id' => $this->dining_table_id,
            'enabled' => $this->enabled,
            
        ];
    }
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
