<?php

use Illuminate\Database\Seeder;
use App\User;
use App\RolesAndPermissions\Models\Role;
use App\RolesAndPermissions\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RolesAndPermissionsInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate tables
        DB::statement("SET foreign_key_checks=0");
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Permission::truncate();
        Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        $userAdmin = User::where('email', 'admin@chocoloco.com')->first();
        if ($userAdmin) {
            $userAdmin->delete();
        }
        //user admin
        $userAdmin = user::create([
            'name' => 'admin',
            'email' => 'admin@chocoloco.com',
            'address' => 'N/D',
            'phone' => 'N/D',
            'is_admin' => true,
            'email_verified_at' => '2020-06-29 00:54:00',
            'enabled' => true,
            'password' => Hash::make('admin'),
        ]);
        //rol admin
        $roleAdmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrador',
            'full-access' => 'yes'
        ]);
        //table role_user
        $userAdmin->roles()->sync([$roleAdmin->id]);
        //permissions
        $permission_all = [];

        //permission role
        $permission = Permission::create([
            'name' => 'Listar un rol',
            'slug' => 'role.index',
            'description' => 'Un usuario puede ver la lista de los roles',
        ]);

        $permission_all[] = $permission->id;
        //permission role
        $permission = Permission::create([
            'name' => 'Mostrar rol',
            'slug' => 'role.show',
            'description' => 'Un usuario puede ver detalles del rol',
        ]);

        $permission_all[] = $permission->id;
        //permission role
        $permission = Permission::create([
            'name' => 'Eliminar un rol',
            'slug' => 'role.destroy',
            'description' => 'un usuario puede eliminar roles',
        ]);

        $permission_all[] = $permission->id;
        //permission role
        $permission = Permission::create([
            'name' => 'Crear un rol',
            'slug' => 'role.create',
            'description' => 'Un usuario puede crear roles',
        ]);

        $permission_all[] = $permission->id;
        //permission role
        $permission = Permission::create([
            'name' => 'Editar rol',
            'slug' => 'role.edit',
            'description' => 'Un usuario puede editar roles',
        ]);

        $permission_all[] = $permission->id;
        //permission user
        $permission = Permission::create([
            'name' => 'Cambiar estado de un usuario',
            'slug' => 'client.edit',
            'description' => 'Habilitar/Deshabilitar usuarios',
        ]);

        $permission_all[] = $permission->id;
        //permission user
        $permission = Permission::create([
            'name' => 'Listar usuarios',
            'slug' => 'user.index',
            'description' => 'Puede ver la lista de los usuarios',
        ]);


        $permission_all[] = $permission->id;
        //permission user
        $permission = Permission::create([
            'name' => 'Mostrar usuario',
            'slug' => 'user.show',
            'description' => 'Puede ver detalles usuario',
        ]);

        $permission_all[] = $permission->id;
        //permission user
        $permission = Permission::create([
            'name' => 'destroy user',
            'slug' => 'user.destroy',
            'description' => 'Puede eliminar usuarios',
        ]);

        $permission_all[] = $permission->id;
        //permission user
        /* $permission= Permission::create([
            'name' => 'Create user',
            'slug' => 'user.create',
            'description' => 'Un usuario puede crear usuarios',
        ]);

        $permission_all[]= $permission->id; */
        //permission user
        $permission = Permission::create([
            'name' => 'Editar user',
            'slug' => 'user.edit',
            'description' => 'Un usuario puede editar usuarios',
        ]);

        $permission_all[] = $permission->id;

        //table permission_role
        $roleAdmin->permissions()->sync($permission_all);
    }
}
