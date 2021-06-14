<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dashboard
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'app.dashboard',
        ]);

        // Settings
        $moduleAppSettings = Module::updateOrCreate(['name' => 'Settings']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSettings->id,
            'name' => 'Access Settings',
            'slug' => 'app.settings.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSettings->id,
            'name' => 'Update Settings',
            'slug' => 'app.settings.update',
        ]);

        // Brand
        $moduleAppBrand = Module::updateOrCreate(['name' => 'Brand']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBrand->id,
            'name' => 'Access Brands',
            'slug' => 'app.brands.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBrand->id,
            'name' => 'Create Brands',
            'slug' => 'app.brands.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBrand->id,
            'name' => 'Edit Brands',
            'slug' => 'app.brands.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBrand->id,
            'name' => 'Delete Brands',
            'slug' => 'app.brands.destroy',
        ]);

        // Category
        $moduleAppCategory = Module::updateOrCreate(['name' => 'Category']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppCategory->id,
            'name' => 'Access Categories',
            'slug' => 'app.categories.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppCategory->id,
            'name' => 'Create Categories',
            'slug' => 'app.categories.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppCategory->id,
            'name' => 'Edit Categories',
            'slug' => 'app.categories.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppCategory->id,
            'name' => 'Delete Categories',
            'slug' => 'app.categories.destroy',
        ]);

        // Role management
        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Access Roles',
            'slug' => 'app.roles.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Create Role',
            'slug' => 'app.roles.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Edit Role',
            'slug' => 'app.roles.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Delete Role',
            'slug' => 'app.roles.destroy',
        ]);

        // User management
        $moduleAppUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Access Users',
            'slug' => 'app.users.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Create User',
            'slug' => 'app.users.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Edit User',
            'slug' => 'app.users.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Delete User',
            'slug' => 'app.users.destroy',
        ]);

        // Sub Category
        $moduleAppSubCategory = Module::updateOrCreate(['name' => 'Sub Category']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSubCategory->id,
            'name' => 'Access Sub Category',
            'slug' => 'app.subcategories.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSubCategory->id,
            'name' => 'Create Sub Category',
            'slug' => 'app.subcategories.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSubCategory->id,
            'name' => 'Edit Sub Category',
            'slug' => 'app.subcategories.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSubCategory->id,
            'name' => 'Delete Sub Category',
            'slug' => 'app.subcategories.destroy',
        ]);

        // Product
        $moduleAppProduct = Module::updateOrCreate(['name' => 'Product']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppProduct->id,
            'name' => 'Access Product',
            'slug' => 'app.products.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppProduct->id,
            'name' => 'Create Product',
            'slug' => 'app.products.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppProduct->id,
            'name' => 'Edit Product',
            'slug' => 'app.products.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppProduct->id,
            'name' => 'Delete Product',
            'slug' => 'app.products.destroy',
        ]);
    }
}
