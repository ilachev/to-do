<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211130201429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_todo_items (id UUID NOT NULL, app_todo_list_id UUID NOT NULL, description VARCHAR(50) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3A529EA22A29C67B ON app_todo_items (app_todo_list_id)');
        $this->addSql('COMMENT ON COLUMN app_todo_items.id IS \'(DC2Type:ulid)\'');
        $this->addSql('COMMENT ON COLUMN app_todo_items.app_todo_list_id IS \'(DC2Type:ulid)\'');
        $this->addSql('COMMENT ON COLUMN app_todo_items.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE app_todo_lists (id UUID NOT NULL, title VARCHAR(50) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN app_todo_lists.id IS \'(DC2Type:ulid)\'');
        $this->addSql('COMMENT ON COLUMN app_todo_lists.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE app_todo_items ADD CONSTRAINT FK_3A529EA22A29C67B FOREIGN KEY (app_todo_list_id) REFERENCES app_todo_lists (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_todo_items DROP CONSTRAINT FK_3A529EA22A29C67B');
        $this->addSql('DROP TABLE app_todo_items');
        $this->addSql('DROP TABLE app_todo_lists');
    }
}
