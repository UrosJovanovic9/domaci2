<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predavac extends Model
{
    use HasFactory;
    protected $fillable = ['imeIPrezime','Zvanje','Fakultet'];
    protected $guarded = [];

    public function kurs()
    {
        //Vrsimo povezivanje sa tabelom kurs. Predavac pripada jednom kursu
        //Kada ovo uradimo mozemo da kucamo u tinkeru $predavac->kurs (pristupamo kao propertiju iako smo
        //napravili funkciju kurs())
        return $this->belongsTo(Kurs::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
