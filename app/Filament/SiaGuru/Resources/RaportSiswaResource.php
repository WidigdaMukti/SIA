<?php

namespace App\Filament\SiaGuru\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Kelas;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\JadwalMapel;
use App\Models\MapelRaport;
use App\Models\RaportSiswa;
use App\Models\EkskulRaport;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\SiaGuru\Resources\RaportSiswaResource\Pages;
use Filament\Tables\Actions\ActionGroup as ActionsActionGroup;
use App\Filament\SiaGuru\Resources\RaportSiswaResource\RelationManagers;
use Filament\Infolists\Components\Card as ComponentsCard;
use Filament\Infolists\Components\Component;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;

class RaportSiswaResource extends Resource
{
    protected static ?string $model = RaportSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

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
                    Card::make([
                        Repeater::make('mapelRaport')
                        ->label('Nilai dan Capaian Komepetensi')
                        ->relationship()
                        ->schema([
                            TextInput::make('nama_mapel')
                                ->label('Mata Pelajaran')
                                ->required(),

                            TextInput::make('kkm')
                                ->label('KKM')
                                ->required(),

                            TextInput::make('nilai_akhir')
                                ->label('Nilai Akhir')
                                ->required(),

                            Textarea::make('capaian_kompetensi')
                                ->label('Capaian Kompetensi')
                                ->required(),
                        ]),
                    ]),
                    Card::make([
                        Repeater::make('ekskulRaport')
                        ->label('Ekstrakulikuler')
                        ->relationship()
                        ->schema([
                            TextInput::make('nama')
                                ->label('Ekstrakulikuler')
                                ->required(),

                            Textarea::make('keterangan')
                                ->label('keterangan')
                                ->required(),
                        ]),
                    ])
                ]),
                TextInput::make('sakit')
                    ->required(),
                TextInput::make('izin')
                    ->required(),
                TextInput::make('tanpa_keterangan')
                    ->label('Tanpa Keterangan')
                    ->required(),
                Textarea::make('catatan_wali_kelas')
                        ->label('Catatan Wali Kelas')
                        ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(RaportSiswa::activeSiswa())
            ->columns([
                TextColumn::make('nik_siswa'),
                TextColumn::make('siswa.nama_lengkap'),
                TextColumn::make('siswa.kelas.tingkat_kelas'),
                TextColumn::make('siswa.kelas.semester'),
            ])
            ->filters([
                //
            ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
            // ActionsActionGroup::make([
            // ])
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
                ComponentsCard::make([
                    Fieldset::make('Biodata Siswa')
                        ->schema([
                            TextEntry::make('siswa.nik_siswa')
                                ->label('NIK Siswa'),
                            TextEntry::make('siswa.nama_lengkap')
                                ->label('Nama Lengkap'),
                            TextEntry::make('siswa.kelas.tingkat_kelas')
                                ->label('Tingkat Kelas'),
                            TextEntry::make('siswa.kelas.semester')
                                ->label('Semester'),
                        ]),
                    Fieldset::make('Niali dan Capaian Kompetensi')
                        ->schema([
                            RepeatableEntry::make('mapelRaport')
                                ->label('')
                                ->schema([
                                    ComponentsCard::make([
                                        TextEntry::make('nama_mapel')
                                            ->label('Mata Pelajaran'),
                                        TextEntry::make('kkm')
                                            ->label('KKM'),
                                        TextEntry::make('nilai_akhir')
                                            ->label('Nilai Akhir'),
                                        TextEntry::make('capaian_kompetensi')
                                            ->label('Capaian Kompetensi'),
                                    ])->columns(2)
                                ])->columnSpanFull(),
                        ]),
                    Fieldset::make('Ekstrakulikuler')
                        ->schema([
                            RepeatableEntry::make('ekskulRaport')
                                ->label('')
                                ->schema([
                                    ComponentsCard::make([
                                        TextEntry::make('nama')
                                            ->label('Ekstrakulikuler'),
                                        TextEntry::make('keterangan')
                                            ->label('Keterangan'),
                                    ])->columns(2)
                                ])->columnSpanFull(),
                        ]),
                    Fieldset::make('Ketidakhadiran')
                        ->schema([
                            TextEntry::make('sakit')
                                ->label('Sakit'),
                            TextEntry::make('izin')
                                ->label('Izin'),
                            TextEntry::make('tanpa_keterangan')
                                ->label('Tanpa Keterangan'),
                        ]),
                    Fieldset::make('Catatan Wali Kelas')
                        ->schema([
                            TextEntry::make('catatan_wali_kelas')
                                ->label('Catatan Wali Kelas'),
                        ]),
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
            'index' => Pages\ListRaportSiswas::route('/'),
            'create' => Pages\CreateRaportSiswa::route('/create'),
            'edit' => Pages\EditRaportSiswa::route('/{record}/edit'),
        ];
    }
}
