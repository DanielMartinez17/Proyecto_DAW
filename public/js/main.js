
const items = document.querySelectorAll(".bEliminar");

items.forEach(item => {
    item.addEventListener("click", function(){
        const categoria = this.dataset.categoria;
        console.log(categoria);

        const confirm = window.confirm("Deseas eliminar el elemento?");

        if(confirm){
            httpRequest("http://localhost/Proyecto_Daw/consultacategoria/eliminarCategoria/" + categoria, function(e){
                console.log(this.responseText);
                const tbody = document.querySelector("#tbody-alumnos");
                const fila  = document.querySelector("#fila-" + categoria);
                tbody.removeChild(fila);
            })
        }
    });
});


function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}