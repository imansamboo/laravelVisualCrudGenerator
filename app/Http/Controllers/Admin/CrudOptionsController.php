<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CrudOption;
use Illuminate\Http\Request;

class CrudOptionsController extends Controller
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
            $crudoptions = CrudOption::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $crudoptions = CrudOption::latest()->paginate($perPage);
        }

        return view('admin.crud-options.index', compact('crudoptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.crud-options.create');
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
        
        CrudOption::create($requestData);

        return redirect('admin/crud-options')->with('flash_message', 'CrudOption added!');
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
        $crudoption = CrudOption::findOrFail($id);

        return view('admin.crud-options.show', compact('crudoption'));
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
        $crudoption = CrudOption::findOrFail($id);

        return view('admin.crud-options.edit', compact('crudoption'));
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
        
        $crudoption = CrudOption::findOrFail($id);
        $crudoption->update($requestData);

        return redirect('admin/crud-options')->with('flash_message', 'CrudOption updated!');
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
        CrudOption::destroy($id);

        return redirect('admin/crud-options')->with('flash_message', 'CrudOption deleted!');
    }
}
