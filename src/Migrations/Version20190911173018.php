<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190911173018 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admins CHANGE roles roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE article CHANGE tags tags LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE annexe annexe LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE event_date event_date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE cart CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_address CHANGE additional_address additional_address VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE message_me CHANGE phone phone VARCHAR(100) DEFAULT NULL, CHANGE last_name last_name VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE pack_offer ADD image1 VARCHAR(255) DEFAULT NULL, ADD image2 VARCHAR(255) DEFAULT NULL, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD image1 VARCHAR(255) DEFAULT NULL, ADD image2 VARCHAR(255) DEFAULT NULL, ADD image3 VARCHAR(255) DEFAULT NULL, ADD image4 VARCHAR(255) DEFAULT NULL, CHANGE type_id type_id INT DEFAULT NULL, CHANGE price price NUMERIC(5, 2) DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE note note INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT NULL, CHANGE promo_rate promo_rate INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription ADD image1 VARCHAR(255) DEFAULT NULL, ADD image2 VARCHAR(255) DEFAULT NULL, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(100) DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(100) DEFAULT NULL, CHANGE zipcode zipcode INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admins CHANGE roles roles LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE article CHANGE tags tags LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', CHANGE annexe annexe LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', CHANGE event_date event_date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE cart CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_address CHANGE additional_address additional_address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE message_me CHANGE phone phone VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_name last_name VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE pack_offer DROP image1, DROP image2, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product DROP image1, DROP image2, DROP image3, DROP image4, CHANGE type_id type_id INT DEFAULT NULL, CHANGE price price NUMERIC(5, 2) DEFAULT \'NULL\', CHANGE stock stock INT DEFAULT NULL, CHANGE note note INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE promo_rate promo_rate INT DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription DROP image1, DROP image2, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_name last_name VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE address address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE country country VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE zipcode zipcode INT DEFAULT NULL');
    }
}
