<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ResponseHelper;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\Experience;
use Exception;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $educations = Education::paginate(10);
        return view('education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $education = Education::all();
        return view('education.create', compact('education'));
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
            'description' => 'required|string',
            'passing_year' => 'required|string',

        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = new Education();
            $data->name = $request->name;
            $data->description = $request->description;
            $data->passing_year = $request->passing_year;
            $data->save();
            return redirect()->back()->with('success', 'Successfully');
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!!' . $e]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $education = Education::find($id);
        return view('education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'passing_year' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = Education::find($id);
            $data->name = $request->name;
            $data->description = $request->description;
            $data->passing_year = $request->passing_year;
            $data->save();
            return redirect(route('education.index'))->with('success', 'Successfully');
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!!' . $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $education = Education::find($id);

            if (!$education) {
                return redirect()->back()->withErrors('Education not found.');
            }

            $education->delete();

            return redirect()->back()->with('success', 'Successfully deleted.');
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!! ' . $e]);
        }
    }
}
