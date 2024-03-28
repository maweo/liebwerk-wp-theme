<?php 
    $api_key = get_sub_field('api_key');
    $style = get_sub_field('custom_json_style');
    $markers = get_sub_field('locations');
    $zoom = get_sub_field('zoom');
    $url = get_sub_field('icon');
    $uniqid = uniqid();

    if(!$style || $style == "") {
        $style = "[]";
    }

    if(!$zoom || $zoom == "") {
        $zoom = 5;
    }
?>


<section class="google-map">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="map-<?php echo $uniqid?>" class="google-map__map"></div>

                <!-- Include the Google Maps API -->
                <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key; ?>&callback=initMap" async defer></script>

                <script>
                    // Custom JSON style for the map
                    const customStyle = <?php echo $style; ?>

                    // Custom markers data with latitude and longitude
                    const markers = [
                        <?php foreach($markers as $marker):  ?>
                            { lat: <?php echo $marker['lat']?>, lng: <?php echo $marker['long']?> },
                        <?php endforeach;  ?>
                    ];

                    // URL of the external SVG file
                    const svgURL = "<?php echo $url ?>";

                    // Function to create custom SVG icon for markers from an external SVG file
                    function createCustomMarkerIcon(svgURL) {
                        return {
                            url: svgURL, // Set the URL of the external SVG file
                            scaledSize: new google.maps.Size(24, 24), // Set the size of the icon
                        }
                    }

                    // Initialize the map
                    function initMap() {
                    const map = new google.maps.Map(document.getElementById('map-<?php echo $uniqid?>'), {
                        center: { lat: <?php echo $markers[0]['lat'] ?>, lng: <?php echo $markers[0]['long'] ?> }, // Set default center coordinates
                        zoom: <?php echo $zoom ?>, // Set default zoom level
                        styles: customStyle // Apply custom JSON style to the map
                    });

                    // Add markers to the map with custom SVG icon fetched from the URL
                    markers.forEach(marker => {
                        new google.maps.Marker({
                                position: { lat: marker.lat, lng: marker.lng },
                                map: map,
                                <?php if($url && $url != ""): ?>
                                    icon: createCustomMarkerIcon(svgURL) // Set custom SVG icon for the marker
                                <?php endif; ?>
                            });
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</section>