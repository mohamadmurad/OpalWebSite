<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CustomerTable extends Component
{


    public $customers;
    public $start_date = '';
    public $end_date = '';
    public $total;

    public function render()
    {
        if ($this->start_date !== '' || $this->end_date !== ''){

            if ($this->start_date === ''){

                $this->start_date = Carbon::now()->format('Y-m-d');
            }

            if ($this->end_date === ''){

                $this->end_date = Carbon::now()->format('Y-m-d');
            }
        }





       $response = Http::asForm()->post('http://192.168.80.32:8099/opal.php', [
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);
        $this->customers = $response->json();

        $this->total = 0;
         foreach ($this->customers as $c){
            $this->total+=$c['phone_count'];
         }


        return view('livewire.customer-table');
    }


    public function getCustomers(){


        $this->total = 0;



        $response = Http::asForm()->post('http://192.168.80.32:8099/opal.php', [
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);


       // dd('sdsd');


       // dd($this->end_date);
         //  dd($response->json());

        $this->customers = $response->json();
        foreach ($this->customers as $c){
            $this->total+=$c['phone_count'];
        }

    }
}
