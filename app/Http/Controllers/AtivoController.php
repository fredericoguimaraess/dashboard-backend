<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ativo;
use App\Models\Movimentacao;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AtivoController extends Controller
{
    public function index()
    {
        return Ativo::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'ticket' => 'required|string|max:255',
            'data_compra' => 'date',
            'quantidade' => 'required|integer',
            'cotacao' => 'required|numeric',
            'tipo' => 'required|string|max:255',
        ]);

        $ativo = Ativo::create($request->all());
        return response()->json($ativo, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ticket' => 'required|string|max:255',
            'data_compra' => 'date',
            'quantidade' => 'required|integer',
            'cotacao' => 'required|numeric',
            'tipo' => 'required|string|max:255',
        ]);

        $ativo = Ativo::findOrFail($id);
        $ativo->update($request->all());

        return response()->json($ativo, 200);
    }

    public function destroy($id)
    {
        $ativo = Ativo::find($id);
        if ($ativo) {
            $ativo->delete();
            return response()->json(['message' => 'Ativo deletado com sucesso!']);
        } else {
            return response()->json(['message' => 'Ativo não encontrado!'], 404);
        }
    }

    public function storeCompra(Request $request)
    {
        $ativo = Ativo::where('ticket', $request->input('ticket'))->first();

        $novaQuantidadeTotal = $ativo->quantidade + $request->input('quantidade');
        $novaCotacaoMedia = (($ativo->quantidade * $ativo->cotacao) + ($request->input('quantidade') * $request->input('cotacao'))) / $novaQuantidadeTotal;

        $ativo->quantidade = $novaQuantidadeTotal;
        $ativo->cotacao = $novaCotacaoMedia;
        $ativo->data_compra = $request->input('data_compra');
        $ativo->save();

        $movimentacao = new Movimentacao();
        $movimentacao->ativo_id = $ativo->id;
        $movimentacao->data = $request->input('data_compra');
        $movimentacao->quantidade = $request->input('quantidade');
        $movimentacao->tipo = 'Compra';
        $movimentacao->save();

        return response()->json($ativo, 201);
    }

    public function storeVenda(Request $request)
    {
        $ativo = Ativo::where('ticket', $request->input('ticket'))->first();

        if ($ativo->quantidade < $request->input('quantidade')) {
            return response()->json(['error' => 'Quantidade insuficiente'], 400);
        }

        $ativo->quantidade -= $request->input('quantidade');
        $ativo->data_venda = $request->input('data_venda');
        $ativo->cotacao = $request->input('cotacao');
        $ativo->save();

        $movimentacao = new Movimentacao();
        $movimentacao->ativo_id = $ativo->id;
        $movimentacao->data = $request->input('data_venda');
        $movimentacao->quantidade = $request->input('quantidade');
        $movimentacao->tipo = 'Venda';
        $movimentacao->save();

        return response()->json($ativo, 201);
    }


    public function getMovimentacoes()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $movimentacoes = Movimentacao::select('tipo', DB::raw('SUM(quantidade) as total_quantidade'))
            ->whereMonth('data', $currentMonth)
            ->whereYear('data', $currentYear)
            ->groupBy('tipo')
            ->get();

        return response()->json($movimentacoes);
    }
}
