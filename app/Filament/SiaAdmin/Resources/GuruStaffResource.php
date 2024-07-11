<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\GuruStaffResource\Pages;
use App\Filament\SiaAdmin\Resources\GuruStaffResource\RelationManagers;
use App\Models\GuruStaff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuruStaffResource extends Resource
{
    protected static ?string $model = GuruStaff::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Kelola Website';

    protected static ?int $navigationSort = 5;

    protected static ?string $label = 'Foto Guru & Staf';

    public static ?string $recordTitleAttribute = 'nama';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    FileUpload::make('foto')
                        ->label('Foto Guru')
                        ->preserveFilenames()
                        ->image()
                        ->imageEditor()
                        ->disk('public')
                        ->directory('img/gurustaf')
                        ->required(),
                    TextInput::make('nama')
                        ->required(),
                    TextInput::make('jabatan')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto Guru'),
                TextColumn::make('nama'),
                TextColumn::make('jabatan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListGuruStaff::route('/'),
            'create' => Pages\CreateGuruStaff::route('/create'),
            'edit' => Pages\EditGuruStaff::route('/{record}/edit'),
        ];
    }
}
