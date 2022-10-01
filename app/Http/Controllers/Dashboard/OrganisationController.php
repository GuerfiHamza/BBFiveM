<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FiveM\Organisation;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        $organisation = Organisation::when($request->has("name"),function($q)use($request){
            return $q->where("name","like","%".$request->get("name")."%");
        })->paginate(5);
        if($request->ajax()){
            return view('dashboard.organisation.index', compact('organisation'));
        } 
        dd($organisation);

        return view('dashboard.organisation.index', compact('organisation'));
    }

    public function search(Request $request)
    {
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = Organisation::where('name', 'like', '%'.$query.'%')
         ->orWhere('label', 'like', '%'.$query.'%')
         ->get();

      }
      else
      {
       $data = Organisation::orderBy('name', 'desc')
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
         <td class="px-4 py-3 text-sm">'. $row->members->sortByDesc('org_grade')->pluck('name')->first().'</td>
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

    public function show(){

    }
}
