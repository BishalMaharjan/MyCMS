<?php

namespace App\Console\Commands;

use App\Notifications\NotifyInactiveUser;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\User;

class EmailInactiveUsers extends Command
{
    protected $signature = 'email:EmailInactiveUsers';
    protected $description = 'Email inactive users';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $limit = Carbon::now()->subDay(7);
        $inactive_user = User::where('last_login', '<', $limit)->get();
        foreach ($inactive_user as $user) {
            $user->notify(new NotifyInactiveUser());
        }
    }
}