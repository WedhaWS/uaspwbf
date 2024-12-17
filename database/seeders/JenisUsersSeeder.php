<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisUsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('jenis_user')->insert([
            [
                'id_jenis_user' => '1',
                'jenis_user' => 'Admin',
                'create_by' => 'System',
                'delete_mark' => '0',
                'update_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jenis_user' => '2',
                'jenis_user' => 'User',
                'create_by' => 'AdminUser',
                'delete_mark' => '0',
                'update_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
