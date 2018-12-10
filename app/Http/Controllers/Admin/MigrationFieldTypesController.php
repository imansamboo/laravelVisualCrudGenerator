<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MigrationFieldType;
use Illuminate\Http\Request;

class MigrationFieldTypesController extends Controller
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
            $migrationfieldtypes = MigrationFieldType::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $migrationfieldtypes = MigrationFieldType::latest()->paginate($perPage);
        }

        return view('admin.migration-field-types.index', compact('migrationfieldtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.migration-field-types.create');
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
        
        MigrationFieldType::create($requestData);

        return redirect('admin/migration-field-types')->with('flash_message', 'MigrationFieldType added!');
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
        $migrationfieldtype = MigrationFieldType::findOrFail($id);

        return view('admin.migration-field-types.show', compact('migrationfieldtype'));
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
        $migrationfieldtype = MigrationFieldType::findOrFail($id);

        return view('admin.migration-field-types.edit', compact('migrationfieldtype'));
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
        
        $migrationfieldtype = MigrationFieldType::findOrFail($id);
        $migrationfieldtype->update($requestData);

        return redirect('admin/migration-field-types')->with('flash_message', 'MigrationFieldType updated!');
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
        MigrationFieldType::destroy($id);

        return redirect('admin/migration-field-types')->with('flash_message', 'MigrationFieldType deleted!');
    }
}
