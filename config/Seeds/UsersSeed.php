<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '2',
                'email' => 'vazy@marche.stp',
                'password' => '$2y$10$ZHXhjd4B/thAGUByUMJCA.y6ewXBRd.Yqk65jawSi3JXSDoPStffK',
                'created' => '2019-08-25 23:41:16',
                'modified' => '2019-09-26 01:19:43',
            ],
            [
                'id' => '3',
                'email' => 'test@test.com',
                'password' => '$2y$10$TaYB3MbzIjqU4RDK3QgYp.tqjk69Ahu5YWdKf8t5iLQOP52hb8GW2',
                'created' => '2019-08-30 00:34:55',
                'modified' => '2019-10-08 22:57:48',
            ],
            [
                'id' => '4',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$SBCOGHX4Ays/tKcw3U8BgusIDaz2VNdFlM74FojM2BE6KidYYW89a',
                'created' => '2019-10-02 18:25:20',
                'modified' => '2019-10-02 18:25:20',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
