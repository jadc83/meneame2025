<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateNoticiaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $noticia = $this->route('noticia');

        if(Auth::id() != $noticia->user_id){
            return abort(403, '<h1>Estas intentando cambiar una noticia que no es tuya</h1>');
        }

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
            'titulo' => 'required|string|max:50',
            'resumen' => 'required|string|max:100',
            'url' => 'required|string|max:200',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'categoria_id' => 'exists:categorias,id'
        ];
    }

    public function messages(): array {
        return ['titulo.required' => 'El titulo es obligatorio',
                'resumen.required' => 'El resumen es obligatorio',
                'url.required' => 'La URL es obligatoria'];
    }
}
