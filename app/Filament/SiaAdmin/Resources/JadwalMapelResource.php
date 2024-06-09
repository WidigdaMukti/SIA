<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\JadwalMapelResource\Pages;
use App\Filament\SiaAdmin\Resources\JadwalMapelResource\RelationManagers;
use App\Models\JadwalMapel;
use App\Models\Kelas;
use App\Models\MapelKelas;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalMapelResource extends Resource
{
    protected static ?string $model = JadwalMapel::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Data Admin & Guru';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationLabel = 'Jadwal Mata Pelajaran';

    protected static ?string $label = 'Jadwal Mata Pelajaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    Select::make('id_mapel_kelas')
                        ->label('Guru / Mapel / Kelas / Semester / Tahun Ajaran')
                        ->columnSpanFull()
                        ->searchable()
                        ->options(function () {
                        return MapelKelas::activeKelas()
                            ->get()
                            ->mapWithKeys(function ($mapelKelas) {
                                $guru = $mapelKelas->guruMapel->nama_lengkap;
                                $mapel = $mapelKelas->nama_mapel;
                                $tingkatKelas = $mapelKelas->kelas->tingkat_kelas;
                                $semester = $mapelKelas->kelas->semester;
                                $tanggalMulai = Carbon::parse($mapelKelas->kelas->tanggal_mulai)->format('Y/m');
                                $tanggalSelesai = Carbon::parse($mapelKelas->kelas->tanggal_selesai)->format('Y/m');
                                $label = "{$guru} / {$mapel} / {$tingkatKelas} / {$semester} / {$tanggalMulai} - {$tanggalSelesai}";
                                return [$mapelKelas->id => $label];
                            });
                        }),

                    Card::make([
                        Select::make('hari')
                            ->options([
                                'senin' => 'Senin',
                                'selasa' => 'Selasa',
                                'rabu' => 'Rabu',
                                'kamis' => 'Kamis',
                                'jumat' => 'Jumat',
                            ]),
                        TimePicker::make('jam_mulai'),
                        TimePicker::make('jam_selesai'),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(JadwalMapel::activeKelas())
            ->columns([
                TextColumn::make('hari')
                    ->getStateUsing(function ($record) {
                        return ucfirst($record->hari);
                    }),
                TextColumn::make('jam_mulai'),
                TextColumn::make('jam_selesai'),
                TextColumn::make('nama_mapel')
                ->getStateUsing(function (JadwalMapel $mapelKelas) {
                    return ucwords($mapelKelas->mapelKelas->nama_mapel);
                }),
                TextColumn::make('nama_guru_mapel')
                ->getStateUsing(function (JadwalMapel $mapelKelas) {
                    return ucwords($mapelKelas->mapelKelas->guruMapel->nama_lengkap);
                }),
                TextColumn::make('Kelas / Semester / Tahun Ajaran')
                    ->label('Kelas / Semester / Tahun Ajaran')
                    ->getStateUsing(function (JadwalMapel $mapelKelas) {
                        $kelas = $mapelKelas->mapelKelas->kelas->tingkat_kelas;
                        $semester = $mapelKelas->mapelKelas->kelas->semester;
                        $tanggalMulai = Carbon::parse($mapelKelas->mapelKelas->kelas->tanggal_mulai)->format('Y/m');
                        $tanggalSelesai = Carbon::parse($mapelKelas->mapelKelas->kelas->tanggal_selesai)->format('Y/m');
                        $label = "{$kelas} / {$semester} / {$tanggalMulai} - {$tanggalSelesai}";
                        return ucwords($label);
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
            'index' => Pages\ListJadwalMapels::route('/'),
            'create' => Pages\CreateJadwalMapel::route('/create'),
            'edit' => Pages\EditJadwalMapel::route('/{record}/edit'),
        ];
    }
}
