<?php

namespace App\Models;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'phone_number', 'email', 'addres'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'member_id');
    }

    public function transactions()
    {
        return $this->hasOne('App\Models\Transaction', 'member_id');
    }
}
