<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
		   'country-list',
           'country-create',
           'country-edit',
           'country-delete',
		   'course-list',
		   'course-create',
		   'course-edit',
		   'course-delete',
		   'board-list',
		   'board-create',
		   'board-edit',
		   'board-delete',
		   'caste-list',
		   'caste-create',
		   'caste-edit',
		   'caste-delete',
		   'exam-list',
		   'exam-create',
		   'exam-edit',
		   'exam-delete',
		   'toungue-list',
		   'toungue-create',
		   'toungue-edit',
		   'toungue-delete',
		   'passout-list',
		   'passout-create',
		   'passout-edit',
		   'passout-delete',
		   'subject-list',
		   'subject-create',
		   'subject-edit',
		   'subject-delete',
		   'semester-list',
		   'semester-create',
		   'semester-edit',
		   'semester-delete',
		   'class-list',
		   'class-create',
		   'class-edit',
		   'class-delete',
		   'study-list',
		   'study-create',
		   'study-edit',
		   'study-delete'
        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
