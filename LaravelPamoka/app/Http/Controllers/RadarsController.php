<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Radar;
// use \Validator; // Naudojamas jei validatorius nusirodome Controleri
use App\Http\Requests\RadarsRequest;
use App\Repositories\RadarRepository;

class RadarsController extends Controller
{
    protected $radarRepository;

    public function __construct(RadarRepository $radarRepository)
    {
        $this->radarRepository = $radarRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radars = $this->radarRepository->getAllWithTrashed(8);

        return view('radars.index', compact('radars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RadarsRequest $request)
    {

        // Sis validator naudojmas jei nesame susikure savo Request apdorojimo - store(Request $request)
        // $validator = Validator::make($request->all(), [
        //     'number' => 'max:6',
        //     'time' => 'required',
        //     'distance' => 'required',
        // ]);

        // $validator->validate();
        
        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'distance' => $request->distance,
            'time' => $request->time,
            'user_id' => $request->user_id,
        ];

        $this->radarRepository->create($data);

        return redirect()->route('radars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $radar = $this->radarRepository->findById($id);

        if (is_null($radar)){
            return redirect()->route('radars.index');
        }

        return view('radars.show', compact('radar')); // ['radars' => Radar::findOrFail($id)]
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $radar = $this->radarRepository->findById($id);
        return view('radars.edit', compact('radar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RadarsRequest $request, $id)
    {

        //TODO ivesti logika, kad patikrintu ar pridedamas user id yra tarp useriu

        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'distance' => $request->distance,
            'time' => $request->time,
            'user_id_upd' => $request->user_id_upd,
        ];
        
        $this->radarRepository->update($id, $data);

        return redirect()->route('radars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->radarRepository->deleteById($id);

        return redirect()->route('radars.index');
    }

    public function restore($id)
    {
        $this->radarRepository->restoreById($id);

        return redirect()->route('radars.index');
    }
}
