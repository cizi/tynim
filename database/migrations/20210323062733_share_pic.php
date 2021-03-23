<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SharePic extends AbstractMigration
{
    public function change(): void
    {
        $this->execute("DROP TABLE `header_pic`;
DROP TABLE `block_pic`;
ALTER TABLE `footer_pic`
RENAME TO `shared_pic`;");
    }
}
