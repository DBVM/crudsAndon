@extends('layouts.navigation')

<x-app-layout>
    <div class="w-full bg-gray-100 flex items-center justify-center p-4">
        <form class="w-4/5 bg-white rounded-lg shadow-md p-8" method="POST" action="{{ route('users.store') }}">
            @csrf
            <!-- Título del formulario -->
            <h2 class="text-2xl font-bold mb-6 text-gray-800">User registration form</h2>

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                    Name
                </label>
                <input type="text" id="name" name="name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your name" required>
            </div>
            <div class="mb-4">
                <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">
                    Lastname
                </label>
                <input type="text" id="lastname" name="lastname"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your lastname" required>
            </div>

            <!-- Campo Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                    Email
                </label>
                <input type="email" id="email" name="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="example@correo.com" required>
            </div>

            <!-- Campo Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                    Contraseña
                </label>
                <input type="password" id="password" name="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="********" required>
            </div>
              <!-- Campo confirmar contraseña-->
              <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">
                    Confirmar contraseña
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="********" required>
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