// update current year in copyright
const currentYear = new Date().getFullYear()
document.querySelector('#year').innerHTML = currentYear

// toast
/* const toastSuccess = (text) => {
    Toastify({
        text: text,
        duration: 4000,
        className: "info",
        style: {
            background: '#64B040',
        }
    })
    .showToast()
}

const toastError = (text) => {
    Toastify({
        text: text,
        duration: 4000,
        className: "info",
        style: {
            background: '#EE7203',
        }
    })
    .showToast()
}

// send email contact
const sendMessage = (event) => {
	event.preventDefault()
	var btnSubmit = document.querySelector('#contact-form button')
	btnSubmit.disabled = true
	btnSubmit.textContent = 'Enviado...'
	var form = document.querySelector('#contact-form')
	const formData = new FormData(form)
	fetch('/backend/send-email.php', {
		method: 'POST',
		body: formData
	})
	.then(res => res.json())
	.then(data => {
		console.log(data);
		toastSuccess(data.message)
		btnSubmit.disabled = false
		btnSubmit.textContent = 'Enviar mensaje'
		form.reset()
	})
	.catch(err => {
		btnSubmit.disabled = false
		btnSubmit.textContent = 'Enviar mensaje'
		toastError('Ocurrió un error, intentalo de nuevo')
		console.log(err)
	})
} */

/* form contact */

	var formulario = document.querySelector('#contact-form');

    formulario.addEventListener('submit', function(e){
        e.preventDefault();
        email();
    });

	function email() {
        let datos = new FormData(formulario);
        fetch(`../backend/send-email.php`, {
            method: 'POST',
            body: datos
        }).then(res => res.json())
        .then(data => {
            console.log(data);
            if(data === 'exito'){
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Exito",
                    text: "El mensaje ha sido enviado con exito!",
                    showConfirmButton: false,
                    timer: 3500
                });
                formulario.reset();
            } else { 
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Oops",
                    text: "Error al enviar el mensaje",
                    showConfirmButton: false,
                    timer: 3500
                });
            }
        })
    }