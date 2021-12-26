<?php

namespace Database\Seeders;
use  App\Models\User;
use  App\Models\Kurs;
use  App\Models\Predavac;
use  App\Models\Sala;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // truncate() je bitno napisati na pocetku
        // Da ne bi dobijali gresku za kurs posto je on unique
        User::truncate();
        Kurs::truncate();
        Predavac::truncate();
        Sala::truncate();


       $user = User::factory()->create(); 

       // Pravimo nase seedere

       $sala1 = Sala::create([
        'naziv'=> 'Sala1',
        'sprat'=> 'I'
        ]);

        $sala2 = Sala::create([
        'naziv'=> 'Sala2',
        'sprat'=> 'II'
        ]);

        $sala3 = Sala::create([
        'naziv'=> 'Sala3',
        'sprat'=> 'I'
        ]);
        

       $kurs1 = Kurs::create([
        'naziv'=>'C++',
        'vremeTrajanja' => '20',
        'sala_id'=>$sala1->id
    ]);

       $kurs2 = Kurs::create([
        'naziv'=>'C#',
        'vremeTrajanja' => '10',
        'sala_id'=>$sala2->id
    ]);

       $kurs3 = Kurs::create([
        'naziv'=>'Python',
        'vremeTrajanja' => '15',
        'sala_id'=>$sala3->id
    ]);

        

       $predavac1 = Predavac::create([
           'imeIPrezime' => 'Petar Petrovic',
           'zvanje' => 'Asistent',
           'fakultet' => 'Fakultet1',
           'user_id'=> $user->id,
           'kurs_id' => $kurs1->id
       ]);

       $predavac2 = Predavac::create([
        'imeIPrezime' => 'Janko Jankovic',
        'zvanje' => 'Saradnik',
        'fakultet' => 'Fakultet2',
        'user_id'=> $user->id,
        'kurs_id' => $kurs2->id
    ]);

    $predavac3 = Predavac::create([
        'imeIPrezime' => 'Marko Markovic',
        'zvanje' => 'Asistent',
        'fakultet' => 'Fakultet3',
        'user_id'=> $user->id,
        'kurs_id' => $kurs3->id
    ]);

    }
}
