<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GetEventRequest extends Request
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
            'name' => 'min:3|max:255',
            'description' => 'string',
            'start' => 'date',
            'end' => 'date|after:start',
            'recurring' => 'boolean',
            'status' => 'in:live,started,ended,canceled,upcoming',
            'capacity' => 'integer',
            'organizer_id' => 'integer',
            'address_1' => 'string',
            'address_2' => 'string',
            'category_id' => 'integer|exists:categories,id',
            'country_id' => 'integer|exists:countries,id',
            'city_id' => 'integer|exists:cities,id',
            'latitude' => 'numeric|min:-90|max:90',
            'longitude' => 'numeric|min:-180|max:180',
            'tags' => 'string'
        ];
    }

    /**
     * Response to return when validation fails
     *
     * @return response
     */
    public function response( array $errors ){
        return \Response::make( $errors, 422 );
    }
}
