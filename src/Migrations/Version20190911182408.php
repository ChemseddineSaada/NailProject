<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190911182408 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, event_date DATETIME DEFAULT NULL, event_place VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_passed (id INT AUTO_INCREMENT NOT NULL, events_id INT NOT NULL, article LONGTEXT DEFAULT NULL, image1 VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) DEFAULT NULL, image3 VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_514366159D6A1065 (events_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_passed ADD CONSTRAINT FK_514366159D6A1065 FOREIGN KEY (events_id) REFERENCES event (id)');
        $this->addSql('DROP TABLE article');
        $this->addSql('ALTER TABLE admins CHANGE roles roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE cart CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_address CHANGE additional_address additional_address VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE message_me CHANGE phone phone VARCHAR(100) DEFAULT NULL, CHANGE last_name last_name VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE pack_offer DROP published_at, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT NULL, CHANGE image2 image2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product DROP published_at, CHANGE type_id type_id INT DEFAULT NULL, CHANGE price price NUMERIC(5, 2) DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE note note INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT NULL, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT NULL, CHANGE image2 image2 VARCHAR(255) DEFAULT NULL, CHANGE image3 image3 VARCHAR(255) DEFAULT NULL, CHANGE image4 image4 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription DROP published_at, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT NULL, CHANGE image2 image2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(100) DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(100) DEFAULT NULL, CHANGE zipcode zipcode INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_passed DROP FOREIGN KEY FK_514366159D6A1065');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, content LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, tags LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', published_at DATETIME NOT NULL, state TINYINT(1) NOT NULL, annexe LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', event TINYINT(1) NOT NULL, event_date DATETIME DEFAULT \'NULL\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_passed');
        $this->addSql('ALTER TABLE admins CHANGE roles roles LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE cart CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_address CHANGE additional_address additional_address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE message_me CHANGE phone phone VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_name last_name VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE pack_offer ADD published_at DATETIME NOT NULL, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image2 image2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE product ADD published_at DATETIME NOT NULL, CHANGE type_id type_id INT DEFAULT NULL, CHANGE price price NUMERIC(5, 2) DEFAULT \'NULL\', CHANGE stock stock INT DEFAULT NULL, CHANGE note note INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image2 image2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image3 image3 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image4 image4 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE subscription ADD published_at DATETIME NOT NULL, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image1 image1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image2 image2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_name last_name VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE address address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE country country VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE zipcode zipcode INT DEFAULT NULL');
    }
}
