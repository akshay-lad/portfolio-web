<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ResponseHelper;
use App\Models\Category;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $categories = Category::with('children')->whereNull('parent_id')->paginate(10);
            // dd($categories);
            return view('category.index', compact('categories'));
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!! ' . $e]);
        }
    }
  
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {
            // $category = Category::all();
            $category = Category::where('parent_id')->get();

            return view('category.create', compact('category'));
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!! ' . $e]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = new Category();
            if ($request->parent_id > 0) {
                $data->parent_id = $request->parent_id;
            }
            $data->name = $request->name;
            $data->description = $request->description;
            $data->save();
            return redirect()->back()->with('success', 'Successfully');
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!!' . $e]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $data = Category::find($id);
            return ResponseHelper::responseMessage('success', $data);
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::where('parent_id')->get();
        $category = Category::find($id);
        return view('category.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'parent_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = Category::find($id);
            $data->parent_id = $request->parent_id;
            $data->name = $request->name;
            $data->description = $request->description;
            $data->save();
            return redirect(route('category.index'))->with('success', 'Successfully');
        
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!!' . $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $category = Category::find($id);

            if (!$category) {
                return redirect()->back()->withErrors('Category not found.');
            }

            $category->delete();

            return redirect()->back()->with('success', 'Successfully deleted.');
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!! ' . $e]);
        }
    }
}
