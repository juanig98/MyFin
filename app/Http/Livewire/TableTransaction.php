<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AccountController;
use App\Models\Account;
use App\Models\Transaction;
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
            ->join('wallets as w', 'w.account_id', '=', 'a.id')
            ->join('badges as b', 'b.id', '=', 't.badge_id')
            ->where('a.user_id', '=', $this->user->id)
            ->select(['t.date', 't.description', 't.title', 't.type', 't.modality', 't.amount', 'w.name as waller_name', 'w.description as waller_desc', 'b.shot_name', 'b.name as badge_name', 'b.description as badge_description', 'b.symbol as badge_symbol'])
            ->get();

        return view('private.livewire.table-transaction', [
            'transactions' => $transactions,
        ]);
    }
}
