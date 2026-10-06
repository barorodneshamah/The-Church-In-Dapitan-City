<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260617051546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create faq table and seed initial FAQ entries';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, question LONGTEXT NOT NULL, answer LONGTEXT NOT NULL, sort_order INT NOT NULL, is_active TINYINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');

        $now = (new \DateTime())->format('Y-m-d H:i:s');

        $faqs = [
            [
                'question' => 'What is the name of your church?',
                'answer'   => "The local churches do not have a name. The only name we hold and honor is the name of the Lord Jesus Christ. To take any other name is to insult Him. The term \"local church\" is not a name; it is a description of the local nature and expression of the church, that is, the church in a locality. To print the words \"local church\" with capital letters is a serious mistake, for this gives the impression that our name is \"local church.\" Just as the moon is simply the moon regardless of the locality over which it is seen, so the church is simply the church regardless of the locality in which it is established. When the church was established in Jerusalem, it was known simply as the church in Jerusalem (Acts 8:1), and in Antioch, the church was the church at Antioch (Acts 13:1). Likewise, the practical expression of the church in Dapitan City today is simply the church in Dapitan City. As local churches, we meet in the Lord's name on the ground of genuine oneness.",
                'sort_order' => 1,
            ],
            [
                'question' => 'Who is your leader?',
                'answer'   => 'Our unique leader is Christ. We have no official, permanent, organized human leadership. Furthermore, there is no hierarchy of any kind and no worldwide leader. We regard no person as infallible, and we do not follow anyone blindly. On the contrary, we follow only those whose teaching and practice is in accordance with the truth of God\'s Word. Those who take the lead do not lord it over the saints, but rather shepherd them in love. Likewise, those who serve the Lord do not control the churches, but rather serve them as bondslaves of Christ in the ministry of the living Word.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Where is your headquarters?',
                'answer'   => 'Each local church is autonomous in its administration. Therefore, there is no central headquarters. No particular local church should be regarded as the head church or leading church. On the contrary, all the local churches share the same standing before the Lord.',
                'sort_order' => 3,
            ],
            [
                'question' => 'What do you do in your meetings?',
                'answer'   => 'We pray, praise, sing, give testimonies, and minister the Word. Every Sunday we have the Lord\'s table at which all the Lord\'s children are welcome to partake with us of the bread and wine. The church meetings are open, and all believers are free to participate.',
                'sort_order' => 4,
            ],
        ];

        foreach ($faqs as $faq) {
            $this->addSql(
                'INSERT INTO faq (question, answer, sort_order, is_active, created_at) VALUES (?, ?, ?, 1, ?)',
                [$faq['question'], $faq['answer'], $faq['sort_order'], $now]
            );
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE faq');
    }
}
