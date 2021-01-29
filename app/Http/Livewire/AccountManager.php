<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Account;
use App\Models\Badge;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AccountManager extends Component
{
    public $user;
    public $account;
    public $counter = 0;
    public $transactions;
    public $balances = ['wallets', 'badges'];

    public Transaction $transaction;
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

    public function mount(User $user, Transaction $transaction, Wallet $wallet, Badge $badge)
    {
        $this->user = $user;
        $this->transaction = $transaction;
        $this->wallet = $wallet;
        $this->badge = $badge;
    }


    public function render()
    {
        $wallets = DB::table('wallets AS w')
            ->join('accounts AS a', 'a.id', '=', 'w.account_id')
            ->join('users AS u', 'u.id', '=', 'a.user_id')
            ->where('u.id', $this->user->id)
            ->select('w.id AS value', 'w.name', 'w.description')
            ->get();

        $badges = Badge::all('id AS value', 'name', 'shot_name', 'symbol');

        $this->transactions = DB::table('transactions AS t')
            ->join('accounts AS a', 'a.id', '=', 't.account_id')
            ->join('wallets AS w', 'w.id', '=', 't.wallet_id')
            ->join('badges AS b', 'b.id', '=', 't.badge_id')
            ->leftjoin('wallets AS wo', 'wo.id', '=', 't.wallet_origin')
            ->where('a.user_id', '=', $this->user->id)
            ->select(['t.date', 't.description', 't.title', 't.type', 't.modality', 't.amount', 'w.name AS wallet_name', 'wo.name as wallet_origin_name', 'w.description as wallet_desc', 'b.shot_name', 'b.name as badge_name', 'b.description as badge_description', 'b.symbol as badge_symbol'])
            ->orderBy('t.date', 'desc')
            ->get();

        foreach ($this->transactions as $t) {
            $timestamp = Carbon::create($t->date);
            $t->date = $timestamp->format('d/m/Y');
            $t->time = $timestamp->format('h:i');
        }

        $this->balances['wallets'] = DB::table('transactions AS t')
            ->join('accounts AS a', 'a.id', '=', 't.account_id')
            ->join('wallets AS w', 'w.id', '=', 't.wallet_id')
            ->join('badges AS b', 'b.id', '=', 't.badge_id')
            ->where('a.user_id', '=', $this->user->id)
            ->groupBy(['w.id', 't.type'])
            ->selectRaw('SUM(amount) AS total, w.name, t.type')
            ->orderBy('b.name')
            ->get();

        $this->balances['badges'] = DB::table('transactions AS t')
            ->join('accounts AS a', 'a.id', '=', 't.account_id')
            ->join('wallets AS w', 'w.id', '=', 't.wallet_id')
            ->join('badges AS b', 'b.id', '=', 't.badge_id')
            ->where('a.user_id', '=', $this->user->id)
            ->groupBy(['b.id', 't.type'])
            ->selectRaw('SUM(amount) AS total, b.name as, t.type')
            ->orderBy('b.name')
            ->get();

        return view('private.livewire.account-manager', [
            'wallets' => $wallets,
            'badges' => $badges
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

    public function flasheame()
    {
        if ($this->counter == 3) {
            session()->flash('info', '¡Deja de romper las bolas!');
            $this->counter = 0;
        } else {
            $this->counter++;
            session()->flash('warning', '¡Que queres!');
        }
    }
}
