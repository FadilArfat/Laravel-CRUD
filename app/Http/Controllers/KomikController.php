<?php

namespace App\Http\Controllers;

use App\Models\Komik;
use App\Http\Requests\StoreKomikRequest;
use App\Http\Requests\UpdateKomikRequest;
use Illuminate\Http\Request;

class KomikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $komiks = Komik::latest()->paginate(5);
        return view('komik.index', compact('komiks'))
        ->with('i', (request()->input('page', 1) - 1) * 5);;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('komik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKomikRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
        
        Komik::create($request->all());

        return redirect()->route('komik.index')
        ->with('success','Komik created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komik  $komik
     * @return \Illuminate\Http\Response
     */
    public function show(Komik $komik)
    {
        //
        return view('komik.show', compact('komik'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komik  $komik
     * @return \Illuminate\Http\Response
     */
    public function edit(Komik $komik)
    {
        //
        return view('komik.edit',compact('komik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKomikRequest  $request
     * @param  \App\Models\Komik  $komik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komik $komik)
    {
        //
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        $komik->update($request->all());

        return redirect()->route('komik.index')
        ->with('success','Komik updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komik  $komik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komik $komik)
    {
        //
        $komik->delete();
    
        return redirect()->route('komik.index')
                        ->with('success','Komik deleted successfully');
    }

}
