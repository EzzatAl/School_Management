<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'first_name' => $row[0],       // Assuming the first column contains the first name
            'last_name' => $row[1],        // Assuming the second column contains the last name
            'email' => $row[2],            // Assuming the third column contains the email
            'password' => $row[3],         // Assuming the fourth column contains the password
            'type' => $row[4],             // Assuming the fifth column contains the type
            'image' => $row[5],            // Assuming the sixth column contains the image
            'gender' => $row[6],           // Assuming the seventh column contains the gender
            't_phone_number' => $row[7],   // Assuming the eighth column contains the phone number
            's_father' => $row[8],         // Assuming the ninth column contains the father's name
            's_mother' => $row[9],         // Assuming the tenth column contains the mother's name
            's_phone_number' => $row[10],  // Assuming the eleventh column contains the student's phone number
            's_home_number' => $row[11],   // Assuming the twelfth column contains the student's home number
            's_address' => $row[12],       // Assuming the thirteenth column contains the student's address
        ]);
    }
}
