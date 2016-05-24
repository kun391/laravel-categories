<?php

namespace Kun\Categories\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * Class UpdatePageRequest
 * @package PhpSoft\Pages\Http\Requests
 */
class SaveCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'sometimes|required|string|max:255',
        ];
    }
}
