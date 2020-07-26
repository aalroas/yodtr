<?php

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            'super_admin',
            'branch_manager',
            'site_manager',
            'student'
        ];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $permissions = [
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'branch-list',
            'branch-create',
            'branch-edit',
            'branch-delete'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            Role::find('1')->givePermissionTo($permission);

        }


        User::create([
        'image'=>'png.png',
        'first_name_en' => 'Super',
        'last_name_en' => 'Admin',
        'first_name_tr' => 'Super',
        'last_name_tr' => 'Admin',
        'first_name_ar' => 'Super',
        'last_name_ar' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make('12345678'),
        'gender' => 1,
        'about_me_en' => 'non',
        'about_me_tr'=> 'non',
        'about_me_ar'=> 'non',
        'phone_number'=>'5367711855',
        'identity_image'=>'tc.png',
        'identity_number'=> 99000000000,
        'city_id'=>1,
        'address_en'=> 'kayseri',
        'address_tr'=> 'kayseri',
        'address_ar'=> 'kayseri',
        'branch_id'=>0,
        'position_en'=>'non',
        'position_tr'=>'non',
        'position_ar'=>'non',
        'status' => 1,
        'is_deleted'=>0,
        'email_verified_at'=> Carbon::setTestNow(),
        'updated_at'=>Carbon::setTestNow(),
        'created_at' => Carbon::setTestNow(),
        ]);

        User::find(1)->assignRole('super_admin');



    }
}
