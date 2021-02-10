<?php

use App\User;
use App\PermohonanBaru;
use Illuminate\Database\Seeder;

class PermohonanBaruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PermohonanBaru::class, 10)->create();

        foreach (PermohonanBaru::all() as $permohonan) {
            
            $individu = ['OT1', 'EL1', 'PS1'];
            $kumpulan = ['OT2', 'EL2', 'PS2'];

            if (in_array($permohonan->jenis_permohonan, $individu)) {
                $users = User::inRandomOrder()->pluck('id');
                foreach ($users as $user) {
                    $permohonan->users()->attach($user);
                    break;
                }
            }
            if (in_array($permohonan->jenis_permohonan, $kumpulan)) {
                $users = User::inRandomOrder()->take(rand(2,3))->pluck('id');
                $permohonan->users()->attach($users);
            }
        }
    }
}
