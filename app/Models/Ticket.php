<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['content', 'prio', 'status'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
