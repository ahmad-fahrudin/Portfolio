<?php

namespace App\Models;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blogcat()
    {
        return $this->belongsTo(BlogCategory::class, 'blogcat_id');
    }
}
