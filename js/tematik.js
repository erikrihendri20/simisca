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
        var map = L.map('mapid', {
            zoomControl:true, maxZoom:28, minZoom:1
        }).fitBounds([[-21.514034822941824,85.76218142691255],[17.608866805346622,162.21609605929302]]);
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

        function pop_INDO_PROV_2016_1(feature, layer) {
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
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['PROVNO'] !== null ? autolinker.link(feature.properties['PROVNO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['PROVINSI'] !== null ? autolinker.link(feature.properties['PROVINSI'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['IDPROV'] !== null ? autolinker.link(feature.properties['IDPROV'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['TAHUN'] !== null ? autolinker.link(feature.properties['TAHUN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['SUMBER'] !== null ? autolinker.link(feature.properties['SUMBER'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_INDO_PROV_2016_1_0() {
            return {
                pane: 'pane_INDO_PROV_2016_1',
                opacity: 1,
                color: 'rgba(255,255,255,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(220,223,218,1.0)',
                interactive: false,
            }
        }
        map.createPane('pane_INDO_PROV_2016_1');
        map.getPane('pane_INDO_PROV_2016_1').style.zIndex = 401;
        map.getPane('pane_INDO_PROV_2016_1').style['mix-blend-mode'] = 'normal';
        var layer_INDO_PROV_2016_1 = new L.geoJson(indonesiaGeoJSON, {
            attribution: '',
            interactive: false,
            dataVar: 'indonesiaGeoJSON',
            layerName: 'layer_INDO_PROV_2016_1',
            pane: 'pane_INDO_PROV_2016_1',
            onEachFeature: pop_INDO_PROV_2016_1,
            style: style_INDO_PROV_2016_1_0,
        });
        bounds_group.addLayer(layer_INDO_PROV_2016_1);
        map.addLayer(layer_INDO_PROV_2016_1);

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
              <td>' + (feature.properties[key] !== null ? autolinker.link(feature.properties[key].toLocaleString()) : '') + '</td>\
                </tr>';
              
            });
            var popupContent = '<table>\
                    '+pop+'\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }
        
        function style_PointBanjirPegawai_2_0(feature) {
            
            return {
                pane: 'pane_PointBanjirPegawai_2',
                radius: 7.2,
                stroke: false,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(148,154,169,1.0)',
                interactive: true,
            }
            // if (feature.properties['Banjir-Pegawai_IMKB Pegawai'] >= 57.950000 && feature.properties['Banjir-Pegawai_IMKB Pegawai'] <= 68.356000 ) {
            //     return {
            //     pane: 'pane_PointBanjirPegawai_2',
            //     radius: 7.2,
            //     stroke: false,
            //     fill: true,
            //     fillOpacity: 1,
            //     fillColor: 'rgba(148,154,169,1.0)',
            //     interactive: true,
            // }
            // }
        }

        map.createPane('pane_PointBanjirPegawai_2');
        map.getPane('pane_PointBanjirPegawai_2').style.zIndex = 402;
        map.getPane('pane_PointBanjirPegawai_2').style['mix-blend-mode'] = 'normal';
        var layer_indonesiaPoint; 

        function manageMap(filter = []) {
            
            filter.forEach(f => {
                
            });
            layer_indonesiaPoint = new L.geoJson(indonesiaPoint, {
                attribution: '',
                interactive: true,
                dataVar: 'indonesiaPoint',
                layerName: 'layer_PointBanjirPegawai_2',
                pane: 'pane_PointBanjirPegawai_2',
                onEachFeature: pop_PointBanjirPegawai_2,
                pointToLayer: function (feature, latlng) {
                    var context = {
                        feature: feature,
                        variables: {}
                    };
                    return L.circleMarker(latlng, style_PointBanjirPegawai_2_0(feature));
                },
            });
            map.removeLayer(layer_indonesiaPoint);
            map.addLayer(layer_indonesiaPoint);
        }

        manageMap();