<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SpacePark;
use LRedis;

class SpaceParkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_space_parks = SpacePark::All();
        return view('space_parks.list', compact('list_space_parks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('space_parks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $space_park = $request->except('_token');
        SpacePark::insert($space_park);
        return redirect()->Route('list-space-park');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
       
        $space_park = SpacePark::find($id);
        return view('space_parks.edit', compact('space_park'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $redis = LRedis::connection();
        //dd($redis);
        $redis->publish('message', 'hello');
        $space_park = SpacePark::find($id);
        $data = $request->only('number', 'group_id', 'status', 'trouble');
        $space_park->update($data);
        return redirect()->Route('list-space-park');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $space_park = SpacePark::find($id);
        $space_park->delete();
        return redirect()->Route('list-space-park');
    }
}
