<?php

namespace App\Filament\SiaGuru\Resources;

use App\Filament\SiaGuru\Resources\KelasResource\Pages;
use App\Filament\SiaGuru\Resources\KelasResource\RelationManagers;
use App\Models\Kelas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

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
            // ->query(Kelas::relasiWaliKelas()) // Menggunakan objek Builder dari model Kelas
            ->columns([
                TextColumn::make('siswa.nik_siswa')
                ->getStateUsing(function ($record) {
                    return $record->siswa->first()?->nik_siswa ?? 'Belum ada siswa';
                })
                ->label('Nama Lengkap'),
                TextColumn::make('siswa.nama_lengkap')
                ->getStateUsing(function ($record) {
                    return $record->siswa->first()?->nama_lengkap ?? 'Belum ada siswa';
                })
                ->label('Nama Lengkap'),
                // TextColumn::make('nik_guru'),
                // TextColumn::make('nama_guru')
                //     ->label('Nama Wali Kelas')
                //     ->getStateUsing(function (Kelas $kelas) {
                //         return $kelas->adminGuru->nama_lengkap_tendik;
                //     })
                //     ->searchable(query: function (Builder $query, string $search): Builder {
                //         return $query->whereHas('adminGuru', function ($query) use ($search) {
                //             $query->where('nama_lengkap_tendik', 'like', '%' . $search . '%');
                //         });
                //     }),
                // TextColumn::make('tingkat_kelas'),
                // TextColumn::make('semester'),
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
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}
