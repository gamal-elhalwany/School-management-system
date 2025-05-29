<?php

namespace App\Http\Controllers\Classrooms;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stage;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            $stages = Stage::all();
            $classrooms = Classroom::all();
            return view('pages.classrooms.index', compact('stages', 'classrooms'));
        }
        return redirect()->route('login');
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
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                'name' => [
                    'ar' => 'required|min:3|max:50',
                    'en' => 'required|min:3|max:50',
                ],
                [
                    'name.required' => __('validation.required'),
                ]
            ]
        );

        $user = auth()->user();
        if ($user) {

            foreach ($request->List_Classes as $class) {
                Classroom::create([
                    'name' => [
                        'ar' => $class['name_ar'],
                        'en' => $class['name_en'],
                    ],

                    'stage_id' => $class['stage_id'],
                ]);
            }
            toastr()->success(__('messages.success'));
            return redirect()->back();
        }
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate(
            [
                'name_ar' => 'required|min:3|max:50',
                'name_en' => 'required|min:3|max:50',
            ],
            [
                'name.required' => __('validation.required'),
            ]
        );

        $user = auth()->user();
        if ($user) {

            $classroom->update([
                'name' => [
                    'ar' => $request->name_ar,
                    'en' => $request->name_en,
                ],

                'stage_id' => $request->stage_id,
            ]);

            toastr()->success(__('messages.update'));
            return redirect()->back();
        }
        return redirect()->route('login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $user = auth()->user();
        if ($user) {
            $classroom->delete();
            toastr()->info('messages.delete');
            return redirect()->back();
        }
        return redirect()->route('login');
    }

    public function delete_all_classrooms(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $all_classrooms = explode(',', $request->delete_all_id);

            Classroom::whereIn('id', $all_classrooms)->delete();
            toastr()->error('messages.delete');
            return redirect()->back();
        }
        return redirect()->route('login');
    }
}
