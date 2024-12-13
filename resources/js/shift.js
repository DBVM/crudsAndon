document.getElementById('#').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('/shifts', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Shift Registered',
                text: 'Shift created successfully!',
                confirmButtonText: 'OK'
            }).then(() => {
                // Opcional: limpiar formulario o recargar
                //this.reset();
                 window.location.href = '/shifts'
            });
        } else {
            // Manejar errores de validación
            let errorMessage = '';
            if (data.errors) {
                Object.values(data.errors).forEach(errors => {
                    errorMessage += errors.join('\n') + '\n';
                });
            }

            Swal.fire({
                icon: 'error',
                title: 'Registration Error',
                text: errorMessage || 'Failed to create shift',
                confirmButtonText: 'Try Again'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Network Error',
            text: 'Could not complete shift registration',
            confirmButtonText: 'OK'
        });
    });
});

function confirmDelete(id, name) {
    Swal.fire({
        title: 'Are you sure?',
        html: `You want to remove the shift <strong>${name}</strong>? All the information will be destroyed.`,
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
            fetch(`/shifts/${id}`, {
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
                            'The shift has been deleted.',
                            'success'
                        ).then(() => {
                            // Recargar la página
                            window.location.reload();
                        });
                    } else {
                        throw new Error('Error deleting shift');
                    }
                })
                .catch(error => {
                    // Mostrar mensaje de error
                    Swal.fire(
                        'Error',
                        'There was an error deleting shift.',
                        'error'
                    );
                });
        }
    });
}