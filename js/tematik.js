function openPage(pageName, elmnt, color, color1) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific color to the    button used to open the tab content
    elmnt.style.backgroundColor = color;


    $(".pet").css("background-color", color)
    $(".stat").css("background-color", color)
    $(".prov").css("background-color", color1)
    $(".kota").css("background-color", color1)
    $(".tertinggi").css("background-color", color1)
    $(".label1").css("color", color1)
    $(".prov").css("color", color)
    $(".kota").css("color", color)
    $(".tertinggi").css("color", color)
    $(".KetPeta").css("color", color1)
}


        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        var highlightLayer;
        function highlightFeature(e) {
            highlightLayer = e.target;
            highlightLayer.openPopup();
        }
        var map = L.map('mapSatker', {
            zoomControl:true, maxZoom:28, minZoom:1
        })
        .fitBounds([[-21.514034822941824,85.76218142691255],[17.608866805346622,162.21609605929302]]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
        }
        map.createPane('pane_OSMStandard_0');
        map.getPane('pane_OSMStandard_0').style.zIndex = 400;
        var layer_OSMStandard_0 = L.tileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            pane: 'pane_OSMStandard_0',
            opacity: 1.0,
            attribution: '<a href="https://www.openstreetmap.org/copyright">© OpenStreetMap contributors, CC-BY-SA</a>',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 19
        });
        layer_OSMStandard_0;
        map.addLayer(layer_OSMStandard_0);

        function pop_layer_1(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            pop = '';
            Object.keys(feature.properties).forEach(function(key) {

              pop = pop +  
              '<tr>\
              <th scope="row">'+key+'</th>\
              <td>:' + (feature.properties[key] !== null ? autolinker.link(feature.properties[key].toString()) : '') + '</td>\
                </tr>';
              
            });
            var popupContent = '<table>\
                    '+pop+'\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_layer_1(feature) {
            return {
                pane: 'pane_1',
                opacity: 1,
                color: 'rgba(255,4,255,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(150,153,4,1.0)',
                interactive: true,
            }
            if (feature.properties['Data Kebakaran_SIMKB Kebakaran'] >= 27.880000 && feature.properties['Data Kebakaran_SIMKB Kebakaran'] <= 36.052000 ) {
            }
            if (feature.properties['Data Kebakaran_SIMKB Kebakaran'] >= 36.052000 && feature.properties['Data Kebakaran_SIMKB Kebakaran'] <= 38.512000 ) {
                return {
                pane: 'pane_1',
                opacity: 1,
                color: 'rgba(255,255,255,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(129,132,127,1.0)',
                interactive: true,
            }
            }
            if (feature.properties['Data Kebakaran_SIMKB Kebakaran'] >= 38.512000 && feature.properties['Data Kebakaran_SIMKB Kebakaran'] <= 40.942000 ) {
                return {
                pane: 'pane_1',
                opacity: 1,
                color: 'rgba(255,255,255,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(102,107,100,1.0)',
                interactive: true,
            }
            }
            if (feature.properties['Data Kebakaran_SIMKB Kebakaran'] >= 40.942000 && feature.properties['Data Kebakaran_SIMKB Kebakaran'] <= 43.206000 ) {
                return {
                pane: 'pane_1',
                opacity: 1,
                color: 'rgba(255,255,255,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(70,76,67,1.0)',
                interactive: true,
            }
            }
            if (feature.properties['Data Kebakaran_SIMKB Kebakaran'] >= 43.206000 && feature.properties['Data Kebakaran_SIMKB Kebakaran'] <= 54.270000 ) {
                return {
                pane: 'pane_1',
                opacity: 1,
                color: 'rgba(255,255,255,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(58,63,55,1.0)',
                interactive: true,
            }
            }
        }
        map.createPane('pane_1');
        map.getPane('pane_1').style.zIndex = 401;
        map.getPane('pane_1').style['mix-blend-mode'] = 'normal';
        

        function pop_PointBanjirPegawai_2(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            pop = '';
            Object.keys(feature.properties).forEach(function(key) {

              pop = pop +  
              '<tr>\
              <th scope="row">'+key+'</th>\
              <td>' + (feature.properties[key] !== null ? autolinker.link(feature.properties[key].toString()) : '') + '</td>\
                </tr>';
              
            });
            var popupContent = '<table>\
                    '+pop+'\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }
        
        function style_PointBanjirPegawai_2_0(feature) {
            
            return {
                pane: 'pane_2',
                radius: 7.2,
                stroke: false,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(148,154,169,1.0)',
                interactive: true,
            }
            // if (feature.properties['Banjir-Pegawai_IMKB Pegawai'] >= 57.950000 && feature.properties['Banjir-Pegawai_IMKB Pegawai'] <= 68.356000 ) {
            //     return {
            //     pane: 'pane_2',
            //     radius: 7.2,
            //     stroke: false,
            //     fill: true,
            //     fillOpacity: 1,
            //     fillColor: 'rgba(148,154,169,1.0)',
            //     interactive: true,
            // }
            // }
        }

        map.createPane('pane_2');
        map.getPane('pane_2').style.zIndex = 402;
        map.getPane('pane_2').style['mix-blend-mode'] = 'normal';
        var layer_1 = L.geoJson();
        var layer_2 = L.geoJson(); 

        function resetLayer() {
            map.removeLayer(globalThis.layer_2);
            map.removeLayer(globalThis.layer_1);
        }


        function manageSatkerMap(data) {
            resetLayer();
            data = JSON.parse(data);
            if($('#indeks-satker').val()==3){
                let type, name, crs, features, newFeatures,newPolygon;
                if($('#prov-satker').val()!=1){
                    //modif geojson polygon
                    type = polygonGeoJSON.type;
                    name = polygonGeoJSON.name;
                    crs = polygonGeoJSON.crs;
                    features = polygonGeoJSON.features;
                    newFeatures = features.filter((polygon) => polygon.properties.kodesatker == $('#prov-satker').val());
                    newPolygon = {
                        type : type,
                        name : name,
                        crs : crs,
                        features : newFeatures
                    }
                }else newPolygon=polygonGeoJSON;
    
    
                layer_1 = L.geoJson(newPolygon, {
                    attribution: '',
                    interactive: true,
                    dataVar: 'polygonGeoJSON',
                    layerName: 'layer_1',
                    pane: 'pane_1',
                    // onEachFeature: pop_layer_1,
                    style: style_layer_1,
                });
                bounds_group.addLayer(layer_1);
                map.addLayer(layer_1);

                // modif point geojson
                type = indonesiaPoint.type;
                name = indonesiaPoint.name;
                crs = indonesiaPoint.crs;
                features = indonesiaPoint.features;
                newFeatures = [];
                features.forEach(feature => {
                    f_type = feature.type;
                    newProp = data.find((data) => data.kodesatker == feature.properties.Kode);
                    f_properties = {
                        // "Kode": feature.properties.Kode,
                        // "Nama Satker": feature.properties['Nama Satker'],
                        "Latitude (Y)": feature.properties['Latitude (Y)'],
                        "Longitude (X)": feature.properties['Longitude (X)'],
                    }
                    f_geometry = feature.geometry;
                    newFeatures.push({type : f_type , properties : {...newProp , ...f_properties} , geometry : f_geometry});
                });
    
                newFeatures = newFeatures.filter((feature) => Object.getOwnPropertyNames(feature.properties).length>2)
                
    
                const newData = {
                    type : type,
                    name : name,
                    crs : crs,
                    features : newFeatures
                }
                
    
                globalThis.layer_2 = L.geoJson(newData, {
                    attribution: '',
                    interactive: true,
                    dataVar: 'indonesiaPoint',
                    layerName: 'layer_2',
                    pane: 'pane_2',
                    onEachFeature: pop_PointBanjirPegawai_2,
                    pointToLayer: function (feature, latlng) {
                        var context = {
                            feature: feature,
                            variables: {}
                        };
                        return L.circleMarker(latlng, style_PointBanjirPegawai_2_0(feature));
                    },
                });
                bounds_group.addLayer(globalThis.layer_2);
                map.addLayer(globalThis.layer_2);
            }else{
                //manage kebakaran dan covid
                
                // if($('#prov-satker').val()!=1){
                //     //modif geojson polygon
                //     let type = polygonGeoJSON.type;
                //     let name = polygonGeoJSON.name;
                //     let crs = polygonGeoJSON.crs;
                //     let features = polygonGeoJSON.features;
                //     let newFeatures = features.filter((polygon) => polygon.properties.kodesatker == $('#prov-satker').val());
                    
                //     var newPolygon = {
                //         type : type,
                //         name : name,
                //         crs : crs,
                //         features : newFeatures
                //     }
                // }else newPolygon=polygonGeoJSON;

                
                polygonGeoJSON.features.forEach(feature => {
                    newProperty = data.find((d) => d.kodesatker == feature.properties.kodesatker);
                    feature.properties = newProperty;
                });
                layer_1 = L.geoJson(polygonGeoJSON, {
                    attribution: '',
                    interactive: true,
                    dataVar: 'polygonGeoJSON',
                    layerName: 'layer_1',
                    pane: 'pane_1',
                    onEachFeature: pop_layer_1,
                    style: style_layer_1,
                });
                bounds_group.addLayer(layer_1);
                map.addLayer(layer_1);


                // if($('#prov-satker').val()!=1){
                //     //modif geojson polygon
                //     let type = polygonGeoJSON.type;
                //     let name = polygonGeoJSON.name;
                //     let crs = polygonGeoJSON.crs;
                //     let features = polygonGeoJSON.features;
                //     let newFeatures = features.filter((polygon) => polygon.properties.kodesatker == $('#prov-satker').val());
                    
                //     var newPolygon = {
                //         type : type,
                //         name : name,
                //         crs : crs,
                //         features : newFeatures
                //     }
                // }else newPolygon=polygonGeoJSON;

                
                // newPolygon.features.forEach(feature => {
                //     newProperty = data.find((d) => d.kodesatker == feature.properties.kodesatker);
                //     feature.properties = newProperty;
                // });

                // console.log(newPolygon);
                // layer_1 = L.geoJson(newPolygon, {
                //     attribution: '',
                //     interactive: true,
                //     dataVar: 'polygonGeoJSON',
                //     layerName: 'layer_1',
                //     pane: 'pane_1',
                //     onEachFeature: pop_layer_1,
                //     style: style_layer_1,
                // });
                // bounds_group.addLayer(layer_1);
                // map.addLayer(layer_1);
            }

        }
        


        initMap = () => {
            $.post('Visualisasi/getPetaSatker' , {
                indeks : $('#indeks-satker').val(),
                kodesatker : $('#prov-satker').val()
            },
            (data , status) => {
                manageSatkerMap(data)
            })
        }

        initMap();

        $('#indeks-satker').change(() => {
            initMap()
        })
        

        $('#prov-satker').change(() => {
            initMap()
        })


