<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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

        if ($this->method() == 'PATCH') {
            return [
             'taskStatus'=>'required|string|in:en cours,en pause,terminee' ,

            ] ;
        } 
        return [
            'taskTitle' => 'required|string|max:255' ,
            'taskDescription'=>'required|string' ,
            'taskDueDate'=>'required|date|after_or_equal:today' ,
            'taskCategory'=>'required|string' ,
            'taskPriority'=>'required' ,
            'taskReminder'=>'nullable' ,
        ]; 
    }

    public function messages(): array {
        return [
            'taskTitle.required'=>'Le titre de la tâche est requis' ,
            'taskDescription.required'=>'Vueillez donner une description à la tâche' ,
            'taskDueDate.required' =>'Veuillez définir une date d\'échéance pour la tâche' ,
            'taskDueDate.after_or_equal' => 'La date d\'échéance ne peut pas être antérieure à aujourd\'hui',
            'taskCategory.required'=>'Veuillez définir une catégorie pour la tâche' ,
            'taskCategory.string'=>'Veuillez Veuillez sélectionner une catégorie existante' ,
        ] ;
    }

}
