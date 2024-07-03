<?php

namespace App\Filament\SiaSiswa\Resources;

use App\Filament\SiaSiswa\Resources\JadwalMapelResource\Pages;
use App\Filament\SiaSiswa\Resources\JadwalMapelResource\RelationManagers;
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
use Illuminate\Support\Facades\Auth;

class JadwalMapelResource extends Resource
{
    protected static ?string $model = JadwalMapel::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $label = 'Jadwal Mata Pelajaran';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mendapatkan siswa terkait dengan user yang sedang login
        $siswa = $user->siswa;

        $tingkatKelas = $siswa->kelas->tingkat_kelas;

        return $table
            ->query(function () use ($siswa, $tingkatKelas) {
                // Ambil data jadwal mapel berdasarkan kelas siswa yang sedang login
                return JadwalMapel::whereHas('mapelKelas.kelas', function ($query) use ($tingkatKelas, $siswa) {
                    $query->where('tingkat_kelas', $tingkatKelas)
                        ->where('status', 1)
                        ->where('id', $siswa->kelas_id);
                })->with(['mapelKelas.kelas']);
            })
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
                TextColumn::make('mapelKelas.guruMapel.nama_lengkap_tendik')
                    ->label('Guru Mapel'),
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
