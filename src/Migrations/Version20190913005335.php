<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190913005335 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE event_subs (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, name VARCHAR(100) NOT NULL, first_name VARCHAR(100) NOT NULL, email_confirm VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_subs_event (event_subs_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_533423B09D2C1768 (event_subs_id), INDEX IDX_533423B071F7E88B (event_id), PRIMARY KEY(event_subs_id, event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_subs_event ADD CONSTRAINT FK_533423B09D2C1768 FOREIGN KEY (event_subs_id) REFERENCES event_subs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_subs_event ADD CONSTRAINT FK_533423B071F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admins CHANGE roles roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE cart CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_address CHANGE additional_address additional_address VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE event CHANGE event_date event_date DATETIME DEFAULT NULL, CHANGE event_place event_place VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE event_passed CHANGE image1 image1 VARCHAR(255) DEFAULT NULL, CHANGE image2 image2 VARCHAR(255) DEFAULT NULL, CHANGE image3 image3 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE message_me CHANGE phone phone VARCHAR(100) DEFAULT NULL, CHANGE last_name last_name VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE pack_offer CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT NULL, CHANGE image2 image2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE type_id type_id INT DEFAULT NULL, CHANGE price price NUMERIC(5, 2) DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE note note INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT NULL, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT NULL, CHANGE image2 image2 VARCHAR(255) DEFAULT NULL, CHANGE image3 image3 VARCHAR(255) DEFAULT NULL, CHANGE image4 image4 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE subscription CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT NULL, CHANGE image2 image2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(100) DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(100) DEFAULT NULL, CHANGE zipcode zipcode INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event_subs_event DROP FOREIGN KEY FK_533423B09D2C1768');
        $this->addSql('DROP TABLE event_subs');
        $this->addSql('DROP TABLE event_subs_event');
        $this->addSql('ALTER TABLE admins CHANGE roles roles LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE cart CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE delivery_address CHANGE additional_address additional_address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE event CHANGE event_date event_date DATETIME DEFAULT \'NULL\', CHANGE event_place event_place VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image image VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE event_passed CHANGE image1 image1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image2 image2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image3 image3 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE message_me CHANGE phone phone VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_name last_name VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE pack_offer CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image2 image2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE product CHANGE type_id type_id INT DEFAULT NULL, CHANGE price price NUMERIC(5, 2) DEFAULT \'NULL\', CHANGE stock stock INT DEFAULT NULL, CHANGE note note INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE image1 image1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image2 image2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image3 image3 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image4 image4 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE subscription CHANGE promo_rate promo_rate INT DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image1 image1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE image2 image2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_name last_name VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE address address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE country country VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE zipcode zipcode INT DEFAULT NULL');
    }
}
