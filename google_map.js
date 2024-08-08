// When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);

            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 17,
                    scrollwheel: false,
                    streetViewControl: false,
                    mapTypeControl: false,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(48.4207139, 35.0076556),

                    // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    // KOD
                    styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"color":"#7b7b7b"},{"lightness":"-34"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#7b7b7b"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"color":"#7b7b7b"},{"weight":"0.33"},{"lightness":"-30"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#7b7b7b"},{"lightness":"-27"}]},{"featureType":"administrative.locality","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20},{"visibility":"on"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"on"},{"saturation":"-100"},{"lightness":"-50"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18},{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16},{"visibility":"on"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19},{"visibility":"off"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
                };

                // Get the HTML DOM element that will contain your map
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);


                // Let's also add a marker while we're at it
                // var marker = new google.maps.Marker({
                //     position: new google.maps.LatLng(48.5887144, 38.0015435),
                //     map: map,
                //     title: 'Город',
                //     icon: "img/map-pin.png",
                // });
//***************************************************************************************************************

                 var neighborhoods = [
        // Main
        {lat: 48.4207139, lng: 35.0076556, title: 'Прокси сервера для ВК, яндекса,<br> Одноклассников и mail.ru', content: '<b>ДНЕПР, &nbsp; ул.Шинная, 2 &nbsp; +38 (067) 829 11 09</b>', icon: '/marker.png'},
    ];

    /* Info windows
    =========================*/
    infoWindow = new google.maps.InfoWindow();

    function displayMarkers() {

       // this variable sets the map bounds and zoom level according to markers position
       var bounds = new google.maps.LatLngBounds();

       // For loop that runs through the info on markersData making it possible to createMarker function to create the markers
       for (var i = 0; i < neighborhoods.length; i++){

          var latlng = new google.maps.LatLng(neighborhoods[i].lat, neighborhoods[i].lng);
          var name = neighborhoods[i].title;
          var icon = neighborhoods[i].icon;
          var content = neighborhoods[i].content;

          createMarker(latlng, name, content, icon, i * 250);

          // Marker’s Lat. and Lng. values are added to bounds variable
          bounds.extend(latlng);
       }

    }


    function createMarker(latlng, title, content, icon, timeout) {

        window.setTimeout(function() {
           var marker = new google.maps.Marker({
              map: map,
              position: latlng,
              clickable: true,
              icon: {
                url: "images/" + icon
              },
              animation: google.maps.Animation.DROP
           });

           google.maps.event.addListener(marker, 'click', function() {
              var infoContent = '<div id="info_container">' +
              '<h4 class="info_title">' + title + '</h4><div>' + content + '</div></div>';

              infoWindow.setContent(infoContent);
              infoWindow.open(map, marker);

           });

        }, timeout);

    }

    displayMarkers();


    /* Map center on resize
    =========================*/
    var getCen = map.getCenter();

    google.maps.event.addDomListener(window, 'resize', function() {
        map.setCenter(getCen);
    });

//***********************************************************************************
};
