<?php

namespace Puneetxp\KvDb\Controller;

use Punetxp\KvDb\Models\Enviroment;
use App\Service\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EnviromentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $env = Enviroment::where('enviroment_id',null)->get()->groupBy('key');
        return view('admin.env', ["enviroments" => $env]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Enviroment::create(["key" => strtolower($request->name), 'enviroment_id' => $request->has('enviroment_id') ? $request->enviroment_id : null, 'pattern' => $request->has('pattern') ? $request->pattern : null, 'type' => $request->type, 'multiple' => $request->has('multiple') ? 1 : 0]);
        $response['success'] = true;
        $response['selfReload'] = true;
        return response()->json($response, 200);
        //
    }
    public function storeNewCustom(Request $request)
    {
        $env = Enviroment::find($request->id);
        $new =   Enviroment::create(["key" => $env->key,  'pattern' => $env->pattern, 'type' => $request->type, 'multiple' => $env->multiple,'enviroment_id'=>$env->enviroment_id ]);
        foreach ($env->categorychildern as $child) {
            Enviroment::create([
                "key" => strtolower($child->key),
                'enviroment_id' => $new->id,
                'pattern' =>  $child->pattern,
                'type' => $child->type,
                'multiple' => $child->multiple
            ]);
        }
        $response['success'] = true;
        $response['selfReload'] = true;
        return response()->json($response, 200);
        //
    }
    public function storeNewCustomupdate(Request $request, Enviroment $enviroment)
    {
        foreach ($enviroment->categorychildern as $child) {
            if ($child->type == 'photo') {
                if ($request->hasFile($child->key)) {
                    $v = (new FileUpload())->file_upload($request->{$child->key})['url'];
                    $child->update(['value' => $v]);
                }
            } else {
                if ($request->has($child->key)) {
                    $child->update(['value' => $request->{$child->key}]);
                }
            }
        }
        $response['success'] = true;
        $response['selfReload'] = true;
        return response()->json($response, 200);
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enviroment  $enviroment
     * @return \Illuminate\Http\Response
     */
    public function show(Enviroment $enviroment)
    {
        // dd( Enviroment::where('key', $enviroment->key)->with(['categorychildernbykey', 'categoryparent'])->get());
        return view('admin.showenv', [
            "primary" => $enviroment,
            "envs" => Enviroment::where('key', $enviroment->key)->with(['categorychildernbykey','categorychildern', 'categoryparent'])->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enviroment  $enviroment
     * @return \Illuminate\Http\Response
     */
    public function edit(Enviroment $enviroment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enviroment  $enviroment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enviroment $enviroment)
    {
        if ($enviroment->type == 'photo') {
            $v = (new FileUpload())->file_upload($request->value)['url'];
            $enviroment->update(['value' => $v]);
            $response['success'] = true;
            $response['selfReload'] = true;
            return response()->json($response, 200);
        }
        $enviroment->update(['value' => $request->value]);
        $response['success'] = true;
        $response['selfReload'] = true;
        return response()->json($response, 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enviroment  $enviroment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enviroment $enviroment)
    {
        $enviroment->delete();
        $response['success'] = true;
        $response['selfReload'] = true;
        return response()->json($response, 200);
        //
    }
}

