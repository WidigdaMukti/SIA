<?php

namespace App\Filament\SiaAdmin\Resources;

use Filament\Forms;
use App\Models\Ppdb;
use Filament\Tables;
use Filament\Forms\Form;
use App\Enums\PpdbStatus;
use App\Filament\SiaAdmin\Resources\Enums\PpdbStatus as EnumsPpdbStatus;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\SiaAdmin\Resources\PpdbResource\Pages;
use App\Filament\SiaAdmin\Resources\PpdbResource\RelationManagers;
use App\Http\Controllers\PpdbController;
use Filament\Tables\Actions\Action;

class PpdbResource extends Resource
{
    protected static ?string $model = Ppdb::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'Data Peserta Didik';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationLabel = 'PPDB';

    protected static ?string $label = 'Penerimaan Peserta Didik Baru';

    public static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Wizard::make([
                        wizard\Step::make('Lengkapi Biodata Peserta Didik')
                            ->schema([
                                TextInput::make('nik')
                                    ->label('NIK Peserta Didik')
                                    ->required(),
                                TextInput::make('nama_lengkap')
                                    ->label('Nama Lengkap')
                                    ->required()
                                    ->autocapitalize('words'),
                                Select::make('jenis_kelamin')
                                    ->label('Jenis Kelamin')
                                    ->required()
                                    ->options([
                                        'Laki - laki' => 'Laki - laki',
                                        'Perempuan' => 'Perempuan'
                                    ]),
                                TextInput::make('tempat_lahir')
                                    ->label('Tempat Lahir')
                                    ->required()
                                    ->autocapitalize('words'),
                                DatePicker::make('tanggal_lahir')
                                    ->label('Tanggal Lahir')
                                    ->required(),
                                Select::make('agama')
                                    ->required()
                                    ->options([
                                        'Islam' => 'Islam',
                                        'Kristen' => 'Kristen',
                                        'Katolik' => 'Katolik',
                                        'Hindu' => 'Hindu',
                                        'Buddha' => 'Budha'
                                    ]),
                                Select::make('kewarganegaraan')
                                    ->required()
                                    ->options([
                                        'WNI' => 'WNI',
                                        'WNA' => 'WNA',
                                        'Keturunan' => 'Keturunan',
                                    ]),
                                TextInput::make('jumlah_saudara_kandung')
                                    ->label('Jumlah Saudara Kandung')
                                    ->numeric()
                                    ->required()
                                    ->helperText('Jika Tidak ada ketik 0'),
                                TextInput::make('jumlah_saudara_tiri')
                                    ->label('Jumlah Saudara Tiri')
                                    ->numeric()
                                    ->required()
                                    ->helperText('Jika Tidak ada ketik 0'),
                                TextInput::make('jumlah_saudara_angkat')
                                    ->label('Jumlah Saudara Angkat')
                                    ->numeric()
                                    ->required()
                                    ->helperText('Jika Tidak ada ketik 0'),
                                TextInput::make('bahasa_sehari_hari')
                                    ->label('Bahasa Sehari-hari')
                                    ->required(),
                                TextInput::make('berat_badan')
                                    ->label('Berat Badan')
                                    ->numeric()
                                    ->required()
                                    ->helperText('Dalam Kilogram'),
                                TextInput::make('tinggi_badan')
                                    ->label('Tinggi Badan')
                                    ->numeric()
                                    ->required()
                                    ->helperText('Dalam Centimeter'),
                                Select::make('golongan_darah')
                                    ->label('Golongan Darah')
                                    ->required()
                                    ->options([
                                        'A' => 'A',
                                        'B' => 'B',
                                        'AB' => 'AB',
                                        'O' => 'O',
                                    ]),
                                Textarea::make('alamat')
                                    ->label('Alamat Rumah'),
                                Select::make('bertempat_tinggal')
                                    ->label('Bertempat Tinggal')
                                    ->required()
                                    ->options([
                                        'Bersama Orang Tua' => 'Bersama Orang Tua',
                                        'Menumpang' => 'Menumpang',
                                        'Asrama' => 'Asrama',
                                    ]),
                                Select::make('masuk_sekolah_sebagai')
                                    ->label('Masuk Sekolah Sebagai')
                                    ->required()
                                    ->options([
                                        'Siswa Baru' => 'Siswa Baru',
                                        'Pindahan' => 'Pindahan',
                                    ]),
                                Select::make('asal_anak')
                                    ->label('Asal Anak')
                                    ->required()
                                    ->options([
                                        'rumah tangga' => 'Rumah Tangga',
                                        'taman kanak-kanak' => 'Taman Kanak-kanak'
                                    ]),
                                TextInput::make('nama_tk')
                                    ->label('Nama Taman Kanak-kanak')
                                    ->autocapitalize('words'),
                                TextInput::make('nomor_tahun_surat_keterangan')
                                    ->label('No Tahun Surat Keterangan'),
                                TextInput::make('lama_belajar')
                                    ->label('Lama Belajar')
                                    ->numeric()
                                    ->helperText('Dalam Tahun'),
                            ])
                            ->columns(2),

                        Wizard\Step::make('Lengkapi Data Orang Tua')
                            ->schema([
                                Section::make('Data Ayah')
                                    ->description('Data Ayah atau Wali')
                                    ->schema([
                                        TextInput::make('nama_ayah')
                                            ->label('Nama Ayah')
                                            ->required()
                                            ->autocapitalize('words'),
                                        TextInput::make('tempat_lahir_ayah')
                                            ->label('Tempat lahir'),
                                        DatePicker::make('tanggal_lahir_ayah')
                                            ->label('Tanggal Lahir')
                                            ->required(),
                                        Select::make('agama_ayah')
                                            ->required()
                                            ->options([
                                                'Islam' => 'Islam',
                                                'Kristen' => 'Kristen',
                                                'Katolik' => 'Katolik',
                                                'Hindu' => 'Hindu',
                                                'Buddha' => 'Budha'
                                            ]),
                                        Select::make('kewarganegaraan_ayah')
                                            ->required()
                                            ->options([
                                                'WNI' => 'WNI',
                                                'WNA' => 'WNA',
                                                'Keturunan' => 'Keturunan',
                                            ]),
                                        Select::make('pendidikan_terakhir_ayah')
                                            ->required()
                                            ->options([
                                                'SD' => 'SD',
                                                'SMP' => 'SMP',
                                                'SMA' => 'SMA',
                                                'Diploma' => 'Diploma',
                                                'Sarjana' => 'Sarjana'
                                            ]),
                                        TextInput::make('pekerjaan_ayah')
                                            ->label('Pekerjaan'),
                                        Select::make('gaji_perbulan_ayah')
                                            ->required()
                                            ->options([
                                                'Kurang dari Rp. 500.000' => 'Kurang dari Rp. 500.000',
                                                'Rp. 500.000 - Rp. 999.999' => ' Rp. 500.000 - Rp. 999.999',
                                                'Rp. 1.000.000 - Rp. 1.999.999' => 'Rp. 1.000.000 - Rp. 1.999.999',
                                                'Rp. 2.000.000 - Rp. 4.999.999' => 'Rp. 2.000.000 - Rp. 4.999.999',
                                                'Rp. 5.000.000 - Rp. 20.000.000' => 'Rp. 5.000.000 - Rp. 20.000.000',
                                                'Lebih Dari Rp. 20.000.000' => 'Lebih Dari Rp. 20.000.000'
                                            ]),
                                        TextInput::make('alamat_rumah_ayah')
                                            ->label('Alamat Rumah'),
                                        TextInput::make('alamat_kantor_ayah')
                                            ->label('Alamat Kantor'),
                                        TextInput::make('alamat_kantor_ayah')
                                            ->label('Alamat Kantor'),
                                        TextInput::make('nomor_telepon_hp_ayah')
                                            ->label('Nomor Telepon')
                                            ->required()
                                            ->tel()
                                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                            ->helperText('Format : 08*********'),
                                    ])
                                    ->collapsed(),
                                Section::make('Data Ibu')
                                    ->description('Data Ibu atau Wali')
                                    ->schema([
                                        TextInput::make('nama_ibu')
                                            ->label('Nama Ayah')
                                            ->required()
                                            ->autocapitalize('words'),
                                        TextInput::make('tempat_lahir_ibu')
                                            ->label('Tempat lahir'),
                                        DatePicker::make('tanggal_lahir_ibu')
                                            ->label('Tanggal Lahir')
                                            ->required(),
                                        Select::make('agama_ibu')
                                            ->required()
                                            ->options([
                                                'Islam' => 'Islam',
                                                'Kristen' => 'Kristen',
                                                'Katolik' => 'Katolik',
                                                'Hindu' => 'Hindu',
                                                'Buddha' => 'Budha'
                                            ]),
                                        Select::make('kewarganegaraan_ibu')
                                            ->required()
                                            ->options([
                                                'WNI' => 'WNI',
                                                'WNA' => 'WNA',
                                                'Keturunan' => 'Keturunan',
                                            ]),
                                        Select::make('pendidikan_terakhir_ibu')
                                            ->required()
                                            ->options([
                                                'SD' => 'SD',
                                                'SMP' => 'SMP',
                                                'SMA' => 'SMA',
                                                'Diploma' => 'Diploma',
                                                'Sarjana' => 'Sarjana'
                                            ]),
                                        TextInput::make('pekerjaan_ibu')
                                            ->label('Pekerjaan'),
                                        Select::make('gaji_perbulan_ibu')
                                            ->required()
                                            ->options([
                                                'Kurang dari Rp. 500.000' => 'Kurang dari Rp. 500.000',
                                                'Rp. 500.000 - Rp. 999.999' => ' Rp. 500.000 - Rp. 999.999',
                                                'Rp. 1.000.000 - Rp. 1.999.999' => 'Rp. 1.000.000 - Rp. 1.999.999',
                                                'Rp. 2.000.000 - Rp. 4.999.999' => 'Rp. 2.000.000 - Rp. 4.999.999',
                                                'Rp. 5.000.000 - Rp. 20.000.000' => 'Rp. 5.000.000 - Rp. 20.000.000',
                                                'Lebih Dari Rp. 20.000.000' => 'Lebih Dari Rp. 20.000.000'
                                            ]),
                                        TextInput::make('alamat_rumah_ibu')
                                            ->label('Alamat Rumah'),
                                        TextInput::make('alamat_kantor_ibu')
                                            ->label('Alamat Kantor'),
                                        TextInput::make('alamat_kantor_ibu')
                                            ->label('Alamat Kantor'),
                                        TextInput::make('nomor_telepon_hp_ibu')
                                            ->label('Nomor Telepon')
                                            ->required()
                                            ->tel()
                                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                            ->helperText('Format : 08*********'),
                                    ])
                                    ->collapsed()

                            ])
                            ->columns(2),
                    ])->columnSpanFull()
                ])->columnSpan(2),
                Section::make([
                    Forms\Components\ToggleButtons::make('status')
                        ->inline()
                        ->options(EnumsPpdbStatus::class)
                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nik')
                    ->label('NIK Siswa')
                    ->searchable(),
                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return ucwords($record->nama_lengkap);
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->label('Status')
                    ->searchable(),
                TextColumn::make('nomor_telepon')
                    ->label('Nomor Telepon')

            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('Diterima')
                ->icon('heroicon-m-check-badge')
                ->color('success')
                ->action(function ($record) {
                    return (new PpdbController)->diterima($record->id);
                }),
                Action::make('Ditolak')
                ->icon('heroicon-m-x-circle')
                ->color('danger')
                ->action(function ($record) {
                    return (new PpdbController)->ditolak($record->id);
                }),
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPpdbs::route('/'),
            'create' => Pages\CreatePpdb::route('/create'),
            'edit' => Pages\EditPpdb::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::where('status', 'baru')->count();
    }
}
