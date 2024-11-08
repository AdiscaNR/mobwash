<?php

namespace App\Http\Controllers\Transaction;

use App\Models\PaymentType;
use App\Models\Client;
use App\Models\Crew;
use App\Models\Transaction;
use App\Models\TransactionCrew;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index() {

    }

    public function create() {
        $data['crew'] = Crew::all();

        return view('pages.transaction.create', $data);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'client_name' => 'required|string',
            'client_address' => 'required',
            'client_phone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $client = Client::create([
                'name' => $request->client_name,
                'address' => $request->client_address,
                'phone' => $request->client_phone,
            ]);

            $tx = Transaction::create([
                'client_id' => $client->id,
                'date' => $request->date,
                'created_user' => Auth::user()->id
            ]);

            foreach ($request->crew as $key => $c) {
                TransactionCrew::create([
                    'tx_id' => $tx->id,
                    'crew_id' => $c,
                ]);
            }

            DB::commit();
            return Redirect::to('/trx/' . $tx->id);
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();

            return redirect()->back()->withErrors($validator)->withInput(); 
        }
    }

    public function view(string $id) {
        $data['id'] = $id;
        return view('pages.transaction.view', $data);
    }

    public function edit(string $id) {
        return view('pages.transaction.edit');
    }

    public function update(Request $request, string $id) {

    }

    public function destroy(string $id) {

    }

    public function order(string $trx) {
        $data['tx'] = Transaction::findOrFail($trx);
        $data['crews'] = TransactionCrew::where('tx_id', $data['tx']->id)->get();
        $data['payments'] = PaymentType::all();
        return view('pages.transaction.order', $data);
    }
}
