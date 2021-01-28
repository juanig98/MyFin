<?php

namespace Tests\Feature;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TransactionManagementTest extends TestCase
{
    /** @test */
    public function a_transaction_can_be_created()
    {
        // $data = DB::table('users as u')->join('accounts as a', 'a.users_id', '=', 'u.id')
        //     ->join('wallets as w', 'w.account_id', '=', 'a.id')
        //     ->where('u.name', 'like', 'Juan Ignacio Galarza')
        //     ->select('w.id as wallet_id, a.id as account_id')->first();

        // $response = $this->post('/transaction', [
        //     'title' => 'Verdulería Chacras del sur',
        //     'description' => 'Compra de bienes para el hogar',
        //     'date' => Carbon::now()->subDays(3),
        //     'wallet_id' => $data->wallet_id,
        //     'badge_id' => 1,
        //     'account_id' => $data->account_id,
        //     'type' => 'Input',
        //     'modality' => 'Common',
        //     'amount' => 1500.00,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // $this->assertOk();

        // $transaction
        // $this->assert();

    }
}
