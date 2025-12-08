<?php

namespace App\Auth\Http\Responses;

use Filament\Auth\Http\Responses\LoginResponse as LoginResponseContract;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse extends LoginResponseContract
{

    public function toResponse($request): RedirectResponse | Redirector
    {
        return redirect()->intended(route('filament.app.pages.dashboard'));
    }

}
