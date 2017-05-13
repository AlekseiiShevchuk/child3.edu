<?php

namespace App\Http\Controllers;

use App\Categoty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCategotiesRequest;
use App\Http\Requests\UpdateCategotiesRequest;

class CategotiesController extends Controller
{
    /**
     * Display a listing of Categoty.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('categoty_access')) {
            return abort(401);
        }

        $categoties = Categoty::all();

        return view('categoties.index', compact('categoties'));
    }

    /**
     * Show the form for creating new Categoty.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('categoty_create')) {
            return abort(401);
        }
        return view('categoties.create');
    }

    /**
     * Store a newly created Categoty in storage.
     *
     * @param  \App\Http\Requests\StoreCategotiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategotiesRequest $request)
    {
        if (! Gate::allows('categoty_create')) {
            return abort(401);
        }
        $categoty = Categoty::create($request->all());


        return redirect()->route('categoties.index');
    }


    /**
     * Show the form for editing Categoty.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('categoty_edit')) {
            return abort(401);
        }
        $categoty = Categoty::findOrFail($id);

        return view('categoties.edit', compact('categoty'));
    }

    /**
     * Update Categoty in storage.
     *
     * @param  \App\Http\Requests\UpdateCategotiesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategotiesRequest $request, $id)
    {
        if (! Gate::allows('categoty_edit')) {
            return abort(401);
        }
        $categoty = Categoty::findOrFail($id);
        $categoty->update($request->all());


        return redirect()->route('categoties.index');
    }


    /**
     * Display Categoty.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('categoty_view')) {
            return abort(401);
        }
        $relations = [
            'lessons' => \App\Lesson::where('category_id', $id)->get(),
        ];

        $categoty = Categoty::findOrFail($id);

        return view('categoties.show', compact('categoty') + $relations);
    }


    /**
     * Remove Categoty from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('categoty_delete')) {
            return abort(401);
        }
        $categoty = Categoty::findOrFail($id);
        $categoty->delete();

        return redirect()->route('categoties.index');
    }

    /**
     * Delete all selected Categoty at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('categoty_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Categoty::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
