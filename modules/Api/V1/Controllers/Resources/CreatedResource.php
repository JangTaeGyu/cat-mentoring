<?php

namespace Modules\Api\V1\Controllers\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class CreatedResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Model $resource */
        $resource = $this->resource;

        return [
            'id' => $resource->id,
        ];
    }
}
