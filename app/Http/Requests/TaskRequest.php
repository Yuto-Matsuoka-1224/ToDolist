<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'title' => 'required|max:50',
                'predict_time' => 'max:24'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'predict_time' => '実施予定時間',
        ];
    }

}
