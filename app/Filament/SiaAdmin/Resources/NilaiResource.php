<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\NilaiResource\Pages;
use App\Filament\SiaAdmin\Resources\NilaiResource\RelationManagers;
use App\Models\Nilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-up-down';

    protected static ?string $navigationGroup = 'Data Peserta Didik';

    protected static ?int $navigationSort = 8;

    protected static ?string $navigationLabel = 'Nilai';

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
            ->query(Nilai::activeNilaiSiswa())
            ->columns([
                TextColumn::make('Nama Siswa')
                    ->getStateUsing(function (Nilai $siswa) {
                        return $siswa->siswa->nama_lengkap;
                    }),
                TextColumn::make('Tingkat Kelas')
                    ->getStateUsing(function (Nilai $siswa) {
                        return $siswa->mapel ? $siswa->mapel->kelas->tingkat_kelas : 'Belum ada Kelas';
                    }),
                TextColumn::make('Nama Mapel')
                    ->getStateUsing(function (Nilai $siswa) {
                        return $siswa->mapel ? $siswa->mapel->nama_mapel : 'Belum ada Mapel';
                    }),
                TextColumn::make('Nama Guru Mapel')
                    ->getStateUsing(function (Nilai $siswa) {
                        return $siswa->mapel ? $siswa->mapel->guruMapel->nama_lengkap : 'Belum ada Guru Mapel';
                    }),
                TextColumn::make('kkm')
                    ->label('KKM')
                    ->getStateUsing(function ($record) {
                        return $record->kkm !== null ? $record->kkm : '0';
                    }),
                TextColumn::make('nilai_uh1')
                    ->label('U-Harian 1')
                    ->getStateUsing(function ($record) {
                        return $record->nilai_uh1 !== null ? $record->nilai_uh1 : '0';
                    }),
                TextColumn::make('nilai_uh2')
                    ->label('U-Harian 2')
                    ->getStateUsing(function ($record) {
                        return $record->nilai_uh2 !== null ? $record->nilai_uh2 : '0';
                    }),
                TextColumn::make('nilai_uh3')
                    ->label('U-Harian 3')
                    ->getStateUsing(function ($record) {
                        return $record->nilai_uh3 !== null ? $record->nilai_uh3 : '0';
                    }),
                TextColumn::make('nilai_tgs_1')
                    ->label('Tugas 1')
                    ->getStateUsing(function ($record) {
                        return $record->nilai_tgs_1 !== null ? $record->nilai_tgs_1 : '0';
                    }),
                TextColumn::make('nilai_tgs_2')
                    ->label('Tugas 2')
                    ->getStateUsing(function ($record) {
                        return $record->nilai_tgs_2 !== null ? $record->nilai_tgs_2 : '0';
                    }),
                TextColumn::make('nilai_tgs_3')
                    ->label('Tugas 3')
                    ->getStateUsing(function ($record) {
                        return $record->nilai_tgs_3 !== null ? $record->nilai_tgs_3 : '0';
                    }),
                TextColumn::make('nilai_uts')
                    ->label('UTS')
                    ->getStateUsing(function ($record) {
                        return $record->nilai_uts !== null ? $record->nilai_uts : '0';
                    }),
                TextColumn::make('nilai_uas')
                    ->label('UAS')
                    ->getStateUsing(function ($record) {
                        return $record->nilai_uas !== null ? $record->nilai_uas : '0';
                    }),
                TextColumn::make('rata_rata')
                    ->label('Rata-rata')
                    ->getStateUsing(function ($record) {
                        return $record->rata_rata !== null ? $record->rata_rata : '0';
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListNilais::route('/'),
            'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
        ];
    }
}
