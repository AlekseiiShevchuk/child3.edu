<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreLessonsRequest;
use App\Http\Requests\UpdateLessonsRequest;

class LessonsController extends Controller
{
    /**
     * Display a listing of Lesson.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('lesson_access')) {
            return abort(401);
        }

        $lessons = Lesson::all();

        return view('lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating new Lesson.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('lesson_create')) {
            return abort(401);
        }
        $relations = [
            'categories' => \App\Categoty::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('lessons.create', $relations);
    }

    /**
     * Store a newly created Lesson in storage.
     *
     * @param  \App\Http\Requests\StoreLessonsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLessonsRequest $request)
    {
        if (! Gate::allows('lesson_create')) {
            return abort(401);
        }
        $lesson = Lesson::create($request->all());


        return redirect()->route('lessons.index');
    }


    /**
     * Show the form for editing Lesson.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('lesson_edit')) {
            return abort(401);
        }
        $relations = [
            'categories' => \App\Categoty::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $lesson = Lesson::findOrFail($id);

        return view('lessons.edit', compact('lesson') + $relations);
    }

    /**
     * Update Lesson in storage.
     *
     * @param  \App\Http\Requests\UpdateLessonsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonsRequest $request, $id)
    {
        if (! Gate::allows('lesson_edit')) {
            return abort(401);
        }
        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->all());


        return redirect()->route('lessons.index');
    }


    /**
     * Display Lesson.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('lesson_view')) {
            return abort(401);
        }
        $relations = [
            'categories' => \App\Categoty::get()->pluck('name', 'id')->prepend('Please select', ''),
            'slides' => \App\Slide::where('lesson_id', $id)->get(),
        ];

        $lesson = Lesson::findOrFail($id);

        return view('lessons.show', compact('lesson') + $relations);
    }


    /**
     * Remove Lesson from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('lesson_delete')) {
            return abort(401);
        }
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();

        return redirect()->route('lessons.index');
    }

    /**
     * Delete all selected Lesson at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('lesson_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Lesson::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
