<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-super-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserts a new super admin user into the database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->ask('Email');
        $password = $this->ask('Password');
        $first_name = $this->ask('First Name');
        $last_name = $this->ask('Last Name');
        $mobile_number = $this->ask('Mobile Number');
        $birthdate = $this->ask('Birthdate (YYYY-MM-DD)');
        $pin = $this->ask('PIN');
        $address = $this->ask('Address');

        User::firstOrCreate([
            'email' => $email,
            'password' => bcrypt($password),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'mobile_number' => $mobile_number,
            'pin' => $pin,
            'birthdate' => $birthdate,
            'address' => $address,
            'user_type' => User::SUPER_ADMIN,
        ]);
        return 0;
    }
}
