<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    public function run()
    {
        $this->execute("INSERT INTO `user` (`id`, `email`, `password`, `role`, `active`, `register_timestamp`, `last_login`) VALUES
(1,	'test@email.cz',	'$2y$10$3ed.wb/fSvhj7.g.G9GJ6OMMJPemD1qlmriQp6cW2PAb1GcHNaaVe',	99,	1,	'2017-07-17 21:03:13',	'2020-07-07 08:21:20')");
    }
}
