<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('areas')->delete();
        
        \DB::table('areas')->insert(array (
            0 => 
            array (
                'id' => '9804f498-1a1f-40d6-be98-6e497bdbc43a',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Bas-Saint-Laurent',
                'area_shortname' => 'BSL',
                'created_at' => '2022-12-19 17:21:49',
                'updated_at' => '2022-12-19 17:21:49',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => '9809372d-d7b6-40e0-bc35-273a58141173',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Gaspédie-Îles-de-la-Madelaine',
                'area_shortname' => 'GIM',
                'created_at' => '2022-12-21 20:11:18',
                'updated_at' => '2022-12-21 20:11:29',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => '9809375f-41a2-4bfe-9c26-a4aeec51a193',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Abitibi-Témiscamingue',
                'area_shortname' => 'ABT',
                'created_at' => '2022-12-21 20:11:51',
                'updated_at' => '2022-12-21 20:11:51',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => '98093788-6e3f-4065-9c60-ac5d61167849',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Capitale-Nationale',
                'area_shortname' => 'CAPN',
                'created_at' => '2022-12-21 20:12:18',
                'updated_at' => '2022-12-21 20:12:18',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => '980937af-f8fb-4788-9630-ed547e1517d3',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Centre-du-Québec',
                'area_shortname' => 'CQC',
                'created_at' => '2022-12-21 20:12:44',
                'updated_at' => '2022-12-21 20:12:44',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => '980937d1-ff9c-4930-841c-337ee47160a8',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Chaudièere-Appalaches',
                'area_shortname' => 'CHAPP',
                'created_at' => '2022-12-21 20:13:06',
                'updated_at' => '2022-12-21 20:13:06',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => '980937ea-fede-4b63-a4bc-5592957acf42',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Côte-Nord',
                'area_shortname' => 'CN',
                'created_at' => '2022-12-21 20:13:22',
                'updated_at' => '2022-12-21 20:13:22',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => '98093804-7d05-489f-94c4-37e6fbedf011',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Estrie',
                'area_shortname' => 'ESTR',
                'created_at' => '2022-12-21 20:13:39',
                'updated_at' => '2022-12-21 20:13:39',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => '98093821-df85-4320-9bd6-984fbc3d3570',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Lanaudière',
                'area_shortname' => 'LAN',
                'created_at' => '2022-12-21 20:13:58',
                'updated_at' => '2022-12-21 20:13:58',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => '9809383a-3d6a-44d4-9188-f3b4967b575b',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Laurentides',
                'area_shortname' => 'LAUR',
                'created_at' => '2022-12-21 20:14:14',
                'updated_at' => '2022-12-21 20:14:14',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => '98093854-c8cc-46fa-903f-b01ee5e18acf',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Laval',
                'area_shortname' => 'LAV',
                'created_at' => '2022-12-21 20:14:32',
                'updated_at' => '2022-12-21 20:14:32',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => '9809386c-3b83-4748-ae51-35c7aeacd0ac',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Mauricie',
                'area_shortname' => 'MAUR',
                'created_at' => '2022-12-21 20:14:47',
                'updated_at' => '2022-12-21 20:14:47',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => '98093886-1eca-4061-bbb2-959a99af7a45',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Montérigie',
                'area_shortname' => 'MGIE',
                'created_at' => '2022-12-21 20:15:04',
                'updated_at' => '2022-12-21 20:15:04',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => '9809389b-46fe-4475-85e4-3141b1e65fec',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Montréal',
                'area_shortname' => 'MTL',
                'created_at' => '2022-12-21 20:15:18',
                'updated_at' => '2022-12-21 20:15:18',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => '980938b3-ff58-4ede-8111-84ab5c3af728',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Nord-du-Québec',
                'area_shortname' => 'NQC',
                'created_at' => '2022-12-21 20:15:34',
                'updated_at' => '2022-12-21 20:15:34',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => '980938cc-1a87-4d04-96a6-9727a9b121b3',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Outaouais',
                'area_shortname' => 'OUT',
                'created_at' => '2022-12-21 20:15:50',
                'updated_at' => '2022-12-21 20:15:50',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => '980938f2-65db-492d-9617-339fa7a40578',
                'state_id' => '9804f47a-5d27-47aa-ad8b-9b2f68ab863a',
                'area_name' => 'Saguenay-Lac-Saint-Jean',
                'area_shortname' => 'SLSJ',
                'created_at' => '2022-12-21 20:16:15',
                'updated_at' => '2022-12-21 20:16:15',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}