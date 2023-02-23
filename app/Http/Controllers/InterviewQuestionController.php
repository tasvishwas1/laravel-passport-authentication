<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InterviewQuestion;
use Illuminate\Http\Request;

class InterviewQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = InterviewQuestion::all();
        return view('interviewQuestion.interviewQuestion', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interviewQuestion.add-interview-question');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $validated = $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);

        try {
            $question = new InterviewQuestion();
            $question->title = $request->title;
            $question->description = $request->description;
            $question->save();

            return response()->json(['success' => true, 'message' => 'Post has been successfully created']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show( Category $category )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit( Category $category )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Category $category )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( Category $category )
    {
        //
    }

    public function detail(Request $request)
    {
        return view('interviewQuestion.detail');
    }
}
