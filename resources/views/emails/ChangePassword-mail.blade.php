@component('mail::message')
# Introduction

<h3>{{ $details['title'] }}</h3>
<h3>{{ $details['body'] }}</h3>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
