<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datacrud;
use Illuminate\Support\Facades\DB;

class DatacrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacruds = DB::table('datacruds')->paginate(3);
        return view('datacrud',['datacruds' => $datacruds]);
    }

    public function add()
    {
        return view('datacrud');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert into datacruds table
	    DB::table('datacruds')->insert([
		'id' => $request->id,
		'name' => $request->name,
		'content' => $request->content
	    ]);
	    return redirect('/datacrud');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datacruds = DB::table('datacruds')->where('id',$id)->get();
	    return view('show',['datacruds' => $datacruds]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datacruds = DB::table('datacruds')->where('id',$id)->get();
	    return view('edit',['datacruds' => $datacruds]);
    }


    public function update(Request $request)
    {
            DB::table('datacruds')->where('id', $request->id)->update([
                'name' => $request->name,
                'content' => $request->content,
            ]);
            return redirect('/datacrud');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
		$datacruds = DB::table('datacruds')
		->where('name','like',"%".$search."%")
        ->paginate();
		return view('datacrud',['datacruds' => $datacruds]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('datacruds')->where('id',$id)->delete();
	    return redirect('datacrud');
    }
}
