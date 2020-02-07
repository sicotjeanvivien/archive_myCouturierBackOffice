<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200207083418 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, user_app_couturier_id INT DEFAULT NULL, user_app_client_id INT DEFAULT NULL, content LONGTEXT DEFAULT NULL, date_published DATETIME DEFAULT NULL, rating INT DEFAULT NULL, INDEX IDX_5F9E962A5CD9125C (user_app_couturier_id), INDEX IDX_5F9E962A5F0A9B44 (user_app_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, statut_id INT DEFAULT NULL, INDEX IDX_51C88FADF6203804 (statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation_status (id INT AUTO_INCREMENT NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE retouching (id INT AUTO_INCREMENT NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE retouching_retouching_type (retouching_id INT NOT NULL, retouching_type_id INT NOT NULL, INDEX IDX_2718AAA0613B8DBF (retouching_id), INDEX IDX_2718AAA0CA35413E (retouching_type_id), PRIMARY KEY(retouching_id, retouching_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE retouching_user_app (retouching_id INT NOT NULL, user_app_id INT NOT NULL, INDEX IDX_8A10B7DC613B8DBF (retouching_id), INDEX IDX_8A10B7DC1CD53A10 (user_app_id), PRIMARY KEY(retouching_id, user_app_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE retouching_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A5CD9125C FOREIGN KEY (user_app_couturier_id) REFERENCES user_app (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A5F0A9B44 FOREIGN KEY (user_app_client_id) REFERENCES user_app (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADF6203804 FOREIGN KEY (statut_id) REFERENCES prestation_status (id)');
        $this->addSql('ALTER TABLE retouching_retouching_type ADD CONSTRAINT FK_2718AAA0613B8DBF FOREIGN KEY (retouching_id) REFERENCES retouching (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE retouching_retouching_type ADD CONSTRAINT FK_2718AAA0CA35413E FOREIGN KEY (retouching_type_id) REFERENCES retouching_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE retouching_user_app ADD CONSTRAINT FK_8A10B7DC613B8DBF FOREIGN KEY (retouching_id) REFERENCES retouching (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE retouching_user_app ADD CONSTRAINT FK_8A10B7DC1CD53A10 FOREIGN KEY (user_app_id) REFERENCES user_app (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_app ADD prestation_couturier_id INT DEFAULT NULL, ADD prestation_client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_app ADD CONSTRAINT FK_22781144B2CEF6E7 FOREIGN KEY (prestation_couturier_id) REFERENCES prestation (id)');
        $this->addSql('ALTER TABLE user_app ADD CONSTRAINT FK_227811449DDC3842 FOREIGN KEY (prestation_client_id) REFERENCES prestation (id)');
        $this->addSql('CREATE INDEX IDX_22781144B2CEF6E7 ON user_app (prestation_couturier_id)');
        $this->addSql('CREATE INDEX IDX_227811449DDC3842 ON user_app (prestation_client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_app DROP FOREIGN KEY FK_22781144B2CEF6E7');
        $this->addSql('ALTER TABLE user_app DROP FOREIGN KEY FK_227811449DDC3842');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FADF6203804');
        $this->addSql('ALTER TABLE retouching_retouching_type DROP FOREIGN KEY FK_2718AAA0613B8DBF');
        $this->addSql('ALTER TABLE retouching_user_app DROP FOREIGN KEY FK_8A10B7DC613B8DBF');
        $this->addSql('ALTER TABLE retouching_retouching_type DROP FOREIGN KEY FK_2718AAA0CA35413E');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE prestation_status');
        $this->addSql('DROP TABLE retouching');
        $this->addSql('DROP TABLE retouching_retouching_type');
        $this->addSql('DROP TABLE retouching_user_app');
        $this->addSql('DROP TABLE retouching_type');
        $this->addSql('DROP INDEX IDX_22781144B2CEF6E7 ON user_app');
        $this->addSql('DROP INDEX IDX_227811449DDC3842 ON user_app');
        $this->addSql('ALTER TABLE user_app DROP prestation_couturier_id, DROP prestation_client_id');
    }
}
