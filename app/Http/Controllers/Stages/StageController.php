<?php

namespace App\Http\Controllers\Stages;

use App\Models\Stage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStageRequest;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $stages = Stage::all();
        if ($user) {
            return view('pages.stages.index', compact('stages'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStageRequest $request)
    {
        $user = auth()->user();
        if ($user)
        {
            $stage = Stage::create([
                'name' => [
                    'en' => $request->post('name_en'),
                    'ar' => $request->post('name_ar'),
                ],
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('stages.index');
        }
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStageRequest $request, Stage $stage)
    {
        $user = auth()->user();
        if ($user)
        {
            $stage->update($request->all());
            toastr()->success(trans('messages.success'));
            return redirect()->route('stages.index');
        }
        return redirect()->route('login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Stage $stage)
    {
        $user= auth()->user();
        if ($user) {
            $stage->delete();
            toastr()->info(trans('messages.delete'));
            return redirect()->route('stages.index');
        }
        return redirect()->route('login');
    }
}
