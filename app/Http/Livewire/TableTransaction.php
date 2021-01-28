<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AccountController;
use App\Models\Account;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableTransaction extends Component
{

    public $user;
    public $account;

    public function mount($user)
    {
        $this->user = $user;
    }


    public function render()
    {

        $transactions = DB::table('transactions as t')
            ->join('accounts as a', 'a.id', '=', 't.account_id')
            ->join('wallets as w', 'w.id', '=', 't.wallet_id')
            ->join('badges as b', 'b.id', '=', 't.badge_id')
            ->leftjoin('wallets as wo', 'wo.id', '=', 't.wallet_origin')
            ->where('a.user_id', '=', $this->user->id)
            ->select(['t.date', 't.description', 't.title', 't.type', 't.modality', 't.amount', 'w.name as wallet_name', 'wo.name as wallet_origin_name', 'w.description as wallet_desc', 'b.shot_name', 'b.name as badge_name', 'b.description as badge_description', 'b.symbol as badge_symbol'])
            ->orderBy('t.date', 'desc')
            ->get();

        foreach ($transactions as $t) {
            $timestamp = Carbon::create($t->date);

            $t->date = $timestamp->format('d/m/Y');
            $t->time = $timestamp->format('h:i');
        }

        return view('private.livewire.table-transaction', [
            'transactions' => $transactions,
        ]);
    }
}
