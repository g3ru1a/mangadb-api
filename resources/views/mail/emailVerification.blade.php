<x-mail::message>
    # Greetings,

    Please click the button below to verify your email.

    @include('mail.components.button', [
        'slot' => 'Verify Email',
        'url' => $url . '/verify?payload=' . $payload,
    ]);
</x-mail::message>
