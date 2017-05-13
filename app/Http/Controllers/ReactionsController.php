<?php

namespace App\Http\Controllers;

use App\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreReactionsRequest;
use App\Http\Requests\UpdateReactionsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ReactionsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Reaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('reaction_access')) {
            return abort(401);
        }

        $reactions = Reaction::all();

        return view('reactions.index', compact('reactions'));
    }

    /**
     * Show the form for creating new Reaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('reaction_create')) {
            return abort(401);
        }        $enum_type = Reaction::$enum_type;
            
        return view('reactions.create', compact('enum_type'));
    }

    /**
     * Store a newly created Reaction in storage.
     *
     * @param  \App\Http\Requests\StoreReactionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReactionsRequest $request)
    {
        if (! Gate::allows('reaction_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $reaction = Reaction::create($request->all());


        return redirect()->route('reactions.index');
    }


    /**
     * Show the form for editing Reaction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('reaction_edit')) {
            return abort(401);
        }        $enum_type = Reaction::$enum_type;
            
        $reaction = Reaction::findOrFail($id);

        return view('reactions.edit', compact('reaction', 'enum_type'));
    }

    /**
     * Update Reaction in storage.
     *
     * @param  \App\Http\Requests\UpdateReactionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReactionsRequest $request, $id)
    {
        if (! Gate::allows('reaction_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $reaction = Reaction::findOrFail($id);
        $reaction->update($request->all());


        return redirect()->route('reactions.index');
    }


    /**
     * Display Reaction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('reaction_view')) {
            return abort(401);
        }
        $reaction = Reaction::findOrFail($id);

        return view('reactions.show', compact('reaction'));
    }


    /**
     * Remove Reaction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('reaction_delete')) {
            return abort(401);
        }
        $reaction = Reaction::findOrFail($id);
        $reaction->delete();

        return redirect()->route('reactions.index');
    }

    /**
     * Delete all selected Reaction at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('reaction_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Reaction::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
