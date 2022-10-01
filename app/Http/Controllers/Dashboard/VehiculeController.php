<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FiveM\VehiculePossessed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Flasher\Prime\FlasherInterface;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = VehiculePossessed::paginate(10);
        return view('dashboard.vehicule.index', compact('vehicules'));
    }

    public function show()
    {}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FiveM\VehiculePossessed  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehiculePossessed $vehicule, FlasherInterface $flasher)
    {
        if ($vehicule->player) {
            if ($vehicule->player->isPlayerOnline()) {
            $flasher->addError('Le joueur est connecté, vous ne pouvez pas supprimer ses vehicules.');

                return redirect()->back()
                        ->with('error', 'Le joueur est connecté, vous ne pouvez pas supprimer ses vehicules');
            }
        
        } 

        // dd($vehicule);
        $vehicule->delete();
        $flasher->addSuccess('Le vehicule a bien été retiré!');

        return redirect()->back()
                ->with('success', 'Le vehicule a bien été retiré!',
                    Http::post('https://discord.com/api/webhooks/964579468213645392/lZUrEJA3qcaCicVLbnr3YBu6Yn5CSs4iXvoyXZXOhFAtro9zppfAVQNEUeXegRbmJjeT', [
                        'content' => "Voiture retiré",
                        'embeds' => [
                            [
                                'title' =>  'La voiture avec la plaque : '. $vehicule->plate. ' a été supprimé par '.\Auth::user()->players->name,
                                'color' => '16711680',
                            ]
                        ],
                    ]));
    }
    public function search(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = VehiculePossessed::where('owner', 'like', '%'.$query.'%')
         ->orWhere('plate', 'like', '%'.$query.'%')
         ->orWhere('job', 'like', '%'.$query.'%')
         ->orWhere('org', 'like', '%'.$query.'%')
         ->get();

         
      }
      else
      {
       $data = VehiculePossessed::orderBy('owner', 'desc')
         ->get();
      }
    
      
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr class="text-gray-700 dark:text-gray-400">
            
         <td class="px-4 py-3 text-sm">'.$row->player->name.'</td>

         <td class="px-4 py-3 text-sm">'.$row->plate.'</td>
         <td class="px-4 py-3 text-sm">'.$row->job.'</td>
         <td class="px-4 py-3">
                                    <button @click="openModal"
                                    x-on:click="setModalDelete( "route("dashboard-vehicule.destroy", compact("vehicule")) ")"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                    
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                   
                                     </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" class="px-4 py-3 text-sm text-white" colspan="5">Aucune donnée disponible</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}