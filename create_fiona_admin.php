<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

use App\Models\User;
use Spatie\Permission\Models\Role;

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Create Fiona
$fiona = User::updateOrCreate(
    ['email' => 'fiona@pinjolwatch.id'],
    [
        'name' => 'Fiona',
        'password' => Hash::make('password123'), // Default password
        'avatar_url' => '/avatars/fiona.png',
    ]
);

// Assign Admin Role
$adminRole = Role::where('name', 'admin')->first();
if ($adminRole) {
    $fiona->assignRole($adminRole);
}

echo "Admin Fiona created successfully!\n";
