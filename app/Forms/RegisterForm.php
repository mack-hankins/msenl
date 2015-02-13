<?php


namespace Msenl\Forms;


class RegisterForm extends AbstractForm
{


    /**
     * Form Rules
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'link' => 'required',
        'agent' => 'required',
        'faction' => 'required',
        'level' => 'required',
    ];


    /**
     * Get the prepared input data.
     *
     * @return array
     */
    public function getInputData()
    {
        return array_only(
            $this->inputData,
            [
                'name',
                'email',
                'link',
                'agent',
                'faction',
                'level',
                'avatar',
            ]
        );
    }


}