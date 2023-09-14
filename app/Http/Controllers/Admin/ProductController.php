<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $sections = Section::all();
        return view('Admin.product.index',compact('sections','products'));
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
    public function store(CreateProductRequest $request)
    {
        try {
            $data = Product::select("id")->where(['Product_name' => $request->Product_name])->orderby('id', 'DESC')->first();
            if (!empty($data)) {
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم القسم مسجل من قبل'])
                    ->withInput();
            }
            $data_insert['Product_name'] = $request->Product_name;
            $data_insert['section_id'] = $request->section_id;
            $data_insert['description'] = $request->description;
            Product::create($data_insert);
            return redirect()->route('admin.product.index')->with('success', 'تم إضافة البيانات بنجاح');
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
    public function update(UpdateProductRequest $request,$id)
    {
        try {
            $data = Product::select("id")->where('id',$request->pro_id)->first();
            $secion= Section::where('section_name', $request->section_name)->first()->id;
            if (empty($data)) {
                return redirect()->route('admin.product.index')->with(['error' => 'عفوا غير قادر علي الوصول الي البيانات المطلوبة !!']);
            }
            $checkExists = Product::where(['Product_name' => $request->Product_name])->where('id', '!=', $request->pro_id)->first();
            if ($checkExists != null) {
                return redirect()->back() ->with(['error' => 'عفوا اسم الحساب مسجل من قبل']) ->withInput();
            }
            $data_to_update['Product_name'] = $request->Product_name;
            $data_to_update['description'] = $request->description;
            $data_to_update['section_id'] = $secion;
            Product::where('id',$request->pro_id)->update($data_to_update);
            return redirect()->route('admin.product.index')->with(['success' => 'لقد تم تحديث البيانات بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()]) ->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->pro_id;
         Product::findOrFail($id)->delete();
         return redirect()->route('admin.product.index')->with(['success' => 'لقد تم حدف البيانات بنجاح']);

    }
}
