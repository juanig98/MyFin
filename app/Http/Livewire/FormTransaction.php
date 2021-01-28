<?php

namespace App\Http\Livewire;

use App\Models\Badge;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FormTransaction extends Component
{

    public Transaction $transaction;

    protected $rules = [
        'transaction.title' => 'required|string',
        'transaction.date' => 'required|date',
        'transaction.wallet_id' => 'required|exists:wallets,id',
        'transaction.badge_id' => 'required|exists:badges,id',
        'transaction.type' => 'required',
        'transaction.modality' => 'required',
        'transaction.amount' => 'required|numeric',
    ];

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $wallets = DB::table('wallets as w')
            ->join('accounts as a', 'a.id', '=', 'w.account_id')
            ->join('users as u', 'u.id', '=', 'a.user_id')
            ->where('u.id', $this->user->id)
            ->select('w.id as value', 'w.name', 'w.description')
            ->get();

        $badges = Badge::all('name', 'shot_name', 'symbol');

        return view('private.livewire.form-transaction', [
            'wallets' => $wallets,
            'badges' => $badges,
        ]);
    }

    public function save()
    {
        $this->validate();

        $this->transaction->save();
    }
    public function clicked()
    {
        session()->flash('message', 'Clicked madafaca');
    }
}
