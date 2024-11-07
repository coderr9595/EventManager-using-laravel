<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'time','price', 'description'];


    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
    public function users()
{
    return $this->belongsToMany(User::class, 'registrations', 'event_id', 'user_id');
}

}
