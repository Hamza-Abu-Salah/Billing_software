<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings=Setting::where('group','social')->orderBy('id')->get();

        return view('Admin.settings.index',compact('settings'));
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
        //
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
    public function update(Request $request, string $id)
    {

            $data = $request->except(['_token' , '_method']);
            foreach ($data as $k => $v) {
                $this->update_setting([
                    'key' => $k,
                    'value' => $v
                ], $k);
            }

            return redirect()->back()->with('success', 'Added successfully');
    }

     public function update_setting($data,$key){
        return Setting::where('key',$key)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
