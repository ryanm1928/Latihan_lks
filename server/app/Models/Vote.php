<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function division()
    {
        return $this->belongsTo(division::class, 'division_id');
    }

    public function poll()
    {
        return $this->belongsTo(Poll::class, 'poll_id');
    }

    public function choice()
    {
        return $this->belongsTo(Choice::class, 'choice_id');
    }
}
