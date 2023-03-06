<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kabupaten;
use App\Models\Kabupaten_officer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Reset cached roles and permissions
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions'
        // Permission::create(['name' => 'akses_manajemen_jurusan']);
        // Permission::create(['name' => 'kelola_penasehat_akademik']);
        // Permission::create(['name' => 'kelola_tahap_skripsi']);
        // Permission::create(['name' => 'kelola_template_penilaian']);
        // Permission::create(['name' => 'kelola_template_catatan']);
        // Permission::create(['name' => 'kelola_template_file_registrasi']);
        // Permission::create(['name' => 'kelola_periode_pendaftaran']);
        // Permission::create(['name' => 'kelola_kepanitiaan_ujian']);
        // Permission::create(['name' => 'kelola_pendaftaran_ujian']);
        // Permission::create(['name' => 'kelola_seminar_ujian']);
        // Permission::create(['name' => 'kelola_yudisium_sarjana']);
        // Permission::create(['name' => 'kelola_artikel']);
        // Permission::create(['name' => 'kelola_pembimbing']);
        // Permission::create(['name' => 'kelola_alumni']);
        // Permission::create(['name' => 'kelola_predikat']);
        // Permission::create(['name' => 'kelola_yudisium_sarjana']);
        // Permission::create(['name' => 'kelola_dokumen']);
        // Permission::create(['name' => 'kelola_yudisium']);
        // Permission::create(['name' => 'kelola_rekomendasi']);
        // Permission::create(['name' => 'kelola_tim_pengawasan']);
        // Permission::create(['name' => 'lihat_tim_pengawasan']);
        // Permission::create(['name' => 'kelola_sk_tim']);
        // Permission::create(['name' => 'lihat_sk_tim']);

        


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'operator']);
        $role3 = Role::create(['name' => 'dosen']);

        // create demo users
        $user = User::create([
            'email' => 'admin@app.id',
            'username' => 'admin',
            'password' => Hash::make('password')
        ]);
        $user->assignRole($role1);

        $user2 = User::create([
            'email' => 'arddy@app.id',
            'username' => 'arddy',
            'password' => Hash::make('password')
        ]);
        $user2->assignRole($role2);

        //  $user2 = User::create([
        //     'fullname' => 'Lusi Abdilani Makalalag',
        //     'email' => 'lusi@app.id',
        //     'status' => 'aktiv',
        //     'sex' => 'p',
        //     'address' => 'Jln Poigar',
        //     'telp' => '082187833313',
        //     'password' => Hash::make('111')
        // ]);

        // $kabupaten = Kabupaten::create([
        //     'name'=> 'Bone Bolango',
        //     'status'=> 'Kabupaten',
        //     'address'=> 'tau',
        //     'is_active'=> 1,
        // ]);

        // Kabupaten_officer::create([
        //     'position' => 'Staf',
        //     'description' => 'Staf PHL',
        //     'order' => 0,
        //     'kabupaten_id' => $kabupaten->id,
        //     'user_id' => $user2->id,
        // ]);

        // $user2->assignRole($role2);

        // $user->givePermissionTo($permission1);
        
        // $user = User::create([
        //     'username' => '531411130',
        //     'email' => 'student@app.id',
        //     'password' => Hash::make('password')
        // ]);

        // $user->assignRole($role3);
    }
}
