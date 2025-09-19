<?php

namespace App\Filament\Widgets;

use App\Models\Property;
use App\Models\Inquiry;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PropertyStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Properties', Property::count())
                ->description('All properties in system')
                ->descriptionIcon('heroicon-m-home')
                ->color('success'),
                
            Stat::make('Available Properties', Property::where('status', 'available')->count())
                ->description('Properties available for sale/rent')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('primary'),
                
            Stat::make('Featured Properties', Property::where('featured', true)->count())
                ->description('Properties marked as featured')
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),
                
            Stat::make('Total Inquiries', Inquiry::count())
                ->description('Customer inquiries received')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('info'),
        ];
    }
}