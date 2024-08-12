<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240809144913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE tva ADD id_tva_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tva ADD CONSTRAINT FK_EF6996206B4EC2B2 FOREIGN KEY (id_tva_id) REFERENCES tva (id)');
        $this->addSql('CREATE INDEX IDX_EF6996206B4EC2B2 ON tva (id_tva_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP roles');
        $this->addSql('ALTER TABLE tva DROP FOREIGN KEY FK_EF6996206B4EC2B2');
        $this->addSql('DROP INDEX IDX_EF6996206B4EC2B2 ON tva');
        $this->addSql('ALTER TABLE tva DROP id_tva_id');
    }
}
