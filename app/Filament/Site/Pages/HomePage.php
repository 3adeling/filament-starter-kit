<?php

namespace App\Filament\Site\Pages;

use App\Filament\Site\Widgets\ExampleWidget;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Panel;
use Filament\Support\Icons\Heroicon;

class HomePage extends Page
{
    protected string $view = 'filament.site.pages.home-page';

    protected static string $routePath = '/';

    protected static ?int $navigationSort = -2;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::Home;

    protected ?string $heading = '';

    public static function getRoutePath(Panel $panel): string
    {
        return static::$routePath;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ExampleWidget::class
        ];
    }

    public function getHeaderWidgetsColumns(): int|array
    {
        return 3;
    }
}
