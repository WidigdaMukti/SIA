<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\GaleriResource\Pages;
use App\Filament\SiaAdmin\Resources\GaleriResource\RelationManagers;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Kelola Website';

    public static ?string $recordTitleAttribute = 'judul';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    FileUpload::make('thumbnail')
                        ->label('Thumbnail')
                        ->preserveFilenames()
                        ->image()
                        ->imageEditor()
                        ->disk('public')
                        ->directory('img/galeri'),
                    TextInput::make('judul'),
                    FileUpload::make('gambar')
                        ->label('Gambar')
                        ->multiple()
                        ->preserveFilenames()
                        ->image()
                        ->imageEditor()
                        ->disk('public')
                        ->directory('img/galeri'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail Gambar'),
                TextColumn::make('judul'),
                TextColumn::make('jumlah_gambar')->label('Jumlah Gambar'),
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
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}
