const elemWrapper = document.getElementById('wrapper');
const url = window.location.href;
const urlLenghtDefalt = 25;

const getLastItem = thePath => thePath.substring( thePath.indexOf('/', urlLenghtDefalt) + 1 );
const formToLoad = getLastItem( url );

switch( formToLoad ) {
    case 'login/':
        elemWrapper.innerHTML = loadPage('../front-end/pages/partials/fromLogin.html');
        break;
    case 'registro/':
        elemWrapper.innerHTML = loadPage('../front-end/pages/partials/fromRegistrar.html');
        break;
}

// Preview para upload de imagem
const elemSelecaoArquivo = document.getElementById("selecao-arquivo");

elemSelecaoArquivo.onchange = (event) => {
    var output = document.getElementById("output");

    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = "flex";

    output.onload = () => {
        URL.revokeObjectURL(output.src);
    }
};
