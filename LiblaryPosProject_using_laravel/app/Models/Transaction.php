<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date_start', 'date_end', 'book_total', 'borrow_long', 'payment_total', 'status', 'member_id', 'book_id', 'status'];
}
