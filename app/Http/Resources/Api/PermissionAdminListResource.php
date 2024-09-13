<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;


class PermissionAdminListResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)

    {
        // return parent::toArray($request);
        return [
            'id' => (int) @$this->id,
            'name' =>    $this->name,
            'guard_name' => $this->guard_name,
            'edit_link' =>   route('admin.rap.permissions.edit', ['permission' =>  @$this->id]),
            'created_at' =>     @$this->created_at->diffForHumans(),

        ];
    }
}
