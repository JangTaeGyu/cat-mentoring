<?php

namespace Modules\Api\V1\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Api\V1\Services\Data\InputAnswerData;
use Modules\Core\Requests\DataTrait;

class InputAnswerRequest extends FormRequest
{
    use DataTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contents' => 'required'
        ];
    }

    protected function getDataClass(): InputAnswerData
    {
        return new InputAnswerData();
    }
}
