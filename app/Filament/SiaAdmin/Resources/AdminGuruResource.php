<?php

namespace App\Filament\SiaAdmin\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\AdminGuru;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\SiaAdmin\Resources\AdminGuruResource\Pages;
use App\Filament\SiaAdmin\Resources\AdminGuruResource\RelationManagers;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class AdminGuruResource extends Resource
{
    protected static ?string $model = AdminGuru::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Data Admin & Guru';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Admin & Guru';

    protected static ?string $label = 'Admin & Guru';

    public static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    Wizard::make([
                        Step::make('Lengkapi Biodata Diri')
                            ->schema([
                                TextInput::make('nik_guru')
                                    ->label('NIK Guru')
                                    ->required()
                                    ->numeric(),
                                TextInput::make('no_kk')
                                    ->label('No Kartu Keluarga')
                                    ->numeric()
                                    ->required(),
                                TextInput::make('nuptk')
                                    ->label('NUPTK')
                                    ->numeric(),
                                TextInput::make('nip')
                                    ->label('NIP')
                                    ->numeric(),
                                TextInput::make('nama_lengkap_tendik')
                                    ->label('Nama Lengkap')
                                    ->required()
                                    ->autocapitalize('words'),
                                TextInput::make('email')
                                    ->required(),
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
                                Select::make('kewarganegaraan')
                                    ->required()
                                    ->options([
                                        'WNI' => 'WNI',
                                        'WNA' => 'WNA',
                                        'Keturunan' => 'Keturunan'
                                    ]),
                                Select::make('agama')
                                    ->required()
                                    ->options([
                                        'Islam' => 'Islam',
                                        'Kristen' => 'Kristen',
                                        'Katolik' => 'Katolik',
                                        'Hindu' => 'Hindu',
                                        'Buddha' => 'Budha'
                                    ]),
                                Textarea::make('alamat_rumah')
                                    ->label('Alamat Rumah')
                                    ->required(),
                                TextInput::make('no_hp')
                                    ->label('No Hp/Telepon')
                                    ->required()
                                    ->numeric()
                                    ->tel()
                                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                    ->helperText('Format : 08*********'),
                                ])->columns(2),

                        Step::make('Lengkapi Data Pendidik')
                                ->schema([
                                    Select::make('status_kepegawaian')
                                        ->label('Status Kepegawaian')
                                        ->required()
                                        ->options([
                                            'GTY/PTY' => 'GTY/PTY',
                                            'Guru Honor Sekolah' => 'Guru Honor Sekolah',
                                        ]),
                                    Select::make('jenis_ptk')
                                        ->label('Jenis PTK')
                                        ->required()
                                        ->options([
                                            'Guru Mapel' => 'Guru Mapel',
                                            'Guru Kelas' => 'Guru kelas',
                                        ]),
                                    TextInput::make('tugas_tambahan')
                                        ->label('Tugas Tambahan'),
                                    TextInput::make('sk_cpns')
                                        ->label('SK CPNS'),
                                    TextInput::make('tanggal_cpns')
                                        ->label('Tanggal CPNS'),
                                    TextInput::make('sk_pengangkatan')
                                        ->label('SK Pengangkatan'),
                                    TextInput::make('tmt_pengangkatan')
                                        ->label('TMT Pengangkatan'),
                                    TextInput::make('lembaga_pengangkatan')
                                        ->label('Lembaga Pengangkatan'),
                                    TextInput::make('pangkat_golongan')
                                        ->label('Pangkat/Golongan'),
                                    TextInput::make('sumber_gaji')
                                        ->label('Sumber Gaji'),
                                    TextInput::make('nama_ibu_kandung')
                                        ->label('Nama Ibu Kandung')
                                        ->required(),
                                    Select::make('status_perkawinan')
                                        ->label('Status Perkawinan')
                                        ->required()
                                        ->options([
                                            'Menikah' => 'Menikah',
                                            'Belum Menikah' => 'Belum Menikah'
                                        ]),
                                    TextInput::make('nama_suami_atau_istri')
                                        ->label('Nama Suami/Istri'),
                                    TextInput::make('nip_suami_atau_istri')
                                        ->label('NIP Suami/Istri'),
                                    TextInput::make('pekerjaan_suami_atau_istri')
                                        ->label('Pekerjaan Suami/Istri'),
                                    TextInput::make('tmt_pns')
                                        ->label('TMT PNS'),
                                    Select::make('lisensi_kepsek')
                                        ->label('Sudah Lisensi Kepala Sekolah')
                                        ->required()
                                        ->options([
                                            'Ya' => 'Ya',
                                            'Tidak' => 'Tidak'
                                        ]),
                                    Select::make('diklat_kepegawaian')
                                        ->label('Pernah Diklat Kepegawaian')
                                        ->required()
                                        ->options([
                                            'Ya' => 'Ya',
                                            'Tidak' => 'Tidak'
                                        ]),
                                    Select::make('keahlian_braille')
                                        ->label('Keahlian Braille')
                                        ->required()
                                        ->options([
                                            'Ya' => 'Ya',
                                            'Tidak' => 'Tidak'
                                        ]),
                                    Select::make('keahlian_bahasa_isyarat')
                                        ->label('Keahlian Bahasa Isyarat')
                                        ->required()
                                        ->options([
                                            'Ya' => 'Ya',
                                            'Tidak' => 'Tidak'
                                        ]),
                                    TextInput::make('npwp')
                                        ->label('NPWP'),
                                    TextInput::make('nama_wajib_pajak')
                                        ->label('Nama Wajib Pajak'),
                                    TextInput::make('bank')
                                        ->label('Bank'),
                                    TextInput::make('norek_bank')
                                        ->label('No Rekening Bank'),
                                    TextInput::make('rek_anama')
                                        ->label('Rekening Atas Nama'),
                                    Select::make('karpeg')
                                        ->label('Karpeg')
                                        ->options([
                                            'Ya' => 'Ya',
                                            'Tidak' => 'Tidak'
                                        ]),
                                    Select::make('karis_karsu')
                                        ->label('Karis/Karsu')
                                        ->options([
                                            'Ya' => 'Ya',
                                            'Tidak' => 'Tidak'
                                        ]),
                                    Select::make('nuks')
                                        ->label('NUKS')
                                        ->options([
                                            'Ya' => 'Ya',
                                            'Tidak' => 'Tidak'
                                        ]),
                                ])->columns(2)
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(AdminGuru::activeUserWithRole())
            ->columns([
                TextColumn::make('nik_guru')
                    ->label('NIK Guru')
                    ->searchable(),
                TextColumn::make('nama_lengkap_tendik')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return ucwords($record->nama_lengkap_tendik);
                    }),
                TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin'),
                TextColumn::make('status_kepegawaian')
                    ->label('Status Kepegawaian'),
                TextColumn::make('jenis_ptk')
                    ->label('Jenis PTK'),
            ])
            ->filters([
                SelectFilter::make('status_kepegawaian')
                    ->label('Status Kepegawaian')
                    ->options([
                        'GTY/PTY' => 'GTY/PTY',
                        'Guru Honor Sekolah' => 'Guru Honor Sekolah',
                    ]),
                SelectFilter::make('jenis_ptk')
                    ->label('Jenis PTK')
                    ->options([
                        'Guru Mapel' => 'Guru Mapel',
                        'Guru Kelas' => 'Guru kelas',
                    ])
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
            'index' => Pages\ListAdminGurus::route('/'),
            'create' => Pages\CreateAdminGuru::route('/create'),
            'edit' => Pages\EditAdminGuru::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            "NIK Guru" => $record->nik_guru
        ];
    }
}
