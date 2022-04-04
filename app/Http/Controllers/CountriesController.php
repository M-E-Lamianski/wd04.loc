<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;


class CountriesController extends Controller
{
    public function index()
    {
        $countries = Countries::all();
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        Countries::create($request->all());
        return redirect()->route('countries.index');
    }

    public function edit(Request $request, $id)
    {
        $country = Countries::findOrFail($id);
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $country = Countries::findOrFail($id);
        $country->fill($request->all());
        $country->save();
        return redirect()->route('countries.index');
    }

    public function delete($id)
    {
        $country = Countries::find($id);
        $country->delete();
        return redirect()->route('countries.index');
    }
}


