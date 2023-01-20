<?php

namespace App\Http\Controllers;
use App\Models\Curs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CursController extends Controller
{
    public function index(Request $request)
    {

       $curs = Curs::orderBy('id','desc')->paginate(5);
 
        return view('dashboard.kurs.index',compact('curs'));

    }
    public function create()
    {
        return view('dashboard.kurs.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'mata_uang' => 'required',
            'nilai' => 'required',
       
        ]);
        Curs::create([
            'mata_uang' => $request->mata_uang,
            'nilai' => str_replace(",", "", $request->nilai),
        ]);
        return redirect()->route('kurs.index')->with('success', 'Date Created Successfully!');
        
    }

    public function show(Curs $curs)
    {
        return view('dashboard.kurs.show', compact('curs'));
    }

    public function edit(Request $request, $id)
    {
        $curs = Curs::find($id);

        return view('dashboard.kurs.edit', compact('curs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'mata_uang' => 'required',
            'nilai' => 'required',
         
        ]);
        $curs = Curs::findOrFail($id);
        $curs->update([
            'mata_uang' => $request->mata_uang,
            'nilai' => str_replace(",", "", $request->nilai),
        ]);

        if ($curs) {
            return redirect()
                ->route('kurs.index')
                ->with([
                    'success' => 'Kurs updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

};
