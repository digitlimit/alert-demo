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
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

//        field('name', 'Name is required')
//            ->timeout(1000)
//            ->error();
//
//        field('email', 'Email is required')
//            ->timeout(1000)
//            ->error();
//
//        alert('Go get it chap!', 'Thanks!')
//        ->success();
//
//        alert('That is very bad', 'Opps!')
//            ->error();

        toastr('This is a test message', 'Thanks!')
            ->success()
            ->topLeft();

//        notify('This is a test message', 'Thanks!')
//            ->id('stage')
//            ->warning()
//            ->action('Okay')
//            ->cancel('Cancel')
//            ->timeout(10000);
//
//        notify('Lets get started', 'Thanks!')
//            ->id('test')
//            ->warning()
//            ->action('Okay')
//            ->cancel('Cancel')
//            ->timeout(10000);


//            modal('This is a test message', 'Thanks!')
//                ->action('Okay', '/')
//                ->cancel('Cancel', '/');


        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
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
