<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531084408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE house_characteristics DROP FOREIGN KEY FK_57F2E723DEE9D12B');
        $this->addSql('DROP TABLE characteristic');
        $this->addSql('DROP TABLE house_characteristics');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE characteristic (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, pictogram VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE house_characteristics (id INT AUTO_INCREMENT NOT NULL, house_id INT NOT NULL, characteristic_id INT NOT NULL, INDEX IDX_57F2E7236BB74515 (house_id), INDEX IDX_57F2E723DEE9D12B (characteristic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE house_characteristics ADD CONSTRAINT FK_57F2E7236BB74515 FOREIGN KEY (house_id) REFERENCES house (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE house_characteristics ADD CONSTRAINT FK_57F2E723DEE9D12B FOREIGN KEY (characteristic_id) REFERENCES characteristic (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
