<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Post Image')->disk('public')->directory('posts')->rounded(),
                TextColumn::make('title')->label('Post Title')->sortable()->searchable(),
                TextColumn::make('slug')->label('Post Slug')->sortable()->searchable(),
                TextColumn::make('category.name')->label('Category')->sortable()->searchable(),
                ColorColumn::make('color')->label('Post Color')->sortable(),
                TextColumn::make('body')->label('Post Body')->limit(50)->sortable()->searchable(),
                TextColumn::make('tags')->label('Post Tags')->sortable()->searchable(),
                IconColumn::make('published')->label('Published')->sortable(),
                TextColumn::make('published_at')->label('Published At')->date()->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
