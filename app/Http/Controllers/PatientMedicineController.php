<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\PatientMedicine;


class PatientMedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientmedicines = PatientMedicine::latest()->paginate(5);

        return view('patientmedicines.index', compact('patientmedicines'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patientmedicines.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'patient_id' => 'required',
            'medicine_id' => 'required',
            'quantity_taken' => 'required',
            'time_taken' => 'required',
        ]);

        PatientMedicine::create($request->all());

        return redirect()->route('patientmedicines.index')
            ->with('success', 'Data created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patientmedicine = PatientMedicine::find($id);
        return view('patientmedicines.show', compact('patientmedicines'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patientmedicine = PatientMedicine::find($id);
        return view('patientmedicines.edit', compact('patientmedicines'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'patient_id' => 'required',
            'medicine_id' => 'required',
            'quantity_taken' => 'required',
            'time_taken' => 'required',
        ]);
        PatientMedicine::find($id)->update($request->all());

        return redirect()->route('patientmedicines.index')
            ->with('success', 'Article updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PatientMedicine::find($id)->delete();

        return redirect()->route('patientmedicines.index')
            ->with('success', 'Data deleted successfully');
    }
}
