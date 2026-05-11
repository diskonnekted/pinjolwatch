<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RbacSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view_reports', 'manage_reports', 'export_data',
            'view_audit_logs', 'manage_users', 'verify_reports'
        ];

        foreach ($permissions as $p) {
            Permission::firstOrCreate(['name' => $p, 'guard_name' => 'web']);
        }

        $roles = [
            'super-admin' => $permissions,
            'moderator' => ['view_reports', 'manage_reports', 'verify_reports', 'export_data'],
            'analyst' => ['view_reports', 'export_data'],
            'user' => [],
        ];

        foreach ($roles as $role => $perms) {
            $roleObj = Role::firstOrCreate(['name' => $role]);
            $roleObj->syncPermissions($perms);
        }
        
        // Create a default super-admin user
        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@pinjolwatch.com',
        ]);
        $user->assignRole('super-admin');
    }
}
