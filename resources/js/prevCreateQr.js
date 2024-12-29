import { formPreviewCreateQr, imgPreviewQr } from "./elementHTML";

const QR_DEFALUT = {
    nombre: "defaul",
    tipo: "url",
    url: "default",
    color: [255, 255, 255],
    fondo: [0, 0, 0],
    img: null,
    isDinamico: false,
    tamaño: 150,
    estilo: "square",
};

const inputsPrevChil = formPreviewCreateQr.querySelectorAll("input");

inputsPrevChil.forEach((h) => prevQr(h));

async function prevQr(elemento) {
    await elemento.addEventListener("change", (e) => {
        manejaTipoDato(e.target);
        actualizarImgQr();
    });
}

async function actualizarImgQr() {
    console.log(QR_DEFALUT);
    
    try {
        const response = await fetch('http://localhost:8000/preview', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Asegúrate de tener un token CSRF si es necesario
            },
            body: JSON.stringify({ qr: QR_DEFALUT })
        });

        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.statusText);
        }
        
        const data = await response.json();
        imgPreviewQr.src = "";
        imgPreviewQr.src = data;
        console.log(data);
        
    } catch (error) {
        console.error('Error:', error);
    }
}

function manejaTipoDato(elemento) {
    let dato = elemento.getAttribute("name");

    switch (dato) {
        case "nombre":
            QR_DEFALUT.nombre = elemento.value;
            break;
        case "tipo":
            QR_DEFALUT.tipo = elemento.value;
            break;
        case "url":
            QR_DEFALUT.url = elemento.value;
            break;
        case "color":
            QR_DEFALUT.color = elemento.value;
            break;
        case "fondo":
            QR_DEFALUT.fondo = elemento.value;
            break;
        case "url":
            QR_DEFALUT.url = elemento.value;
            break;
        case "isdinamico":
            QR_DEFALUT.isDinamico = !QR_DEFALUT.isDinamico;
        default:
            break;
    }
}

function colorHex(dato) {
    // Verifica que el dato sea un color hexadecimal válido
    if (dato.length === 7 && dato[0] === "#") {
        let rojo = parseInt(dato.substring(1, 3), 16); // Rojo
        let verde = parseInt(dato.substring(3, 5), 16); // Verde
        let azul = parseInt(dato.substring(5, 7), 16); // Azul
        return { rojo, verde, azul }; // Retorna los valores RGB
    } else {
        console.error("El dato no es un color hexadecimal válido.");
    }
}
