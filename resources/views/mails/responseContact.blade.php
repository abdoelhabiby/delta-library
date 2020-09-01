@component('mail::message')
# Introduction

hello mr: {{$name}}

<br>
<p>{{$response}}</p>
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
