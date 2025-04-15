<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Services\BookStack\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    protected UserService $bookStackUserService;

    /**
     * Injecte automatiquement ton service BookStack.
     */
    public function __construct(UserService $bookStackUserService)
    {
        $this->bookStackUserService = $bookStackUserService;
    }

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Création de l'utilisateur Laravel
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // ➕ Création de l'utilisateur sur BookStack
        try {
            $this->bookStackUserService->createUser([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
                'roles' => [3], // rôle Viewer par défaut
                'send_invite' => false,
            ]);
        } catch (\Exception $e) {
            // loguer l'erreur sans bloquer l'inscription
            Log::error('Erreur création utilisateur BookStack : '.$e->getMessage());
        }

        return $user;
    }
}
