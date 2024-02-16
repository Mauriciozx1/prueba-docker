<?php

namespace App\Http\Requests;

use App\Models\Task;
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
    public function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('task.id'),
        ]);

    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if($this->isMethod('POST') || $this->isMethod('PUT'))
        {
            return [
                'description' => 'required|string|min:3'
            ];
        }

        if($this->isMethod('DELETE'))
        {
            return [
                'id' => function ($attribute, $value, $fail) {
                    if (Task::find($value)->users()->first()) {
                        $fail("La tarea contiene usuario(s) asignados");
                    }
                },
            ];
        }

        return [];
    }
}
