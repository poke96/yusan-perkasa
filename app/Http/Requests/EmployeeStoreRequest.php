<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployeeStoreRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'phone' => 'required|numeric|min:7',
            'gender' => 'required|string|in:pria,wanita',
            'address' => 'required',
            'password' => 'required|min:8|confirmed',
            'email' => 'required|email|unique:employees',
            'ktp_id' => 'required|numeric',
            'hire_date' => 'required|date',
            'role_id' => 'required|numeric',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}