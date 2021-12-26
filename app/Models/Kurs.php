<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurs extends Model
{
    use HasFactory;

    //POZIVAMO KAO PROPERTY (bez zagrada u tinkeru)
    public function predavaci()
    {
        // Kurs moze da ima vise predavaca
        return $this->hasMany(Predavac::class);
    }
}
