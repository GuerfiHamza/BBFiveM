<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\FiveM\Player;
use App\Models\PlayerTreasory;

class GetPlayerTreasuryForPlayersCommand extends Command
{
  /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'players:treasury';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all the treasury for every players';

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

        foreach(Player::all() as $player) {
            array_push($treasuries, ['identifier' => $player->identifier, 'treasory' => $player->getTreasory(), 'created_at' => now()]);
        }

        PlayerTreasory::insert($treasuries);
    }
}
