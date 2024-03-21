<?php

namespace Modules\Post\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'title' => 'required|string|min:3|max:190|unique:posts,title',
                'category_id' => 'required|exists:categories,id',
                'time_to_read' => 'required|numeric',
                'status' => 'required|numeric|in:0,1',
                'type' => 'required|numeric|in:0,1',
                'image' => 'required|mimes:jpg,jpeg,png,webp|max:2048',
                'score' => 'required|numeric|in:0,1,2,3,4,5,6,7,8,9,10',
                'body' => 'required|string|min:3',
                'type_text' => 'required|numeric|in:0,1',
                'video' => 'required_if:type_text,==,1|mimes:mp4,mov,ogg|max:20000',
            ];
        } else {
            return [
                'title' => 'required|string|min:3|max:190|unique:posts,title,' . request()->id,
                'category_id' => 'required|exists:categories,id',
                'time_to_read' => 'required|numeric',
                'status' => 'required|numeric|in:0,1',
                'type' => 'required|numeric|in:0,1',
                'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
                'score' => 'required|numeric|in:0,1,2,3,4,5,6,7,8,9,10',
                'body' => 'required|string|min:3',
                'type_text' => 'required|numeric|in:0,1',
                'video' => 'nullable|mimes:mp4,mov,ogg|max:20000',
            ];
        }
    }


    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \auth()->check() === true;
    }
}
