<x-mail::message>
# Introduction

welcome hadi karami

<x-mail::button :url="{{ route('home.index') }}">
    HomePage
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
