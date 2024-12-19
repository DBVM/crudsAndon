@extends('layouts.navigation')
<x-app-layout>
    <!-- Edit form -->
    <div class="w-full bg-gray-100 flex items-center justify-center p-4">
        <form class="w-4/5 bg-white rounded-lg shadow-md p-8" id="shiftEditForm" method="POST"
            action="{{ route('shifts.update', ['id' => $shift->id]) }}">
            @method('PUT')
            @csrf
            <!-- Título del formulario -->
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit shift information</h2>

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                    Name
                </label>
                <input type="text" id="name" name="name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter the shift name" value="{{ $shift->name }}">
            </div>

            <!-- Campo inicio  -->
            <div class="mb-4">
                <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">
                    Start time
                </label>
                <input type="time" step="1" min="09:00" max="18:00"  id="start_time" name="start_time"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ $shift->start_time }}">
            </div>

            <!-- Campo fin -->
            <div class="mb-4">
                <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">
                    End time
                </label>
                <input type="time" step="1" min="09:00" max="18:00" id="end_time" name="end_time"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ $shift->end_time }}">
            </div>



            <!-- Botón Submit -->
            <div class="flex items-center justify-end">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                    Save
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

