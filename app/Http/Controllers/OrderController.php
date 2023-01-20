<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Curs;
use Illuminate\Http\Request;
use App\Helpers\RateHelperUsd;
use App\Helpers\RateHelperYuan;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $orders = Order::join('curs as curs', 'curs.id', '=', 'orders.curs_id','left')
              		->join('curs as curs_a', 'curs_a.id', '=', 'orders.curs_id_a','left')
                    ->orderBy('orders.created_at', 'DESC')
              		->get(['orders.*','curs.mata_uang as mata_uang_1','curs_a.mata_uang as mata_uang_2']);
       
         $curs = Curs::orderBy('id', 'desc')->get();

        $data = session()->get('role');

        return view('dashboard.orders.index', [
            'role' => $data,
        ], compact('orders','curs'));
    }

    public function getmatauang(Request $request)
    {

        $curs = Curs::orderBy('id', 'desc')->paginate(5);

        return view('dashboard.kurs.index', compact('curs'));
    }


    public function search(Request $request)
    {
        RateHelperUsd::rate(false, 'USD');
        RateHelperYuan::rate(false, 'CNY');

        $rate_usd = Cache::get('rate_usd');
        $rate_yuan = Cache::get('rate_yuan');
        $search = $request->search;

        $data = session()->get('role');

        $orders = Order::where('marketing', 'LIKE', '%' . $search . '%')
            ->get();

        return view('dashboard.orders.index', [
            'role' => $data,
            'rate_usd' => (int) $rate_usd,
            'rate_yuan' => (int) $rate_yuan,
        ], compact('orders'));
    }

    public function create()
    {
        $curs = Curs::orderBy('id', 'desc')->get();
        return view('dashboard.orders.create', compact('curs'));
    }
    public function store5(Request $request)
    {
        $validatedData = $request->validate([
            'marketing' => 'required',
            'marking' => 'required',
            'item' => 'required',
            'size' => 'required',
            'qty' => 'required',
            'harga_custom' => 'required',
            'harga_kapal' => 'required',
            'harga_gudang' => 'required',
            'total' => 'required',
            'asal' => 'required',
            'port' => 'required',
            'total_invoice_rmb' => 'required',
            // 'keterangan' => 'required',
        ]);
        Order::create($validatedData);
        return redirect()->route('orders.index')->with([
            'success' => 'Date successfully saved'
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'marketing' => 'required',
            'marking' => 'required',
            'item' => 'required',
            'size' => 'required',
            'qty' => 'required',
            'harga_custom' => 'required',
            'harga_kapal' => 'required',
            'harga_gudang' => 'required',
            // 'total' => 'required',
            'asal' => 'required',
            'port' => 'required',
            'kurs' => 'required',
            'total_invoice_rmb' => 'required',
            // 'rate_kurs' => 'required',
            'keterangan' => 'required',
        ]);
        Order::create([
            'title' => $request->title,
            'marketing' => $request->marketing,
            'marking' => $request->marking,
            'item' => $request->item,
            'size' => $request->size,
            'qty' => $request->qty,
            'harga_custom' => str_replace(",", "", $request->harga_custom),
            'harga_kapal' => str_replace(",", "", $request->harga_kapal),
            'harga_gudang' => str_replace(",", "", $request->harga_gudang),
            'total' => str_replace(",", "", $request->total),
            'asal' => $request->asal,
            'port' => $request->port,
            'curs_id' => $request->kurs,
            'total_invoice_rmb' => str_replace(",", "", $request->total_invoice_rmb),
            'rate_kurs' => str_replace(",", "", $request->rate_kurs),
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('orders.index')->with('success', 'Date Created Successfully!');
    }

    public function show(Order $order)
    {
        return view('dashboard.orders.show', compact('orders'));
    }

    public function edit(Request $request, $id)
    {
        $order = Order::find($id);
        $curs = Curs::orderBy('id', 'desc')->get();
        
        // $curs = Curs::orderBy('id', 'desc')->paginate(5);

        return view('dashboard.orders.edit', compact('order', 'curs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'marketing' => 'required',
            'marking' => 'required',
            'item' => 'required',
            'size' => 'required',
            'qty' => 'required',
            'harga_custom' => 'required',
            'harga_kapal' => 'required',
            'harga_gudang' => 'required',
            'total' => 'required',
            'asal' => 'required',
            'port' => 'required',
            'kurs' => 'required',
            // 'harga_kurs' => 'required',
            'total_invoice_rmb' => 'required',
            'rate_kurs' => 'required',
            'keterangan' => 'required',
        ]);
        $order = Order::findOrFail($id);
        $order->update([
            'title' => $request->title,
            'marketing' => $request->marketing,
            'marking' => $request->marking,
            'item' => $request->item,
            'size' => $request->size,
            'qty' => $request->qty,
            'harga_custom' => str_replace(",", "", $request->harga_custom),
            'harga_kapal' => str_replace(",", "", $request->harga_kapal),
            'harga_gudang' => str_replace(",", "", $request->harga_gudang),
            'total' => str_replace(",", "", $request->total),
            'asal' => $request->asal,
            'port' => $request->port,
            'curs_id' => $request->kurs,
            // 'harga_kurs' => str_replace(",","",$request->harga_kurs),
            'total_invoice_rmb' => str_replace(",", "", $request->total_invoice_rmb),
            'rate_kurs' => str_replace(",", "", $request->rate_kurs),
            'keterangan' => $request->keterangan,

        ]);

        if ($order) {
            return redirect()
                ->route('orders.index')
                ->with([
                    'success' => 'Date has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function viewFileUpload(Request $request, $id)
    {
        $order = Order::find($id);

        return view('dashboard.orders.upload', compact('order'));
    }

    public function fileUpload(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,xlsx|max:2048'
        ]);
        $order = Order::findOrFail($id);

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $finalPath = $request->file('file')->storeAs('packingList', $fileName, 'public');
            $order->file = '/storage/' . $finalPath;
            $order->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }

    public function viewApprove(Request $request, $id)
    {
        $order = Order::find($id);
        return view('dashboard.orders.approve', compact('order'));
    }

    public function approve(Request $request, $id)
    {
        $this->validate($request, [
            'kurs_a' => 'required',
            // 'harga_kurs_a' => 'required',
            'approve' => 'required',
            // 'keterangan' => 'required'
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'kurs_a' => $request->kurs_a,
            'curs_id_a' => $request->kurs_a,
            'approve' => str_replace(",", "", $request->approve),
            'rate_kurs_a' => str_replace(",", "", $request->rate_kurs_a),
            'keterangan_approve' => $request->keterangan,
        ]);
        return redirect()->route('orders.index')->with([
            'success' => 'Approve dan Keterangan Price successfully saved'
        ]);
    }

    public function viewFinalUpload(Request $request, $id)
    {
        $order = Order::find($id);
        return view('dashboard.orders.final', compact('order'));
    }

    public function finalUpload(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|mimes:doc,txt,xlx,xls,xlsx|max:2048'
        ]);
        $order = Order::findOrFail($id);
        if ($request->file()) {
            $finalName = time() . '_' . $request->file->getClientOriginalName();
            $finalPath = $request->file('file')->storeAs('finalPackingList', $finalName, 'public');
            $order->final = '/storage/' . $finalPath;
            $order->save();
            return back()
                ->with('success', 'Upload Final has been uploaded.')
                ->with('file', $finalName);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'some problem has ocuured, please try again'
                ]);
        }
    }

    public function viewCont(Request $request, $id)
    {
        $order = Order::find($id);
        return view('dashboard.orders.cont', compact('order'));
    }

    public function cont(Request $request, $id)
    {
        $this->validate($request, [
            // 'no_bl' => 'required',
            // 'no_cont' => 'required',
        ]);
        $order = Order::findOrFail($id);

        $order->update([
            'no_bl' => $request->no_bl,
            'no_cont' => $request->no_cont,
        ]);
        return redirect()->route('orders.index')->with([
            'success' => 'No Container & No BL successfully saved'
        ]);
    }
};
