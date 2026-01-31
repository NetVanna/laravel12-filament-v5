<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Post Title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Post Slug')
                    ->required()
                    ->maxLength(255),
                Select::make('category_id')
                    ->label('Category')
                    ->options(function () {
                        return \App\Models\Category::all()->pluck('name', 'id')->toArray();
                    })
                    ->required(),
                ColorPicker::make('color')
                    ->label('Post Color')
                    ->required(),
                MarkdownEditor::make('body')
                    ->label('Post Body')
                    ->required(),
                FileUpload::make('image')
                    ->label('Post Image')
                    ->image()->disk('public')->directory('posts')
                    ->required(),
                TagsInput::make('tags')
                    ->label('Post Tags')
                    ->required(),
                Checkbox::make('published')
                    ->label('Published')
                    ->default(false),
                DatePicker::make('published_at')
                    ->label('Published At')
                    ->nullable(),
            ]);
    }
}
