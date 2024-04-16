<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class CreateAuteurRequest extends FormRequest
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
            'nom' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'prenom' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'slug' => ['required', 'min:8', 'regex:/^[a-z0-9\-]+$/', Rule::unique('auteurs')->ignore($this->route()->parameter('auteur'))],
            'email' => ['required', 'email', 'regex:/^.+@.+$/'],
            'descriptif' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['slug' => $this->input('slug') ?: Str::slug($this->input('nom') . '-' . $this->input('prenom'))]);
    }
}
