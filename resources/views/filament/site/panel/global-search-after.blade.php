@guest
    <x-filament::button tag="a" href="{{ route('filament.site.auth.login') }}" :outlined="true">
        {{ __('Login') }}
    </x-filament::button>
    <x-filament::button tag="a" href="{{ route('filament.site.auth.register') }}">
        {{ __('Register') }}
    </x-filament::button>
@else

@endguest
