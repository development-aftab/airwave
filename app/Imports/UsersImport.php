<?php

namespace App\Imports;
   
use App\User;
use App\EmailUser;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        
        return new EmailUser([
            'name' => $row['name'],
            'email' => $row['email'],
        ]);
    }
}
