@component('mail::message')
# Introduction

<h1>Forget Password Email</h1>
   
You can reset password from bellow link:
<a href="{{ route('reset.password.get', $token) }}">Reset Password</a>

Thanks for using application from Simple laravel team.
@endcomponent
