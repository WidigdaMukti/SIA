<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\KelasResource\Pages;
use App\Filament\SiaAdmin\Resources\KelasResource\RelationManagers;
use App\Models\AdminGuru;
use App\Models\Kelas;
use App\Models\TahunAkademik;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select; // Import the Select class
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Data Admin & Guru';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('nik_guru')->label('Nama Wali Kelas')
                    ->options(function() {
                        return AdminGuru::activeGuru()
                            ->get()
                            ->mapWithKeys(function ($guru) {
                                // $nikGuruMapel = $guru->nik_guru;
                                $namaGuruMapel = $guru->nama_lengkap;
                                // $label = "$nikGuruMapel / $namaGuruMapel";
                                $label = "$namaGuruMapel";
                                return [$guru->nik_guru => $label];
                            });
                    }),
                Select::make('tingkat_kelas')
                    ->options(['I / Satu' => 'I / Satu', 'II / Dua' => 'II / Dua', 'III / Tiga' => 'III / Tiga', 'IV / Empat' => 'IV / Empat', 'V / Lima' => 'V / Lima', 'VI / Enam' => 'VI / Enam'])
                    ->label('Tingkat Kelas'),
                Select::make('semester')
                    ->options(['Ganjil' => 'Ganjil', 'Genap' => 'Genap']),
                DatePicker::make('tanggal_mulai')
                    ->displayFormat('d/m/Y'),
                DatePicker::make('tanggal_selesai')
                    ->displayFormat('d/m/Y'),
                Toggle::make('status')
                    ->label('Status Kelas')
                    ->onColor('success')
                    ->offColor('danger')
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nik_guru')
                    ->label('NIK Guru')
                    ->searchable(),
                TextColumn::make('nama_guru')
                    ->label('Nama Wali Kelas')
                    ->getStateUsing(function (Kelas $kelas) {
                        return $kelas->adminGuru->nama_lengkap_tendik;
                    })
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('adminGuru', function ($query) use ($search) {
                            $query->where('nama_lengkap_tendik', 'like', '%' . $search . '%');
                        });
                    }),
                TextColumn::make('semester'),
                TextColumn::make('tanggal_mulai')
                    ->formatStateUsing(function ($record) {
                        return Carbon::parse($record->tanggal_mulai)->format('d/m/Y');
                    })
                    ->sortable(),
                TextColumn::make('tanggal_selesai')
                    ->formatStateUsing(function ($record) {
                        return Carbon::parse($record->tanggal_selesai)->format('d/m/Y');
                    })
                    ->sortable(),
                TextColumn::make('tingkat_kelas')
                    ->sortable(),
                IconColumn::make('status')
                    ->label('Status Kelas')
                    ->boolean()
                    ->sortable()
            ])
            ->filters([
                SelectFilter::make('semester')
                    ->options(function () {
                        return Kelas::kelasActive()
                            ->get()
                            ->sortBy('semester')
                            ->mapWithKeys(function ($kelas) {
                                return [$kelas->semester => $kelas->semester];
                            });
                    }),
                SelectFilter::make('status')
                    ->label('Status Kelas')
                    ->options([
                        1 => 'Aktif',
                        0 => 'Tidak Aktif'
                    ]),
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
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}
