<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Badge;
use App\Models\Transaction as TransactionModel;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Transaction extends Component
{
    public $user;
    public $account;
    public $transactions;
    public TransactionModel $transaction;
    public Wallet $wallet;
    public Badge $badge;
    protected $rules = [
        'transaction.title' => 'required|string',
        'transaction.date' => 'required|date',
        'transaction.description' => '',
        'transaction.wallet_id' => 'required|exists:wallets,id',
        'transaction.badge_id' => 'required|exists:badges,id',
        'transaction.type' => 'required',
        'transaction.modality' => 'required',
        'transaction.amount' => 'required|numeric',
    ];

    public function mount(User $user, TransactionModel $transaction, Wallet $wallet, Badge $badge)
    {
        $this->user = $user;
        $this->transaction = $transaction;
        $this->wallet = $wallet;
        $this->badge = $badge;
    }


    public function render()
    {
        $wallets = DB::table('wallets as w')
            ->join('accounts as a', 'a.id', '=', 'w.account_id')
            ->join('users as u', 'u.id', '=', 'a.user_id')
            ->where('u.id', $this->user->id)
            ->select('w.id as value', 'w.name', 'w.description')
            ->get();

        $badges = Badge::all('id as value', 'name', 'shot_name', 'symbol');

        $this->transactions = DB::table('transactions as t')
            ->join('accounts as a', 'a.id', '=', 't.account_id')
            ->join('wallets as w', 'w.id', '=', 't.wallet_id')
            ->join('badges as b', 'b.id', '=', 't.badge_id')
            ->leftjoin('wallets as wo', 'wo.id', '=', 't.wallet_origin')
            ->where('a.user_id', '=', $this->user->id)
            ->select(['t.date', 't.description', 't.title', 't.type', 't.modality', 't.amount', 'w.name as wallet_name', 'wo.name as wallet_origin_name', 'w.description as wallet_desc', 'b.shot_name', 'b.name as badge_name', 'b.description as badge_description', 'b.symbol as badge_symbol'])
            ->orderBy('t.date', 'desc')
            ->get();


        foreach ($this->transactions as $t) {
            $timestamp = Carbon::create($t->date);

            $t->date = $timestamp->format('d/m/Y');
            $t->time = $timestamp->format('h:i');
        }

        return view('private.livewire.transaction', [
            'wallets' => $wallets,
            'badges' => $badges,
        ]);
    }

    public function save()
    {
        $this->transaction->account_id = Account::where('user_id', $this->user->id)->first('id')->id;
        $this->validate();
        $this->transaction->save();
        $this->clear();
        session()->flash('message', '¡Transacción registrada!');
    }

    public function clear()
    {
        $this->transaction->date = "";
        $this->transaction->title = "";
        $this->transaction->description = "";
        $this->transaction->wallet_id = "";
        $this->transaction->badge_id = "";
        $this->transaction->type = "";
        $this->transaction->modality = "";
        $this->transaction->amount = "";
    }
}
