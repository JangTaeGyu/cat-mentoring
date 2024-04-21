<?php

namespace Modules\Api\V1\Controllers\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Api\V1\Repositories\Models\Answer;

class AnswerResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Answer $resource */
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'contents' => $resource->contents,
            'created_at' => $resource->created_at instanceof Carbon
                ? $resource->created_at->format('Y-m-d H:i:s') : null,
            'accepted_at' => $resource->accepted_at instanceof Carbon
                ? $resource->accepted_at->format('Y-m-d H:i:s') : null,
            'user' => new UserResource($resource->user),
        ];
    }
}
