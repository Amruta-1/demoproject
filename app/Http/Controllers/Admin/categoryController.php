<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\category;
use App\ParentCategory;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $category = category::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category = category::latest()->paginate($perPage);
            $categories = category::with('parent')->get();
        }
        
        
        return view('admin.category.index', compact('category','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {    $categories = category::all();

         return view('admin.category.create')->with('categories', $categories);

    
        
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

         $this->validate($request, [
            'category' => 'required'
            
        ]);
        
        $data = new Category;

        $data->category = $request->input('category');

        $data->parent_id = $request->input('parent_category');
        $data->save();
        

        return redirect('admin/category')->with('flash_message', 'category added!');
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
        $category = category::findOrFail($id);
        
        $categories = category::with('parent')->findOrFail($id);
       

        return view('admin.category.show', compact('category','categories'));
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
        $category = category::findOrFail($id);
        $categories = category::all();
        return view('admin.category.edit', compact('category','categories'));
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
        
        $requestData = $request->all();
        
        $category = category::findOrFail($id);
        $category->update($requestData);

        $pcategory =array('parent_id'=>$request->input('parent_category'));
        DB::table('categories')->where('id', $id)->update($pcategory);

        return redirect('admin/category')->with('flash_message', 'category updated!');
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
        category::destroy($id);
        $category =array('parent_id'=>'0');
        DB::table('categories')->where('parent_id', $id)->update($category);
        return redirect('admin/category')->with('flash_message', 'category deleted!');
    }
}
