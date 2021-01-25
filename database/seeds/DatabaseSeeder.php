<?php

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        DB::table('tags')->truncate();
        DB::table('item_tag')->truncate();
        DB::table('categories')->truncate();
        DB::table('items')->truncate();
        DB::table('permohonan_barus')->truncate();
        DB::table('permohonan_with_users')->truncate();
        DB::table('e_kedatangans')->truncate();

        $this->call([RolesTableSeeder::class, UsersTableSeeder::class]);
        $this->call([TagsTableSeeder::class, CategoriesTableSeeder::class, ItemsTableSeeder::class, PermohonanBaruSeeder::class]);
        $this->call([EKedatanganSeeder::class,PermohonanWithUsersSeeder::class]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
