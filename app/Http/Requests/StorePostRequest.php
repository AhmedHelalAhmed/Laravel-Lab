<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /**
         * you make this method to true 
         * 
         */
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
         * 
         * unique:posts
         * posts 
         * the name of 
         * the table 
         * in database
         * it refelect into the form
         * and give error  
         * The selected user id is invalid.
         * and not insert in database
         */
        return [
            'user_id' => [
                'exists:users,id'
            ],
            'title'=>'required|min:3|unique:posts',
            'description'=>'required|min:10',
        ];
    }
}
