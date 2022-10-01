<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class VehiculePossessed extends Model
{
    protected $connection = 'fivem';
    protected $table = 'owned_vehicles';

    protected $primaryKey  = 'plate';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'plate',
        'owner',
        'security',
        'vehicle', // Configuration
        'type', // car, helicopter
        'job',
        'service',
        'stored'
    ];

    public function player()
    {
        return $this->belongsTo('App\Models\FiveM\Player', 'owner', 'identifier');
    }

    public function job()
    {
        return $this->hasMany('App\Models\FiveM\Job', 'job');
    }
    public function org()
    {
        return $this->hasMany('App\Models\FiveM\Organisation', 'org');
    }

    public function vehicule()
    {
        return $this->hasOne('App\Models\FiveM\Vehicule', 'plate', 'plate');
    }

    public function vehicle_name()
    {
        $informations = $this->informations();
        switch ($informations->model) {
            case '-1205689942':
                return 'Riot';

            case '-1046437422':
                return 'Dodge';

            case '-283186696':
                return 'GT 500';

            case '-1647941228':
                return 'Granger';

            case '-1693015116':
                return 'Anti-Emeute';

                case '-2007026063':
                return 'Bus pénitentier';

                case '-1216765807':
                return 'Adder';

            case '456714581':
                return 'Police Transporter';

            case '353883353':
                return 'Hélico';

            case '1127131465':
                return 'FIB';

            case '2046537925':
                return 'Cruiser';

            case '1171614426':
                 return 'Ambulance';


            case '-121446169':
                return 'Kamacho';

                case '-1237253773':
                    return '6x6 Dubsta';



                        case '683047626':
                            return 'Caracara';

                case '469291905':
                    return '4X4 Amublance';

                case '-399311599':
                    return 'Hélico';

            case '1912215274':
                return 'SUV';

            case '456506697':
                return 'Dodge LSPD';

            case '-34623805':
                return 'Moto police';

            case '895473079':
                return 'Lambo de police';


            case '-1255452397':
                return 'Schafter';


            case '-420911112':
                return 'Patriot Stretch';


            case '345756458':
                return 'Bus Festival';

            case '1075432268':
                return 'Swift Deluxe';

            case '-394074634':
                return 'Dubsta';


            case '1119641113':
                return 'SlamVan Custom';


            case '1353720154':
                return 'FlatBed';

            case '-442313018':
                return 'Depanneuse';


            case '-1323100960':
                return 'Camion Depanneuse';




            case '103255988':
                return 'IMPOSSIBLE';
            case '-1627000575':
                return 'Buffalo';
            case '-2103010684':
                return 'IMPOSSIBLE';

            default:
                return "Véhicule Inconnu";
        }
    }

    public function informations()
    {
        return json_decode($this->vehicle);
    }
}
