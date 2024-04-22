<?php

namespace Modules\Core\Exceptions\Renderers;

use Illuminate\Http\Request;

interface Renderable
{
    public static function render(Request $request, \Exception $e): mixed;
}
