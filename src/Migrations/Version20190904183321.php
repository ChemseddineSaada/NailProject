<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190904183321 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pack_offer_category (pack_offer_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_9D214B937D4930FF (pack_offer_id), INDEX IDX_9D214B9312469DE2 (category_id), PRIMARY KEY(pack_offer_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pack_offer_category ADD CONSTRAINT FK_9D214B937D4930FF FOREIGN KEY (pack_offer_id) REFERENCES pack_offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pack_offer_category ADD CONSTRAINT FK_9D214B9312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admins CHANGE roles roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE cart CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_address CHANGE additional_address additional_address VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE pack_offer CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE images images LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE price price NUMERIC(5, 2) DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE note note INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT NULL, CHANGE promo_rate promo_rate INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(100) DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(100) DEFAULT NULL, CHANGE zipcode zipcode INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE pack_offer_category');
        $this->addSql('ALTER TABLE admins CHANGE roles roles LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE cart CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_address CHANGE additional_address additional_address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE pack_offer CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE images images LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', CHANGE price price NUMERIC(5, 2) DEFAULT \'NULL\', CHANGE stock stock INT DEFAULT NULL, CHANGE note note INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE promo_rate promo_rate INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_name last_name VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE address address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE country country VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE zipcode zipcode INT DEFAULT NULL');
    }
}
