@component('mail::message')
# Hello Sir


New advertisement is created by **Bishal Maharjan**.Please check the new advertisement and review it.

@component('mail::button', ['url' => ''])
View Advertisment
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
