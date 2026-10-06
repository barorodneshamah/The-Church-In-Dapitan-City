<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260617180000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Replace "Anaheim" with "Dapitan City" in FAQ trainings answer';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            "UPDATE faq SET answer = REPLACE(answer, 'in Anaheim', 'in Dapitan City') WHERE sort_order = 11"
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql(
            "UPDATE faq SET answer = REPLACE(answer, 'in Dapitan City', 'in Anaheim') WHERE sort_order = 11"
        );
    }
}
