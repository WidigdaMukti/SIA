<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\TahunAkademikResource\Pages;
use App\Filament\SiaAdmin\Resources\TahunAkademikResource\RelationManagers;
use App\Models\TahunAkademik;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TahunAkademikResource extends Resource
{
    protected static ?string $model = TahunAkademik::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Masyarakat';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('semester')->options(['ganjil' => 'Ganjil', 'genap' => 'Genap']),
                DatePicker::make('tanggal_mulai'),
                DatePicker::make('tanggal_selesai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('semester'),
                TextColumn::make('tanggal_mulai'),
                TextColumn::make('tanggal_selesai'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTahunAkademiks::route('/'),
            'create' => Pages\CreateTahunAkademik::route('/create'),
            'edit' => Pages\EditTahunAkademik::route('/{record}/edit'),
        ];
    }
}
