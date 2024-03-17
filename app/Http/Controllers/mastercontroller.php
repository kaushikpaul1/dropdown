<?php

namespace App\Http\Controllers;

use App\Models\mastermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mastercontroller extends Controller
{

    public function store(Request $request)
    {


        try {


            $info = new mastermodel();


            //left is for database column
            // right is for form submission
            $info->state = $request->state;
            $info->dist = $request->distt;
            $info->subdiv = $request->subdiv;

            if ($request->bm == 'M') {
                $info->muni = $request->bmcode;
                $info->ward = $request->gpward;
            } elseif ($request->bm == 'B') {
                $info->block = $request->bmcode;
                $info->gp = $request->gpward;
            }


            // $info->muni = $request->bm; 
            // $info->block = $request->bm; 
            // $info->gp = $request->gpward;
            // $info->ward = $request->gpward;


            $request->validate([
                'caste' => 'required|in:SC,ST,OBC', // Ensure the caste value is one of SC, ST, or OBC

            ]);
            if ($request->caste == 'OBC') {
                $request->validate([
                    'obcType' => 'required|in:OBC,OBC-A,OBC-B', // Validate sub-caste if caste is OBC
                ]);
                $info->caste = $request->obcType;
            } else {
                $info->caste = $request->caste; // For SC and ST, only caste information is stored
            }
            // $info->caste = $request->caste;



            if ($request->caste == 'SC') {
                $info->sc = $request->subcaste;
            } elseif ($request->caste == 'ST') {
                $info->st = $request->subcaste;
            } elseif ($request->caste == 'OBC') {
                $info->obc = $request->caste;


                if ($request->obcType == 'OBC-A') {
                    $info->obca = $request->obcType;
                } elseif ($request->obcType == 'OBC-B') {

                    $info->obcb = $request->obcType;
                }
            }
            $info->subcaste = $request->subcaste;
            $info->name = $request->applname;
            $info->fname = $request->fathername;
            $info->mname = $request->mothername;
            $info->mobile = $request->phno;
            $info->email = $request->email;


            $info->presentaddress = json_encode([
                'coP' => $request->coP,
                'stateP' => $request->stateP,
                'distP' => $request->distt,
                'policeP' => $request->policeP,
                'gpP' => $request->gpP,
                'paraP' => $request->paraP,
                'poP' => $request->poP,
                'pinP' => $request->pinP,
            ]);


            $info->permanentaddress = $request->description;
            $info->epic = $request->epic;
            $info->aadhar = $request->aadhar;
            $info->epicfile = $request->epicfile;
            $info->aadharfile = $request->aadharfile;
            // dd($request->dist);
            // dd($request->all());

            //    dd($request->presentaddress);


            $info->save();


            return redirect()->route('form.submit')->with('success', 'Data successfully saved!');
        } catch (\Exception $e) {
        }
    }


    // public function show()
    // {


    //     $mastertable = DB::table('mastertable')
    //         ->join('mastertable', 'state.sid', '=', 'mastertable.sid')
    //         // ->join('orders', 'users.id', '=', 'orders.user_id')
    //         ->select('mastertable.*', 'state.sname', 'orders.price')
    //         ->get();
    //     // return view('view');
    // }
    // public function show()
    // {
    //     $data = DB::table('mastertable')
    //         ->join('state', 'mastertable.id', '=', 'state.sid')
    //         // Assuming there's a relationship between mastertable and orders, uncomment this line if needed
    //         // ->join('orders', 'mastertable.id', '=', 'orders.mastertable_id')
    //         ->select('mastertable.*', 'state.sname')
    //         ->get();

    //     return $data;
    // }
    public function show()
    {
        $data = DB::table('mastertable')
            ->join('state', 'mastertable.state', '=', 'state.sid')
            ->join('dist', 'mastertable.dist', '=', 'dist.did')
            ->join('subdiv', 'mastertable.subdiv', '=', 'subdiv.subid')
            ->leftjoin('munci', 'mastertable.muni', '=', 'munci.munid')
            ->leftjoin('block', 'mastertable.block', '=', 'block.bid')
            ->leftjoin('gp', 'mastertable.gp', '=', 'gp.gpid')
            ->leftjoin('ward', 'mastertable.ward', '=', 'ward.wid')


            ->leftjoin('sc', 'mastertable.sc', '=', 'sc.scid')
            ->leftjoin('st', 'mastertable.st', '=', 'st.stid')
            ->leftjoin('casteall', 'mastertable.subcaste', '=', 'casteall.casteid')
            ->get(['state.sname', 'dist.dname', 'subdiv.subname', 'munci.mname', 'block.bname', 'gp.gpname', 'ward.wname', 'mastertable.caste', 'sc.scname', 'st.stname', 'casteall.castename']);
        // ->select('state.sname')
        // ->get();

        // return $data;
        return view('view', compact('data'));
    }
}
