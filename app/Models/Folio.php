<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folio extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = ['date', 'detainee_full_name', 'receptor_staff_name', 'receptor_manager_name', 'release_staff_name', 'release_manager_name', 'personal_belongings', 'observations'];

//     public static function store(array $data)
// {
//     return self::create([
//         'date' => $data['date'],
//         'detainee_full_name' => $data['detainee_full_name'],
//         'receptor_staff_name' => $data['receptor_staff_name'],
//         'receptor_manager_name' => $data['receptor_manager_name'],
//         'release_staff_name' => $data['release_staff_name'],
//         'release_manager_name' => $data['release_manager_name'],
//         'personal_belongings' => $data['personal_belongings'],
//         'observations' => $data['observations'],
//     ]);
// }
}