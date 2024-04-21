<?php

namespace Modules\Api\V1\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Api\V1\Services\Data\SearchQuestionData;
use Modules\Core\Requests\DataTrait;

class SearchQuestionRequest extends FormRequest
{
    use DataTrait;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => 'nullable|integer',
            'per_page' => 'nullable|integer',
        ];
    }

    protected function getDataClass(): SearchQuestionData
    {
        return new SearchQuestionData();
    }
}
