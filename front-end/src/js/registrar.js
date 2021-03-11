const elemSelecaoArquivo = document.getElementById("selecao-arquivo");

elemSelecaoArquivo.onchange = (event) => {
    var output = document.getElementById("output");

    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = "flex";

    output.onload = () => {
        URL.revokeObjectURL(output.src);
    }
};
