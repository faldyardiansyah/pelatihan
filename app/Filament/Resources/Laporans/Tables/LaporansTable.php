<?php

namespace App\Filament\Resources\Laporans\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class LaporansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->square(),

                TextColumn::make('nama_pelapor')
                    ->label('Nama Pelapor')
                    ->searchable(),

                TextColumn::make('judul')
                    ->label('Judul Laporan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tipe_kerusakan')
                    ->label('Jenis Kerusakan'),

                TextColumn::make('wilayah')
                    ->label('Wilayah'),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'menunggu' => 'gray',
                        'diproses' => 'warning',
                        'selesai' => 'success',
                        'ditolak' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d M Y, H:i'),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Ubah'),

                DeleteAction::make()
                    ->label('Hapus'),
            ]);
    }
}