<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $post = $this->route('post');
        $id = ($post ? $post->id : null);

        return [
            'title' => 'required',
            'content_filtered' => 'required',
            'slug' => 'required|unique:posts,slug,' . $id,
        ];
    }
}
