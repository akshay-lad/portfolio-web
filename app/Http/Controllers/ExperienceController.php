<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ResponseHelper;
use App\Models\Experience;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $experiences = Experience::paginate(10);
        return view('experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $experiences = Experience::all();
        return view('experience.create', compact('experiences'));
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
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'joining_date' => 'required|date',
            'leave_date' => 'required|date',
            'is_current' => 'required|boolean',
            'display_order' => 'required|integer',
            'description_web' => 'required|string',
            'description_graphics' => 'required|string',
            'is_display' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = new Experience();
            $data->company_name = $request->company_name;
            $data->position = $request->position;
            $data->joining_date = $request->joining_date;
            $data->leave_date = $request->leave_date;
            $data->is_current = $request->is_current;
            $data->display_order = $request->display_order;
            $data->description_web = $request->description_web;
            $data->description_graphics = $request->description_graphics;
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
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $experience = Experience::find($id);
        return view('experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'joining_date' => 'required|date',
            'leave_date' => 'required|date',
            'is_current' => 'required|boolean',
            'display_order' => 'required|integer',
            'description_web' => 'required|string',
            'description_graphics' => 'required|string',
            'is_display' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = Experience::find($id);
            $data->company_name = $request->company_name;
            $data->position = $request->position;
            $data->joining_date = $request->joining_date;
            $data->leave_date = $request->leave_date;
            $data->is_current = $request->is_current;
            $data->display_order = $request->display_order;
            $data->description_web = $request->description_web;
            $data->description_graphics = $request->description_graphics;
            $data->is_display = $request->is_display;
            $data->save();
            return redirect(route('experience.index'))->with('success', 'Successfully');
        
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!!' . $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $experience = Experience::find($id);

            if (!$experience) {
                return redirect()->back()->withErrors('Experience not found.');
            }

            $experience->delete();

            return redirect()->back()->with('success', 'Successfully deleted.');
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!! ' . $e]);
        }
    }
}
