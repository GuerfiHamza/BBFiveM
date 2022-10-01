<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetDefaultEmailOnUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set a default e-mail for every registred user';

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
     * @return mixed
     */
    public function handle()
    {
        $users = \App\Models\User::all();

        foreach($users as $user) {
            $name = implode('.', array_filter(explode(' ', strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $user->name)))));
            $user->fill(['email' => $name . '@PearlFive.net'])->save();
        }

        foreach($users as $user) {
            $this->info($user->name.': '.$user->email);
        }

        $this->info('Fini!');
    }
}
