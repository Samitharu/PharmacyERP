<!DOCTYPE html>
<html>
<head>
    <title>Users Report</title>
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
        h1 {
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
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #97ceea;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Users Report</h1>
        <table>
            <thead>
               
            </thead>
            <tbody>
                <tr>
                    <th>Customer Code</th>
                    <th>Customer Name</th>
                    <th>Primary Address</th>
                </tr>
                @foreach ($userdata as $user)
                
                    <tr>
                        <td>{{ $user->customer_code }}</td>
                        <td>{{ $user->customer_name }}</td>
                        <td>{{ $user->primary_address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
