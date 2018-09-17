<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180917161436 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, skateboard_id INT DEFAULT NULL, name VARCHAR(125) NOT NULL, surname VARCHAR(125) NOT NULL, email VARCHAR(255) NOT NULL, phone INT NOT NULL, city VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, INDEX IDX_E52FFDEEAB48BED3 (skateboard_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, file_name VARCHAR(255) DEFAULT NULL, original_file_name VARCHAR(255) DEFAULT NULL, file_mime_type VARCHAR(255) DEFAULT NULL, file_size INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skateboard (id INT AUTO_INCREMENT NOT NULL, media_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, length DOUBLE PRECISION NOT NULL, width DOUBLE PRECISION NOT NULL, weight INT NOT NULL, max_user_weight INT NOT NULL, UNIQUE INDEX UNIQ_E2E95F3AEA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEAB48BED3 FOREIGN KEY (skateboard_id) REFERENCES skateboard (id)');
        $this->addSql('ALTER TABLE skateboard ADD CONSTRAINT FK_E2E95F3AEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE skateboard DROP FOREIGN KEY FK_E2E95F3AEA9FDD75');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEAB48BED3');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE skateboard');
    }
}
