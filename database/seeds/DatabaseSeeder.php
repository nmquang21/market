<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
//    public function run() {
//
//		// $this->call(UsersTableSeeder::class);
//

//
//
//    }
    public function run(){
        $roleAdmin = Role::create(['name' => config('access.roles.admin')]);

        $listUser = Permission::create(['name' => 'view-user']);
        $createUser = Permission::create(['name' => 'create-user']);
        $editUser = Permission::create(['name' => 'edit-user']);
        $deleteUser = Permission::create(['name' => 'delete-user']);

        $listCustomer = Permission::create(['name' => 'view-customer']);
        $createCustomer = Permission::create(['name' => 'create-customer']);
        $editCustomer = Permission::create(['name' => 'edit-customer']);
        $deleteCustomer = Permission::create(['name' => 'delete-customer']);

        $listProduct = Permission::create(['name' => 'view-product']);
        $createProduct = Permission::create(['name' => 'create-product']);
        $editProduct = Permission::create(['name' => 'edit-product']);
        $deleteProduct = Permission::create(['name' => 'delete-product']);

        $listCategory = Permission::create(['name' => 'view-category']);
        $createCategory = Permission::create(['name' => 'create-category']);
        $editCategory = Permission::create(['name' => 'edit-category']);
        $deleteCategory = Permission::create(['name' => 'delete-category']);

        $listRole = Permission::create(['name' => 'view-role']);
        $createRole = Permission::create(['name' => 'create-role']);
        $editRole = Permission::create(['name' => 'edit-role']);
        $deleteRole = Permission::create(['name' => 'delete-role']);

        $listRate = Permission::create(['name' => 'view-rate']);
        $createRate = Permission::create(['name' => 'create-rate']);
        $editRate = Permission::create(['name' => 'edit-rate']);
        $deleteRate = Permission::create(['name' => 'delete-rate']);


        $roleAdmin->syncPermissions([
            $listUser,
            $createUser,
            $editUser,
            $deleteUser,

            $listCustomer,
            $createCustomer,
            $editCustomer,
            $deleteCustomer,

            $listProduct,
            $createProduct,
            $editProduct,
            $deleteProduct,

            $listCategory,
            $createCategory,
            $editCategory,
            $deleteCategory,

            $listRole,
            $createRole,
            $editRole,
            $deleteRole,

            $listRate,
            $createRate,
            $editRate,
            $deleteRate

        ]);

        $userAdmin = User::create([	'name' => config('access.roles.admin'),
            'avatar' => config('access.default.avatar'),
            'email' => config('access.default.email'),
            'password' => Hash::make('Phong123@')
        ]);


        $userAdmin->assignRole($roleAdmin);
        $userAdmin->givePermissionTo($roleAdmin->permissions);


        $this->call(provinces::class);
        $this->call(districts::class);
        $this->call(categories::class);
        $this->call(products::class);
        $this->call(product_category::class);
       $this->call(product_images::class);
       $this->call(views::class);
       $this->call(users::class);
        $this->call(customers::class);
        $this->call(addresss::class);
        $this->call(wards::class);
    }
}
