<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostUpsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();

        if ($user->email === "pederflowers@hotmail.it") {

            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|max:255",
            "body" => "required",
            "image" => "nullable|image",
            "image_link" => "nullable|max:255",
            "is_published" => "nullable|boolean",
            "category_id" => "nullable|exists:categories,id",
        ];
    }

    public function messages(): array
    {
        return  [
            'title.required' => 'Specifica il titolo del post',
            'title.max' => 'Il titolo è troppo lungo',
            'body.required' => 'Aggiungi una descrizione del post',
            'image.required' => 'Aggiungi l\' immagine del post',
            'image.max' => 'Il testo dell\' immagine è troppo lungo',
        ];
    }
}
