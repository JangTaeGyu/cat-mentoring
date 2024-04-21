<?php

namespace Modules\Api\V1\Services\Data;

use Modules\Core\Data\AbstractData;

class SearchQuestionData extends AbstractData
{
    protected ?int $page = 1;
    protected ?int $per_page = 6;

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): void
    {
        $this->page = $page;
    }

    public function getPerPage(): ?int
    {
        return $this->per_page;
    }

    public function setPerPage(?int $per_page): void
    {
        $this->per_page = $per_page;
    }
}
