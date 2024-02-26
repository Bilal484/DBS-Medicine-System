<?php

namespace App\Http\Controllers;
// use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Medicine;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Validator as ValidatorServiceProvider;
use Validator;

class MedicineController extends Controller

{

    public function index(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $medicines = Medicine::where('title', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->latest()->paginate(5);
        } else {
            $medicines = Medicine::latest()->paginate(5);
        }
        return view('medicines.index', compact('medicines'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('medicines.create');
    }




    public function store(Request $request)
    {
        $validator = ValidatorServiceProvider::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('medicines.create')
                ->withErrors($validator)
                ->withInput();
        }

        Medicine::create($request->all());

        return redirect()->route('medicines.index')
            ->with('success', 'Medicine created successfully.');
    }

    public function show($id)

    {

        $medicine = Medicine::find($id);

        return view('medicines.show', compact('medicine'));
    }





    public function edit($id)
    {
        $medicine = Medicine::find($id);
        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $validator = ValidatorServiceProvider::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('medicines.edit', ['medicine' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        Medicine::find($id)->update($request->all());

        return redirect()->route('medicines.index')
            ->with('success', 'Medicine updated successfully.');
    }


    public function destroy($id)

    {

        Medicine::find($id)->delete();


        return redirect()->route('medicines.index')

            ->with('success', 'Medicine deleted successfully');
    }
}
