@extends('layouts.navigation')
<x-app-layout>
    <div class="w-full bg-gray-100 flex items-center justify-center p-4">
        <form class="w-4/5 bg-white rounded-lg shadow-md p-8" method="POST" action="{{ route('users.store') }}">
            @csrf
            <!-- Título del formulario -->
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit {{ $user->name }} information</h2>
           
            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                    Name
                </label>
                <input type="text" id="name" name="name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ $user->name }}" readonly>
            </div>
            <div class="mb-4">
                <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">
                    Lastname
                </label>
                <input type="text" id="lastname" name="lastname"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ $user->lastname }}" readonly>
            </div>

            <!-- Campo Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                    Email
                </label>
                <input type="email" id="email" name="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ $user->email }}" readonly>
            </div>

            <!-- Campo Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                    Contraseña
                </label>
                <input type="password" id="password" name="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="********" readonly>
            </div>
            <div class="flex items-center justify-end">
                <a href="{{ route('users') }}"
                    class=" flex px-4 py-2 text-sm m-3 font-medium text-gray bg-white-600 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed shadow-sm transition-colors duration-200">
                    Back
                </a>

                <a href="{{ route('users.edit', ['id' => $user->id]) }}"
                    class="flex px-4 py-2 text-sm m-3 font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed shadow-sm transition-colors duration-200">
                    Update

                </a>
                <form method="POST" action="{{ route('users.destroy',['id' => $user->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </form>
              
            </div>

        </form>

    </div>


</x-app-layout>
