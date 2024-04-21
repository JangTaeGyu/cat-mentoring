<?php

namespace Modules\Api\V1\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Modules\Api\V1\Services\Data\SignupData;
use Modules\Core\Requests\DataTrait;

class SignupRequest extends FormRequest
{
    use DataTrait;

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'cat_breed' => 'required',
            'cat_age' => 'required|integer|min:1|max:15'
        ];
    }

    protected function getDataClass(): SignupData
    {
        return new SignupData();
    }
}
