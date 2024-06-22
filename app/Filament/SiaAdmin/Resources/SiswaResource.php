<?php

namespace App\Filament\SiaAdmin\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Kelas;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\SiaAdmin\Resources\SiswaResource\Pages;
use App\Filament\SiaAdmin\Resources\SiswaResource\RelationManagers;
use Carbon\Carbon;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Illuminate\Database\Eloquent\Model;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Data Peserta Didik';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationLabel = 'Siswa';

    public static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    Wizard::make([
                        Step::make('Lengkapi Biodata Diri')
                            ->schema([
                                TextInput::make('nik_siswa')
                                    ->label('NIK Peserta Didik')
                                    ->required(),
                                TextInput::make('no_kk')
                                    ->label('No Kartu Keluarga')
                                    ->required(),
                                TextInput::make('nisn')
                                    ->label('NISN')
                                    ->required(),
                                TextInput::make('nipd')
                                    ->label('NIPD')
                                    ->required(),
                                TextInput::make('nama_lengkap')
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
                                TextInput::make('bahasa_sehari-hari')
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
                                Select::make('gol_darah')
                                    ->label('Golongan Darah')
                                    ->required()
                                    ->options([
                                        'A' => 'A',
                                        'B' => 'B',
                                        'AB' => 'AB',
                                        'O' => 'O',
                                    ]),
                                Textarea::make('alamat rumah')
                                    ->label('Alamat Rumah'),
                                TextInput::make('nomor_telepon')
                                    ->label('Nomor Telepon')
                                    ->required()
                                    ->tel()
                                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                    ->helperText('Format : 08*********'),
                                Select::make('bertempat_tinggal')
                                    ->label('Bertempat Tinggal')
                                    ->required()
                                    ->options([
                                        'Bersama Orang Tua' => 'Bersama Orang Tua',
                                        'Menumpang' => 'Menumpang',
                                        'Asrama' => 'Asrama',
                                    ]),
                                Select::make('alat_transportasi')
                                    ->label('Alat Transportasi')
                                    ->required()
                                    ->options([
                                        'Jalan Kaki' => 'Jalan Kaki',
                                        'Sepeda' => 'Sepeda',
                                        'Motor' => 'Motor',
                                        'Mobil' => 'Mobil',
                                        'Angkutan Umum' => 'Angkutan Umum',
                                        'Ojek' => 'Ojek',
                                        'Andong/Bendi/Sado/Dokar/Delman/Beca' => 'Andong/Bendi/Sado/Dokar/Delman/Beca',
                                        'Lainnya' => 'Lainnya',
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
                                TextInput::make('no_tahun_surat_ket')
                                    ->label('No Tahun Surat Keterangan'),
                                TextInput::make('lama_belajar')
                                    ->label('Lama Belajar')
                                    ->numeric()
                                    ->helperText('Dalam Tahun'),
                            ])->columns(2),

                        Step::make('Lengkapi Data Peserta Didik')
                            ->schema([
                                TextInput::make('skhun')
                                    ->label('SKHUN'),
                                Select::make('penerima_kps')
                                    ->label('Penerima KPS')
                                    ->required()
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ]),
                                TextInput::make('no_kps')
                                    ->label('No KPS'),
                                TextInput::make('no_peserta_ujian_nasional')
                                    ->label('No Peserta Ujian Nasional'),
                                TextInput::make('no_seri_ijazah')
                                    ->label('No Seri Ijazah'),
                                Select::make('penerima_kip')
                                    ->label('Penerima KIP')
                                    ->required()
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ]),
                                TextInput::make('nomor_kip')
                                    ->label('Nomor KIP'),
                                TextInput::make('nama_kip')
                                    ->label('Nama KIP')
                                    ->autocapitalize('words'),
                                TextInput::make('no_kks')
                                    ->label('No KKS'),
                                TextInput::make('no_registrasi_akta_lahir')
                                    ->label('No Registrasi Akta Lahir'),
                                TextInput::make('bank')
                                    ->label('Bank'),
                                TextInput::make('no_rek_bank')
                                    ->label('No Rekening Bank'),
                                TextInput::make('rek_atas_nama')
                                    ->label('Rekening Atas Nama')
                                    ->autocapitalize('words'),
                                Select::make('layak_pip')
                                    ->label('Layak PIP (Usulan dari Sekolah)')
                                    ->required()
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ]),
                                TextInput::make('alasan_layak_pip')
                                    ->label('Alasan Layak PIP'),
                                TextInput::make('kebutuhan_khusus')
                                    ->label('Kebutuhan Khusus')
                                    ->required()
                                    ->autocapitalize('words')
                                    ->helperText('Jika tidak ada, ketik Tidak Ada'),
                                Select::make('id_kelas')
                                    ->label('Kelas')
                                    ->options(function () {
                                        return Kelas::query()
                                            ->where('status', 1)
                                            ->get()
                                            ->mapWithKeys(function ($kelas) {
                                                $tahun_mulai = Carbon::parse($kelas->tanggal_mulai)->format('Y/m');
                                                $tahun_selesai = Carbon::parse($kelas->tanggal_selesai)->format('Y/m');
                                                $label = "{$kelas->tingkat_kelas} / {$kelas->semester} / {$tahun_mulai} - {$tahun_selesai}";
                                                return [$kelas->id => $label];
                                            });
                                        }),
                            ])->columns(2)
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Siswa::activeUserWithRole())  // Gunakan scopeActiveUser di sini
            ->columns([
                TextColumn::make('nik_siswa')
                    ->label('NIK Siswa')
                    ->searchable(),
                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return ucwords($record->nama_lengkap);
                    }),
                TextColumn::make('email'),
                TextColumn::make('id_kelas')
                    ->label('Kelas')
                    ->getStateUsing(function (Siswa $kelas) {
                        return $kelas->kelas ? $kelas->kelas->tingkat_kelas : 'Belum ada kelas';
                    }),
            ])
            ->filters([
                //
                // SelectFilter::make('Agama')->options([
                //     'islam' => 'Islam',
                //     'kristen' => 'Kristen',
                //     'katolik' => 'Katolik',
                //     'hindu' => 'Hindu',
                //     'budha' => 'Budha',
                //     'konghucu' => 'Konghucu',
                // ])
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            "NIK" => $record->nik_siswa,
        ];
    }
}
