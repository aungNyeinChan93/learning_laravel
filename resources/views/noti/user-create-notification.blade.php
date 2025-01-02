<x-mail::message>
# Introduction

{{$user->name}} has been created at {{$user->created_at->format('j-F-Y')}}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
