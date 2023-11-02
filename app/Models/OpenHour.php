<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_point_id',
        'day_from',
        'day_to',
        'hours',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function sale_point() {
        return $this->belongsTo(SalePoint::class);
    }

}
