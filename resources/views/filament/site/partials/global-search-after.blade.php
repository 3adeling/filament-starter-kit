@guest
    <div class="hidden lg:block">
        <x-filament::button tag="a" :href="route('filament.site.auth.login')" :outlined="true" :icon="\Filament\Support\Icons\Heroicon::OutlinedArrowLeftEndOnRectangle">
            {{ __('Login') }}
        </x-filament::button>
    </div>
    <div class="hidden lg:block">
        <x-filament::button tag="a" :href="route('filament.site.auth.register')" :outlined="false" :icon="\Filament\Support\Icons\Heroicon::OutlinedUserPlus">
            {{ __('Join Us') }}
        </x-filament::button>
    </div>
@else
    <div class="hidden lg:flex space-x-2">
        <x-filament::button tag="a" :href="route('filament.app.pages.dashboard')" :outlined="true" :icon="\Filament\Support\Icons\Heroicon::ChartBarSquare">
            {{ __('Dashboard') }}
        </x-filament::button>
    </div>
@endguest
