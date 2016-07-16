<?php

namespace Msenl\Http\Requests;

use Msenl\Http\Requests\Request;

/**
 * Class FaqRequest
 * @package Msenl\Http\Requests
 */
class FaqRequest extends Request
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
            'question' => 'required',
            'answer'   => 'required',
        ];
    }
}
