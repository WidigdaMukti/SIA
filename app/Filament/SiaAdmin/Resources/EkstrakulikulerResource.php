<?php

namespace App\Filament\SiaAdmin\Resources;

use App\Filament\SiaAdmin\Resources\EkstrakulikulerResource\Pages;
use App\Filament\SiaAdmin\Resources\EkstrakulikulerResource\RelationManagers;
use App\Models\Ekstrakulikuler;
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

class EkstrakulikulerResource extends Resource
{
    protected static ?string $model = Ekstrakulikuler::class;

    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';

    protected static ?string $navigationGroup = 'Kelola Website';

    public static ?string $recordTitleAttribute = 'nama';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    FileUpload::make('thumbnail')
                        ->label('Thumbnail Gambar')
                        ->preserveFilenames()
                        ->image()
                        ->imageEditor()
                        ->disk('public')
                        ->directory('img/ekskul'),
                    TextInput::make('nama'),
                    TextInput::make('slug'),
                    MarkdownEditor::make('content')
                        ->label('Content')
                        ->fileAttachmentsDisk('public')
                        ->fileAttachmentsDirectory('img/ekskul'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail Gambar'),
                TextColumn::make('nama'),
                TextColumn::make('slug'),
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
            'index' => Pages\ListEkstrakulikulers::route('/'),
            'create' => Pages\CreateEkstrakulikuler::route('/create'),
            'edit' => Pages\EditEkstrakulikuler::route('/{record}/edit'),
        ];
    }
}
