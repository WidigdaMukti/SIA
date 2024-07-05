<?php

namespace App\Filament\SiaSiswa\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\RaportSiswa;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\SiaSiswa\Resources\RaportSiswaResource\Pages;
use App\Filament\SiaSiswa\Resources\RaportSiswaResource\Pages\ViewRaportSiswa;
use App\Filament\SiaSiswa\Resources\RaportSiswaResource\RelationManagers;
use App\Models\User;
use Filament\Infolists\Components\Card;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;

class RaportSiswaResource extends Resource
{
    protected static ?string $model = RaportSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $label = 'Raport';

    protected static ?int $navigationSort = 2;

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

        return $table
            ->query(RaportSiswa::where('nik_siswa', $siswa->nik_siswa))
            ->columns([
                TextColumn::make('nik_siswa')
                    ->label('NIK Siswa'),
                TextColumn::make('siswa.nama_lengkap')
                    ->label('Nama Lengkap'),
                TextColumn::make('siswa.kelas.tingkat_kelas')
                    ->label('Tingkat Kelas'),
                TextColumn::make('siswa.kelas.semester')
                    ->label('Semester'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Action::make('Download')
                    ->url(fn (RaportSiswa $record) => route('export.pdf', $record->id))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-arrow-down-tray'),
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
                                    Card::make([
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
                                    Card::make([
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
            'view' => ViewRaportSiswa::route('/{record}'),
            // 'create' => Pages\CreateRaportSiswa::route('/create'),
            // 'edit' => Pages\EditRaportSiswa::route('/{record}/edit'),
        ];
    }
}
