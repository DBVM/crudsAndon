@extends('layouts.navigation')
<x-app-layout>
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    @if (isset($errors) && $errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex items-center justify-center mt-3">
            <a href="{{ route('users.create') }}"
                class=" flex px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed shadow-sm transition-colors duration-200">
                Create a new user
            </a>
    </div>
    <div class="flex justify-center h-screen mt-10">

        <div class="w-11/12 overflow-x-auto ">
            <table class="w-full text-sm text-left">
                <thead>
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <th class="px-6 py-3 font-medium ">Name</th>
                        <th class="px-6 py-3 font-medium ">Lastname</th>
                        <th class="px-6 py-3 font-medium ">Email</th>
                        <th class="px-6 py-3 font-medium ">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-2 "> {{ $user->name }} </td>
                            <td class="px-6 py-2 "> {{ $user->lastname }} </td>
                            <td class="px-6 py-2 "> {{ $user->email }} </td>
                            <td class="px-5 py-2 ">
                                <a href="{{ route('users.show', ['id' => $user->id]) }}">
                                    <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-5 py-2 ">
                                <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn-show">

                                    <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-5 py-2 ">
                                <form method="POST" action="{{ route('users.destroy',['id'=>$user->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
