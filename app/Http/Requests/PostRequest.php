<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if( $this->post )
        {
            $post_id = ',' . $this->post->id;
        } else {
            $post_id = '';
        }

        return [
            'title' => 'required',
            'slug' => 'required|unique:posts,slug' . $post_id,
            'body' => 'required',
            'category_id' => 'required',  
        ];
    }
}
