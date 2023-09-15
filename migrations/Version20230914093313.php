<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230914093313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE provider_medias (provider_id INT NOT NULL, medias_id INT NOT NULL, INDEX IDX_45E34C11A53A8AA (provider_id), INDEX IDX_45E34C11C7F4A74B (medias_id), PRIMARY KEY(provider_id, medias_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE provider_medias ADD CONSTRAINT FK_45E34C11A53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE provider_medias ADD CONSTRAINT FK_45E34C11C7F4A74B FOREIGN KEY (medias_id) REFERENCES medias (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE provider_medias DROP FOREIGN KEY FK_45E34C11A53A8AA');
        $this->addSql('ALTER TABLE provider_medias DROP FOREIGN KEY FK_45E34C11C7F4A74B');
        $this->addSql('DROP TABLE provider_medias');
    }
}
