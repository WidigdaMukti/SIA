<?php

namespace App\Filament\SiaSiswa\Resources;

use App\Filament\SiaSiswa\Resources\AbsenSiswaResource\Pages;
use App\Filament\SiaSiswa\Resources\AbsenSiswaResource\Pages\ViewAbsenSiswa;
use App\Filament\SiaSiswa\Resources\AbsenSiswaResource\RelationManagers;
use App\Models\AbsensiSiswa;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Card;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction as ActionsViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class AbsenSiswaResource extends Resource
{
    protected static ?string $model = AbsensiSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?string $label = 'Absensi';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        $user = Auth::user();

        $siswa = $user->siswa;

        return $table
            ->query(AbsensiSiswa::where('nik_siswa', $siswa->nik_siswa))
            ->columns([
                TextColumn::make('nik_siswa')
                    ->label('NIK Siswa'),
                TextColumn::make('absenSiswa.nama_lengkap')
                    ->label('Nama Lengkap'),
                TextColumn::make('absenSiswa.kelas.tingkat_kelas')
                    ->label('Tingkat Kelas'),
                TextColumn::make('absenSiswa.kelas.semester')
                    ->label('Semester'),
                TextColumn::make('mapel.nama_mapel')
                    ->label('Mata Pelajaran')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                ActionsViewAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Card::make([
                    Fieldset::make('Biodata Siswa')
                        ->schema([
                            TextEntry::make('nik_siswa')
                                ->label('NIK Siswa'),
                            TextEntry::make('absenSiswa.nama_lengkap')
                                ->label('Nama Lengkap'),
                            TextEntry::make('absenSiswa.kelas.tingkat_kelas')
                                ->label('Tingkat Kelas'),
                            TextEntry::make('absenSiswa.kelas.semester')
                                ->label('Semester'),
                        ]),
                    Fieldset::make('Absensi Mata Pelajaran')
                        ->schema([
                            TextEntry::make('mapel.nama_mapel')
                                ->label('Mata Pelajaran'),
                            TextEntry::make('absenKehadiran.status')
                                ->label('Sakit')
                                ->getStateUsing(function ($record) {
                                    if ($record->absenKehadiran->filter(function ($absen) {
                                        return $absen->status === 'Sakit';
                                    })->count()) {
                                        return $record->absenKehadiran->filter(function ($absen) {
                                            return $absen->status === 'Sakit';
                                        })->count();
                                    } else {
                                        return 0;
                                    }
                                }),
                            TextEntry::make('absenKehadiran.status')
                                ->label('Izin')
                                ->getStateUsing(function ($record) {
                                    if ($record->absenKehadiran->filter(function ($absen) {
                                        return $absen->status === 'Izin';
                                    })->count()) {
                                        return $record->absenKehadiran->filter(function ($absen) {
                                            return $absen->status === 'Izin';
                                        })->count();
                                    } else {
                                        return 0;
                                    }
                                }),
                            TextEntry::make('absenKehadiran.status')
                                ->label('Tanpa Keterangan')
                                ->getStateUsing(function ($record) {
                                    if ($record->absenKehadiran->filter(function ($absen) {
                                        return $absen->status === 'Tanpa Keterangan';
                                    })->count()) {
                                        return $record->absenKehadiran->filter(function ($absen) {
                                            return $absen->status === 'Tanpa Keterangan';
                                        })->count();
                                    } else {
                                        return 0;
                                    }
                                }),
                        ])
                ])
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
            'index' => Pages\ListAbsenSiswas::route('/'),
            'create' => Pages\CreateAbsenSiswa::route('/create'),
            'edit' => Pages\EditAbsenSiswa::route('/{record}/edit'),
            'view' => ViewAbsenSiswa::route('/{record}')
        ];
    }
}
