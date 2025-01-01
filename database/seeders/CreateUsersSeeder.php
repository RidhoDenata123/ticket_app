<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Administrator',
               'email'=>'admin@email.com',
               'type'=>1,
               'password'=> bcrypt('12345'),
            ],
            
            [
               'name'=>'User-01',
               'email'=>'user@email.com',
               'type'=>0,
               'password'=> bcrypt('12345'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
