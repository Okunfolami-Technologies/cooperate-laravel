<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Site extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        "favicon",
        "title",
        "description",
        "email",
        "address",
        "phone",
        "facebook",
        "twitter",
        "linkedin",
        "instagram",
        "home_page_id",
        "default",
    ];

    public function homePage(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'home_page_id');
    }
}
