@extends('layouts.navigation')
<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id, userName) {
            Swal.fire({
                title: 'Are you sure?',
                html: `You want to remove the user <strong>${userName}</strong>? All the information will be destroyed.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Realizar la petición DELETE
                    fetch(`/users/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Mostrar mensaje de éxito
                                Swal.fire(
                                    'Deleted',
                                    'The user has been deleted.',
                                    'success'
                                ).then(() => {
                                    // Recargar la página
                                    window.location.reload();
                                });
                            } else {
                                throw new Error('Error deleting user');
                            }
                        })
                        .catch(error => {
                            // Mostrar mensaje de error
                            Swal.fire(
                                'Error',
                                'There was an error deleting user.',
                                'error'
                            );
                        });
                }
            });
        }
    </script>

   

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
                                <a href="{{ route('users.edit', ['id' => $user->id]) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                    Edit
                                </a>
                            </td>
                            <td class="px-5 py-2 ">

                                <button type="submit"
                                    class="bg-white hover:bg-red-500 text-black hover:text-white font-bold py-2 px-4 rounded-full"
                                    onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')">
                                    Delete
                                </button>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>

