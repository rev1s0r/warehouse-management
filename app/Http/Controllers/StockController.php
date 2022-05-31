<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $products = Stock::all();

        return view(('index'),compact('products'));
    }

    public function addStock(StoreStockRequest $request)
    {
        if (Stock::where('id', '=', $request->input('id'))->exists()) {
            return redirect('/')->with('message' ,'duplicate id, use Edit button to add stock for id'
                . $request->input('id'));
        }

        Stock::create([
            'id' => $request->input('id'),
            'current_stock' => $request->input('current_stock'),
            'unit_price' => $request->input('unit_price'),
        ]);

        return redirect('/')->with('message' ,'Stock added');
    }

    public function updateStock(Request $request, $id)
    {

        $currentItem        = Stock::where('id', $id);
        $stockQtyEdit       = $request->input('stock');
        $action             = request()->input('action', 'add') == 'add' ? 'add' : 'remove';

        if($action == 'add') {
            $currentItem->increment( 'current_stock', $stockQtyEdit);
        }

        if($action == 'remove') {
            If($currentItem->value('current_stock') < $stockQtyEdit)
            {
                return redirect()->back()->with('message' ,'Not enough stock to subtract.');
            }

            $currentItem->decrement( 'current_stock', $stockQtyEdit);
        }

        return redirect('/')->with('message' ,'Stock with id ' . $id . ' was updated.');
    }
}
