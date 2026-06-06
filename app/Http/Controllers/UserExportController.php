<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Response;

class UserExportController extends Controller
{
    public function exportCsv()
    {
        $users = User::all();
        $filename = 'users.csv';

        return Response::streamDownload(function () use ($users) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['ID', 'Name', 'Email', 'Created At']);

            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->created_at,
                ]);
            }

            fclose($file);
        }, $filename);
    }
    public function exportExcel()
    {
        $users = User::select('id', 'name', 'email', 'created_at')->get();

        $filename = "users_export_" . date('Y-m-d_H-i-s') . ".xls";

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo "<table border='1'>";

        // headers
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
              </tr>";

        // rows
        foreach ($users as $user) {
            echo "<tr>
                    <td>{$user->id}</td>
                    <td>{$user->name}</td>
                    <td>{$user->email}</td>
                    <td>{$user->created_at}</td>
                  </tr>";
        }

        echo "</table>";
        exit;
    }
    public function exportPdf()
{
    $users = \App\Models\User::select('id', 'name', 'email', 'created_at')->get();

    $siteName = config('app.name');
    header("Content-Type: text/html; charset=utf-8");
    header("Content-Disposition: inline; filename=\"users_report.html\"");

    echo "<html><head><title>{$siteName} - User Report</title>";

    echo "<style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #333;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #2c3e50;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header .site-name {
            font-size: 26px;
            font-weight: bold;
            color: #2c3e50;
            margin: 0;
        }

        .header .title {
            font-size: 16px;
            margin-top: 5px;
            color: #555;
        }

        .meta {
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #2c3e50;
            color: white;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #888;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>";

    echo "</head><body>";

    // HEADER WITH BUSINESS NAME
    echo "<div class='header'>";
    echo "<div class='site-name'>{$siteName}</div>";
    echo "<div class='title'>User Report</div>";
    echo "<div class='meta'>Generated on: " . date('Y-m-d H:i:s') . "</div>";
    echo "</div>";

    // TABLE
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
          </tr>";

    foreach ($users as $user) {
        echo "<tr>
                <td>{$user->id}</td>
                <td>{$user->name}</td>
                <td>{$user->email}</td>
                <td>{$user->created_at}</td>
              </tr>";
    }

    echo "</table>";

    // FOOTER
    echo "<div class='footer'>";
    echo "© " . date('Y') . " {$siteName}. All rights reserved.";
    echo "</div>";

    echo "</body></html>";

    exit;
}
}