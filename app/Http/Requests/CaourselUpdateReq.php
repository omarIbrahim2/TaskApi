<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaourselUpdateReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_ad' => 'sometimes|boolean',
            'content' => 'sometimes|string',
            'see_more' => 'sometimes|string',
            'media' => 'image|mimes:png,jpg,jpeg|max:2048',
            'post_id' => 'sometimes|exists:posts,id',
        ];
    }
}
