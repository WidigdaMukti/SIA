<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\OrangTuaResource\Pages;
use App\Filament\SiaAdmin\Resources\OrangTuaResource\RelationManagers;
use App\Models\OrangTua;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrangTuaResource extends Resource
{
    protected static ?string $model = OrangTua::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Data Peserta Didik';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationLabel = 'Orang Tua';

    // public static ?array $recordTitleAttribute = ['nama_lengkap_ayah', 'nama_lengkap_ibu', 'nama_lengkap_wali'];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Lengkapi Data Ayah')
                        ->schema([
                            TextInput::make('nik_ayah')
                                ->label('NIK Ayah'),
                            TextInput::make('nama_lengkap_ayah')
                                ->label('Nama Lengkap Ayah')
                                ->autocapitalize('words'),
                            TextInput::make('tempat_lahir_ayah')
                                ->label('Tempat Lahir Ayah')
                                ->autocapitalize('words'),
                            DatePicker::make('tanggal_lahir_ayah')
                                ->label('Tanggal Lahir Ayah'),
                            Select::make('agama_ayah')
                                ->label('Agama Ayah')
                                ->options([
                                    'Islam' => 'Islam',
                                    'Kristen' => 'Kristen',
                                    'Katolik' => 'Katolik',
                                    'Hindu' => 'Hindu',
                                    'Buddha' => 'Budha'
                                ]),
                            Select::make('kewarganegaraan_ayah')
                                ->label('Kewarganegaraan Ayah')
                                ->options([
                                    'WNI' => 'WNI',
                                    'WNA' => 'WNA',
                                    'Keturunan' => 'Keturunan'
                                ]),
                            Select::make('pendidikan_terakhir_ayah')
                                ->label('Pendidikan Terakhir Ayah')
                                ->options([
                                    'Tidak Sekolah' => 'Tidak Sekolah',
                                    'PAUD' => 'PAUD',
                                    'SD / Sederajat' => 'SD / Sederajat',
                                    'SMP / Sederajat' => 'SMP / Sederajat',
                                    'SMA / Sederajat' => 'SMA / Sederajat',
                                    'D1' => 'D1',
                                    'D2' => 'D2',
                                    'D3' => 'D3',
                                    'S1' => 'S1',
                                    'S2' => 'S2',
                                    'S3' => 'S3'
                                ]),
                            Select::make('pekerjaan_ayah')
                                ->label('Pekerjaan Ayah')
                                ->options([
                                    'Tidak Bekerja' => 'Tidak Bekerja',
                                    'PNS / TNI / POLRI' => 'PNS / TNI / POLRI',
                                    'Karyawan Swasta' => 'Karyawan Swasta',
                                    'Wiraswasta' => 'Wiraswasta',
                                    'Pedagang Kecil' => 'Pedagang Kecil',
                                    'Petani' => 'Petani',
                                    'Nelayan' => 'Nelayan',
                                    'Buruh' => 'Buruh',
                                    'Tukang' => 'Tukang',
                                    'Lainnya' => 'Lainnya'
                                ]),
                            Select::make('gaji_perbulan_ayah')
                                ->label('Gaji Ayah Perbulan')
                                ->options([
                                    'Tidak Berpenghasilan' => 'Tidak Berpenghasilan',
                                    'Rp0 - Rp499.000' => 'Rp0 - Rp499.000',
                                    'Rp500.000 - Rp999.000' => '500.000 - Rp999.000',
                                    'Rp1.000.000 - Rp1.499.000' => 'Rp1.000.000 - Rp1.499.000',
                                    'Rp1.500.000 - Rp1.999.000' => 'Rp1.500.000 - Rp1.999.000',
                                    'Rp2.000.000 - Rp2.499.000' => '2.000.000 - Rp2.499.000',
                                    'Rp2.500.000 - Rp2.999.000' => 'Rp2.500.000 - Rp2.999.000',
                                    'Rp3.000.000 - Rp3.499.000' => 'Rp3.000.000 - Rp3.499.000',
                                    'Rp3.500.000 - Rp3.999.000' => 'Rp3.500.000 - Rp3.999.000',
                                    'Rp4.000.000 - Rp4.499.000' => 'Rp4.000.000 - Rp4.499.000',
                                    'Lebih dari Rp5.000.000' => 'Lebih dari Rp5.000.000'
                                ]),
                            Textarea::make('alamat_kantor_ayah')
                                ->label('Alamat Kantor Ayah'),
                            Textarea::make('alamat_rumah_ayah')
                                ->label('Alamat Rumah Ayah'),
                            TextInput::make('no_hp_ayah')
                                ->label('No HP Ayah')
                                ->numeric()
                                ->tel()
                                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                ->helperText('Format : 08*********'),
                        ])->columns(2),

                    Step::make('Lengkapi Data Ibu')
                        ->schema([
                            TextInput::make('nik_ibu')
                                ->label('NIK Ibu')
                                ->required(),
                            TextInput::make('nama_lengkap_ibu')
                                ->label('Nama Lengkap Ibu')
                                ->required()
                                ->autocapitalize('words'),
                            TextInput::make('tempat_lahir_ibu')
                                ->label('Tempat Lahir Ibu')
                                ->required()
                                ->autocapitalize('words'),
                            DatePicker::make('tanggal_lahir_ibu')
                                ->label('Tanggal Lahir Ibu')
                                ->required(),
                            Select::make('agama_ibu')
                                ->label('Agama Ibu')
                                ->required()
                                ->options([
                                    'Islam' => 'Islam',
                                    'Kristen' => 'Kristen',
                                    'Katolik' => 'Katolik',
                                    'Hindu' => 'Hindu',
                                    'Buddha' => 'Budha'
                                ]),
                            Select::make('kewarganegaraan_ibu')
                                ->label('Kewarganegaraan Ibu')
                                ->required()
                                ->options([
                                    'WNI' => 'WNI',
                                    'WNA' => 'WNA',
                                    'Keturunan' => 'Keturunan'
                                ]),
                            Select::make('pendidikan_terakhir_ibu')
                                ->label('Pendidikan Terakhir Ibu')
                                ->required()
                                ->options([
                                    'Tidak Sekolah' => 'Tidak Sekolah',
                                    'PAUD' => 'PAUD',
                                    'SD / Sederajat' => 'SD / Sederajat',
                                    'SMP / Sederajat' => 'SMP / Sederajat',
                                    'SMA / Sederajat' => 'SMA / Sederajat',
                                    'D1' => 'D1',
                                    'D2' => 'D2',
                                    'D3' => 'D3',
                                    'S1' => 'S1',
                                    'S2' => 'S2',
                                    'S3' => 'S3'
                                ]),
                            Select::make('pekerjaan_ibu')
                                ->label('Pekerjaan Ibu')
                                ->required()
                                ->options([
                                    'Tidak Bekerja' => 'Tidak Bekerja',
                                    'PNS / TNI / POLRI' => 'PNS / TNI / POLRI',
                                    'Karyawan Swasta' => 'Karyawan Swasta',
                                    'Wiraswasta' => 'Wiraswasta',
                                    'Pedagang Kecil' => 'Pedagang Kecil',
                                    'Petani' => 'Petani',
                                    'Nelayan' => 'Nelayan',
                                    'Buruh' => 'Buruh',
                                    'Tukang' => 'Tukang',
                                    'Lainnya' => 'Lainnya'
                                ]),
                            Select::make('gaji_ibu_perbulan')
                                ->label('Gaji Ibu Perbulan')
                                ->required()
                                ->options([
                                    'Tidak Berpenghasilan' => 'Tidak Berpenghasilan',
                                    'Rp0 - Rp499.000' => 'Rp0 - Rp499.000',
                                    'Rp500.000 - Rp999.000' => '500.000 - Rp999.000',
                                    'Rp1.000.000 - Rp1.499.000' => 'Rp1.000.000 - Rp1.499.000',
                                    'Rp1.500.000 - Rp1.999.000' => 'Rp1.500.000 - Rp1.999.000',
                                    'Rp2.000.000 - Rp2.499.000' => '2.000.000 - Rp2.499.000',
                                    'Rp2.500.000 - Rp2.999.000' => 'Rp2.500.000 - Rp2.999.000',
                                    'Rp3.000.000 - Rp3.499.000' => 'Rp3.000.000 - Rp3.499.000',
                                    'Rp3.500.000 - Rp3.999.000' => 'Rp3.500.000 - Rp3.999.000',
                                    'Rp4.000.000 - Rp4.499.000' => 'Rp4.000.000 - Rp4.499.000',
                                    'Lebih dari Rp5.000.000' => 'Lebih dari Rp5.000.000'
                                ]),
                            Textarea::make('alamat_kantor_ibu')
                                ->label('Alamat Kantor Ibu'),
                            Textarea::make('alamat_rumah_ibu')
                                ->label('Alamat Rumah Ibu')
                                ->required(),
                            TextInput::make('no_hp_ibu')
                                ->label('No HP Ibu')
                                ->required()
                                ->numeric()
                                ->tel()
                                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                ->helperText('Format : 08*********'),
                        ])->columns(2),

                    Step::make('Lengkapi Data Wali')
                        ->schema([
                            TextInput::make('nik_wali')
                                ->label('NIK Wali'),
                            TextInput::make('nama_lengkap_wali')
                                ->label('Nama Lengkap Wali')
                                ->autocapitalize('words'),
                            TextInput::make('tempat_lahir_wali')
                                ->label('Tempat Lahir Wali')
                                ->autocapitalize('words'),
                            DatePicker::make('tanggal_lahir_wali')
                                ->label('Tanggal Lahir Wali'),
                            Select::make('agama_wali')
                                ->label('Agama Wali')
                                ->options([
                                    'Islam' => 'Islam',
                                    'Kristen' => 'Kristen',
                                    'Katolik' => 'Katolik',
                                    'Hindu' => 'Hindu',
                                    'Buddha' => 'Budha'
                                ]),
                            Select::make('kewarganegaraan_wali')
                                ->label('Kewarganegaraan Wali')
                                ->options([
                                    'WNI' => 'WNI',
                                    'WNA' => 'WNA',
                                    'Keturunan' => 'Keturunan'
                                ]),
                            Select::make('pendidikan_terakhir_wali')
                                ->label('Pendidikan Terakhir Wali')
                                ->options([
                                    'Tidak Sekolah' => 'Tidak Sekolah',
                                    'PAUD' => 'PAUD',
                                    'SD / Sederajat' => 'SD / Sederajat',
                                    'SMP / Sederajat' => 'SMP / Sederajat',
                                    'SMA / Sederajat' => 'SMA / Sederajat',
                                    'D1' => 'D1',
                                    'D2' => 'D2',
                                    'D3' => 'D3',
                                    'S1' => 'S1',
                                    'S2' => 'S2',
                                    'S3' => 'S3'
                                ]),
                            Select::make('pekerjaan_wali')
                                ->label('Pekerjaan Wali')
                                ->options([
                                    'Tidak Bekerja' => 'Tidak Bekerja',
                                    'PNS / TNI / POLRI' => 'PNS / TNI / POLRI',
                                    'Karyawan Swasta' => 'Karyawan Swasta',
                                    'Wiraswasta' => 'Wiraswasta',
                                    'Pedagang Kecil' => 'Pedagang Kecil',
                                    'Petani' => 'Petani',
                                    'Nelayan' => 'Nelayan',
                                    'Buruh' => 'Buruh',
                                    'Tukang' => 'Tukang',
                                    'Lainnya' => 'Lainnya'
                                ]),
                            Select::make('gaji_wali_perbulan')
                                ->label('Gaji Wali Perbulan')
                                ->options([
                                    'Tidak Berpenghasilan' => 'Tidak Berpenghasilan',
                                    'Rp0 - Rp499.000' => 'Rp0 - Rp499.000',
                                    'Rp500.000 - Rp999.000' => '500.000 - Rp999.000',
                                    'Rp1.000.000 - Rp1.499.000' => 'Rp1.000.000 - Rp1.499.000',
                                    'Rp1.500.000 - Rp1.999.000' => 'Rp1.500.000 - Rp1.999.000',
                                    'Rp2.000.000 - Rp2.499.000' => '2.000.000 - Rp2.499.000',
                                    'Rp2.500.000 - Rp2.999.000' => 'Rp2.500.000 - Rp2.999.000',
                                    'Rp3.000.000 - Rp3.499.000' => 'Rp3.000.000 - Rp3.499.000',
                                    'Rp3.500.000 - Rp3.999.000' => 'Rp3.500.000 - Rp3.999.000',
                                    'Rp4.000.000 - Rp4.499.000' => 'Rp4.000.000 - Rp4.499.000',
                                    'Lebih dari Rp5.000.000' => 'Lebih dari Rp5.000.000'
                                ]),
                            Textarea::make('alamat_kantor_wali')
                                ->label('Alamat Kantor Wali'),
                            Textarea::make('alamat_rumah_wali')
                                ->label('Alamat Rumah Wali'),
                            TextInput::make('no_hp_wali')
                                ->label('No HP Wali')
                                ->numeric()
                                ->tel()
                                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                ->helperText('Format : 08*********'),
                        ])->columns(2),
                ])->columnSpanFull()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(OrangTua::activeSiswa())
            ->columns([
                TextColumn::make('nik_siswa')
                    ->label('NIK Anak')
                    ->searchable(),
                TextColumn::make('nik_ayah')
                    ->label('NIK Ayah')
                    ->searchable(),
                TextColumn::make('nama_lengkap_ayah')
                    ->label('Nama Lengkap Ayah')
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return ucwords($record->nama_lengkap_ayah);
                    }),
                TextColumn::make('nik_ibu')
                    ->label('NIK Ibu')
                    ->searchable(),
                TextColumn::make('nama_lengkap_ibu')
                    ->label('Nama Lengkap Ibu')
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return ucwords($record->nama_lengkap_ibu);
                    }),
                TextColumn::make('nik_wali')
                    ->label('NIK Ibu')
                    ->searchable(),
                TextColumn::make('nama_lengkap_wali')
                    ->label('Nama Lengkap Wali')
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return ucwords($record->nama_lengkap_wali);
                    }),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListOrangTuas::route('/'),
            // 'create' => Pages\CreateOrangTua::route('/create'),
            'edit' => Pages\EditOrangTua::route('/{record}/edit'),
        ];
    }

    public static function search($query, $search): Builder
    {
        return $query->where('nama_lengkap_ayah', 'like', '%' . $search . '%')
            ->orWhere('nama_lengkap_ibu', 'like', '%' . $search . '%')
            ->orWhere('nama_lengkap_wali', 'like', '%' . $search . '%');
    }
}
