<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GiveTokenBearerToAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Give Token Bearer to everyone';

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
        foreach(\App\Models\User::all() as $user) {
            $user->fill(['token_bearer' => \Illuminate\Support\Str::random(50)])->save();
        }

        $this->info('Done!');
    }
}
