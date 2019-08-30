<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190830204621 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordered_products (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, client_id INT NOT NULL, ordred_at DATETIME NOT NULL, state VARCHAR(100) NOT NULL, INDEX IDX_39EA29254584665A (product_id), INDEX IDX_39EA292519EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, images LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', price NUMERIC(5, 2) DEFAULT NULL, state VARCHAR(100) NOT NULL, published_at DATETIME NOT NULL, stock INT DEFAULT NULL, note INT DEFAULT NULL, promo VARCHAR(100) DEFAULT NULL, ref VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(100) DEFAULT NULL, username VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, country VARCHAR(100) DEFAULT NULL, zipcode INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ordered_products ADD CONSTRAINT FK_39EA29254584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE ordered_products ADD CONSTRAINT FK_39EA292519EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ordered_products DROP FOREIGN KEY FK_39EA29254584665A');
        $this->addSql('ALTER TABLE ordered_products DROP FOREIGN KEY FK_39EA292519EB6921');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE ordered_products');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
