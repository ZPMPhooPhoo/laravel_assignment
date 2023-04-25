<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create(['name' => 'SuperAdmin']);
        $editor = Role::create(['name' => 'Editor']);

        $dashboard = Permission::create(['name' => 'dashboard']);        
        $widget = Permission::create(['name' => 'widget']);
        $datatable = Permission::create(['name' => 'datatable']);
        
        $permission_list = Permission::create(['name' => 'permissionList']);
        $permission_create = Permission::create(['name' => 'permissionCreate']);
        $permission_edit = Permission::create(['name' => 'permissionEdit']);
        $permission_show = Permission::create(['name' => 'permissionShow']);
        $permission_delete = Permission::create(['name' => 'permissionDelete']);

        $blogs_list = Permission::create(['name' => 'blogsList']);        
        $blogs_create = Permission::create(['name' => 'blogsCreate']);
        $blogs_edit = Permission::create(['name' => 'blogsEdit']);
        $blogs_show = Permission::create(['name' => 'blogsShow']);
        $blogs_delete = Permission::create(['name' => 'blogsDelete']);

        $post_list= Permission::where(['name' => 'postList']);
        $post_create = Permission::where(['name' => 'postCreate']);
        $post_edit = Permission::where(['name' => 'postEdit']);
        $post_show = Permission::where(['name' => 'postShow']);
        $post_delete = Permission::where(['name' => 'postDelete']);

        $role_list= Permission::where(['name' => 'roleList']);
        $role_create = Permission::where(['name' => 'roleCreate']);
        $role_edit = Permission::where(['name' => 'roleEdit']);
        $role_show = Permission::where(['name' => 'roleShow']);
        $role_delete = Permission::where(['name' => 'roleDelete']);

        $super_admin->givePermissionTo([$dashboard, $permission_list, $permission_create, $permission_edit, $permission_show, $permission_delete, $role_list, $role_create, $role_edit, $role_show, $role_delete, $widget, $datatable, $blogs_list, $blogs_create, $blogs_edit, $blogs_show, $blogs_delete, $post_list, $post_create, $post_edit, $post_show, $post_delete]);

        $editor->givePermissionTo([$blogs_list, $blogs_create, $blogs_edit, $blogs_show, $post_list, $post_create, $post_edit, $post_show]);
    }
}
