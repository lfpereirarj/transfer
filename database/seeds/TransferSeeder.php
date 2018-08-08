<?php

use Illuminate\Database\Seeder;
use App\Transfer;

class TransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transfer::create(array(
            'name' => 'Ilha Grande x Búzios',
            'type' => 'Ida',
            'price'=> 225.0,
            'hour' => '["Manhã", "Tarde"]',
            'departure' => null,
        ));


        Transfer::create(array(
            'name' => 'Rio de Janeiro x Ilha Grande',
            'type' => 'Ida',
            'price'=> 95.0,
            'hour' => '["Manhã 1 (Entre 5h e 7:15) – Destino Vila do Abraão ou Araçatiba", "Manhã 2 (Entre 8:45h e 11:15h) – Destino Vila do Abraão", "Tarde (Entre 13:20h e 15h) – Destino Vila do Abraão"]',
            'destination' => '["Aeroportos", "Zona Sul"]',
            'departure' => '["Vila do Abraão", "Praça de Araçatiba", "Outros"]',
            'price_combo' => 190.0
            
        ));

        Transfer::create(array(
            'name' => 'Ilha Grande x Rio de Janeiro',
            'type' => 'Ida',
            'price'=> 95.0,
            'hour' => '["Manhã 1 (Entre 5h e 7:15) – Destino Vila do Abraão ou Araçatiba", "Manhã 2 (Entre 8:45h e 11:15h) – Destino Vila do Abraão", "Tarde (Entre 13:20h e 15h) – Destino Vila do Abraão"]',
            'departure' => '["Aeroportos", "Zona Sul"]',
            'destination' => '["Vila do Abraão", "Praça de Araçatiba", "Outros"]',
            'price_combo' => 190.0
            
        ));

        Transfer::create(array(
            'name' => 'Rio de Janeiro x Angra dos Reis',
            'type' => 'Ida',
            'price'=> 95.0,
            'hour' => '["Manhã 1 - Entre 5h e 7:15", "Manhã 2 - Entre 8:45h e 11:15h"]',
            'departure' => '["Aeroportos", "Zona Sul"]',
            'price_combo' => 260.0
        ));

        Transfer::create(array(
            'name' => 'Angra dos Reis x Rio de Janeiro',
            'type' => 'Ida',
            'price'=> 95.0,
            'hour' => '["Manhã 1 - Entre 5h e 7:15", "Manhã 2 - Entre 8:45h e 11:15h"]',
            'departure' => '["Aeroportos", "Zona Sul"]',
            'price_combo' => 260.0
        ));

        Transfer::create(array(
            'name' => 'Rio de Janeiro x Búzios',
            'type' => 'Ida',
            'price'=> 140.0,
            'hour' => '["Manhã", "Tarde"]',
            'departure' => '["Aeroportos", "Zona Sul"]'
        ));
    }
}
