$(document).ready(() => {
    getResults();
    if(torneo.status != 'Terminado'){
        setInterval(() => {
            getResults();
        }, 15000);
    }
});

async function getResults() {
    let datos = [];
    await axios.get('/torneo/getResults/'+torneo.id).then(res =>  {datos = res.data});
    printHtml(datos['Golon'],'golonDatos');
    if(torneo.tipo == 'Orilla' || torneo.tipo == 'Both') printHtml(datos['Orilla'],'orillaDatos');
    if(torneo.tipo == 'Embarcacion' || torneo.tipo == 'Both') printHtml(datos['Equipo'],'equipoDatos');
}

function printHtml(items,container) {
    let cadena = '';
    if(items.length){
        items.forEach((element,index) => {
            cadena += filasHtml(index+1,element);
        });
    }else {
        cadena += '<tr><td colspan="3">Sin Registros</td></tr>';
    }
    $('#'+container).html(cadena);
}

function filasHtml(lugar, item) {
    return `
        <tr>
            <td><b>${lugar}</b></td>
            <td>${item.name}</td>
            <td><b>${item.pivot.total}</b></td>
        </tr>
    `;
}