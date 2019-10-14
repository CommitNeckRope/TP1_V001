<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '4',
                'name' => 'download.jpg',
                'path' => 'Files/',
                'created' => '2019-10-07 14:06:47',
                'modified' => '2019-10-07 14:06:47',
                'status' => '1',
            ],
            [
                'id' => '8',
                'name' => 'téléchargement.jpg',
                'path' => 'Files/',
                'created' => '2019-10-07 14:51:15',
                'modified' => '2019-10-07 14:51:15',
                'status' => '1',
            ],
            [
                'id' => '13',
                'name' => 'download.jpg',
                'path' => 'Files/',
                'created' => '2019-10-07 15:15:40',
                'modified' => '2019-10-07 15:15:40',
                'status' => '1',
            ],
            [
                'id' => '14',
                'name' => 'IMG_2871.JPG',
                'path' => 'Files/',
                'created' => '2019-10-08 23:01:59',
                'modified' => '2019-10-08 23:01:59',
                'status' => '1',
            ],
            [
                'id' => '15',
                'name' => 'IMG_2871.JPG',
                'path' => 'Files/',
                'created' => '2019-10-08 23:02:40',
                'modified' => '2019-10-08 23:02:40',
                'status' => '1',
            ],
            [
                'id' => '16',
                'name' => 'eau.jpg',
                'path' => 'Files/',
                'created' => '2019-10-09 15:02:32',
                'modified' => '2019-10-09 15:02:32',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
