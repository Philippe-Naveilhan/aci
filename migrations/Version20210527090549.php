<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210527090549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE characteristic (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, pictogram VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE house (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, zipcode VARCHAR(5) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE house_characteristics (id INT AUTO_INCREMENT NOT NULL, house_id INT NOT NULL, characteristic_id INT NOT NULL, INDEX IDX_57F2E7236BB74515 (house_id), INDEX IDX_57F2E723DEE9D12B (characteristic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pictures (id INT AUTO_INCREMENT NOT NULL, house_id INT DEFAULT NULL, picture VARCHAR(255) NOT NULL, comment LONGTEXT DEFAULT NULL, updated_at DATETIME NOT NULL, INDEX IDX_8F7C2FC06BB74515 (house_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE house_characteristics ADD CONSTRAINT FK_57F2E7236BB74515 FOREIGN KEY (house_id) REFERENCES house (id)');
        $this->addSql('ALTER TABLE house_characteristics ADD CONSTRAINT FK_57F2E723DEE9D12B FOREIGN KEY (characteristic_id) REFERENCES characteristic (id)');
        $this->addSql('ALTER TABLE pictures ADD CONSTRAINT FK_8F7C2FC06BB74515 FOREIGN KEY (house_id) REFERENCES house (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE house_characteristics DROP FOREIGN KEY FK_57F2E723DEE9D12B');
        $this->addSql('ALTER TABLE house_characteristics DROP FOREIGN KEY FK_57F2E7236BB74515');
        $this->addSql('ALTER TABLE pictures DROP FOREIGN KEY FK_8F7C2FC06BB74515');
        $this->addSql('DROP TABLE characteristic');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP TABLE house_characteristics');
        $this->addSql('DROP TABLE pictures');
    }
}
