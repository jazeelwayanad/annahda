<?php

namespace App\Livewire\Admin;

use App\Models\Subscription;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Columns;

class Subscriptions extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    
    public function table(Table $table): Table
    {
        return $table
            ->query(Subscription::with('user','plan'))
            ->columns([
                Columns\TextColumn::make('user.name')->label('User Name'),
                Columns\TextColumn::make('plan.name')->label('Plan Name'),
                Columns\TextColumn::make('status')->label('Status'),
                Columns\TextColumn::make('start_date')->label('Started At')->dateTime('d M Y, h:i A'),
            ]);
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.subscriptions');
    }
}
