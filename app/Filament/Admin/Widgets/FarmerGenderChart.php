<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Farmer;
use Filament\Widgets\ChartWidget;

class FarmerGenderChart extends ChartWidget
{
    protected static ?string $heading = 'Farmers by Gender';
   // protected int | string | array $columnSpan = 2;

    protected static ?string $maxHeight = '150px';
    protected function getData(): array
    {
        $male = Farmer::where('gender', 'Male')->count();
        $female = Farmer::where('gender', 'Female')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Farmers',
                    'data' => [$male, $female],
                    'backgroundColor' => [
                        '#3b82f6', // blue for male
                        '#ec4899', // pink for female
                    ],
                ],
            ],
            'labels' => [
                'Male',
                'Female',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}