<?php namespace Msenl\Http\Requests;


/**
 * Class RegisterRequest
 * @package Msenl\Http\Requests
 */
class RegisterRequest extends Request
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
        return [
            'agent'      => 'required',
            'level'      => 'required|not_in:0',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'level.not_in' => 'Level must be greater than 0',
        ];
        return parent::messages();
    }
}
