@component('mail::message')

Hello {{$User->name}},
# Introduction

The body of your message.

@component('mail::button', ['url' => route('verify_email',$User->email_verification_code)])
Button Text
@endcomponent
<p>Or copy paste the follwing route</p>

<p><a href="{{route('verify_email',$User->email_verification_code)}}">
{{route('verify_email',$User->email_verification_code)}}
</a></p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
