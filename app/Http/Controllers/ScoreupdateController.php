<?php

namespace App\Http\Controllers;

use App\Models\Scoreupdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreupdateController extends Controller
{
    public function index()
    {
            $data=Scoreupdate::all();
            $scoreupdate=Scoreupdate::all();
            return view('admin.manage.scoreupdate.index',compact('data','scoreupdate'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'out_type' => 'required|max:55',
            'out_by_type' => 'required|max:55',
            'one' => 'required|max:55',
            'two' => 'required|max:55',
            'three' => 'required|max:55',
            'four' => 'required|max:55',
            'six' => 'required|max:55',
            'balls_played' => 'required|max:55',
        ]);

        Scoreupdate::insert([
            'out_type' => $request->out_type,
            'out_by_type' => $request->out_by_type,
            'one' => $request->one,
            'two' => $request->two,
            'three' => $request->three,
            'four' => $request->four,
            'six' => $request->six,
            'balls_played' => $request->balls_played,
        ]);
        $notification = array('message'=>'Scoreupdate Inserted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
            $data=Scoreupdate::find($id);

            return view('admin.manage.scoreupdate.edit',compact('data'));
    }

    public function update(Request $request)
    {
            $data=array();
            $data['out_type']=$request->out_type;
            $data['out_by_type']=$request->out_by_type;
            $data['one']=$request->one;
            $data['two']=$request->two;
            $data['three']=$request->three;
            $data['four']=$request->four;
            $data['six']=$request->six;
            $data['balls_played']=$request->balls_played;
            DB::table('scoreupdates')->where('id',$request->id)->update($data);

        $notification = array('message'=>'Scoreupdates Updated!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $scoreupdate=Scoreupdate::find($id);
        $scoreupdate->delete();
        $notification = array('message'=>'Match Deleted!','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
