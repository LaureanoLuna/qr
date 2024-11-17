import {
    radioSelectTypeBackgroun,
    sectionDesplegablePersonalizacionAvanzada,
    buttonDesplegablePersonalizacionAvanzada,
} from "./elementHTML";

import {
    openDesplegablePersonlizacionAvanzada,
    selectRadioTipeBackground,
} from "./funciones";

let num = 0;
if (document.readyState === "loading") {
    setTimeout(() => {
        num++;
    }, 100);
}

export const indexJs = async () => {
     radioSelectTypeBackgroun.children[0]
        .querySelector("input")
        .setAttribute("checked", true);

    buttonDesplegablePersonalizacionAvanzada.addEventListener("click", () => {
        if (buttonDesplegablePersonalizacionAvanzada) {
            let a = buttonDesplegablePersonalizacionAvanzada.children;
            // Convertir HTMLCollection a array
            Array.from(a).forEach((elemento) => {
                openDesplegablePersonlizacionAvanzada(elemento);
            });
            openDesplegablePersonlizacionAvanzada(
                sectionDesplegablePersonalizacionAvanzada
            );
        } else {
            console.log("El botón no se encontró.");
        }
    });

    if (radioSelectTypeBackgroun !== undefined) {
        let nodes =  radioSelectTypeBackgroun.children;
        Array.from(nodes).forEach((e) => {
            e.addEventListener("click", selectRadioTipeBackground);
        });
    } else {
        console.log("El botón no se encontró.");
    }
};

export default indexJs;
