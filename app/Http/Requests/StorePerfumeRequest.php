<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerfumeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"=>"required|min:1|max:50",
            "description"=>"required|min:1|max:2000",
            "product_img" => "required|file", 
        ];
    }

    public function messages()
    {
        return[
            "name.required"=>"Il nome deve essere presente",
            "name.max"=>"Il nome è troppo lungo.",
            "description.required"=>"La descrizione deve eesere presente.",
            "description.max"=>"La descrizione è troppo lunga.",
            "product_img.required"=>"L'immagine deve essere presente.",
            "product_img.file"=>"L'immagine deve essere un file."
        ];
    }
}
