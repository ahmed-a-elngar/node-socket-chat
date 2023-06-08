<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\Message;
use App\Models\Subscribe;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ["name"];

    public function scopeSubscriped(Builder $query): void
    {
        $query->leftJoin("subscriptions", "rooms.id", "subscriptions.room_id")->Where(function ($q) {
            $q->where('subscriptions.user_id', Auth::id());
            $q->orWhere('rooms.creator_id', Auth::id());
        });
    }

    public function messages(): MorphMany
    {
        return $this->morphMany(Message::class, 'messageable');
    }

    public function Subscribes(): MorphMany
    {
        return $this->morphMany(Subscribe::class, 'subscribeale');
    }
}
