<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Folio;

class FoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $totalFolios = 100;

        for ($i = 1; $i <= $totalFolios; $i++) {
            $folio = str_pad($i, 6, '0', STR_PAD_LEFT);

            Folio::create([
                'folio' => $folio,
            ]);
        }
    }
}
