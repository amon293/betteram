$(document).ready(function() {

    $("#from_airport_id").change(function() {
        if ($("#to_airport_id").val().length==0)
            return;

        var distance = calcDistance($("#from_airport_id").val(), $("#to_airport_id").val());
        $("#flight_distance").val(distance);

        if ($("#airplane_id").val().length==0)
            return;

        var airplane = getAirplane($("#airplane_id").val());
        $("#speed").val(airplane.cruise_speed);

        var time = calcTime(distance, airplane.cruise_speed); //get the time in seconds
        $("#flight_time").val(time);
    });

    $("#to_airport_id").change(function() {
        if ($("#from_airport_id").val().length==0)
            return;

        var distance = calcDistance($("#from_airport_id").val(), $("#to_airport_id").val());
        $("#flight_distance").val(distance);

        if ($("#airplane_id").val().length==0)
            return;

        var airplane = getAirplane($("#airplane_id").val());
        $("#speed").val(airplane.cruise_speed);

        var time = calcTime(distance, airplane.cruise_speed); //get the time in seconds
        $("#flight_time").val(time);
    });

    $("#airplane_id").change(function() {
        if ($("#from_airport_id").val().length==0 || $("#to_airport_id").val().length==0)
            return;

        var distance = calcDistance($("#from_airport_id").val(), $("#to_airport_id").val());
        $("#flight_distance").val(distance);

        var airplane = getAirplane($("#airplane_id").val());
        $("#speed").val(airplane.cruise_speed);

        var time = calcTime(distance, airplane.cruise_speed); //get the time in seconds
        $("#flight_time").val(time);
    });

    function calcDistance(fromAirportId, toAirportId) {
        var from = LatLng(fromAirportId);
        var to = LatLng(toAirportId);

        from = new google.maps.LatLng(from.latitude, from.longitude);
        to = new google.maps.LatLng(to.latitude, to.longitude);

        var distance = Math.round(google.maps.geometry.spherical.computeDistanceBetween(from, to) / 1000);

        return distance;
    }

    function LatLng(airport) {
        var url = "http://localhost:8000/airport/" + airport + "/coordinates"; // change this to right link
        var airport = {};

        $.ajaxSetup({async: false});
        $.getJSON(url, function(data) {
            airport = data;
        });

        return airport;
    }

    function getAirplane(airplaneId) {
        var url = "http://localhost:8000/airplane/" + airplaneId; // change this to right link
        var airplane = {};

        $.ajaxSetup({async: false});
        $.getJSON(url, function(data) {
            airplane = data;
        });

        return airplane;
    }

    function calcTime(distance, cruiseSpeed) {
        return ((distance/cruiseSpeed)*60)*60;
    }
});