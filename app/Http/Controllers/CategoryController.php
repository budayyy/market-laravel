<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $category = Category::all();
        return view('category.index', [
            "title" => "Category",
            "category" => $category,
            "session"  => $session
        ]);
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
        $this->validate($request, [
            'ctg_name' => 'required|max:255'
        ]);

        //pembuatan id category
        $hasil = Category::max('ctg_id');
        $id = $hasil;
        $num = (int)substr($id, 3);
        $num++;
        $char = 'CTG';
        $newID = $char . sprintf("%04s", $num);

        Category::create([
            'ctg_id' => $newID,
            'ctg_name' => $request->get('ctg_name')
        ]);

        return redirect('/category')->with('success', 'Category has ben Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ctg_name' => 'required|max:255'
        ]);

        $category = Category::find($id);
        $category->ctg_name = $request->get('ctg_name');
        $category->save();

        return redirect('/category')->with('success', 'Category has ben Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/category')->with('success', 'Category has ben deleted');
    }
}
