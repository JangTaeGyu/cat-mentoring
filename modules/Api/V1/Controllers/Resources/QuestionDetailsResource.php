<?php

namespace Modules\Api\V1\Controllers\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Api\V1\Repositories\Models\Question;

class QuestionDetailsResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Question $resource */
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'title' => $resource->title,
            'contents' => $resource->getContentsFirst20CharOnly(),
            'created_at' => $resource->created_at instanceof Carbon
                ? $resource->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => $resource->updated_at instanceof Carbon
                ? $resource->updated_at->format('Y-m-d H:i:s') : null,
            'user' => new UserResource($resource->user),
            'answers' => AnswerResource::collection($resource->answers)
        ];
    }
}
