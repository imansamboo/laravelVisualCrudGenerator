<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ViewOption;
use Illuminate\Http\Request;

class ViewOptionsController extends Controller
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
            $viewoptions = ViewOption::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $viewoptions = ViewOption::latest()->paginate($perPage);
        }

        return view('admin.view-options.index', compact('viewoptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.view-options.create');
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
        
        ViewOption::create($requestData);

        return redirect('admin/view-options')->with('flash_message', 'ViewOption added!');
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
        $viewoption = ViewOption::findOrFail($id);

        return view('admin.view-options.show', compact('viewoption'));
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
        $viewoption = ViewOption::findOrFail($id);

        return view('admin.view-options.edit', compact('viewoption'));
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
        
        $viewoption = ViewOption::findOrFail($id);
        $viewoption->update($requestData);

        return redirect('admin/view-options')->with('flash_message', 'ViewOption updated!');
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
        ViewOption::destroy($id);

        return redirect('admin/view-options')->with('flash_message', 'ViewOption deleted!');
    }
}
