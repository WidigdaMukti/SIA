<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\AbsensiSiswaResource\Pages;
use App\Filament\SiaAdmin\Resources\AbsensiSiswaResource\RelationManagers;
use App\Models\AbsensiSiswa;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
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
                    }),
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
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')
                            ->label('Tanggal Mulai'),
                        DatePicker::make('created_until')
                            ->label('Tanggal Selesai'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
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
