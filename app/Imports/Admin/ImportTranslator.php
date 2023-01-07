<?php

namespace App\Imports\Admin;

use App\Models\Translator;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTranslator implements ToModel
{
    /**
     * @param array $row
     *
     * @return Translator|null
     */

    public function model(array $row)
    {
        return new Translator([
            'name' => $row[0],
            'email' => $row[1],
            'language' => $row[2],
            'password' => Hash::make($row[3]),
        ]);
    }
}
