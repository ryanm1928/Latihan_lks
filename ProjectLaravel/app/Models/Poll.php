<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','datetime'];


    public function choices()
    {
        return $this->hasMany(Choice::class, 'poll_id');
    }

    public function creator() {
        return $this->belongsTo(User::class, "created_by");
    }

    public function votes() {
        return $this->hasMany(Vote::class, 'poll_id');
    }
}
