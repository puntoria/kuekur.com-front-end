<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exception\HttpResponseException;


class EventRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'required|min:3|max:255',
            'description' => 'required|string',
            'start' => 'required|date|after:yesterday',
            'end' => 'date|after:start',
            'recurring' => 'boolean',
            'recurring_data' => 'required_if:recurring,true,1|json|recurring_data',
            'status' => 'in:live,started,ended,canceled,upcoming',
            'capacity' => 'integer',
            'organizer_id' => 'integer',
            'address_1' => 'required|string',
            'address_2' => 'string',
            'category_id' => 'required|integer', // |exists:categories,id
            'country_id' => 'required|integer', // |exists:countries,id
            'city_id' => 'required|integer', // |exists:cities,id
            'latitude' => 'numeric|required_with:longitude|min:-90|max:90',
            'longitude' => 'numeric|required_with:latitude|min:-180|max:180',
            'tags' => 'string'
        ];
    }

}
