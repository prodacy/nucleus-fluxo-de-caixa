<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id', 'client_id', 'due', 'amount',
    ];

    public function client()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function getTypeDescAttribute()
    {
        $types = config('constants.bill.types');
        return isset($types[$this->type_id]) ? $types[$this->type_id] : "not_defined:[{$this->type}]";
    }

}
