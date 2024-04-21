<?php

namespace Modules\Api\V1\Controllers\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Api\V1\Repositories\Models\User;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var User $resource */
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'cat_breed' => $resource->cat_breed,
            'cat_age' => $resource->cat_age,
            'signup_at' => $resource->signup_at instanceof Carbon
                ? $resource->signup_at->format('Y-m-d H:i:s') : null
        ];
    }
}
