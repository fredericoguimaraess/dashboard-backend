<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtivosTableSeeder extends Seeder
{
    public function run()
    {
        $ativos = [
            [
                'ticket' => 'Tesouro Selic 2026 (LFT)',
                'data_compra' => '2022-01-15',
                'quantidade' => 150,
                'cotacao' => 56.93,
                'tipo' => 'Renda Fixa',
            ],
            [
                'ticket' => 'AGRO3 - BRASILAGRO',
                'data_compra' => '2022-02-10',
                'quantidade' => 150,
                'cotacao' => 3.23,
                'tipo' => 'Ação',
            ],
            [
                'ticket' => 'Bitcoin',
                'data_compra' => '2022-03-05',
                'quantidade' => 2,
                'cotacao' => 120000.00,
                'tipo' => 'Cripto',
            ],
            [
                'ticket' => 'VISC11 - FII VINCI SC',
                'data_compra' => '2022-04-01',
                'quantidade' => 150,
                'cotacao' => 3.03,
                'tipo' => 'Fundo',
            ],
            [
                'ticket' => 'Tesouro Prefixado 2025',
                'data_compra' => '2022-05-15',
                'quantidade' => 100,
                'cotacao' => 45.50,
                'tipo' => 'Renda Fixa',
            ],
            [
                'ticket' => 'VALE3 - Vale S.A.',
                'data_compra' => '2022-06-10',
                'quantidade' => 80,
                'cotacao' => 75.00,
                'tipo' => 'Ação',
            ],
            [
                'ticket' => 'Ethereum',
                'data_compra' => '2022-07-20',
                'quantidade' => 5,
                'cotacao' => 8000.00,
                'tipo' => 'Cripto',
            ],
            [
                'ticket' => 'HGLG11 - FII HG Log',
                'data_compra' => '2022-08-12',
                'quantidade' => 200,
                'cotacao' => 10.50,
                'tipo' => 'Fundo',
            ],
            [
                'ticket' => 'Tesouro IPCA+ 2035',
                'data_compra' => '2022-09-01',
                'quantidade' => 120,
                'cotacao' => 70.20,
                'tipo' => 'Renda Fixa',
            ],
            [
                'ticket' => 'ITUB4 - Itaú Unibanco',
                'data_compra' => '2022-10-05',
                'quantidade' => 150,
                'cotacao' => 42.15,
                'tipo' => 'Ação',
            ],
            [
                'ticket' => 'Ripple',
                'data_compra' => '2022-11-11',
                'quantidade' => 1000,
                'cotacao' => 1.20,
                'tipo' => 'Cripto',
            ],
            [
                'ticket' => 'XPML11 - FII XP Malls',
                'data_compra' => '2022-12-25',
                'quantidade' => 180,
                'cotacao' => 11.00,
                'tipo' => 'Fundo',
            ],
            [
                'ticket' => 'Tesouro Selic 2027 (LFT)',
                'data_compra' => '2023-01-15',
                'quantidade' => 200,
                'cotacao' => 58.50,
                'tipo' => 'Renda Fixa',
            ],
            [
                'ticket' => 'MGLU3 - Magazine Luiza',
                'data_compra' => '2023-02-10',
                'quantidade' => 120,
                'cotacao' => 25.30,
                'tipo' => 'Ação',
            ],
            [
                'ticket' => 'Litecoin',
                'data_compra' => '2023-03-05',
                'quantidade' => 10,
                'cotacao' => 300.00,
                'tipo' => 'Cripto',
            ],
            [
                'ticket' => 'HGRU11 - FII CSHG Renda Urbana',
                'data_compra' => '2023-04-01',
                'quantidade' => 150,
                'cotacao' => 12.75,
                'tipo' => 'Fundo',
            ],
        ];

        foreach ($ativos as $ativo) {
            DB::table('ativos')->insert($ativo);
        }
    }
}
