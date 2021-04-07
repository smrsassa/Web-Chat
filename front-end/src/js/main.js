function loadPage( url ) {
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.open(
        "GET", 
        url, 
        false
    );
    xmlhttp.send();

    return xmlhttp.responseText;
}
