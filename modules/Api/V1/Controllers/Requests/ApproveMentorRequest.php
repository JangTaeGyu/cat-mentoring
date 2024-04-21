<?php

namespace Modules\Api\V1\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Modules\Api\V1\Services\Data\ApproveMentorData;
use Modules\Core\Requests\DataTrait;

class ApproveMentorRequest extends FormRequest
{
    use DataTrait;

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer'
        ];
    }

    protected function getDataClass(): ApproveMentorData
    {
        return new ApproveMentorData();
    }
}
