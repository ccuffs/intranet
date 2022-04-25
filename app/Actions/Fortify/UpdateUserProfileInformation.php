<?php

namespace App\Actions\Fortify;

use App\Helpers\StringHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    protected function removeGitUrlDomain($user)
    {
        $url = $user;
        if (StringHelper::checkIfContains($url, "https://github.com/") || StringHelper::checkIfContains($url, "https://github.com/")) {
            $user = StringHelper::getText("/github.com\/(.*)/i", $url);
        }

        $user = str_replace("/", "", $user);

        return $user;
    }

    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
            'enrollment_id' => ['nullable', 'string', 'max:60'],
            'bio' => ['nullable', 'string', 'max:250'],
            'google' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'twitter' => ['nullable', 'string', 'max:255'],
            'facebook' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'lattes' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (isset($input['github'])) {
            $input['github'] = $this->removeGitUrlDomain($input['github']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'email' => $input['email'],
                'enrollment_id' => $input['enrollment_id'],
                'bio' => $input['bio'],
                'google' => $input['google'],
                'github' => $input['github'],
                'twitter' => $input['twitter'],
                'facebook' => $input['facebook'],
                'instagram' => $input['instagram'],
                'linkedin' => $input['linkedin'],
                'lattes' => $input['lattes'],
                'website' => $input['website'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
