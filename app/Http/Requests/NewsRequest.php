<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     */
    public function authorize(): bool
    {
        return true;
        // return auth()->user()->is_admin;
    }

    /**
     * Obtenez les règles de validation pour la requête.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'auhtor' => 'required|string|max:50',
            'photo' => 'nullable|string',
            'senior_team_id' => 'nullable|exists:senior_team,id',
            'young_team_id' => 'nullable|exists:young_team,id',
        ];
    }

    /**
     * Personnaliser les messages d'erreur (facultatif)
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => __('news.title_required'),
            'author.required' => __('news.author_required'),
        ];
    }
}