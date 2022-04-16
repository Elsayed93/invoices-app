<?php

namespace App\Http\Controllers;

use App\Http\Requests\Section\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
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
    public function store(SectionRequest $request)
    {
        $data = $request->validated();

        $section = Section::create($data);

        if ($section) {
            return redirect()->route('sections.index')->with('success', 'تمت الإضافة بنجاح');
        } else {
            return redirect()->back()->with('error', 'فضلت عملية الإضافة');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $Section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $view = view('sections._edit', compact('section'))->render();

        return response()->json([
            'data' => $view,
            'status' => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, Section $section)
    {

        $data = $request->validated();

        $section = $section->update($data);

        if ($section) {
            return redirect()->route('sections.index')->with('success', 'تم التعديل بنجاح');
        } else {
            return redirect()->back()->with('error', 'فضلت عملية التعديل');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section = $section->delete();

        if ($section) {
            return redirect()->route('sections.index')->with('success', 'تم المسح بنجاح');
        } else {
            return redirect()->back()->with('error', 'فضلت عملية المسح');
        }
    }
}
