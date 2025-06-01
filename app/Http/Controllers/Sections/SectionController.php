<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Stage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            $stages = Stage::with(['sections', 'classrooms'])->get();
            return view('pages.sections.index', compact('stages'));
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
        $request->validate([
            ['section_name' => [
                'ar' => 'required',
                'en' => 'required',
            ]],
            'stage_id' => 'required',
            'class_id' => 'required',
        ]);

        $user = auth()->user();
        if ($user) {
            Section::create([
                    'section_name' => [
                        'ar' => $request->section_name_ar,
                        'en' => $request->section_name_en,
                    ],
                    'stage_id' => $request->stage_id,
                    'classroom_id' => $request->class_id,
            ]);

            alert()->success(__('Success'), 'messages.success');
            return redirect()->back();
        }
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            ['section_name' => [
                'ar' => 'required',
                'en' => 'required',
            ]],
            'stage_id' => 'required',
            'class_id' => 'required',
        ]);

        if (isset($request->status)) {
            $section->status = 1;
        } else {
            $section->status = 0;
        }

        $section->update($request->all());
        Alert::success(__('Success'), __('messages.update'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $user = auth()->user();

        if ($user) {
            $section->delete();
            alert()->error(__('Delete'), __('messages.delete'));
            return redirect()->back();
        }
        return redirect()->route('login');
    }

    public function getClasses($id)
    {
        $user = auth()->user();
        if ($user) {
            $classes = Classroom::where('stage_id', $id)->pluck('name', 'id');
            return $classes;
        }
        return redirect()->route('login');
    }
}
