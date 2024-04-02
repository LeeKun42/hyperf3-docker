<?php

namespace App\Resource;

use Hyperf\Resource\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'      => $this->id,
            'uuid'    => $this->uuid,
            'name'    => $this->name,
            'headimg' => $this->headimg,
            'phone'   => $this->phone,
        ];
    }
}
