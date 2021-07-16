<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;

class OrangSeeder extends Seeder
{
        public function run()
        {
                // $data = [
                //     [
                //         'nama'      => 'Renaldi Noviandi',
                //         'alamat'    => 'Kasomalang',
                //         'created_at'=> Time::now(),
                //         'update_at' => Time::now() 
                //     ],
                //     [
                //         'nama'      => 'Fahmi',
                //         'alamat'    => 'Subang',
                //         'created_at'=> Time::now(),
                //         'update_at' => Time::now() 
                //     ],
                //     [
                //         'nama'      => 'Jojo',
                //         'alamat'    => 'Bandung',
                //         'created_at'=> Time::now(),
                //         'update_at' => Time::now() 
                //     ]
                // ];
                $faker = \Faker\Factory::create('id_ID');
                for ($i=0; $i < 50; $i++) { 
                    $data = [
                        'nama'      => $faker->name,
                        'alamat'    => $faker->address,
                        'created_at'=> Time::now(),
                        'update_at' => Time::now()
                    ];
                    $this->db->table('orang')->insert($data);
                }

                // Simple Queries
                // $this->db->query("INSERT INTO orang (nama, alamat, created_at, update_at) VALUES(:nama:, :alamat:, :created_at:, :update_at:)", $data);

                // Using Query Builder
                // $this->db->table('orang')->insertBatch($data);
        }
}