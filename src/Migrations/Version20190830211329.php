<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190830211329 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE admins (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_BA388B7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart_product (cart_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_2890CCAA1AD5CDBF (cart_id), INDEX IDX_2890CCAA4584665A (product_id), PRIMARY KEY(cart_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_address (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, address VARCHAR(255) NOT NULL, country VARCHAR(100) NOT NULL, zipcode INT NOT NULL, additional_address VARCHAR(255) DEFAULT NULL, forname VARCHAR(255) NOT NULL, phone VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, surname VARCHAR(100) NOT NULL, INDEX IDX_750D05FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cart_product ADD CONSTRAINT FK_2890CCAA1AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_product ADD CONSTRAINT FK_2890CCAA4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE delivery_address ADD CONSTRAINT FK_750D05FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE category ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ordered_products ADD delivery_address_id INT NOT NULL, ADD quantity INT NOT NULL, ADD payment_type VARCHAR(255) NOT NULL, ADD registered VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE ordered_products ADD CONSTRAINT FK_39EA2925EBF23851 FOREIGN KEY (delivery_address_id) REFERENCES delivery_address (id)');
        $this->addSql('CREATE INDEX IDX_39EA2925EBF23851 ON ordered_products (delivery_address_id)');
        $this->addSql('ALTER TABLE product ADD category_id INT NOT NULL, CHANGE images images LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', CHANGE price price NUMERIC(5, 2) DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE note note INT DEFAULT NULL, CHANGE promo promo VARCHAR(100) DEFAULT NULL, CHANGE ref ref VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('ALTER TABLE user CHANGE last_name last_name VARCHAR(100) DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE avatar avatar VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(100) DEFAULT NULL, CHANGE zipcode zipcode INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cart_product DROP FOREIGN KEY FK_2890CCAA1AD5CDBF');
        $this->addSql('ALTER TABLE ordered_products DROP FOREIGN KEY FK_39EA2925EBF23851');
        $this->addSql('DROP TABLE admins');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE cart_product');
        $this->addSql('DROP TABLE delivery_address');
        $this->addSql('ALTER TABLE category DROP image');
        $this->addSql('DROP INDEX IDX_39EA2925EBF23851 ON ordered_products');
        $this->addSql('ALTER TABLE ordered_products DROP delivery_address_id, DROP quantity, DROP payment_type, DROP registered');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2 ON product');
        $this->addSql('ALTER TABLE product DROP category_id, CHANGE images images LONGTEXT DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', CHANGE price price NUMERIC(5, 2) DEFAULT \'NULL\', CHANGE stock stock INT DEFAULT NULL, CHANGE note note INT DEFAULT NULL, CHANGE promo promo VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE ref ref VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE last_name last_name VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE address address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE avatar avatar VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE country country VARCHAR(100) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE zipcode zipcode INT DEFAULT NULL');
    }
}
