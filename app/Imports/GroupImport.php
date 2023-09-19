<?php

namespace App\Imports;
   
use App\Group;
use App\EmailUser;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class GroupImport implements ToModel, WithHeadingRow
{
    private $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function model(array $row)
    {
        return new EmailUser([
            'name' => $row['name'],
            'email' => $row['email'],
            'group_id' => $this->group->id, // assign the created group's id to the imported data
        ]);
    }
}
