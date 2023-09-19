<?php

namespace App\Exports;

use App\User;
use App\EmailUser;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EmailUser::all();
    }
}
