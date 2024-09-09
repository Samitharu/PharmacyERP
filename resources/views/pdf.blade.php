<!DOCTYPE html>
<html>
<head>
    <title>Customer Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        h1, h2 {
            color: #ee2424;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: #97ceea;
        }
        .total-row {
            font-weight: bold;
            background-color: #f2f2f2;
        }
        th:nth-child(1), td:nth-child(1) {
            width: 20%; /* Adjust width as needed */
        }
        th:nth-child(2), td:nth-child(2) {
            width: 40%; /* Adjust width as needed */
        }
        th:nth-child(3), td:nth-child(3) {
            width: 40%; /* Adjust width as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Customer Report</h1>
        
        @php
            $grandTotal = 0;
        @endphp

        @foreach ($groupedData as $districtId => $users)
            <h2>District ID: {{ $districtId }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>Customer Code</th>
                        <th>Customer Name</th>
                        <th>Primary Address</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $groupTotal = count($users);
                        $grandTotal += $groupTotal;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->customer_code }}</td>
                            <td>{{ $user->customer_name }}</td>
                            <td>{{ $user->primary_address }}</td>
                        </tr>
                    @endforeach
                    <tr class="total-row">
                        <td colspan="3">Group Total: {{ $groupTotal }} customers</td>
                    </tr>
                </tbody>
            </table>

            {{-- <!-- Page Break (optional) -->
            <div style="page-break-before: always;"></div> --}}
        @endforeach

        <h2>Grand Total: {{ $grandTotal }} customers</h2>
    </div>
</body>
</html>
