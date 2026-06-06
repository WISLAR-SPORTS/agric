<!DOCTYPE html>
<html>
<head>
    <title>Farmers Report</title>

    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }

        h2 { text-align: center; margin-bottom: 20px; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 6px;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Farmers Report</h2>

<table>
    <thead>
        <tr>
            <th>Farmer #</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>District</th>
            <th>Village</th>
            <th>Farm Size</th>
        </tr>
    </thead>

    <tbody>
        @foreach($farmers as $farmer)
        <tr>
            <td>{{ $farmer->farmer_number }}</td>
            <td>{{ $farmer->first_name }} {{ $farmer->last_name }}</td>
            <td>{{ $farmer->gender }}</td>
            <td>{{ $farmer->phone }}</td>
            <td>{{ $farmer->district }}</td>
            <td>{{ $farmer->village }}</td>
            <td>{{ $farmer->farm_size }} {{ $farmer->farm_size_unit }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    // Auto open print dialog
    window.onload = function () {
        window.print();
    }
</script>

</body>
</html>