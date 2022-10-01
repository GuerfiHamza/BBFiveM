<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FiveM\Job;
use App\Models\FiveM\OrgWeapons;
use App\Models\FiveM\Player;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $job=Job::when($request->has("name"),function($q)use($request){
            return $q->where("name","like","%".$request->get("name")."%");
        })->paginate(5);
        if($request->ajax()){
            return view('dashboard.job.job', compact('job'));
        } 
        return view('dashboard.job.job', compact('job'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiveM\Job  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        $weapon = OrgWeapons::where('name', '=', 'society_' . $job->name)
            ->select('data')
            ->get();
        $weapons = [];
        foreach ($weapon as $wp) {
            if ($data = $wp->getLoadout()) {
                $collection = collect(json_decode($wp->data, true))
                    ->where('name', '!=', 'WEAPON_PETROLCAN')
                    ->where('name', '!=', 'GADGET_PARACHUTE')
                    ->where('name', '!=', 'WEAPON_FLASHLIGHT');
                if ($collection->count()) {
                    array_push($weapons, $collection->merge(['wp' => $wp]));
                }
            }
        }
        // dd($wp->getLoadout());
        $treasories = $job
            ->getTreasories()
            ->sortByDesc('created_at')
            ->take(24 * 30)
            ->reverse();

        $treasoriesDifference = $job
            ->getTreasories()
            ->sortByDesc('created_at')
            ->take(24 * 30)
            ->reverse()
            ->map(function ($item, $key) use ($treasories) {
                if ($key > 0) {
                    $item->treasory = $item->treasory - $treasories->get($key - 1)->treasory;
                } else {
                    $item->treasory = 0;
                }

                return $item;
            });

            // dd($job->members);
        return view('dashboard.job.show', [
            'organisation' => $job,
            'treasoriesDifference' => $treasoriesDifference,
            'treasories' => $treasories,
            'wp' => $weapons,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FiveM\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = Job::where('name', 'like', '%'.$query.'%')
         ->orWhere('label', 'like', '%'.$query.'%')
         ->get();

         
      }
      else
      {
       $data = Job::orderBy('name', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr class="text-gray-700 dark:text-gray-400">
         <td class="px-4 py-3 text-sm">'.$row->name.'</td>
         <td class="px-4 py-3 text-sm">'.$row->label.'</a></td>
         <td class="px-4 py-3 text-sm">'. $row->members->sortByDesc('job_grade')->pluck('name')->first().'</td>
         <td class="px-4 py-3 text-sm">'.number_format($row->getTreasory(),2) .'$'.'</td>
        
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
