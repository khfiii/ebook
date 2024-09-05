<?php

namespace App\Livewire;

use App\Services\Midtrans;
use Livewire\Component;

class Form extends Component
{
    public string $nama;
    public string $email;
    public string $whatsapp;
    public int $id;
    public function render()
    {
        return view('livewire.form');
    }

    public function mount(int $id)
    {
        $this->id = $id;
    }

    public function checkout()
    {
        $validated = $this->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'whatsapp' => 'required',
            'id' => 'required'
        ], [
            'required' => 'Field :attribute Wajib diisi',
            'unique' => 'Field :attribute tidak unik',
        ]);

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ), 
            'customer_details' => array(
                'email' => $validated['email'],
                'phone' => $validated['whatsapp'],
                'billing_address' => [
                    'email' => $validated['email'], 
                    'phone'=> $validated['whatsapp']
                ]
            ),
        );
        
        $midtrans = new Midtrans(config('midtrans.stagging.server_key'));
        $snapToken = $midtrans->generateSnapToken($params);

        $this->dispatch('user-pay', token: $snapToken);

        // fetch item 

        // store users

        // set status with pending

        // set status with settlement

        // set status with succesfully


    }
}
