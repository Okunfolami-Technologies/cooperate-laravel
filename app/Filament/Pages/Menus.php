<?php

namespace App\Filament\Pages;

use App\Models\Page as PageModel;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Menus extends Page
{
    public $data;
    public array $menuOrdering = [];

    protected static ?string $navigationIcon = 'heroicon-o-bars-4';

    protected static ?string $navigationGroup = 'Settings';

    protected static string $view = 'filament.pages.menus';

    public function mount(): void
    {
        $pages = PageModel::where("menu", true)->orderBy('page_order', 'ASC')->get();
        $pages->each(fn ($item) => array_push($this->menuOrdering, $item->id));
        $this->data = compact('pages');
    }

    public function sortMenu(int $itemId, int $newIndex, int $oldIndex)
    {
        $subOrdering = $this->menuOrdering;
        for ($i = $oldIndex; $i < $newIndex; $i++) {
            $this->menuOrdering[$i] = $subOrdering[$i + 1];
        }
        for ($i = $oldIndex; $i > $newIndex; $i--) {
            $this->menuOrdering[$i] = $subOrdering[$i - 1];
        }
        $this->menuOrdering[$newIndex] = $itemId;
    }

    public function saveMenu()
    {
        $collection = collect($this->menuOrdering);
        $collection->each(function ($item, $key) {
            $page = PageModel::find($item);
            $page->page_order = $key;
            $page->save();
        });
        Notification::make()
            ->title('Saved')
            ->success()
            ->send();
    }
}







