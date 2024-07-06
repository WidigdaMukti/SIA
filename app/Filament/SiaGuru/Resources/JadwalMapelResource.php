<?php

namespace App\Filament\SiaGuru\Resources;

use App\Filament\SiaGuru\Resources\JadwalMapelResource\Pages;
use App\Filament\SiaGuru\Resources\JadwalMapelResource\RelationManagers;
use App\Models\JadwalMapel;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalMapelResource extends Resource
{
    protected static ?string $model = JadwalMapel::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $label = 'Jadwal Pelajaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(JadwalMapel::activeKelas())
            ->columns([
                TextColumn::make('jam_mulai')
                    ->label('Jam Mulai')
                    ->formatStateUsing(function ($record) {
                        return Carbon::parse($record->jam_mulai)->format('H:i');
                    }),
                TextColumn::make('jam_selesai')
                    ->label('Jam Selesai')
                    ->formatStateUsing(function ($record) {
                        return Carbon::parse($record->jam_selesai)->format('H:i');
                    }),
                TextColumn::make('hari'),
                TextColumn::make('mapelKelas.nama_mapel')
                    ->label('Mata Pelajaran'),
                TextColumn::make('mapelKelas.kelas.tingkat_kelas')
                    ->label('Tingkat Kelas'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListJadwalMapels::route('/'),
            'create' => Pages\CreateJadwalMapel::route('/create'),
            'edit' => Pages\EditJadwalMapel::route('/{record}/edit'),
        ];
    }
}
