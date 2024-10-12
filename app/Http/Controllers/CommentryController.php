<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Commentry;
use Illuminate\Http\Request;
use App\Models\CommentryCreate;
use Illuminate\Support\Facades\DB;

class CommentryController extends Controller
{
    public function index()
    {
        // $data['score_short'] = Commentry::select(
        //     'id',
        //     'team_id',
        //     'match_id',
        // )
        //     ->groupBy('team_id')
        //     ->get();
        $data['commentry'] = Commentry::all();
        $data['match'] = Matchh::all();
        $data['team'] = Team::all();
        $data['match'] = Matchh::all();
        $data['player'] = Player::all();
        $data['player2'] = Player::all();
        $data['CommentryCreate'] = CommentryCreate::all();
        return view('admin.manage.commentry.index',compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all());


        try {
            Commentry::insert([
                'match_id' => $request->match_id,
                'team_id' => $request->team_id,
                'player_id' => $request->player_id,
                'player2_id' => $request->player2_id,
                'team2_id' => $request->team2_id,
                'details_id' => $request->details_id,
            ]);
            $notification = array('message' => 'Commentry Inserted!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            dd($th);
        }
       
    }

    public function destroy($id)
    {
        $commentry = Commentry::find($id);
        $commentry->delete();
        $notification = array('message' => 'commentry Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = Commentry::find($id);
        $match = Matchh::all();
        $CommentryCreate = DB::table('commentry_creates')->get();

        return view('admin.manage.commentry.edit', compact('data', 'match','CommentryCreate'));
    }

    public function update(Request $request)
    {
        $data = array();
        $data['player_id']=$request->player_id;
        $data['team_id']=$request->team_id;
        $data['match_id']=$request->match_id;
        $data['player2_id']=$request->player2_id;
        $data['team2_id']=$request->team2_id;
        $data['details_id']=$request->details_id;
        try {
            DB::table('commentries')->where('id', $request->id)->update($data);
        } catch (\Throwable $th) {
            throw $th;
        }

        $notification = array('message' => 'commentrys Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function getTeamList(Request $request)
    {
        $match = Matchh::where('id',$request->id)->first();
        $teams = Team::where('id',$match->team_id)->orWhere('id',$match->team2_id)->get();
        return view('admin.manage.commentry.team_list', compact('teams'));
    }

    public function getPlayerList(Request $request)
    {
        $players = Player::where('team_id',$request->id)->get();
        return view('admin.manage.commentry.player_list', compact('players'));
    }
}
