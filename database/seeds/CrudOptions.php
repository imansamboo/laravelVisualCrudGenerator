<?php

use Illuminate\Database\Seeder;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use App\FormFieldType;
use App\MigrationFieldType;

class CrudOptions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $client = new Client();
        $crawler = $client->request('GET', 'https://github.com/appzcoder/crud-generator/blob/master/doc/fields.md');
        $crawler->filter('ul')->each(function ($node) {
            $node->filter('li')->each(function ($node) {
                try{
                    FormFieldType::create(
                        array(
                            'title' => $node->text()
                        )
                    );

                }catch (Exception $e){

                }
                try{
                    MigrationFieldType::create(
                        array(
                            'title' => $node->text()
                        )
                    );

                }catch (Exception $e){

                }


            });
        });
    }
}
