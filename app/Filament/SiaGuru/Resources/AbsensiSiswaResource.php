<?php

namespace App\Filament\SiaGuru\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\AbsensiSiswa;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\SiaGuru\Resources\AbsensiSiswaResource\Pages;
use App\Filament\SiaGuru\Resources\AbsensiSiswaResource\RelationManagers;

class AbsensiSiswaResource extends Resource
{
    protected static ?string $model = AbsensiSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

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
            TextColumn::make('nik_siswa')
                ->label('NIK Siswa')
                ->searchable(),
            TextColumn::make('nama_lengkap')
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
            TextColumn::make('nama_mapel')
                ->label('Mata Pelajaran')
                ->getStateUsing(function (AbsensiSiswa $absensiSiswa)
                {
                    return ucwords($absensiSiswa->mapel ? $absensiSiswa->mapel->nama_mapel : 'Belum ada mapel');
                })
                ->searchable(query: function (Builder $query, string $search): Builder {
                    return $query->whereHas('mapel', function ($query) use ($search) {
                        $query->where('nama_mapel', 'like', '%' . $search . '%');
                    });
                }),
            TextColumn::make('Nama Guru Mapel')
                ->label('Guru Mata Pelajaran')
                ->getStateUsing(function (AbsensiSiswa $absensiSiswa)
                {
                    return ucwords($absensiSiswa->mapel ? $absensiSiswa->mapel->guruMapel->nama_lengkap_tendik : 'Belum ada Guru Mapel');
                })
                ->searchable(query: function (Builder $query, string $search): Builder {
                    return $query->whereHas('mapel', function ($query) use ($search) {
                        $query->whereHas('guruMapel', function ($query) use ($search) {
                            $query->where('nama_lengkap_tendik', 'like', '%' . $search . '%');
                        });
                    });
                }),
            TextColumn::make('Tingkat Kelas')
                ->label('Tingkat Kelas')
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
                })
                ->sortable(),
            TextColumn::make('status_kehadiran')
                ->label('Status Kehadiran')
                ->getStateUsing(function ($record) {
                    return $record->status_kehadiran ? 'Hadir' : 'Tidak Hadir';
                })
                ->html()
                ->color(function ($record) {
                    return $record->status_kehadiran ? 'success' : 'danger';
                })
                ->weight(FontWeight::Bold),


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
