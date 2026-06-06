<!DOCTYPE html>
<html>
<head>
    <title>Services PDF Export</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>
<body>

<h2>Services Report</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->category }}</td>
                <td>{{ $service->description }}</td>
                <td>{{ $service->price }}</td>
                <td>{{ $service->is_active ? 'Active' : 'Inactive' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="footer">
    Generated on {{ now() }}
</div>

<!-- Auto open print dialog -->
<script>
    window.onload = function () {
        window.print();
    }
</script>

</body>
</html>