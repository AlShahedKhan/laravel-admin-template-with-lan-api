<?php

namespace App\Http\Controllers;

use App\Models\Matchh;
use Illuminate\Http\Request;
use App\Models\ManagePublicTable;
use Illuminate\Support\Facades\DB;

class ManagePublicTableController extends Controller
{
    public function index()
    {
        $data = ManagePublicTable::all();
        $matchh = Matchh::all();
        return view('admin.manage.manage-public-table.index',  compact('data', 'matchh'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->match_id);
        ManagePublicTable::insert([
            'match_id' => $request->match_id,
            'table_number' => $request->table_number,
            'targeted_runs' => $request->targeted_runs,
            'targeted_overs' => $request->targeted_overs,
        ]);
        $notification = array('message' => 'Table Number Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function update(Request $request)
    {
        $data = array();
        $data['match_id'] = $request->match_id;
        $data['table_number'] = $request->table_number;
        $data['targeted_runs'] = $request->targeted_runs;
        $data['targeted_overs'] = $request->targeted_overs;
        DB::table('manage_public_tables')->where('id', $request->id)->update($data);

        $notification = array('message' => 'Public Table Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $managepublictable = ManagePublicTable::find($id);
        $managepublictable->delete();
        $notification = array('message' => 'Public Table Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
