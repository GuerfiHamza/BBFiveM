<?php

namespace App\Helpers;

class OnlinePlayer
{
    public static function getOnlinePlayers()
    {
        if (!\Cache::has('players_connected')) {
            $rcon = new \App\Helpers\Q3Query;

            // Make request
            $response = $rcon->rcon('status');
                
            // Split lines
            $player = explode("\n", $response);

            // Make players array
            $players = [];

            // For all player
            foreach($player as $p) {
                if ($p !== null && !empty($p)) {
                    $p = explode(' ', $p);

                    $id = $p[0];
                    $steamhex = $p[1];

                    array_splice($p, 0, -(count($p)-2));

                    $ip = $p[count($p)-1];
                    $port = $p[count($p)-1];

                    array_splice($p, 2);
                    
                    $name = implode(" ", $p);

                    $info = ['id' => $id, 
                            'steamhex' => $steamhex, 
                            'name' => $name, 
                            'ip' => $ip.':'.$port
                        ];

                    array_push($players, $info);
                }
            }
            
            cache(['players' => collect($players)], now()->addSeconds(30));
        } else {
            $players = cache('players');
        }

        return collect($players);
        dd($p[1]);
    }
}