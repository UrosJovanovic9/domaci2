<?php

namespace Database\Seeders;
use  App\Models\User;
use  App\Models\Kurs;
use  App\Models\Predavac;
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


       $user = User::factory()->create();

       // Pravimo nase seedere
       $kurs1 = Kurs::create([
        'naziv'=>'C++',
        'vremeTrajanja' => '20']);

       $kurs2 = Kurs::create([
        'naziv'=>'C#',
        'vremeTrajanja' => '10']);

       $kurs3 = Kurs::create([
        'naziv'=>'Python',
        'vremeTrajanja' => '15']);


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
