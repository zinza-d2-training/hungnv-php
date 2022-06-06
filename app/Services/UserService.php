<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService implements UserServiceInterface
{
    public function checkOldPassword($data)
    {
        $user = Auth::user();
        if (!empty($data['old_password'])) {
            if (!Hash::check($data['old_password'], $user->password)) {
                throw ValidationException::withMessages(['old_password' => 'Mật khẩu không chính xác']);
            }
        }
    }
}
