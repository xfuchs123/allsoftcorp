<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241216152211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Initiates the table and dummy values';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE note (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content CLOB DEFAULT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('INSERT INTO note VALUES ("First Note", "This is description of first note", "2024-12-15 08:08:08"), 
                        ("Allsoftcorp", "Allsoftcorp is the best", "2024-11-15 08:08:08"),
                        ("Really?", "Do I need to type this description?", "2024-10-15 08:08:08")');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE note');
    }
}
