<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;
use App\Form;

class FormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->route()->getName() === 'form.store') {
            return $this->user()->can('create', Form::class);
        }

        if ($this->route()->getName() === 'form.update') {
            return $this->user()->can('edit', Form::class);
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|max:20|alpha',
            'surname' => 'bail|required|max:25|alpha',
            'burn' => 'required|date',
            'phone' => 'regex:/\d+/',
            'gender' => 'bail|required|alpha|max:5',
        ];
    }
}
