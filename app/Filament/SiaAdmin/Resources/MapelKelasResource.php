<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\MapelKelasResource\Pages;
use App\Filament\SiaAdmin\Resources\MapelKelasResource\RelationManagers;
use App\Models\AdminGuru;
use App\Models\Kelas;
use App\Models\MapelKelas;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MapelKelasResource extends Resource
{
    protected static ?string $model = MapelKelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    protected static ?string $navigationGroup = 'Data Admin & Guru';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Mata Pelajaran';

    protected static ?string $label = 'Mata Pelajaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    Select::make('id_kelas')->label('Tingkat Kelas')
                        ->options(function() {
                            return Kelas::query()
                                ->where('status', 1)
                                ->get()
                                ->mapWithKeys(function ($kelas) {
                                    $tingkatKelas = $kelas->tingkat_kelas;
                                    $semester = $kelas->semester;
                                    $tanggalMulai = Carbon::parse($kelas->tanggal_mulai)->format('d/m/Y');
                                    $tanggalSelesai = Carbon::parse($kelas->tanggal_selesai)->format('d/m/Y');
                                    $label = "$tingkatKelas / Semester $semester / $tanggalMulai - $tanggalSelesai";
                                    return [$kelas->id => $label];
                                });
                        }),
                    Select::make('nik_guru_mapel')->label('Guru Mata Pelajaran')
                        ->options(function() {
                            return AdminGuru::activeGuru()
                                ->get()
                                ->mapWithKeys(function ($guru) {
                                    // $nikGuruMapel = $guru->nik_guru;
                                    $namaGuruMapel = $guru->nama_lengkap_tendik;
                                    // $label = "$nikGuruMapel/$namaGuruMapel";
                                    $label = "$namaGuruMapel";
                                    return [$guru->nik_guru => $label];
                                });
                        }),
                    TextInput::make('nama_mapel'),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(MapelKelas::activeKelas())
            ->columns([
                TextColumn::make('nama_mapel')
                    ->label('Mata Pelajaran')
                    ->searchable(),
                TextColumn::make('nama_guru_mapel')
                    ->label('Guru Mata Pelajaran')
                    ->getStateUsing(function (MapelKelas $guruMapel) {
                        return $guruMapel->guruMapel->nama_lengkap_tendik;
                    })
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('guruMapel', function ($query) use ($search) {
                            $query->where('nama_lengkap_tendik', 'like', '%' . $search . '%');
                        });
                    }),
                TextColumn::make('tingkat_kelas')
                    ->getStateUsing(function (MapelKelas $kelas) {
                        return $kelas->kelas->tingkat_kelas;
                    }),
                TextColumn::make('semester')
                    ->getStateUsing(function (MapelKelas $kelas) {
                        return $kelas->kelas->semester;
                    }),
                TextColumn::make('tanggal_mulai')
                    ->getStateUsing(function (MapelKelas $kelas) {
                        $tanggalMulai = Carbon::parse($kelas->kelas->tanggal_mulai)->format('d/m/Y');
                        return $tanggalMulai;
                    }),
                TextColumn::make('tanggal_selesai')
                    ->getStateUsing(function (MapelKelas $kelas) {
                        $tanggalSelesai = Carbon::parse($kelas->kelas->tanggalSelesai)->format('d/m/Y');
                        return $tanggalSelesai;
                    }),


            ])
            ->filters([
                SelectFilter::make('nama_mapel')
                    ->label('Mata Pelajaran')
                    // ->multiple()
                    ->options(function () {
                        // Ambil semua nama_mapel unik dari database
                        $mapelNames = MapelKelas::query()
                            ->select('nama_mapel')
                            ->distinct()
                            ->pluck('nama_mapel');

                        // Ubah Collection menjadi array
                        $mapelNames = $mapelNames->toArray();

                        // Ubah array menjadi associative array untuk opsi filter
                        $options = array_combine($mapelNames, $mapelNames);

                        return $options;
                    }),
                SelectFilter::make('semester')
                    ->label('Semester')
                    ->options([
                        'ganjil' => 'Ganjil',
                        'genap' => 'Genap',
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (isset($data['value'])) {
                            $query->whereHas('kelas', function (Builder $query) use ($data) {
                                $query->where('semester', $data['value']);
                            });
                        }
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
            'index' => Pages\ListMapelKelas::route('/'),
            'create' => Pages\CreateMapelKelas::route('/create'),
            'edit' => Pages\EditMapelKelas::route('/{record}/edit'),
        ];
    }
}
