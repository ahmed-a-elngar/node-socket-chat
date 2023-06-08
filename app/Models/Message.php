<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ["content", "messageable_type", "messageable_id", "sender_id"];
    
    public function messageable(): MorphTo
    {
        return $this->morphTo();
    }
}
