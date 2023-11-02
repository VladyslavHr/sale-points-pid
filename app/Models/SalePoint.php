<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_point',
        'type',
        'name',
        'address',
        'lat',
        'lon',
        'services',
        'pay_methods',
        'link',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function open_hours() {
        return $this->hasMany(OpenHour::class, 'sale_point_id', 'id');
    }

}
