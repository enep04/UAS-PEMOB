<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PaintingResource\Pages;
use App\Models\Painting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PaintingResource extends Resource
{
    // Model yang digunakan
    protected static ?string $model = Painting::class;

    // Ikon untuk resource ini
    protected static ?string $navigationIcon = 'heroicon-o-folder';

    // Label untuk navigasi
    protected static ?string $navigationLabel = 'Paintings';

    // Grup navigasi
    protected static ?string $navigationGroup = 'Gallery';

    // Judul untuk setiap record
    protected static ?string $recordTitleAttribute = 'title';

    // Urutan navigasi
    protected static ?int $navigationSort = 1;

    // Badge navigasi untuk menghitung total data
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // Schema form
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->label('Painting Title'),
            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->nullable(),
            Forms\Components\TextInput::make('price')
                ->required()
                ->numeric()
                ->label('Price'),
            Forms\Components\FileUpload::make('image')
                ->label('Image')
                ->directory('paintings')
                ->image()
                ->required(),
        ]);
    }

    // Schema tabel
    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('title')
                ->sortable()
                ->searchable()
                ->label('Painting Title'),
            Tables\Columns\TextColumn::make('price')
                ->sortable()
                ->label('Price')
                ->money('IDR'),
            Tables\Columns\ImageColumn::make('image')
                ->label('Image')
                ->sortable()
                ->url(fn ($record) => asset('storage/' . $record->image)),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->date()
                ->sortable(),
        ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    // Relasi (kosong jika tidak ada)
    public static function getRelations(): array
    {
        return [];
    }

    // Halaman yang digunakan
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPainting::route('/'),
            'create' => Pages\CreatePainting::route('/create'),
            'edit' => Pages\EditPainting::route('/{record}/edit'),
        ];
    }
}
