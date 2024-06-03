$(document).ready(function() {

    $('#driversReportBlock').hide();

    function getMainTable() {
        $.ajax({
            url: '/api/driver-payable-time',
            method: 'GET',
            success: function(result) {
                getTripsTable(result);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }


    function getTripsTable(lists) {
        $('#tripsTable thead').empty();
        $('#tripsTable tbody').empty();

        $('#tripsTable thead').append('<tr><th>ID</th><th>Driver ID</th><th>Pickup</th><th>Dropoff</th></tr>');

        Object.values(lists).forEach(function(trip) {
            let pickupFormatted = moment(trip.pickup).format('YYYY-MM-DD HH:mm:ss');
            let dropoffFormatted = moment(trip.dropoff).format('YYYY-MM-DD HH:mm:ss');

            $('#tripsTable tbody').append('<tr><td>' + trip.id + '</td><td>' + trip.driver_id + '</td><td>' + pickupFormatted + '</td><td>' + dropoffFormatted + '</td></tr>');
        });

        $('#tripsTable').DataTable({
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            "pageLength": 10,
            "pagingType": "full_numbers",
            "order": [[ 0, "asc" ]],
            "ordering": true
        });
    }

    function populateDriversReportTable(lists) {
        $('#driversReportTable tbody').empty();

        let driversReportArray = Object.entries(lists).map(([driver_id, total_minutes_with_passenger]) => ({ driver_id, total_minutes_with_passenger }));

        driversReportArray.forEach(function(driverReport) {
            $('#driversReportTable tbody').append('<tr><td>' + driverReport.driver_id + '</td><td>' + driverReport.total_minutes_with_passenger + '</td></tr>');
        });

        $('#driversReportTable').DataTable({
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            "pageLength": 10,
            "pagingType": "full_numbers",
            "order": [[ 1, "asc" ]],
            "ordering": true
        });
    }


    getMainTable();

    $('#calculatePayableTimeBtn').click(function() {
        $.ajax({
            url: '/api/calculate-payable-time',
            method: 'POST',
            success: function(result) {
                populateDriversReportTable(result);
                $('#driversReportBlock').show();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    module.exports = { getTripsTable, populateDriversReportTable };

});
