@component('mail::message')

Hello, {{ $data->name }},

<br>

<p>We understand it happens.</p>


@component('mail::button',['url' => url('reset/' .$data->remember_token )])

Reset Your Password

@endcomponent

Best Regards.
<br>
{{ config('app.name') }}
    
@endcomponent

