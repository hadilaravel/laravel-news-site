<?php

namespace Modules\Advertising\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        if($this->isMethod('post')) {
            return [
                'title' => 'required|string|min:3|max:190',
                'link' => 'nullable|string|min:3|max:190',
                'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
                'status' => 'required|numeric|in:0,1',
           ];
        }else{
            return [
                'title' => 'required|string|min:3|max:190',
                'link' => 'nullable|string|min:3|max:190',
                'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
                'status' => 'required|numeric|in:0,1',
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
