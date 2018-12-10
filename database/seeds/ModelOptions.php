<?php

use Illuminate\Database\Seeder;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use App\ModelOption;
use App\ViewOption;
use App\CrudOption;

class ModelOptions extends Seeder
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
        $crawler = $client->request('GET', 'https://github.com/appzcoder/crud-generator/blob/master/doc/options.md');
        $crawler->filter('tr>td>code')->each(function ($node){
            if(strpos($node->text(), '=', 0) < 1){
                try{
                    ModelOption::create(
                        array(
                            'title' => $node->text()
                        )
                    );
                    ViewOption::create(
                        array(
                            'title' => $node->text()
                        )
                    );
                    CrudOption::create(
                        array(
                            'title' => $node->text()
                        )
                    );

                }catch (Exception $e){

                }
            }

        });

    }
}
