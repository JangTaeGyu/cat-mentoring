<?php

namespace Modules\Core\Data;

use Illuminate\Support\Collection;

class AbstractData
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function toCollection(): Collection
    {
        return collect($this->toArray());
    }
}
