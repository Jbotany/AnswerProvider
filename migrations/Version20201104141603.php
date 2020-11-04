<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201104141603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, label VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_DADD4A251E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keywords (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keywords_question (keywords_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_D1ABE5DF6205D0B8 (keywords_id), INDEX IDX_D1ABE5DF1E27F6BF (question_id), PRIMARY KEY(keywords_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keywords_answer (keywords_id INT NOT NULL, answer_id INT NOT NULL, INDEX IDX_82961CF16205D0B8 (keywords_id), INDEX IDX_82961CF1AA334807 (answer_id), PRIMARY KEY(keywords_id, answer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE keywords_question ADD CONSTRAINT FK_D1ABE5DF6205D0B8 FOREIGN KEY (keywords_id) REFERENCES keywords (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE keywords_question ADD CONSTRAINT FK_D1ABE5DF1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE keywords_answer ADD CONSTRAINT FK_82961CF16205D0B8 FOREIGN KEY (keywords_id) REFERENCES keywords (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE keywords_answer ADD CONSTRAINT FK_82961CF1AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE keywords_answer DROP FOREIGN KEY FK_82961CF1AA334807');
        $this->addSql('ALTER TABLE keywords_question DROP FOREIGN KEY FK_D1ABE5DF6205D0B8');
        $this->addSql('ALTER TABLE keywords_answer DROP FOREIGN KEY FK_82961CF16205D0B8');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('ALTER TABLE keywords_question DROP FOREIGN KEY FK_D1ABE5DF1E27F6BF');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE keywords');
        $this->addSql('DROP TABLE keywords_question');
        $this->addSql('DROP TABLE keywords_answer');
        $this->addSql('DROP TABLE question');
    }
}
