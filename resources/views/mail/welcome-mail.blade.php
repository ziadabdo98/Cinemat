@component('mail::message')
# Welcome to {{ config('app.name') }}

Hello {{ $user->first_name }},

@if( $user->wants_manager )
Thanks for registering, please wait for the administration to approve your manager account. Until then your account will be a customer account.<br>
You will receive an email upon approval.<br>
You can try to log in at the link below.<br>
@else
Thanks for registering, your account has been created.<br>
You can now log in at the link below.<br>
@endif

@component('mail::button', ['url' => config('app.url').'/login'])
    Login
@endcomponent

Thanks, <br>
{{ config('app.name') }}
@endcomponent