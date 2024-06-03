<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Payable Time App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>

<div class="container mt-5">
    <h1>Driver Payable Time App</h1>
    <hr>

    <button id="calculatePayableTimeBtn" class="btn btn-primary mb-3">Calculate Payable Time</button>

    <h2>Trips</h2>
    <table id="tripsTable" class="table table-bordered">
        <thead>
        <tr>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
<div id="driversReportBlock" style="display: none;">
    <h2>Drivers Report</h2>
    <table id="driversReportTable"  class="table table-bordered"  >
        <thead>
        <tr>
            <th>Driver ID</th>
            <th>Total Minutes with Passenger</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

</div>


<script src="{{ asset('js/main.js') }}"></script>
</body>
<footer class="footer">
    <div class="container">
        <p class="text-center">© 2024 Andrey Tkach. All rights reserved.</p>
    </div>
</footer>
</html>
