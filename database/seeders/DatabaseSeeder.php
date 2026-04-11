<?php

namespace Database\Seeders;

use App\Models\DocumentCategory;
use App\Models\PaymentType;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = ['Master Admin', 'Admin', 'AJK', 'Anak Khariah'];
        foreach ($roles as $roleName) {
            Role::query()->firstOrCreate(['name' => $roleName]);
        }

        foreach (['Pekan', 'Batu 5', 'Taman Delima', 'Taman Kuning', 'Taman Sepakat'] as $village) {
            Village::query()->firstOrCreate(['name' => $village]);
        }

        foreach ([
            'Pengerusi',
            'Imam',
            'Bilal',
            'Siak',
            'Biro Pembangunan',
            'Biro Multimedia',
            'Biro Dakwah',
        ] as $position) {
            Position::query()->firstOrCreate(['name' => $position]);
        }

        foreach (['Surat', 'Minit Mesyuarat'] as $category) {
            DocumentCategory::query()->firstOrCreate(['name' => $category]);
        }

        PaymentType::query()->firstOrCreate(
            ['name' => 'Khairat Kematian'],
            ['method' => 'Bulanan', 'amount' => 10]
        );

        $masterAdminRole = Role::query()->where('name', 'Master Admin')->first();
        User::query()->updateOrCreate(
            ['email' => 'admin@masjid'],
            [
                'role_id' => $masterAdminRole?->id,
                'name' => 'masteradmin',
                'full_name' => 'Master Admin Masjid',
                'phone' => '60100000000',
                'password' => Hash::make('123'),
            ]
        );
    }
}
