<x-mail::message>
    # Greetings,

    Please click the button below to reset your password.

    @include('mail.components.button', [
        'slot' => 'Reset Password',
        'url' => $url . '/auth/password-verify?payload=' . $payload,
    ]);
</x-mail::message>
