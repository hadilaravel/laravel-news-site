<?php

namespace Modules\Category\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        if($this->isMethod('post')) {
            return [
                'title' => 'required|string|min:3|max:190|unique:categories,title',
                'keywords' => 'nullable|string|min:3|max:250',
                'description' => 'nullable|string|min:3',
                'status' => 'required|numeric|in:0,1',
                'parent_id' => 'nullable|exists:categories,id'
            ];
        }else{
            return [
                'title' =>  'required|string|min:3|max:190|unique:categories,title,' . request()->title,
                'keywords' => 'nullable|string|min:3|max:250',
                'description' => 'nullable|string|min:3',
                'status' => 'required|numeric|in:0,1',
                'parent_id' => 'nullable|exists:categories,id'
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
