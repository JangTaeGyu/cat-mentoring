<?php

namespace Modules\Api\V1\Controllers\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionCollection extends ResourceCollection
{
    use PaginationTrait;

    public $collects = QuestionResource::class;

    public function toArray($request): array
    {
        return [
            'data' => $this->collection,
            'pagination' => $this->pagination,
        ];
    }
}
