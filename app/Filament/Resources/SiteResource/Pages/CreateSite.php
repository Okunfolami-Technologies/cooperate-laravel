<?php

namespace App\Filament\Resources\SiteResource\Pages;

use App\Filament\Resources\SiteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSite extends CreateRecord
{
    protected static string $resource = SiteResource::class;

    protected function mutateFormDataBeforeCreating(array $data): array
    {
        if ($data['default']) {
            static::getModel()::where('default', true)->update(['default' => false]);
        }
        return $data;
    }
}
