<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\RolesAndPermissions\Models\Role;

class UpRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $role = request()->route('role');
        return [
            'name' => 'required|min:3|max:50|unique:roles,name,' . $role->id,
            'slug' => 'required|min:3|max:50|unique:roles,slug,' . $role->id,
            'description' => 'max:50',
            'full-access' => 'required|in:yes,no',
        ];
    }
}
