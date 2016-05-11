<?php

namespace App\Http\Controllers;
use App\Fileentry;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;

use Illuminate\Pagination\Paginator;
use Session;
use DB;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home/index');
    }

    public function save_detail() {

        $name = \Input::get('name');
        $email = \Input::get('email');
        $message = \Input::get('message');
        DB::table('test')->insert(
                ['name' => $name, 'email' => $email, 'message' => $message]
        );
        $file = Request::file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename() . '.' . $extension, File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename() . '.' . $extension;

        $entry->save();
        Session::flash('message', 'Detail Saved Successfully');
        return redirect('/');
    }

    public function view() {
        $results = DB::table('test')->paginate(3);
//       $name[]=\Input::get('name');
//       $name[]=\Input::get('email');
//       $name[]=\Input::get('message');
        //echo sizeof($name);
        return \View::make('home.view')->with('results', $results);
    }

    public function delete($id) {
        DB::table('test')->where('id', $id)->delete();
        return redirect('/');
    }

    public function edit($id) {
        $detail = DB::table('test')->where('id', $id)->get();

        return \View::make('home.edit')->with('data', $detail);
    }

    public function update(Request $request) {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        DB::table('test')
                ->where('id', $id)
                ->update(['name' => $name, 'email' => $email, 'message' => $message]);
        return redirect('/');
    }

}
