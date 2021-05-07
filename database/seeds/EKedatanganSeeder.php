<?php

use App\eKedatangan;
use App\permohonan_with_users;
use Illuminate\Database\Seeder;

class EKedatanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(eKedatangan::class, 20)->create();

        // foreach (eKedatangan::all() as $eKedatangan) {
        //     $eKedatangan->CUSTOMERID = permohonan_with_users::pluck('CUSTOMERID')->all()->random();
        // };
    }
}
