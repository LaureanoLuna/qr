const openDesplegablePersonlizacionAvanzada = (elemento) => {
    if (elemento.className.includes("open")) {
        elemento.classList.remove("open");
        elemento.classList.add("hidden");
    } else {
        elemento.classList.add("open");
        elemento.classList.remove("hidden");
    }
};

const selectRadioTipeBackground = (elemento) => {
    let inp = elemento.target;

    let padreNode = inp.parentNode;
    console.log(inp);

    quitaChecketRadio(padreNode, inp);
    if (typeof inp === undefined) return;

    const cambioOK = inp.querySelector("input");
    if (!cambioOK) {
        alert("hdp");
    }
    let x = cambioOK.setAttribute("checked", true);

    if (true) {
    }
};

const quitaChecketRadio = (nodoPadre, radioChecked) => {
    let inputsChecked = nodoPadre.querySelectorAll("input[checked]");

    if (inputsChecked.length === 1) {
        return;
    }

    Array.from(inputsChecked).find((e) => {
        if (e.getAttribute("id") !== radioChecked.getAttribute("id")) {
            e.setAttribute("checked", false);
        }
    });
};

export { openDesplegablePersonlizacionAvanzada, selectRadioTipeBackground };
