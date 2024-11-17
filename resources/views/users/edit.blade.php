@extends('layouts.navigation')
<x-app-layout>
    <div class="w-full bg-gray-100 flex items-center justify-center p-4">
        <form class="w-4/5 bg-white rounded-lg shadow-md p-8" method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')
            <!-- Título del formulario -->
            <h2 class="text-2xl font-bold mb-6 text-gray-800">User information update form</h2>

            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                    Name
                </label>
                <input type="text" id="name" name="name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your name" required value="{{ $user->name }}">
            </div>
            <div class="mb-4">
                <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">
                    Lastname
                </label>
                <input type="text" id="lastname" name="lastname"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your lastname" required value="{{ $user->lastname }}">
            </div>

            <!-- Campo Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                    Email
                </label>
                <input type="email" id="email" name="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="example@correo.com" required value="{{ $user->email }}">
            </div>

            <!-- Campo Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                    Contraseña
                </label>
                <input type="password" id="password" name="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="********" required value="{{ $user->password }}">
            </div>
            <!-- Campo confirmar contraseña-->
             <div class="mb-4">
                <label for="confirmPwd" class="block text-gray-700 text-sm font-bold mb-2">
                    Confirmar contraseña
                </label>
                <input type="confirmPwd" id="confirmPwd" name="confirmPwd"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="********" required>
            </div>


            <!-- Botón Submit -->
            <div class="flex items-center justify-end">
                <a href="{{ route('users') }}"
                    class=" flex px-4 py-2 text-sm m-3 font-medium text-gray bg-white-600 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed shadow-sm transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                    Save
                </button>

            </div>
        </form>
    </div>
    </div>

</x-app-layout>
