<?php

namespace App\Filament\Resources\Laporans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class LaporanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('nama_pelapor')
                    ->label('Nama Pelapor')
                    ->required(),

                TextInput::make('judul')
                    ->label('Judul Laporan')
                    ->required(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi Kerusakan')
                    ->required()
                    ->columnSpanFull(),

                Select::make('tipe_kerusakan')
                    ->label('Jenis Kerusakan')
                    ->options([
                        'retak_buaya' => 'Retak Buaya',
                        'retak_tepi' => 'Retak Tepi',
                        'retak_memanjang' => 'Retak Memanjang',
                        'retak_melintang' => 'Retak Melintang',
                        'lubang' => 'Lubang',
                        'tambalan' => 'Tambalan',
                        'alur' => 'Alur',
                    ])
                    ->required(),

                TextInput::make('wilayah')
                    ->label('Wilayah')
                    ->required(),

                TextInput::make('latitude')
                    ->label('Latitude')
                    ->numeric(),

                TextInput::make('longitude')
                    ->label('Longitude')
                    ->numeric(),

                // Upload foto kerusakan jalan
                FileUpload::make('foto')
                    ->label('Foto Kerusakan Jalan')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('laporan')
                    ->visibility('public')
                    ->maxSize(5120),

                Select::make('status')
                    ->label('Status Laporan')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('menunggu')
                    ->required(),

            ]);
    }
}