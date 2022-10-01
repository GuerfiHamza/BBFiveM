<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FiveM\Job;
use App\Models\JobTreasory;

class GetTreasuryForJobsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:treasury';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all the treasury for every jobs';

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
        $treasuries = [];

        foreach(Job::all() as $job) {
            array_push($treasuries, ['job_name' => $job->name, 'treasory' => $job->getTreasory(), 'created_at' => now()]);
        }

        JobTreasory::insert($treasuries);
    }
}
