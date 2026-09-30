<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideogameRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id', // controlla che il genere esista nel DB
            // controlla all'interno della tabella `genres` nella colonna `id` esiste il dato inviato
            'description' => 'required|string',
            'cover_image' => 'nullable|image|max:4096', // accetta immagini fino a 4MB
            'price' => 'required|numeric|min:0',
            'release_date' => 'nullable|date',
            'developer' => 'nullable|string|max:255'
        ];
    }
}
