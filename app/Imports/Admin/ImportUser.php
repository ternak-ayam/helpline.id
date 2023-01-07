<?php

namespace App\Imports\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */

    public function model(array $row)
    {
        return new User([
            'unhcr_number' => $row[0],
            'email' => $row[1],
            'country' => $row[2],
            'birthdate' => $row[3],
            'sex' => $row[4],
            'password' => Hash::make($row[5]),
        ]);
    }
}
