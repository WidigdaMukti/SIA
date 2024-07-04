<?php

namespace App\Filament\SiaSiswa\Resources;

use App\Filament\SiaSiswa\Resources\NilaiResource\Pages;
use App\Filament\SiaSiswa\Resources\NilaiResource\RelationManagers;
use App\Models\Nilai;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Form;
use Filament\Infolists\Components\Card as ComponentsCard;
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

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-up-down';

    protected static ?int $navigationSort = 1;

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
            ->query(Nilai::where('nik_siswa', $siswa->nik_siswa))
            ->columns([
                TextColumn::make('nik_siswa')
                    ->label('NIK Siswa'),
                TextColumn::make('siswa.nama_lengkap')
                    ->label('Nama Lengkap'),
                TextColumn::make('siswa.kelas.tingkat_kelas')
                    ->label('Tingkat Kelas'),
                TextColumn::make('siswa.kelas.semester')
                    ->label('Semester'),
                TextColumn::make('mapel.nama_mapel')
                    ->label('Mata Pelajaran')
                    ->getStateUsing(function (Nilai $nilai) {
                        return ucwords($nilai->mapel ? $nilai->mapel->nama_mapel : 'Mapel Tidak Terdaftar');
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
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
                ComponentsCard::make([
                    Fieldset::make('Biodata Siswa')
                        ->schema([
                            TextEntry::make('nik_siswa')
                                ->label('NIK Siswa'),
                            TextEntry::make('siswa.nama_lengkap')
                                ->label('Nama Lengkap'),
                            TextEntry::make('siswa.kelas.tingkat_kelas')
                                ->label('Tingkat Kelas'),
                            TextEntry::make('siswa.kelas.semester')
                                ->label('Semester'),
                    ]),
                    Fieldset::make('Mata Pelajaran')
                        ->schema([
                            TextEntry::make('mapel.nama_mapel')
                                ->label('Mata Pelajaran'),
                            TextEntry::make('kkm')
                                ->label('KKM'),
                        ]),
                    Fieldset::make('Nilai Tugas')
                        ->schema([
                            TextEntry::make('nilai_tgs_1')
                                ->label('Tugas 1'),
                            TextEntry::make('nilai_tgs_2')
                                ->label('Tugas 2'),
                            TextEntry::make('nilai_tgs_3')
                                ->label('Tugas 3'),
                        ]),
                    Fieldset::make('Nilai Ulangan Harian')
                        ->schema([
                            TextEntry::make('nilai_uh1')
                                ->label('Ulangan Harian 1'),
                            TextEntry::make('nilai_uh2')
                                ->label('Ulangan Harian 1'),
                            TextEntry::make('nilai_uh3')
                                ->label('Ulangan Harian 1'),
                        ]),
                    Fieldset::make('Nilai Ulangan Tengah Semester')
                        ->schema([
                            TextEntry::make('nilai_uts')
                                ->label('Ulangan Tengah Semester'),
                        ]),
                    Fieldset::make('Nilai UAS')
                        ->schema([
                            TextEntry::make('nilai_uas')
                                ->label('Ulangan Akhir Semester'),
                        ]),
                    Fieldset::make('Nilai Keseluruhan')
                        ->schema([
                            TextEntry::make('rata_rata')
                                ->label('Rata - Rata'),
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
            'index' => Pages\ListNilais::route('/'),
            'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
            'view' => Pages\ViewNilai::route('/{record}'),
        ];
    }
}
