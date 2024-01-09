<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Site;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $site = Site::where('default', true)->firstOrFail();
        $page = $site->homePage;
        return view("pages/{$page->slug}", compact('page'));
    }
    public function page(string $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view("pages/{$page->slug}", compact('page'));
    }
}
