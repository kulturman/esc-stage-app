<?php

use App\Role;
use App\user;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        user::truncate();
        DB::table('role_user')->truncate();

       $admin = user::create([       
            'email'=>'doumamsamed@gmail.com',
            'password'=>Hash::make('password'),
            'name'=>'admin',
            'prenom'=>'admin',
            'structure'=>'DSI',
            'telephone'=>'70202310'
            ]);

            
       $utilisateur = user::create([     
        'email'=>'user@gmail.com',
        'password'=>Hash::make('password'),
        'name'=>'user',
        'prenom'=>'utilisateur',
        'structure'=>'DSI',
        'telephone'=>'60202310'
        ]);
        

            $adminRole = Role::where('name','admin')->first();
            $userRole = Role::where('name','utilisateur')->first();

             $admin->roles()->attach($adminRole);
             $utilisateur->roles()->attach($userRole);

    }
}
