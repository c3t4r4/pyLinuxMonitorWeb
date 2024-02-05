<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class GroupUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function all($keys = null)
    {
        return $this->validateFields(parent::all());
    }

    public function validateFields(array $inputs)
    {
        return $inputs;
    }

    public function rules(): array
    {
        /** @var User $user */
        $user = Auth::user();

        return [
            'name' => [
                'required',
                'min:3',
                'max:191',
                Rule::unique('groups', 'name')
                    ->where('user_id', $user->id)
                    ->ignore($this->input('id')),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório',
            'name.unique' => 'O nome inserido já existe, verifique !!!',
        ];
    }
}
