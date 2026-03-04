@props(['class' => ''])

@if (file_exists(public_path('images/LogoPNG.png')))
    <img src="{{ asset('images/LogoPNG.png') }}" alt="PESO" {{ $attributes->merge(['class' => 'application-logo '.$class]) }} />
@else
    <img src="https://bangaaklan.gov.ph/wp-content/uploads/2025/07/logo-peso.png" alt="PESO" {{ $attributes->merge(['class' => 'application-logo '.$class]) }} />
@endif
