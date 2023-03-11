<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaourselAddReq extends FormRequest
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
            'id_ad' => "required|boolean",
            "content" => 'required|string',
            "see_more" => 'required|string',
            'media' => 'image|mimes:png,jpg,jpeg|max:2048|',
            "post_id" => 'required|exists:posts,id'
        ];
    }
}
