<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Post;

class UpdatePostRequest extends FormRequest
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
        /**
         * we have to make 
         * the rules in the form of array 
         * to write the function
         */
        $id = $this->route('id');
        $post = Post::find($id);
        /**
         * i validate in input with value user_id
         * in table users
         * in table users it's name is id 
         */
        return [
            'user_id' => [
                'exists:users,id'
            ],
            'title' => [
                'required',
                'min:3',
                Rule::unique('posts')->ignore($post->title, 'title')
            ],
            'description' => 'required|min:10'
        ];
    }
}
