<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ResponseHelper;
use App\Models\Skill;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skills = Skill::paginate(10);
        return view('skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $skills = Skill::all();
        return view('skill.create', compact('skills'));
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
            'percentage' => 'required|integer',
            'is_display' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = new Skill();
            $data->name = $request->name;
            $data->percentage = $request->percentage;
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
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $skill = Skill::find($id);
        return view('skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer',
            'is_display' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $data = Skill::find($id);
            $data->name = $request->name;
            $data->percentage = $request->percentage;
            $data->is_display = $request->is_display;
            $data->save();
            return redirect(route('skills.index'))->with('success', 'Successfully');
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!!' . $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $skill = Skill::find($id);

            if (!$skill) {
                return redirect()->back()->withErrors('Experience not found.');
            }

            $skill->delete();

            return redirect()->back()->with('success', 'Successfully deleted.');
        } catch (Exception $e) {
            return ResponseHelper::errorResponse(['Something went wrong!! ' . $e]);
        }
    }
}
