<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'address' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'integer'],
            'country_id' => ['required', 'integer'],
            'star_level' => ['required', 'integer'],
            'link_gmaps' => ['required', 'string', 'max:255'],
            'photos.*' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ];
    }
}
