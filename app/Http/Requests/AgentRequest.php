<?php

namespace Msenl\Http\Requests;

use Msenl\Http\Requests\Request;

/**
 * Class UpdateRequest
 * @package Msenl\Http\Requests
 */
class AgentRequest extends Request
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
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function rules(\Illuminate\Http\Request $request)
    {
        $user_id = ($request->route('user') > 0 ? $request->route('user') : $request->route('agents'));
        return [
            'agent'      => 'required|unique:users,agent,'.$user_id,
            'level'      => 'required|not_in:0',
            'postalcode' => 'required|numeric|zip',
            'telegram' => 'begins_with:@',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'zip' => 'Must be a valid zip code.',
            'level.not_in' => 'Level must be greater than 0',
            'telegram.begins_with' => ':attribute username must begin with @',
        ];
        return parent::messages();
    }
}
