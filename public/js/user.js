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