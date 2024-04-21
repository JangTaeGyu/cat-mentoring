<?php

namespace Modules\Core\Exceptions\Renderers;

interface Renderable
{
    public function render($request, \Exception $e): mixed;
}
