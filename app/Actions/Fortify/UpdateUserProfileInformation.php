<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */


    public function update(User $user, array $input): void
    {
        $messages = [
            'name.required' => 'Dit veld mag niet leeg zijn.',
            'birthdate.required' => 'Dit veld mag niet leeg zijn.',
            'birthdate.date_format' => 'Dit veld moet een geldige geboortedatum bevatten.',
            'username.required' => 'Dit veld mag niet leeg zijn.',
            'email.required' => 'Dit veld mag niet leeg zijn.',
            'email.email' => 'Dit veld moet een geldig e-mailadres bevatten.',
            'address.required' => 'Dit veld mag niet leeg zijn.',
            'postal_code.required' => 'Dit veld mag niet leeg zijn.',
            'postal_code.digits' => 'Dit veld moet een geldige postcode bevatten.',
            'phone_number.digits' => 'Dit veld moet een geldig telefoonnummer bevatten.',
            'mobile_number.digits' => 'Dit veld moet een geldig gsm-nummer bevatten.',
        ];

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'alpha_dash', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date_format:Y-m-d'],
            'postal_code' => ['required', 'digits:4'],
            'phone_number' => ['nullable', 'digits:9'],
            'mobile_number' => ['nullable', 'digits:10'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ], $messages)->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'username' => $input['username'],
                'birthdate' => $input['birthdate'],
                'postal_code' => $input['postal_code'],
                'city' => $input['city'],
                'address' => $input['address'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
