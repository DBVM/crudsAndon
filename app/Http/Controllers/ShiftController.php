<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShiftController extends Controller
{
    public function index(){
        return view('shifts.index')->with([
            'shifts' => Shift::all(),
        ]);
    }
    public function create(){
        return view('shifts.create');
    }
    public function store(Request $request){
         // Validación de datos
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time'
        ]);

        // Si la validación falla
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Crear nuevo turno
        try {
            $shift = Shift::create([
                'name' => $request->name,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time
            ]);

            return redirect()
            ->route('shifts')
            ->withSuccess("The user with email: {$shift->email} has been successfully registered.");
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withError('There was an error registering user.' . $e->getMessage());
        }
    }

    
    public function edit($id){
        return view('shifts.edit')->with([
            'shift' => Shift::findOrFail($id),
        ]);
    }
    public function update($id){
        $shift = Shift::findOrFail($id);

        $shift->update(request()->all());
        return redirect()
            ->route('shifts')
            ->withSuccess("The shift: {$shift->email} has been updated.");
    }
    public function destroy($id){
        try {
            $shift = Shift::findOrFail($id);
            $shift->delete();
            return response()->json([
                'success' => true
            ], 200);
               
        } catch (\Exception $e) {
            return redirect()
                ->route('shifts')
                ->with('error', 'Error deleting shift');
        }
    }
}
