<?php

namespace App\Models;

use App\Models\FilmSeat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'release_date', 'ticket_price', 'age_rating'];

    protected $table = 'films';

    protected $guarded = ['id'];

    public function filmSeat(){
        return $this->hasMany(FilmSeat::class);
    }
}
