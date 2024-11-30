<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ResponseHelper;
use App\Models\Category;
use App\Models\Portfolio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portfolios = Portfolio::paginate(10);
        return view('portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::where('parent_id')->get();
        $portfolio = Portfolio::all();
        return view('portfolio.create', compact('portfolio','category'));
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
            'parent_id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            // 'image' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'is_display' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = new Portfolio();
            $data->parent_id = $request->parent_id;
            $data->title = $request->title;
            $data->description = $request->description;
            $data->type = $request->type;
          
            if (isset($request->image)) {
                $data->image = $request->image;
                if ($request->file('image')) {
                    $file = $request->file('image');
                    // $ext = pathinfo($file, PATHINFO_EXTENSION);    
                    // $filename = bcrypt($file).time().'.'.$ext;
                    $filename = uniqid('file_', false) . $file->getClientOriginalName();
                    ///$filename = uniqid(). '.' .File::extention($file->getClientOriginalName());
                    $file->storeAs('image-video', $filename);
                    //$file = $request->file('images')->store('');
                    //$file->move(public_path('storage/documents'), $filename);
                    $data->image = $filename;
                }
            }
            $data->url = $request->url;
            $data->is_display = $request->is_display;
            $data->save();
            return redirect()->back()->with('success', 'Successfully');
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!!' . $e]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
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
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::where('parent_id')->get();
        $portfolio = Portfolio::find($id);
        return view('portfolio.edit', compact('portfolio','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'parent_id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            // 'image' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'is_display' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = Portfolio::find($id);
            $data->parent_id = $request->parent_id;
            $data->title = $request->title;
            $data->description = $request->description;
            $data->type = $request->type;
            // $data->image = $request->image;
            $data->url = $request->url;
            $data->is_display = $request->is_display;
            $data->save();
            return redirect(route('portfolio.index'))->with('success', 'Successfully');
        
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!!' . $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $portfolio = Portfolio::find($id);

            if (!$portfolio) {
                return redirect()->back()->withErrors('Portfolio not found.');
            }

            $portfolio->delete();

            return redirect()->back()->with('success', 'Successfully deleted.');
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!! ' . $e]);
        }
    }
}
