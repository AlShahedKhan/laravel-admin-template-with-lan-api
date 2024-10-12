<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentryCreate;
use Illuminate\Support\Facades\DB;

class CommentryCreateController extends Controller
{
    public function index()
    {
        $data = CommentryCreate::all();
        return view('admin.manage.commentrycreate.index', compact('data'));
    }

    public function store(Request $request)
    {

        CommentryCreate::insert([
            'to' => $request->to,
            'details' => $request->details,
        ]);
        $notification = array('message' => 'Commentry Create Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $commnetrycreate = CommentryCreate::find($id);
        $commnetrycreate->delete();
        $notification = array('message' => 'commnetry crate Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data = CommentryCreate::find($id);
        return view('admin.manage.commentrycreate.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $data = array();
        $data['to'] = $request->to;
        $data['details'] = $request->details;
        DB::table('commentry_creates')->where('id', $request->id)->update($data);
        $notification = array('message' => 'commentry creates Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
