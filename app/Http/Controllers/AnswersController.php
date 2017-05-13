<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreAnswersRequest;
use App\Http\Requests\UpdateAnswersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class AnswersController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Answer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('answer_access')) {
            return abort(401);
        }

        $answers = Answer::all();

        return view('answers.index', compact('answers'));
    }

    /**
     * Show the form for creating new Answer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('answer_create')) {
            return abort(401);
        }
        $relations = [
            'slides' => \App\Slide::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('answers.create', $relations);
    }

    /**
     * Store a newly created Answer in storage.
     *
     * @param  \App\Http\Requests\StoreAnswersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswersRequest $request)
    {
        if (! Gate::allows('answer_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $answer = Answer::create($request->all());


        return redirect()->route('answers.index');
    }


    /**
     * Show the form for editing Answer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('answer_edit')) {
            return abort(401);
        }
        $relations = [
            'slides' => \App\Slide::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $answer = Answer::findOrFail($id);

        return view('answers.edit', compact('answer') + $relations);
    }

    /**
     * Update Answer in storage.
     *
     * @param  \App\Http\Requests\UpdateAnswersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswersRequest $request, $id)
    {
        if (! Gate::allows('answer_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $answer = Answer::findOrFail($id);
        $answer->update($request->all());


        return redirect()->route('answers.index');
    }


    /**
     * Display Answer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('answer_view')) {
            return abort(401);
        }
        $relations = [
            'slides' => \App\Slide::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $answer = Answer::findOrFail($id);

        return view('answers.show', compact('answer') + $relations);
    }


    /**
     * Remove Answer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('answer_delete')) {
            return abort(401);
        }
        $answer = Answer::findOrFail($id);
        $answer->delete();

        return redirect()->route('answers.index');
    }

    /**
     * Delete all selected Answer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('answer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Answer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
