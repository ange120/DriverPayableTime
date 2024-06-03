global.$ = global.jQuery = require('jquery');
const { populateTripsTable, populateDriversReportTable } = require('../public/js/main.js');
describe("Driver Payable Time Application", function() {
    it("should populate trips table", function() {
        const data = [
            { id: 1, driver_id: 26, pickup: "2023-05-01 08:00:00", dropoff: "2023-05-01 08:32:00" },
            { id: 2, driver_id: 81, pickup: "2023-05-01 09:00:00", dropoff: "2023-05-01 09:42:00" }
        ];

        populateTripsTable(data);

        const rows = document.querySelectorAll('#tripsTable tbody tr');
        expect(rows.length).toBe(2);
        expect(rows[0].cells[0].textContent).toBe("1");
        expect(rows[0].cells[1].textContent).toBe("26");
    });

    it("should populate drivers report table", function() {
        // Приклад даних
        const data = { 26: 32, 81: 42 };

        populateDriversReportTable(data);

        const rows = document.querySelectorAll('#driversReportTable tbody tr');
        expect(rows.length).toBe(2);
        expect(rows[0].cells[0].textContent).toBe("26");
        expect(rows[0].cells[1].textContent).toBe("32");
    });
});
