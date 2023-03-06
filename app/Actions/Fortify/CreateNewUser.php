<?php

namespace App\Actions\Fortify;

use App\Models\Personnel;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'fullname' => ['required', 'string', 'max:255'],
            // 'nim' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required'],
        ])->validate();
        $user = User::create([
            // 'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $user->assignRole('super admin');
        Personnel::create([
            'user_id' => $user->id,
            'fullname' => $input['fullname'],
        ]);
        return $user;
    }
}
