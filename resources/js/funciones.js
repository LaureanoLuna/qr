const openDesplegablePersonlizacionAvanzada = (elemento) => {
    if (elemento.className.includes("open")) {
        elemento.classList.remove("open");
        elemento.classList.add("invisible");
    } else {
        elemento.classList.add("open");
        elemento.classList.remove("invisible");
    }
};

const selectRadioTipeBackground = async (elemento) => {
    let inp = elemento.target;

    let padreNode = inp.parentNode;

    await quitaChecketRadio(padreNode.parentNode, inp);
    if (typeof inp === undefined) return;

    const cambioOK = inp.querySelector("input");
    /* if (!cambioOK) {
        alert("hdp");
    } */
    let x = cambioOK.setAttribute("checked", true);

    if (true) {
    }
};

const quitaChecketRadio = async (nodoPadre, radioChecked) => {
    let inputsChecked = await nodoPadre.querySelectorAll("input");
    console.log(radioChecked);

    if (inputsChecked.length === 1) {
        return;
    }

    Array.from(inputsChecked).find((e) => {
        console.log(e);
        
        if (e.getAttribute("id") !== radioChecked.getAttribute("id")) {
            e.setAttribute("checked", false);
        }
    });
};

export { openDesplegablePersonlizacionAvanzada, selectRadioTipeBackground };
