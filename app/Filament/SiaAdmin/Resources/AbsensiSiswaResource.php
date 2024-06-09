<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\AbsensiSiswaResource\Pages;
use App\Filament\SiaAdmin\Resources\AbsensiSiswaResource\RelationManagers;
use App\Models\AbsensiSiswa;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbsensiSiswaResource extends Resource
{
    protected static ?string $model = AbsensiSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?string $navigationGroup = 'Data Peserta Didik';

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationLabel = 'Absensi Siswa';

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
            ->query(AbsensiSiswa::activeAbsenSiswa())
            ->columns([
                TextColumn::make('Nama Siswa')
                    ->getStateUsing(function (AbsensiSiswa $absensiSiswa)
                    {
                        return $absensiSiswa->absenSiswa->nama_lengkap;
                    }),
                TextColumn::make('Nama Mapel')
                    ->getStateUsing(function (AbsensiSiswa $absensiSiswa)
                    {
                        return $absensiSiswa->mapel ? $absensiSiswa->mapel->nama_mapel : 'Belum ada mapel';
                    }),
                TextColumn::make('Nama Guru Mapel')
                    ->getStateUsing(function (AbsensiSiswa $absensiSiswa)
                    {
                        return $absensiSiswa->mapel ? $absensiSiswa->mapel->guruMapel->nama_lengkap : 'Belum ada Guru Mapel';
                    }),
                TextColumn::make('Tingkat Kelas')
                    ->getStateUsing(function (AbsensiSiswa $absensiSiswa)
                    {
                        return $absensiSiswa->mapel ? $absensiSiswa->mapel->kelas->tingkat_kelas : 'Belum ada kelas';
                    }),
                TextColumn::make('tanggal')
                    ->getStateUsing(function ($record) {
                        if ($record->tanggal) {
                            return Carbon::parse($record->tanggal)->format('d/m/Y');
                        } else {
                            return 'Belum ada tanggal';
                        }
                    }),
                TextColumn::make('status')
                    ->getStateUsing(function ($record) {
                        return $record->status ? 'Hadir' : 'Tidak Hadir';
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
            'index' => Pages\ListAbsensiSiswas::route('/'),
            'create' => Pages\CreateAbsensiSiswa::route('/create'),
            'edit' => Pages\EditAbsensiSiswa::route('/{record}/edit'),
        ];
    }
}
