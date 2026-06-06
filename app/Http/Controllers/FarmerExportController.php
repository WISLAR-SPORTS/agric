<?php

namespace App\Http\Controllers;

use App\Models\Farmer;

class FarmerExportController extends Controller
{
    // =========================
    // EXCEL (HTML based)
    // =========================
    public function exportExcel()
    {
        $farmers = Farmer::all();
        $siteName = config('app.name');

        header("Content-Type: text/html; charset=utf-8");
        header("Content-Disposition: attachment; filename=farmers.xls");

        echo "<h2>{$siteName} - Farmers Export</h2>";

        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>Farmer No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>District</th>
              </tr>";

        foreach ($farmers as $f) {
            echo "<tr>
                    <td>{$f->farmer_number}</td>
                    <td>{$f->first_name}</td>
                    <td>{$f->last_name}</td>
                    <td>{$f->phone}</td>
                    <td>{$f->district}</td>
                  </tr>";
        }

        echo "</table>";
        exit;
    }

    // =========================
    // PDF (HTML print view)
    // =========================
    public function exportPdf()
    {
        $farmers = Farmer::all();
        $siteName = config('app.name');

        header("Content-Type: text/html; charset=utf-8");
        header("Content-Disposition: inline; filename=farmers.pdf");

        echo "<html><head><style>
            body { font-family: Arial; margin: 20px; }
            table { width: 100%; border-collapse: collapse; }
            th { background: #333; color: #fff; padding: 8px; }
            td { border: 1px solid #ddd; padding: 8px; }
        </style></head><body>";

        echo "<h2>{$siteName} - Farmers Report</h2>";
        echo "<p>Date: " . date('Y-m-d H:i') . "</p>";

        echo "<table>";
        echo "<tr>
                <th>Farmer No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>District</th>
              </tr>";

        foreach ($farmers as $f) {
            echo "<tr>
                    <td>{$f->farmer_number}</td>
                    <td>{$f->first_name} {$f->last_name}</td>
                    <td>{$f->phone}</td>
                    <td>{$f->district}</td>
                  </tr>";
        }

        echo "</table>";

        echo "</body></html>";
        exit;
    }
}