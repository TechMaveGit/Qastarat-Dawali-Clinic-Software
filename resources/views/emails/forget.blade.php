@component('mail::message')
    Hello {{ $user->name }}
    <p>Your OTP is:-{{ $otp }}</p>
<p>We understand it happens.</p>
@component('mail::button',['url'=>route('user.forget.password.reset',['token'=>$user->remember_token])])
   Reset Your Password
@endcomponent

<p>If having any problem please contect our team.</p>
Thanks,</br>
{{ config('app.name') }}
@endcomponent