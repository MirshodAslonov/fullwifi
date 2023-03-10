<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
   
    public function rules(): array
    {
        return [
            'email'=>'required|email|exists:users,email',
            'password'=>'required|string|min:4',
        ];
    }
}
