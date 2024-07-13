<?php

namespace App\Filament\SiaGuru\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use App\Models\MapelKelas;
use Filament\Tables\Table;
use App\Models\AbsensiSiswa;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\SiaGuru\Resources\AbsensiSiswaResource\Pages;
use App\Filament\SiaGuru\Resources\AbsensiSiswaResource\RelationManagers;
use App\Models\AbsenKehadiran;
use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Facades\Auth;

class AbsensiSiswaResource extends Resource
{
    protected static ?string $model = AbsensiSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    Select::make('nik_siswa')
                        ->label('Nama Siswa')
                        ->options(function() {
                            return Siswa::activeUserWithRole()
                                ->get()
                                ->mapWithKeys(function ($siswa) {
                                    $nikSiswa = $siswa->nik_siswa;
                                    $namaSiswa = $siswa->nama_lengkap;
                                    $tingkatKelas = $siswa->kelas->tingkat_kelas;
                                    $semester = $siswa->kelas->semester;
                                    $label = "$nikSiswa - $namaSiswa - $tingkatKelas - $semester";
                                    // $label = "$namaSiswa";
                                    return [$siswa->nik_siswa => $label];
                                });
                        })
                        ->searchable(),
                    Select::make('id_mapel_kelas')
                        ->label('Mata Pelajaran')
                        ->options(function() {
                            return MapelKelas::query()
                                ->get()
                                ->mapWithKeys(function ($mapelKelas) {
                                    $namaMapel = $mapelKelas->nama_mapel;
                                    $namaGuruMapel = $mapelKelas->guruMapel->nama_lengkap_tendik;
                                    $label = "$namaMapel - $namaGuruMapel";
                                    return [$mapelKelas->id => $label];
                                });
                        })
                        ->searchable(),

                    Card::make([
                        Repeater::make('absenKehadiran')
                        ->label('Kehadiran')
                        ->relationship()
                        ->schema([
                            DatePicker::make('tanggal')
                                ->label('Tanggal')
                                ->displayFormat('d/m/Y')
                                ->required(),
                            Select::make('status')
                                ->label('Status Kehadiran')
                                ->options(['Hadir' => 'Hadir', 'Izin' => 'Izin', 'Sakit' => 'Sakit', 'Tanpa Keterangan' => 'Tanpa Keterangan'])
                                ->required(),
                        ])
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nik_siswa')
                ->label('NIK Siswa')
                ->searchable(),
            TextColumn::make('absenSiswa.nama_lengkap')
                ->label('Nama Siswa')
                ->getStateUsing(function (AbsensiSiswa $absensiSiswa)
                {
                    return ucwords($absensiSiswa->absenSiswa->nama_lengkap);
                })
                ->searchable(query: function (Builder $query, string $search): Builder {
                    return $query->whereHas('absenSiswa', function ($query) use ($search) {
                        $query->where('nama_lengkap', 'like', '%' . $search . '%');
                    });
                }),
            TextColumn::make('mapel.nama_mapel')
                ->label('Mata Pelajaran')
                ->getStateUsing(function (AbsensiSiswa $absensiSiswa)
                {
                    return ucwords($absensiSiswa->mapel ? $absensiSiswa->mapel->nama_mapel : 'Belum ada mapel');
                }),
            TextColumn::make('absenSiswa.kelas.tingkat_kelas')
                ->label('Tingkat Kelas'),
            TextColumn::make('absenSiswa.kelas.semester')
                ->label('Tingkat Kelas')
                // ->getStateUsing(function (AbsensiSiswa $absensiSiswa)
                // {
                //     return $absensiSiswa->kelas ? $absensiSiswa->kelas->tingkat_kelas : 'Belum ada kelas';
                // }),
            //     ->searchable(query: function (Builder $query, string $search): Builder {
            //         return $query->whereHas('mapel', function ($query) use ($search) {
            //             $query->where('nama_mapel', 'like', '%' . $search . '%');
            //         });
            //     })
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
            'index' => Pages\ListAbsensiSiswas::route('/'),
            'create' => Pages\CreateAbsensiSiswa::route('/create'),
            'edit' => Pages\EditAbsensiSiswa::route('/{record}/edit'),
        ];
    }
}
