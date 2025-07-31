<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateFilamentAdmin extends Command
{
    protected $signature = 'make:filament-admin';
    protected $description = 'Create a new Filament admin user';

    public function handle()
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email address');
        $password = $this->secret('Password');

        if (!preg_match('/@admin\.com$/', $email)) {
            $this->error('Email must end with @admin.com for admin users');
            return 1;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin', // Set role ke admin
        ]);

        $this->info("Admin user created successfully: {$user->email}");
    }
}