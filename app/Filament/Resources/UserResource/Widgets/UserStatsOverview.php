<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use app\Models\User;

class UserStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        // $teacher=User::where('type','teacher')->withCount('users')->first();
        // $student=User::where('type','student')->withCount('users')->first();
        return [
            Card::make('All User', User::all()->count()),
            Card::make('Student Count', User::where('type', 'student')->count()),
            Card::make('Teacher Count', User::where('type', 'teacher')->count()),
        ];
    }
}
