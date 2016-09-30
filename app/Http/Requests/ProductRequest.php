<?php

namespace Agrosellers\Http\Requests;

use Agrosellers\Entities\Feature;
use Agrosellers\Entities\Subcategory;
use Agrosellers\Http\Requests\Request;

class ProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $features = Subcategory::find($_REQUEST['subcategory_id'])->featuresName();
        foreach ($features as $feature){
            $rules[$feature['name']] = 'required';
        }

        return [];

        /*return [            'subcategory_id' => 'required|numeric',
            'name' => 'required',
            'presentation' => 'required|numeric',
            'weight' => 'required|numeric',
            'measure' => 'required|numeric',
            'price' => 'required|numeric',
            'available_quantity' => 'required',
            'offer_price' => 'required|numeric',
            'offer_on' => 'required',
            'offer_off' => 'required',
            'location' => 'required',
            'description' => 'required',
            'offer_description' => 'required'
        ];*/
    }
}
