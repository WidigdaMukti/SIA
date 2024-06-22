<?php

namespace App\Filament\SiaAdmin\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Siswa;
use App\Models\UserRole;
use Filament\Forms\Form;
use App\Models\AdminGuru;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\SiaAdmin\Resources\UserResource\Pages;
use Filament\Tables\Actions\ActionGroup as ActionsActionGroup;
use App\Filament\SiaAdmin\Resources\UserResource\Pages\EditUser;
use App\Filament\SiaAdmin\Resources\UserResource\Pages\ListUsers;
use App\Filament\SiaAdmin\Resources\UserResource\Pages\CreateUser;
use App\Filament\SiaAdmin\Resources\UserResource\RelationManagers;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Data Admin & Guru';

    protected static ?int $navigationSort = 0;

    public static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nik')
                        ->label('NIK')
                        ->required()
                        ->numeric(),
                    TextInput::make('nama_lengkap')
                        ->label('Nama Lengkap')
                        ->required()
                        ->autocapitalize('words'),
                    TextInput::make('email')
                        ->required(),
                    TextInput::make('password')
                        ->required()
                        ->password()
                        ->revealable(),
                    Select::make('role_id')->required()
                        ->label('Role')
                        ->options(
                            UserRole::all()->pluck('nama', 'id')->toArray()
                        ),
                    Toggle::make('status')
                        ->onColor('success')
                        ->offColor('danger')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->query(User::active())  // Gunakan scopeActive di sini
            ->columns([
                TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable(),
                TextColumn::make('nama_lengkap')
                ->label('Nama Lengkap')
                ->searchable()
                ->getStateUsing(function ($record) {
                    return ucwords($record->nama_lengkap);
                }),
                TextColumn::make('email'),
                TextColumn::make('role_id')
                    ->label('Role')
                    ->getStateUsing(function (User $userRoleNama) {
                        return ucwords($userRoleNama->usersRole->nama);
                    })
                    ->searchable()
                    ->sortable(),
                IconColumn::make('status')
                    ->label('Status Akun')
                    ->boolean()
                    ->sortable()
            ])
            ->filters([
                // SelectFilter::make('role_id')
                //     ->label('Role')
                //     ->options(
                //         UserRole::all()->pluck('nama', 'id')->toArray()
                //     ),
                SelectFilter::make('status')
                    ->label('Status Akun')
                    ->options([
                        1 => 'Aktif',
                        0 => 'Tidak Aktif'
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                ActionsActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            "NIK" => $record->nik
        ];
    }
}
