<?php

namespace App\Console\Commands;

use App\Models\FiveM\Datastore;
use Illuminate\Console\Command;

class RemoveWeaponOnDatastore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'entreprise:no-weapon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $datastores = Datastore::all();
        $user = \App\Models\FiveM\Player::all();
        foreach($datastores as $data) {
            if ($data->data->has('weapons')) {
                $data->fill(['data' => $data->data->forget('weapons')->toArray()])->save();
                $this->info('Arme retiré pour ' . $data->owner);
                $this->info(
                    collect(collect(json_decode($data, true)['data'])['weapons'])->implode('name', ' ')
                );
            }
        }
        
    }
}
