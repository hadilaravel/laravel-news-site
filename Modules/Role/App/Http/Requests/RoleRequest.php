<?php

namespace Modules\Role\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        if($this->isMethod('post')) {
            return [
              'name' => 'required|string|min:3|max:190|unique:roles,name',
               'permissions' => 'required|array|min:1'
            ];
        }else{
            return [
                'name' => 'required|string|min:3|max:190|unique:roles,name, ' . request()->id,
                'permissions' => 'required|array|min:1'
            ];
        }

    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() === true;
    }
}
