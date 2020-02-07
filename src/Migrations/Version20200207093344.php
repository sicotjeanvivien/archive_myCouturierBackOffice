<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200207093344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE prestation_retouching (prestation_id INT NOT NULL, retouching_id INT NOT NULL, INDEX IDX_925851939E45C554 (prestation_id), INDEX IDX_92585193613B8DBF (retouching_id), PRIMARY KEY(prestation_id, retouching_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestation_retouching ADD CONSTRAINT FK_925851939E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation_retouching ADD CONSTRAINT FK_92585193613B8DBF FOREIGN KEY (retouching_id) REFERENCES retouching (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation ADD user_app_couturier_id INT DEFAULT NULL, ADD user_app_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD5CD9125C FOREIGN KEY (user_app_couturier_id) REFERENCES user_app (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD5F0A9B44 FOREIGN KEY (user_app_client_id) REFERENCES user_app (id)');
        $this->addSql('CREATE INDEX IDX_51C88FAD5CD9125C ON prestation (user_app_couturier_id)');
        $this->addSql('CREATE INDEX IDX_51C88FAD5F0A9B44 ON prestation (user_app_client_id)');
        $this->addSql('ALTER TABLE retouching DROP FOREIGN KEY FK_466756209E45C554');
        $this->addSql('DROP INDEX IDX_466756209E45C554 ON retouching');
        $this->addSql('ALTER TABLE retouching DROP prestation_id');
        $this->addSql('ALTER TABLE user_app DROP FOREIGN KEY FK_227811449DDC3842');
        $this->addSql('ALTER TABLE user_app DROP FOREIGN KEY FK_22781144B2CEF6E7');
        $this->addSql('DROP INDEX IDX_227811449DDC3842 ON user_app');
        $this->addSql('DROP INDEX IDX_22781144B2CEF6E7 ON user_app');
        $this->addSql('ALTER TABLE user_app DROP prestation_couturier_id, DROP prestation_client_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE prestation_retouching');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD5CD9125C');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD5F0A9B44');
        $this->addSql('DROP INDEX IDX_51C88FAD5CD9125C ON prestation');
        $this->addSql('DROP INDEX IDX_51C88FAD5F0A9B44 ON prestation');
        $this->addSql('ALTER TABLE prestation DROP user_app_couturier_id, DROP user_app_client_id');
        $this->addSql('ALTER TABLE retouching ADD prestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE retouching ADD CONSTRAINT FK_466756209E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('CREATE INDEX IDX_466756209E45C554 ON retouching (prestation_id)');
        $this->addSql('ALTER TABLE user_app ADD prestation_couturier_id INT DEFAULT NULL, ADD prestation_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_app ADD CONSTRAINT FK_227811449DDC3842 FOREIGN KEY (prestation_client_id) REFERENCES prestation (id)');
        $this->addSql('ALTER TABLE user_app ADD CONSTRAINT FK_22781144B2CEF6E7 FOREIGN KEY (prestation_couturier_id) REFERENCES prestation (id)');
        $this->addSql('CREATE INDEX IDX_227811449DDC3842 ON user_app (prestation_client_id)');
        $this->addSql('CREATE INDEX IDX_22781144B2CEF6E7 ON user_app (prestation_couturier_id)');
    }
}
