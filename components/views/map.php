<?php
use Yii; ?>

<div id="business-map" style="height: 300px; width: 100%"></div>

<?php
$this->registerJsFile('https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyC84sFxZL4KCPIFl8ezsta45Rm8WPRIM7Y' . (Yii::$app->request->isAjax ? '&callback=initBusinessMap' : ''), ['depends' => 'yii\web\YiiAsset']);

$jscript = '
    var initBusinessMap = function() {

        if (typeof google === "object" && typeof google.maps === "object") {

            var coordinate = {lat: ' . $latitude . ', lng: ' . $longitude . '};

            var businessMap = new google.maps.Map(document.getElementById("business-map"), {
                center: coordinate,
                zoom: 16,
                styles: [ { "featureType": "poi.business", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.park", "elementType": "labels.text", "stylers": [ { "visibility": "off" } ] } ],
            });

            var marker = new google.maps.Marker({
                position: coordinate,
                map: businessMap,
                icon: {
                    url: "' . Yii::$app->request->baseUrl . '/media/img/marker.png",
                    scaledSize: new google.maps.Size(32, 32),
                    origin: new google.maps.Point(0,0),
                    anchor: new google.maps.Point(15, 32)
                }
            });
        }
    }

    initBusinessMap();
';

$this->registerJs($jscript); ?>