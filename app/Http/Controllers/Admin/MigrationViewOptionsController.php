<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MigrationViewOption;
use Illuminate\Http\Request;

class MigrationViewOptionsController extends Controller
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
            $migrationviewoptions = MigrationViewOption::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $migrationviewoptions = MigrationViewOption::latest()->paginate($perPage);
        }

        return view('admin.migration-view-options.index', compact('migrationviewoptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.migration-view-options.create');
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
        
        MigrationViewOption::create($requestData);

        return redirect('admin/migration-view-options')->with('flash_message', 'MigrationViewOption added!');
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
        $migrationviewoption = MigrationViewOption::findOrFail($id);

        return view('admin.migration-view-options.show', compact('migrationviewoption'));
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
        $migrationviewoption = MigrationViewOption::findOrFail($id);

        return view('admin.migration-view-options.edit', compact('migrationviewoption'));
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
        
        $migrationviewoption = MigrationViewOption::findOrFail($id);
        $migrationviewoption->update($requestData);

        return redirect('admin/migration-view-options')->with('flash_message', 'MigrationViewOption updated!');
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
        MigrationViewOption::destroy($id);

        return redirect('admin/migration-view-options')->with('flash_message', 'MigrationViewOption deleted!');
    }
}
