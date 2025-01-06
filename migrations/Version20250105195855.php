<?php

declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250105195855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adding batch size for products. Default value will be 10';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE sylius_product ADD batch_size INT DEFAULT 10 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE sylius_product DROP COLUMN batch_size');
    }
}
