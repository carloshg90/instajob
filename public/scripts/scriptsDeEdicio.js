//Consulta a una api que em retorna totes les provincies per posar-les en el formulari de registre
const url = 'https://public.opendatasoft.com/api/records/1.0/search/?dataset=espana-municipios&facet=communidad_autonoma&facet=provincia&facet=municipio';
const http = new XMLHttpRequest();
var provincies = [];
http.open("GET", url);
http.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        for (var i = 0; i < data.facet_groups[0].facets.length; i++) {
            //Guardem les provincies en un array
            provincies.push(data.facet_groups[0].facets[i].name);
        }
    }
    //Ordenem l'array
    provincies.sort(function(a, b) {
        return a.localeCompare(b);
    });
    //Afegim els options
    for (var i = 0; i < provincies.length; i++) {
        var x = document.getElementById("zona");
        var option = document.createElement("option");
        option.text = provincies[i];
        x.add(option);
    }
};
http.send();