@extends('layouts.navigation')

<x-app-layout>
    <div class="w-3/5 bg-gray-100 flex items-center justify-center p-4">
        <form class="w-4/5 bg-white rounded-lg shadow-md p-8" id="shiftRegistrationForm">
            @csrf
            <!-- Título del formulario -->
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Shift registration</h2>

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                    Name
                </label>
                <input type="text" id="name" name="name"
                    class="w-200 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter the shift name" required>
            </div>

            <!-- Campo inicio  -->
            <div class="mb-4">
                <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">
                    Start time
                </label>
                <input type="time" id="start_time" name="start_time"
                    class="w-30 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required>
            </div>

            <!-- Campo fin -->
            <div class="mb-4">
                <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">
                    End time
                </label>
                <input type="time" id="end_time" name="end_time"
                    class="w-30 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                     required>
            </div>

        

            <!-- Botón Submit -->
            <div class="flex items-center justify-end">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300"
                    
                    >
                    Save
                </button>
            </div>
        </form>

        
    </div>
    </div>



</x-app-layout>
@section('js')
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
@endsection
