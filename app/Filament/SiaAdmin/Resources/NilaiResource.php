<?php

// namespace App\Filament\SiaAdmin\Resources;

// use Filament\Forms;
// use Filament\Tables;
// use App\Models\Kelas;
// use App\Models\Nilai;
// use App\Models\Siswa;
// use Filament\Forms\Form;
// use App\Models\MapelKelas;
// use Filament\Tables\Table;
// use Filament\Resources\Resource;
// use Filament\Support\Enums\FontWeight;
// use Filament\Tables\Columns\TextColumn;
// use Filament\Tables\Actions\ActionGroup;
// use Filament\Tables\Filters\SelectFilter;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
// use App\Filament\SiaAdmin\Resources\NilaiResource\Pages;
// use App\Filament\SiaAdmin\Resources\NilaiResource\RelationManagers;

// class NilaiResource extends Resource
// {
//     protected static ?string $model = Nilai::class;

//     protected static ?string $navigationIcon = 'heroicon-o-arrows-up-down';

//     protected static ?string $navigationGroup = 'Data Peserta Didik';

//     protected static ?int $navigationSort = 8;

//     protected static ?string $navigationLabel = 'Nilai';

//     public static function form(Form $form): Form
//     {
//         return $form
//             ->schema([
//                 //
//             ]);
//     }

//     public static function table(Table $table): Table
//     {
//         return $table
//             ->query(
//                 Nilai::activeNilaiSiswa()
//             )
//             ->columns([
//                 TextColumn::make('nik_siswa')
//                     ->label('NIK Siswa')
//                     ->searchable(),
//                 TextColumn::make('nama_lengkap')
//                     ->label('Nama Siswa')
//                     ->getStateUsing(function (Nilai $nilai) {
//                         return ucwords($nilai->siswa->nama_lengkap);
//                     })
//                     ->searchable(query: function (Builder $query, string $search): Builder {
//                         return $query->whereHas('siswa', function (Builder $query) use ($search) {
//                             $query->where('nama_lengkap', 'like', '%' . $search . '%');
//                         });
//                     }),
//                 TextColumn::make('tingkat_kelas')
//                     ->label('Tingkat Kelas')
//                     ->getStateUsing(function (Nilai $nilai) {
//                         return $nilai->siswa && $nilai->siswa->kelas ? $nilai->siswa->kelas->tingkat_kelas : 'Belum ada Kelas';
//                     }),

//                 TextColumn::make('semester')
//                     ->label('Semester')
//                     ->getStateUsing(function (Nilai $nilai) {
//                         return ucwords($nilai->siswa && $nilai->siswa->kelas ? $nilai->siswa->kelas->semester : 'Belum ada');
//                     }),
//                 TextColumn::make('nama_mapel')
//                     ->label('Mata Pelajaran')
//                     ->getStateUsing(function (Nilai $nilai) {
//                         return ucwords($nilai->mapel ? $nilai->mapel->nama_mapel : 'Belum ada');
//                     })
//                     ->searchable(query: function (Builder $query, string $search): Builder {
//                         return $query->whereHas('mapel', function (Builder $query) use ($search) {
//                             $query->where('nama_mapel', 'like', '%' . $search . '%');
//                         });
//                     }),
//                 TextColumn::make('nama_lengkap_tendik')
//                     ->label('Guru Mata Pelajaran')
//                     ->getStateUsing(function (Nilai $nilai) {
//                         return ucwords($nilai->mapel && $nilai->mapel->guruMapel ? $nilai->mapel->guruMapel->nama_lengkap_tendik : 'Belum ada');
//                     })
//                     ->searchable(query: function (Builder $query, string $search): Builder {
//                         return $query->whereHas('mapel', function (Builder $query) use ($search) {
//                             $query->whereHas('guruMapel', function (Builder $query) use ($search) {
//                                 $query->where('nama_lengkap_tendik', 'like', '%' . $search . '%');
//                             });
//                         });
//                     }),
//                 TextColumn::make('kkm')
//                     ->label('KKM')
//                     ->getStateUsing(function ($record) {
//                         return $record->kkm !== null ? $record->kkm : '?';
//                     }),
//                 TextColumn::make('nilai_uh1')
//                     ->label('U-Harian 1')
//                     ->getStateUsing(function ($record) {
//                         return $record->nilai_uh1 !== null ? $record->nilai_uh1 : '?';
//                     })
//                     ->html()
//                     ->color(function ($record) {
//                         return $record->nilai_uh1 === null ? 'danger' : '';
//                     }),
//                 TextColumn::make('nilai_uh2')
//                     ->label('U-Harian 2')
//                     ->getStateUsing(function ($record) {
//                         return $record->nilai_uh2 !== null ? $record->nilai_uh2 : '?';
//                     })
//                     ->html()
//                     ->color(function ($record) {
//                         return $record->nilai_uh2 === null ? 'danger' : '';
//                     }),
//                 TextColumn::make('nilai_uh3')
//                     ->label('U-Harian 3')
//                     ->getStateUsing(function ($record) {
//                         return $record->nilai_uh3 !== null ? $record->nilai_uh3 : '?';
//                     })
//                     ->html()
//                     ->color(function ($record) {
//                         return $record->nilai_uh3 === null ? 'danger' : '';
//                     }),
//                 TextColumn::make('nilai_tgs_1')
//                     ->label('Tugas 1')
//                     ->getStateUsing(function ($record) {
//                         return $record->nilai_tgs_1 !== null ? $record->nilai_tgs_1 : '?';
//                     })
//                     ->html()
//                     ->color(function ($record) {
//                         return $record->nilai_tgs_1 === null ? 'danger' : '';
//                     }),
//                 TextColumn::make('nilai_tgs_2')
//                     ->label('Tugas 2')
//                     ->getStateUsing(function ($record) {
//                         return $record->nilai_tgs_2 !== null ? $record->nilai_tgs_2 : '?';
//                     })
//                     ->html()
//                     ->color(function ($record) {
//                         return $record->nilai_tgs_2 === null ? 'danger' : '';
//                     }),
//                 TextColumn::make('nilai_tgs_3')
//                     ->label('Tugas 3')
//                     ->getStateUsing(function ($record) {
//                         return $record->nilai_tgs_3 !== null ? $record->nilai_tgs_3 : '?';
//                     })
//                     ->html()
//                     ->color(function ($record) {
//                         return $record->nilai_tgs_3 === null ? 'danger' : '';
//                     }),
//                 TextColumn::make('nilai_uts')
//                     ->label('UTS')
//                     ->getStateUsing(function ($record) {
//                         return $record->nilai_uts !== null ? $record->nilai_uts : '?';
//                     })
//                     ->html()
//                     ->color(function ($record) {
//                         return $record->nilai_uts === null ? 'danger' : '';
//                     }),
//                 TextColumn::make('nilai_uas')
//                     ->label('UAS')
//                     ->getStateUsing(function ($record) {
//                         return $record->nilai_uas !== null ? $record->nilai_uas : '?';
//                     })
//                     ->html()
//                     ->color(function ($record) {
//                         return $record->nilai_uas === null ? 'danger' : '';
//                     }),

//                 TextColumn::make('rata_rata')
//                     ->label('Rata-rata')
//                     ->getStateUsing(function ($record) {
//                         $totalNilai = collect([
//                             $record->nilai_uh1,
//                             $record->nilai_uh2,
//                             $record->nilai_uh3,
//                             $record->nilai_tgs_1,
//                             $record->nilai_tgs_2,
//                             $record->nilai_tgs_3,
//                             $record->nilai_uts,
//                             $record->nilai_uas
//                         ])->filter(function ($value) {
//                             return $value !== null;
//                         });

//                         $rataRata = $totalNilai->count() > 0 ? round($totalNilai->avg(), 2) : '?';

//                         return $rataRata;
//                     })
//                     ->html()
//                     ->color(function ($record) {
//                         $totalNilai = collect([
//                             $record->nilai_uh1,
//                             $record->nilai_uh2,
//                             $record->nilai_uh3,
//                             $record->nilai_tgs_1,
//                             $record->nilai_tgs_2,
//                             $record->nilai_tgs_3,
//                             $record->nilai_uts,
//                             $record->nilai_uas
//                         ])->filter(function ($value) {
//                             return $value !== null;
//                         });

//                         $rataRata = $totalNilai->count() > 0 ? round($totalNilai->avg(), 2) : '?';

//                         return $rataRata !== '?' && $rataRata < $record->kkm ? 'danger' : 'success';
//                     })
//                     ->weight(FontWeight::Bold),

//             ])
//             ->filters([
//             ])
//             ->actions([
//                 ActionGroup::make([
//                     Tables\Actions\ViewAction::make(),
//                     Tables\Actions\EditAction::make(),
//                     Tables\Actions\DeleteAction::make(),
//                 ])
//             ])
//             ->bulkActions([
//                 Tables\Actions\BulkActionGroup::make([
//                     Tables\Actions\DeleteBulkAction::make(),
//                 ]),
//             ]);
//     }

//     public static function getRelations(): array
//     {
//         return [
//             //
//         ];
//     }

//     public static function getPages(): array
//     {
//         return [
//             'index' => Pages\ListNilais::route('/'),
//             'create' => Pages\CreateNilai::route('/create'),
//             'edit' => Pages\EditNilai::route('/{record}/edit'),
//         ];
//     }
// }
