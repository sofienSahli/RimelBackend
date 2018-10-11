<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spot;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spot = new Spot;

        if ($request->hasFile('file')) {
            // $request->image->store();
            $fileName = $request->file("file");
            $path = $request->file->store("storage/images");
            $spot->image = $path;


        }
        $data = json_decode($request['spot'], true);
        $spot->id = $data['id'];
        $spot->description = $data['description'];

        $spot->latitude = $data['latitude'];
        $spot->longitude = $data['longitude'];
        $spot->circuit_id = $data['circuit_id'];
        $spot->save();
        return json_encode($spot);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
