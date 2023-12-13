<?php

$lat    = $this->varValue('lat', 0);
$lng    = $this->varValue('lng', 0);
$zoom   = $this->varValue('zoom', 0);
$apiKey = $this->varValue('key', false);
$color  = $this->varValue('color', 'red');
$label  = $this->varValue('label', false);

$this->registerJs(
    '
    const gMapLabel = "'.$label.'";
    const gMapColor = "'.$color.'";

    function initMap(){
        map = new google.maps.Map(document.getElementById("gmap"), {
            zoom                     : '.$zoom.',
            mapTypeControl           : false,
            mapTypeId                : google.maps.MapTypeId.ROADMAP,
            scaleControl             : true,
            backgroundColor          : "#FAF9F6",
            minZoom                  : 5,
            zoomControl              : false,
            streetViewControl        : false,
            panControl               : false,
            overviewMapControl       : true,
        });
        map.setCenter(new google.maps.LatLng('.$lat.','.$lng.'));

        // Svg Marker icon
        const svgMarker = {
            path: "M 10 0.5 C 6.41 0.5 3.5 3.3904687 3.5 6.9804688 C 3.5 11.830469 10 19 10 19 C 10 19 16.5 11.830469 16.5 6.9804688 C 16.5 3.3904687 13.59 0.5 10 0.5 z M 10 4.5 A 2.3 2.3 0 0 1 12.300781 6.8007812 A 2.3 2.3 0 0 1 10 9.0996094 A 2.3 2.3 0 0 1 7.6992188 6.8007812 A 2.3 2.3 0 0 1 10 4.5 z ",
            fillColor: gMapColor,
            strokeColor: "white",
            fillOpacity: 1,
            strokeWeight: 1,
            rotation: 0,
            scale: 2,
            anchor: new google.maps.Point(15, 30),
        };

        // Google
        const gMkr = new google.maps.Marker({
            position: map.getCenter(),
            icon: svgMarker,
            map: map,
        });

        // Add listener to marker
        if(gMapLabel){
            const infowindow = new google.maps.InfoWindow({
                content: gMapLabel,
            });
            gMkr.addListener("click", () => {
                infowindow.open({
                    anchor: gMkr,
                    map,
                    shouldFocus: true,
                });
            });
        }
    }

    var loaded = false;
    if(loaded == false){
        new Promise((resolve, reject) => {
            let script = document.createElement("script");
            script.onload = () => {
                resolve(initMap());
            }
            script.src = "https://maps.googleapis.com/maps/api/js?key='.$apiKey.'&libraries=geometry"
            document.head.appendChild(script);
            loaded = true;
        });
    }
    else{
        initMap();
    }
    ',
    \yii\web\View::POS_HEAD,
    'gmapReady'
);

?>
<div id="gmap" class="uk-width-1-1 uk-height-large uk-background-muted"></div>

<!--
<script>



    // Go map

</script>
-->