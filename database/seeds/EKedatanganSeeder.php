<?php

use App\eKedatangan;
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
        factory(eKedatangan::class, 11)->create();
    }
}
