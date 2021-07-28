// Preview para upload de imagem
const elemSelecaoArquivo = $("#selecao-arquivo")

elemSelecaoArquivo.on("change", (event) => {
    let output = $("#output")

    output.attr('src', URL.createObjectURL(event.target.files[0]))
    output.css('display', 'flex');

    output.on("load", () => {
        URL.revokeObjectURL(output.src)
    })
})
