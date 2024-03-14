<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class maincontroller extends Controller
{
    public function index()
    {
        $state = DB::table('state')->orderBy('sname', 'ASC')->get();
        $data['state'] = $state;
        return view('home', $data);
    }
    public function fetchDist($sid = null)
    {
        $dist = DB::table('dist')->where('sid', $sid)->get();
        return response()->json([
            'status' => 1,
            'dist' => $dist
        ]);
    }
    public function fetchDiv($did = null)
    {
        $subdiv = DB::table('subdiv')->where('did', $did)->get();
        return response()->json([
            'status' => 1,
            'subdiv' => $subdiv


        ]);
    }

    public function fetchMunci($subid = null)
    {
        $munci = DB::table('munci')->where('subid', $subid)->get();
        return response()->json([
            'status' => 1,
            'munci' => $munci
        ]);
    }
    public function fetchBlock($subid = null)
    {
        $block = DB::table('block')->where('subid', $subid)->get();
        return response()->json([
            'status' => 1,
            'block' => $block
        ]);
    }

    public function fetchWard($munid = null)
    {
        $ward = DB::table('ward')->where('munid', $munid)->get();
        return response()->json([
            'status' => 1,
            'ward' => $ward
        ]);
    }
    public function fetchGP($bid = null)
    {
        $gp = DB::table('gp')->where('bid', $bid)->get();
        return response()->json([
            'status' => 1,
            'gp' => $gp
        ]);
    }
    public function fetchSc($sc = null)
    {
        // $sc = DB::table('sc')->where('scid', $scid)->get();
        // return response()->json([
        //     'status' => 1,
        //     'sc' => $sc
        // ]);

        $sc = DB::table('sc')->get();
        
        $data['sc'] = $sc;
        return response()->json([
            'status' => 1,
            'sc' => $sc
        ]);
    }
    public function fetchSt($st = null)
    {
       

        $st = DB::table('st')->get();
        $data['st'] = $st;
        return response()->json([
            'status' => 1,
            'st' => $st
        ]);
    }
    public function fetchObc(){
        // $obc = DB::table('obc')->get();
        // $data['obc'] = $obc;
        // return response()->json([
        //     'status' => 1,
        //     'obc' => $obc
        // ]);
        
    }
    public function fetchCaste($casteid = null){
        $caste = DB::table('casteall')->where('obcid', $casteid)->get();
        $data['caste'] = $caste;
        return response()->json([
            'status' => 1,
            'caste' => $caste
        ]);
        
    }
    // for address district fetching
    // public function getDist(Request $request){

    //     $selectedDistrict = $request->input('selectedDistrict');

    //     // Fetch districts based on the selected district
    //     // $districts = District::where('parent_district', $selectedDistrict)->get();

    //     return response()->json($districts);

    // }

   
    
      
    
  
}
