<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    public function poll()
    {
        return $this->belongsTo(Poll::class, 'poll_id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'choice_id');
    }
}
