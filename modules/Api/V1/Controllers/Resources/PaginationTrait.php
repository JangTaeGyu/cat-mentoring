<?php

namespace Modules\Api\V1\Controllers\Resources;

trait PaginationTrait
{
    protected $pagination = null;

    public function __construct($resource)
    {
        $this->pagination = [
            'current_page' => $resource->currentPage(),
            'per_page' => $resource->perPage(),
            'total' => $resource->total(),
        ];

        $resource = $resource->getCollection();

        parent::__construct($resource);
    }
}
