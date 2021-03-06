<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function wallets(){
        return $this->hasMany('App\Models\Wallet');
    }

    public function transaction(){
        return $this->hasMany('App\Models\Transaction');
    }
}
