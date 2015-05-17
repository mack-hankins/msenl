<?php namespace Msenl\Http\Requests;

use Msenl\Repositories\GeoCodingRepositoryInterface;

class RegisterRequest extends Request {

    public function __construct(GeoCodingRepositoryInterface $GeoCodingRepository)
    {
        $this->geocoding = $GeoCodingRepository;
    }

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
            'name'       => 'required',
            'email'      => 'required|email|unique:users',
            'url'       => 'required',
            'agent'      => 'required',
            'level'      => 'required',
        ];
    }

}
