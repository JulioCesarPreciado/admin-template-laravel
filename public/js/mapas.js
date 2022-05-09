/* Inicializamos las lineas */
var polyline = null

// Creating map options
var mapOptions = {
    center: [20.6466, -103.3133],
    zoom: 12
}

if (document.getElementById("map")) {
    var map = new L.map('map', mapOptions);
    // Creamos el cluster de los marcadores
    //var markers = L.markerClusterGroup();
    // Creating a Layer object
    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
        attribution: ''
    }).addTo(map);


    var styleGuadalajara = {
        fillColor: 'transparent',
        weight: 2,
        opacity: 1,
        color: 'black', //Outline color
        fillOpacity: 0.7
    };

    //Limite de Tlajomulco
    L.geoJson(guadalajara, {
        style: styleGuadalajara
    }).addTo(map);

    setTimeout(function () {
        map.invalidateSize();
    }, 30);
}
