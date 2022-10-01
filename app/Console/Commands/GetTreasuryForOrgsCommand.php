<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FiveM\Organisation;
use App\Models\OrgTreasory;

class GetTreasuryForOrgsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orgs:treasury';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all the treasury for every orgs';

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

        foreach(Organisation::all() as $org) {
            array_push($treasuries, ['org_name' => $org->name, 'treasory' => $org->getTreasory(), 'created_at' => now()]);
        }

        OrgTreasory::insert($treasuries);
    }
}
