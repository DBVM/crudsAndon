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

            return response()->json([
                'success' => true,
                'message' => 'Shift created successfully',
                'shift' => $shift
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating shift: ' . $e->getMessage()
            ], 500);
        }
    }

    
    public function edit(){

    }
    public function update(){

    }
    public function destroy(){

    }
}
