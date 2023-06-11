
const items = document.querySelectorAll(".bEliminar");

items.forEach(item => {
    item.addEventListener("click", function(){
        const empleado = this.dataset.empleado;
        console.log(empleado);

        const confirm = window.confirm("Deseas eliminar el elemento?");

        if(confirm){
            httpRequest("http://localhost/Proyecto_Daw/consultaempleado/eliminarEmpleado/" + empleado, function(e){
                console.log(this.responseText);
                const tbody = document.querySelector("#tbody-empleados");
                const fila  = document.querySelector("#fila-" + empleado);
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