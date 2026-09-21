<?php

namespace App\Http\Controllers;

use App\Models\ItemPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class ItemPenjualanController extends Controller
{
    public function show()
    {
        return back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produk,id',
            'quantity' => 'required|integer|min:1'
        ]);

        try {
            DB::transaction(function () use ($request) {
                $sale = Penjualan::where('user_id', Auth::id())
                    ->where('status', 'OPEN')
                    ->firstOrFail();

                $product = Produk::lockForUpdate()->findOrFail($request->product_id);

                if ($product->stok < $request->quantity) {
                    throw new Exception('Stok produk tidak mencukupi');
                }

                $product->decrement('stok', $request->quantity);

                $item = ItemPenjualan::where('penjualan_id', $sale->id)
                    ->where('produk_id', $product->id)
                    ->lockForUpdate()
                    ->first();

                if ($item) {
                    $item->kuantitas += $request->quantity;
                } else {
                    $item = new ItemPenjualan([
                        'penjualan_id' => $sale->id,
                        'produk_id'    => $product->id,
                        'kuantitas'    => $request->quantity,
                        'harga_satuan' => $product->harga_jual,
                    ]);
                }

                $item->subtotal = $item->kuantitas * $item->harga_satuan;
                $item->save();

                $sale->total_pembayaran = $sale->itemPenjualan()->sum('subtotal') ?? 0;
                $sale->save();
            });
        } catch (Exception $e) {
            return back()->with('errors', $e->getMessage());
        }

        return back();
    }

    public function update(Request $request, ItemPenjualan $itempenjualan)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        try {
            DB::transaction(function () use ($request, $itempenjualan) {
                $produk = $itempenjualan->produk()->lockForUpdate()->first();

                if (!$produk) {
                    throw new Exception('Data produk tidak ditemukan');
                }

                $selisih = $request->quantity - $itempenjualan->kuantitas;

                if ($selisih > 0) {
                    if ($produk->stok < $selisih) {
                        throw new Exception('Stok tidak mencukupi');
                    }
                    $produk->decrement('stok', $selisih);
                }

                if ($selisih < 0) {
                    $produk->increment('stok', abs($selisih));
                }

                $itempenjualan->update([
                    'kuantitas' => $request->quantity,
                    'subtotal'  => $request->quantity * $itempenjualan->harga_satuan
                ]);

                if ($itempenjualan->penjualan) {
                    $itempenjualan->penjualan->update([
                        'total_pembayaran' => $itempenjualan->penjualan->itemPenjualan()->sum('subtotal') ?? 0
                    ]);
                }
            });
        } catch (Exception $e) {
            return back()->with('errors', $e->getMessage());
        }

        return back();
    }

    public function destroy(ItemPenjualan $itempenjualan)
    {
        $this->authorize('delete', $itempenjualan);

        DB::transaction(function () use ($itempenjualan) {
            $produk = $itempenjualan->produk;
            $sale = $itempenjualan->penjualan;

            if ($produk) {
                $produk->increment('stok', $itempenjualan->kuantitas);
            }

            $itempenjualan->delete();

            if ($sale) {
                $sale->update([
                    'total_pembayaran' => $sale->itemPenjualan()->sum('subtotal') ?? 0
                ]);
            }
        });

        return back();
    }
}