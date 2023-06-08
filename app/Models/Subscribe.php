<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Subscribe extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "subscribeale_type", "subscribeale_id"];
    
    public function subscribeale(): MorphTo
    {
        return $this->morphTo();
    }
}
