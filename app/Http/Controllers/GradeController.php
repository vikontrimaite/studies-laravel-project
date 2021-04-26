<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->student_id) && $request->student_id !== 0)
            $grades = \App\Models\Grade::where('student_id', $request->student_id)->orderBy('grade')->get();
        else
            $grades = \App\Models\Grade::orderBy('grade')->get();
        
            // $grades = \App\Models\Grade::orderBy('grade')->get();

            // $grades = \App\Models\Grade::where('student_id', $request->student_id)->orderBy('grade')->get();

        $students = \App\Models\Student::orderBy('surname')->get();
        $lectures = \App\Models\Lecture::orderBy('name')->get();

        return view('grades.index', ['grades' => $grades, 'students' => $students, 'lectures' => $lectures]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students=\App\Models\Student::orderBy('name')->get();
        $lectures=\App\Models\Lecture::orderBy('name')->get();
        return view('grades.create', ['students'=> $students], ['lectures'=> $lectures]);
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
            'grade' => 'required'
        ]);

        $grade = new Grade();

        $grade->fill($request->all());
        $grade->save();

        return redirect()->route('grades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $students=\App\Models\Student::orderBy('surname')->get();
        $lectures=\App\Models\Lecture::orderBy('name')->get();
        return view('grades.edit', ['grade' => $grade], ['students'=> $students], ['lectures'=> $lectures]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $this->validate($request, [
            'grade' => 'required'
        ]);

        $grade->fill($request->all());
        $grade->save();
        return redirect()->route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        if (count($grade->students) !== 0){ 
            return back()->withErrors(['error' => ['Negalima ištrinti pažymio su priskirtais studentais. Pirma prašome ištrinti studentus, kurie turi tam priskirtą pažymį']]);
        }

        if (count($grade->lectures) !== 0){ 
            return back()->withErrors(['error' => ['Negalima ištrinti pažymio su priskirtomis paskaitomis. Pirma prašome ištrinti lažybinkus, kurie turi tam priskirtą arklį']]);
        }

        $grade->delete();
        return redirect()->route('grades.index');
    }
}
