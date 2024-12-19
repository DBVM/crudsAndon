

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


document.addEventListener('DOMContentLoaded', (event) => { 
    const timeInputStart = document.getElementById('start_time'); 
    const timeInputEnd = document.getElementById('end_time'); 
    const defaultTime = '00:00:00'; 
    timeInputStart.value =defaultTime;
    timeInputEnd.value=defaultTime;
    
});