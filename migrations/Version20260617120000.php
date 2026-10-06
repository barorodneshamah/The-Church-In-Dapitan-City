<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260617120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Seed additional FAQ entries (questions 5–15)';
    }

    public function up(Schema $schema): void
    {
        $now = (new \DateTime())->format('Y-m-d H:i:s');

        $faqs = [
            [
                'question'   => 'What is pray-reading?',
                'answer'     => 'The word "pray-reading" is a compound word that describes our practice of praying with the words of the Bible. We pray-read the Word in order to enjoy the life element contained in the Word; we thereby enjoy the Word as our spiritual food. We can testify after many years\' experience that we are edified, strengthened, and inspired by praying with and over God\'s words in the Bible. However, the fact that we pray-read the Bible, repeating the words of Scripture in prayer to God, does not mean that we neglect the ordinary reading of the Scriptures or the careful study of the Word of God.',
                'sort_order' => 5,
            ],
            [
                'question'   => 'What do you mean by eating and drinking Jesus?',
                'answer'     => 'This term is offensive to some today just as it was to the religionists at the time of the Lord Jesus. In John 6 the Lord said that unless we eat His flesh and drink His blood, we do not have life in us, for His flesh is the real food and His blood is the real drink. In our experience, Christ is the redeeming Lamb and the tree of life. In order to live by Him, we need to partake of Him as the Lamb and as the tree of life. Furthermore, the Lord is our living water. As we drink of Him, we are satisfied. Therefore, to eat and drink of the Lord is to receive Him in Spirit through the Word as our spiritual food and drink.',
                'sort_order' => 6,
            ],
            [
                'question'   => 'What is meant by the term "the economy of God"?',
                'answer'     => 'The word "economy" comes from the Greek word oikonomia, which denotes a household arrangement; its meaning also includes a stewardship, an administration, and a dispensation, that is, a process of dispensing. When seen in the light of God\'s eternal purpose as revealed throughout the Scriptures, God\'s economy refers to God\'s divine arrangement to dispense Himself into us for the producing and building up of the church.',
                'sort_order' => 7,
            ],
            [
                'question'   => 'Do you hold a modalistic view of the Trinity?',
                'answer'     => 'Certainly not! Modalism is heretical. Instead of teaching that the Three of the Godhead, the Father, the Son, and the Spirit, co-exist eternally, modalism claims that They are merely temporary manifestations of the divine essence. We believe according to the Bible that God is essentially three in one and one in three. We surely recognize eternal distinctions within the Godhead. However, our emphasis with respect to the Trinity is not on the doctrinal analysis of the nature of God, but on the dispensing of the Triune God into us as our life and our all. Our orthodoxy concerning the doctrine of God must be determined by whether or not our teaching is in accord with the pure Word of God. When our belief concerning the Triune God is considered fairly in the light of Scripture, it will be found that we believe neither in modalism nor in tritheism, but in the revelation of the Triune God according to the pure Word of God.',
                'sort_order' => 8,
            ],
            [
                'question'   => 'Do you teach that man is evolving into God?',
                'answer'     => 'Such an accusation, which has been made against us, is utterly false and without foundation. According to the Bible, we teach that God is dispensing Himself into man and that the believer is being transformed by and permeated with the element of God. The fact that, as sons of God, we partake of the life and nature of God does not mean that we become God Himself. Yes, the Triune God is being wrought into us and we are partaking of His very nature, but we are definitely not evolving into the Godhead.',
                'sort_order' => 9,
            ],
            [
                'question'   => 'Do you teach that Satan is in man\'s body?',
                'answer'     => 'When man fell by eating the fruit of the tree of the knowledge of good and evil, sin, the nature of Satan, was injected into man\'s body and transmuted it into the flesh. The fall was not simply an outward transgression; it was also an inward poisoning and contamination of our very being. According to Romans 5 through 7, sin functions in our members as the virtual personification of Satan. Therefore, we may say that Satan as sin dwells in man\'s flesh. This does not mean, however, that Satan has no objective existence apart from man, for the Bible clearly refers to him as the spirit of the power of the air. Furthermore, the Bible reveals that fallen men are children of the Devil and that the Devil is their father (1 John 3:10; John 8:44). To be children of the Devil is to have the life and nature of Satan. In the sense of having within our flesh the life and nature of Satan we say, according to God\'s Word, that Satan in the form of sin dwells in man\'s flesh.',
                'sort_order' => 10,
            ],
            [
                'question'   => 'What takes place at your trainings?',
                'answer'     => 'Six-day trainings are currently held semi-annually in Dapitan City. The content of each training is an intensified study of a book of the Bible or portion thereof.',
                'sort_order' => 11,
            ],
            [
                'question'   => 'How are the local churches supported financially?',
                'answer'     => 'Each local church is supported by voluntary gifts from its members. The financial affairs of a local church are under the administration of that church. There is no financial accountability to any other church body. In this matter, as in all administrative affairs, the local churches are autonomous and locally governed. The members are encouraged to give in a way that is hidden and not ostentatious, according to the commitment they have with the Lord. No offerings are taken in the meetings, and there is very little talk of financial matters. A financial statement is available for examination by members. As far as financial affairs are concerned, the local churches are properly registered with the government as non-profit religious corporations.',
                'sort_order' => 12,
            ],
            [
                'question'   => 'What is your attitude toward the historic, institutional Christian church?',
                'answer'     => 'We stand outside of and apart from historical, organized, institutionalized Christianity because we regard it as a system filled with unscriptural teachings and practices. For the sake of the genuine recovery of the church life revealed in the Bible, we meet together in the Lord\'s name on the ground of genuine oneness in the locality.',
                'sort_order' => 13,
            ],
            [
                'question'   => 'What is your attitude toward other Christians?',
                'answer'     => 'We would like to make it emphatically clear that we neither believe nor teach that one must be in a local church in order to be a genuine Christian. We recognize that in the Roman Catholic Church, in the denominations, and in the independent groups there are many genuine blood-washed, Spirit-regenerated believers in Christ, and we receive them as our brothers and sisters in the Lord. All who have saving faith in the Lord Jesus are welcome to all our meetings, especially the Lord\'s table, where we testify of the oneness of the Body of Christ. Although we must, for conscience\' sake, stand apart from organized religion, we do not stand apart from our brothers and sisters in Christ. In faithfulness to the Lord, we stand on the unique ground of the church for the sake of the Lord\'s testimony. But we do not take this stand with a narrow, exclusive, or sectarian spirit. On the contrary, we take our stand on behalf of the whole Body; we receive all believers even as the Lord has received us.',
                'sort_order' => 14,
            ],
            [
                'question'   => 'What is your attitude toward the government?',
                'answer'     => 'According to the Bible, human government has been ordained of God to preserve peace and to maintain order. For the sake of conscience, all Christians are to be subject to the civil authorities. Therefore, we submit to all governmental authorities and are obedient to them, living as good citizens of our nation, state, and community. We are prepared to fulfill all our responsibilities toward the human government ordained of God.',
                'sort_order' => 15,
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
        $this->addSql('DELETE FROM faq WHERE sort_order BETWEEN 5 AND 15');
    }
}
