<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Crud;
use App\MigrationField;
use App\ModelField;
use Illuminate\Http\Request;

class crudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
       /* $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $posts = Post::where('title', 'LIKE', "%$keyword%")
9                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $posts = Post::latest()->paginate($perPage);
        }

        return view('posts.index', compact('posts'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cruds.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function createModel($crudId)
    {
        $crud = Crud::find($crudId);
        MigrationField::where('crud_id', '=', $crudId)->pluck('name', 'id');
        /*$crudFields = array();
        foreach(MigrationField::where('crud_id', '=', $crudId)->get() as $crudField){
            
        }*/
        return view('cruds.createModel', array('crud' => $crud));
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
     
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function storeMigration(Request $request)
    {
        $requestData = $request->all();
        $crud = Crud::create(
            array(
                'name' => $requestData['name']
            )
        );
        $schema ="";
        $number = $requestData['number'];
        for($i=1; $i < $number + 1; $i++){
            MigrationField::create(
                array(
                    'crud_id' => $crud->id,
                    'name' => $requestData['field_name' . $i],
                    'type' => $requestData['fieldType' . $i],
                    'options' => $requestData['options' . $i],
                    'nullable' => 0,
                )
            );
            $schema .= $requestData['field_name' . $i]. "#" .  $requestData['fieldType' . $i];
            if( $requestData['options' . $i] != null &&  $requestData['options' . $i] != ''){
                $options = explode('#', $requestData['options' . $i]);
                $schema .= '#options={';
                $i = 0;
                $count = count($options);
                foreach ($options as $option){
                    $i++;
                    if($i < $count){
                        $schema .= '"' . $option . '":"' . ucwords($option) . '" ,';
                    }else{
                        $schema .= '"' . $option . '":"' . ucwords($option) . '"';
                    }
                }
                $schema .= '};';

            }else{
                $schema .= ";";
            }
        }
        $schema .= "";
        echo $schema;

        \Artisan::call('crud:migration',[
            'name' => $requestData['name'],
            '--schema' => $schema,
        ]);
        //'cscs#string;csc#enum#options={"cs":"Cs" ,"ffe":"Ffe" ,"ddv":"Ddv"};'
        \Artisan::call('migrate');
        return view('cruds.createModel');
    }

    /**
     * @param Request $request
     */
    public function storeModel(Request $request)
    {
        $data = $request->only('modelName', 'fillables');
        //$fillables = ['title', 'body']
        $fillables = "";
        $fillables .= "[" ;
        foreach($data['fillables'] as $fillable){
            ModelField::create(
                array(
                    'migration_field_id' => $fillable,
                    'isFillable' => 1,
                    'name' => $data['modelName'],
                )
            );
            $fillables .="'" .  MigrationField::find($fillable)->name . "',";
        }
        $fillables = substr($fillables, 0, -1);
        $fillables .= "]" ;
        \Artisan::call('crud:model',[
            'name' => $data['modelName'],
            '--fillable' => $fillables,
            '--table' => strtolower($data['modelName']) . 's'
        ]);

        \Artisan::call('crud:controller',[
            'name' => $data['modelName'] . 'sController',
            '--crud-name' => strtolower($data['modelName']) . 's',
            '--model-name' => $data['modelName'] . 's',
        ]);

    }

    public function storeView(Request $request)
    {
        $data = $request->only('modelName', 'fillables');
        //$fillables = ['title', 'body']
        $fillables = "";
        $fillables .= "[" ;
        foreach($data['fillables'] as $fillable){
            ModelField::create(
                array(
                    'migration_field_id' => $fillable,
                    'isFillable' => 1,
                    'name' => $data['modelName'],
                )
            );
            $fillables .="'" .  MigrationField::find($fillable)->name . "',";
        }
        $fillables = substr($fillables, 0, -1);
        $fillables .= "]" ;
        \Artisan::call('crud:model',[
            'name' => $data['modelName'],
            '--fillable' => $fillables,
            '--table' => strtolower($data['modelName']) . 's'
        ]);

        \Artisan::call('crud:controller',[
            'name' => $data['modelName'] . 'sController',
            '--crud-name' => strtolower($data['modelName']) . 's',
            '--model-name' => $data['modelName'] . 's',
        ]);

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
        /*$post = Post::findOrFail($id);

        return view('posts.show', compact('post'));*/
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
        /*$post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));*/
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

        /*$requestData = $request->all();

        $post = Post::findOrFail($id);
        $post->update($requestData);

        return redirect('posts')->with('flash_message', 'Post updated!');*/
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
        /*Post::destroy($id);

        return redirect('posts')->with('flash_message', 'Post deleted!');*/
    }
}
