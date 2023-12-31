<?php

namespace App\Models;

use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['isbn', 'title', 'year', 'publisher_id', 'author_id', 'catalog_id', 'qty', 'price'];

    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
}
