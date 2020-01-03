<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200102160235 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contenu (id INT AUTO_INCREMENT NOT NULL, pack_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_89C2003F1919B217 (pack_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contenu ADD CONSTRAINT FK_89C2003F1919B217 FOREIGN KEY (pack_id) REFERENCES pack (id)');
        $this->addSql('ALTER TABLE type ADD pack_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE57291919B217 FOREIGN KEY (pack_id) REFERENCES pack (id)');
        $this->addSql('CREATE INDEX IDX_8CDE57291919B217 ON type (pack_id)');
        $this->addSql('ALTER TABLE commande ADD client_id INT DEFAULT NULL, ADD pack_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES pack (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D1919B217 FOREIGN KEY (pack_id) REFERENCES client (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6EEAA67D19EB6921 ON commande (client_id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D1919B217 ON commande (pack_id)');
        $this->addSql('ALTER TABLE pack ADD pays_id INT NOT NULL');
        $this->addSql('ALTER TABLE pack ADD CONSTRAINT FK_97DE5E23A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_97DE5E23A6E44244 ON pack (pays_id)');
        $this->addSql('ALTER TABLE client ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455A76ED395 ON client (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contenu');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A76ED395');
        $this->addSql('DROP INDEX UNIQ_C7440455A76ED395 ON client');
        $this->addSql('ALTER TABLE client DROP user_id');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D1919B217');
        $this->addSql('DROP INDEX UNIQ_6EEAA67D19EB6921 ON commande');
        $this->addSql('DROP INDEX IDX_6EEAA67D1919B217 ON commande');
        $this->addSql('ALTER TABLE commande DROP client_id, DROP pack_id');
        $this->addSql('ALTER TABLE pack DROP FOREIGN KEY FK_97DE5E23A6E44244');
        $this->addSql('DROP INDEX IDX_97DE5E23A6E44244 ON pack');
        $this->addSql('ALTER TABLE pack DROP pays_id');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE57291919B217');
        $this->addSql('DROP INDEX IDX_8CDE57291919B217 ON type');
        $this->addSql('ALTER TABLE type DROP pack_id');
    }
}
