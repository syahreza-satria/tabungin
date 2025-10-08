<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'goal_name',
        'description',
        'target_amount',
        'current_amount',
        'target_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
