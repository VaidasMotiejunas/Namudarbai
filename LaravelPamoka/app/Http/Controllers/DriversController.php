<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\Http\Requests\DriversRequest;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::withTrashed()->orderBy('name', 'decs')->paginate(8);
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriversRequest $request)
    {
        $data = [
            'name' =>$request->name,
            'city' =>$request->city,
            'user_id' =>$request->user_id,
        ];

    Driver::create($data);

    return redirect()->route('drivers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);

        if (is_null($driver)){
            return redirect()->route('drivers.index');
        }

        return view('drivers.show', compact('driver'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(DriversRequest $request, $id)
    {
        $driver = Driver::find($id);
        
        $data = [
            'name' => $request->name,
            'city' => $request->city,
            'user_id_upd' => $request->user_id_upd,
        ];

        $driver->update($data);
        return redirect()->route('drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Driver::find($id)->delete();
        return redirect()->route('drivers.index');
    }

    public function restore($id)
    {
        Driver::onlyTrashed()->find($id)->restore();
        return redirect()->route('drivers.index');
    }
}
