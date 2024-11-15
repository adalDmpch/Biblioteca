
function validateForm() {
    let isValid = true;
    const nameRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Validar nombre
    const name = document.getElementById('name').value.trim();
    if (!nameRegex.test(name)) {
        document.getElementById('nameError').textContent = 'Por favor, ingrese un nombre válido';
        isValid = false;
    } else {
        document.getElementById('nameError').textContent = '';
    }

    // Validar email
    const email = document.getElementById('email').value.trim();
    if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Por favor, ingrese un correo válido';
        isValid = false;
    } else {
        document.getElementById('emailError').textContent = '';
    }

    // Validar asunto
    const subject = document.getElementById('subject').value.trim();
    if (subject.length < 3) {
        document.getElementById('subjectError').textContent = 'El motivo debe tener al menos 3 caracteres';
        isValid = false;
    } else {
        document.getElementById('subjectError').textContent = '';
    }

    // Validar mensaje
    const message = document.getElementById('message').value.trim();
    if (message.length < 10) {
        document.getElementById('messageError').textContent = 'El mensaje debe tener al menos 10 caracteres';
        isValid = false;
    } else {
        document.getElementById('messageError').textContent = '';
    }

    return isValid;
}