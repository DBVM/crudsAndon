document.getElementById('shiftRegistrationForm').addEventListener('submit', function(e) {
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