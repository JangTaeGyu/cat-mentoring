<?php

namespace Modules\Api\V1\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Api\V1\Services\Data\InputQuestionData;
use Modules\Core\Requests\DataTrait;

class InputQuestionRequest extends FormRequest
{
    use DataTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'contents' => 'required'
        ];
    }

    protected function getDataClass(): InputQuestionData
    {
        return new InputQuestionData();
    }
}
