<?php

namespace App\Http\Requests;

use App\Enums\TasksStatuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TaskRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3', 'max:65000'],
            'status' => ['required', new Enum(TasksStatuses::class)],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
