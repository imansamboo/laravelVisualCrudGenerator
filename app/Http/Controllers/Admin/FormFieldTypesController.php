<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FormFieldType;
use Illuminate\Http\Request;

class FormFieldTypesController extends Controller
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
            $formfieldtypes = FormFieldType::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $formfieldtypes = FormFieldType::latest()->paginate($perPage);
        }

        return view('admin.form-field-types.index', compact('formfieldtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.form-field-types.create');
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
        
        FormFieldType::create($requestData);

        return redirect('admin/form-field-types')->with('flash_message', 'FormFieldType added!');
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
        $formfieldtype = FormFieldType::findOrFail($id);

        return view('admin.form-field-types.show', compact('formfieldtype'));
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
        $formfieldtype = FormFieldType::findOrFail($id);

        return view('admin.form-field-types.edit', compact('formfieldtype'));
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
        
        $formfieldtype = FormFieldType::findOrFail($id);
        $formfieldtype->update($requestData);

        return redirect('admin/form-field-types')->with('flash_message', 'FormFieldType updated!');
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
        FormFieldType::destroy($id);

        return redirect('admin/form-field-types')->with('flash_message', 'FormFieldType deleted!');
    }
}
