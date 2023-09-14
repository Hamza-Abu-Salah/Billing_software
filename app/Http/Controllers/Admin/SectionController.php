<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Section::all();
        return view('Admin.sections.index', compact('data'));
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
    public function store(CreateSectionRequest $request)
    {
        try {
            $data = Section::select("id")->where(['section_name' => $request->section_name])->orderby('id', 'DESC')->first();
            if (!empty($data)) {
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم القسم مسجل من قبل'])
                    ->withInput();
            }
            $data_insert['section_name'] = $request->section_name;
            $data_insert['description'] = $request->description;
            $data_insert['Created_by'] = auth()->user()->name;
            Section::create($data_insert);
            return redirect()->route('admin.section.index')->with('success', 'تم إضافة البيانات بنجاح');
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => "عفوا حدث خطأما" . " " . $ex->getMessage()])->withInput();
        }
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
    public function update(UpdateSectionRequest $request)
    {

        try {
            $id = $request->id;
            $data=Section::select()->find($id);
                if(empty($data)){
                return redirect()->route('admin.section.index')->with(['error'=>'عفوا غير قادر علي الوصول الي البيانات المطلوبة !!']);
                }
                $checkExists=Section::where(['section_name'=>$request->section_name])->where('id','!=',$id)->first();
                if( $checkExists!=null){
                return redirect()->back()
                ->with(['error'=>'عفوا اسم القسم مسجل من قبل'])
                ->withInput();
                }

                $data_update['section_name'] = $request->section_name;
                $data_update['description'] = $request->description;
                $sections = Section::where('id',$id)->update($data_update);



            return redirect()->route('admin.section.index')->with(['success' => 'لقد تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
         Section::find($id)->delete();
         return redirect()->route('admin.section.index')->with(['success' => 'لقد تم حدف البيانات بنجاح']);

    }
}
