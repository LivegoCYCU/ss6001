<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'email', 'phone', 'LINE', 'company','order_amount','receipt_amount'
    ];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function receipts()
    {
        return $this->hasMany('App\Receipt');
    }
}
