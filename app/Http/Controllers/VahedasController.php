<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vaheda;
use Illuminate\Http\Request;

class VahedasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $vahedas = Vaheda::latest()->paginate($perPage);
        } else {
            $vahedas = Vaheda::latest()->paginate($perPage);
        }

        return view('vahedas.index', compact('vahedas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vahedas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Vaheda::create($requestData);

        return redirect('vahedas')->with('flash_message', 'Vaheda added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $vaheda = Vaheda::findOrFail($id);

        return view('vahedas.show', compact('vaheda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $vaheda = Vaheda::findOrFail($id);

        return view('vahedas.edit', compact('vaheda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $vaheda = Vaheda::findOrFail($id);
        $vaheda->update($requestData);

        return redirect('vahedas')->with('flash_message', 'Vaheda updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Vaheda::destroy($id);

        return redirect('vahedas')->with('flash_message', 'Vaheda deleted!');
    }
}
