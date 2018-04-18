@component('mail::message')

Hi {{ $name }},

Jacob has invited you to try {{ config('app.name') }}

@component('mail::button', ['url' => $url])
Join Now
@endcomponent

Thanks,<br>
{{ config('app.name') }} Support
@endcomponent
