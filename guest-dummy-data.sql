-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `guest_list` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `guest_list`;

DROP TABLE IF EXISTS `guests`;
CREATE TABLE `guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(191) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `plus_one_first_name` varchar(191) NOT NULL,
  `plus_one_last_name` varchar(191) NOT NULL,
  `traveling` tinyint(1) NOT NULL DEFAULT '0',
  `plus_one` tinyint(1) NOT NULL DEFAULT '0',
  `bringing_plus_one` varchar(191) DEFAULT NULL,
  `has_kids` tinyint(1) NOT NULL DEFAULT '0',
  `bringing_kids` varchar(191) DEFAULT NULL,
  `RSVP` longtext,
  `rsvp_answer` varchar(191) DEFAULT NULL,
  `food_allergies` longtext,
  `song_choices` longtext,
  `additional_comments` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `guests` (`id`, `email`, `first_name`, `last_name`, `plus_one_first_name`, `plus_one_last_name`, `traveling`, `plus_one`, `bringing_plus_one`, `has_kids`, `bringing_kids`, `RSVP`, `rsvp_answer`, `food_allergies`, `song_choices`, `additional_comments`) VALUES
(1,	'vstandish0@edublogs.org',	'Doralia',	'Measor',	'',	'',	1,	0,	'',	0,	'',	'No, I\'m lame.',	'Not attending',	'Nope! See below',	'Sorry, doubt DJ has ever heard of any I would request',	'Meat, just need my more meat!'),
(2,	'jandree1@fotki.com',	'Maximilianus',	'Boagey',	'Jaclin',	'Andree',	0,	0,	'',	1,	'Yes',	'I\'ll be visiting um, Stormwind. Yeah, Stormwind. You can mail me at 123 Stormwind City, Elwynn Forest.',	'Attending',	'Balls',	'Lionel Richie\r\nAugust burns red\r\nBlue oyster cult\r\nAlex knows the rest',	'We\'re coming, duh. More balls. Burnt cheese. Ass. Balls. Ass. :)'),
(3,	'ckeaves2@skyrock.com',	'Jacky',	'Pole',	'Clim',	'Keaves',	1,	0,	'',	0,	'',	'Duh. I\'m in your wedding party. Do I have a choice?',	'Attending',	'',	'',	''),
(4,	'ybenian3@gravatar.com',	'Krissy',	'Judkins',	'',	'',	1,	0,	NULL,	0,	NULL,	'Duh. I\'m in your wedding party. Do I have a choice?',	'Attending',	NULL,	NULL,	NULL),
(5,	'sbeccero4@163.com',	'Harbert',	'Morse',	'',	'',	1,	0,	NULL,	0,	NULL,	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	NULL,	NULL,	NULL),
(6,	'eyukhnov5@scientificamerican.com',	'Rocky',	'Stebbings',	'Jenny',	'Stebbings',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'',	'You guys better pose for some great ass pictures with us!'),
(7,	'tvalente6@nih.gov',	'Welbie',	'Soares',	'',	'',	0,	1,	'Yes',	0,	'',	'Two words. Free. Booze.',	'Attending',	'',	'Gay bar by electric six',	'I wish to be a pretty pretty princess '),
(8,	'ccram7@walmart.com',	'Aleen',	'Vaune',	'',	'',	1,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'',	''),
(9,	'lskerrett8@ezinearticles.com',	'Benni',	'Withrop',	'',	'',	1,	1,	'No',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'Bubble bath. Donâ€™t serve bubble bath. ',	'Any dream street song, obviously. ',	'ðŸ’ƒðŸ»â¤ï¸ðŸ˜'),
(10,	'cshallow9@so-net.ne.jp',	'Iosep',	'Francois',	'Cher',	'Shallow',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'Nope',	'21 Pilotsâ€”migraine, trees, fake you out, semi-automatic',	'Hey! We like your faces!'),
(11,	'wkemballa@canalblog.com',	'Cassandry',	'Purkis',	'',	'',	0,	0,	'',	1,	'No',	'This is my chance to catch the bouquet!',	'Attending',	'None',	'',	''),
(12,	'jcapinib@weather.com',	'Oralla',	'Kirrens',	'Josy',	'Capini',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'',	'Canâ€™t wait to celebrate!!!'),
(13,	'awaggc@e-recht24.de',	'Hakeem',	'Corsan',	'Abbye',	'Corsan',	0,	0,	'',	1,	'Yes',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'',	''),
(14,	'sleverittd@vistaprint.com',	'Gallagher',	'Dorsey',	'Sadella',	'Dorsey',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'I donâ€™t eat foodðŸ˜¬',	'Anything from Marianaâ€™s Trench â£ï¸',	'I love you both ðŸ˜Š'),
(15,	'ddanielovitche@fastcompany.com',	'Esra',	'Dutson',	'',	'',	0,	1,	'Yes',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'None',	'Tim McGraw - When The Stars Go Blue',	'Bringing my gf since Alex said yes! Oh and I\'m stupid excited for you two!!! '),
(16,	'ddaniellotf@fema.gov',	'Kellyann',	'Iorizzo',	'Chris',	'Iorizzo',	0,	0,	'',	1,	'No',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'None',	'',	'Can\'t wait! However, have any winter jackets we can borrow!?! Hahaha'),
(17,	'mprobbingg@sourceforge.net',	'Roma',	'Anten',	'Moria',	'Probbing',	0,	0,	NULL,	1,	NULL,	'Duh. I\'m in your wedding party. Do I have a choice?',	'Attending',	NULL,	NULL,	NULL),
(18,	'rvertyh@slideshare.net',	'Selma',	'Claypoole',	'Garren',	'Claypoole',	1,	0,	NULL,	0,	NULL,	NULL,	'Not attending',	NULL,	NULL,	NULL),
(19,	'gloweryi@microsoft.com',	'Andrus',	'Elder',	'',	'',	1,	1,	NULL,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(20,	'ngingellj@about.com',	'Herold',	'Stayt',	'Anna',	'Stayt',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'',	'Congrats! Let us know if there\'s anything specific you\'d like us to bring!!!!'),
(21,	'awoosnamk@uol.com.br',	'Omero',	'Kinnie',	'',	'',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'N/A',	'Free Bird',	'ummm.....no?'),
(22,	'jclelll@cdbaby.com',	'Aimil',	'Rauprich',	'',	'',	1,	1,	'No',	0,	'',	'Duh. I\'m in your wedding party. Do I have a choice?',	'Attending',	'Nope. I love food. I just hope there will be a candy dish of red sour patch kids in a bowl. ',	'I\'ll make a list because you know I love music',	'I love you and I am so happy you\'re marrying the man of your dreams. We\'ve been through tons of jerks and it\'s about damn time you found your prince!'),
(23,	'cmavenm@opera.com',	'Dud',	'Corbie',	'Josie',	'Corbie',	0,	0,	'',	0,	'',	'I can only make it to the reception.',	'Attending reception',	'nope!',	'fun ones ;)',	'I wish I could be there for the ceremony, but I\'m excited to come celebrate at the reception!!!'),
(24,	'fflochn@mediafire.com',	'Nobie',	'Braunthal',	'',	'',	1,	1,	'Yes',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'I only eat vegetables. but i\'m pretty sure you know this.',	'',	'Miles is probably coming. Unless he has lab. Stupid lab.'),
(25,	'tfitchewo@shop-pro.jp',	'Cassaundra',	'McRobb',	'Dennis',	'McRobb',	1,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'',	''),
(26,	'afairmanp@tripod.com',	'Lalo',	'Davids',	'',	'',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'Fall out boy ',	''),
(27,	'ztongeq@bandcamp.com',	'Tab',	'Greensite',	'',	'',	1,	0,	'',	0,	'',	'I\'ll be visiting um, Stormwind. Yeah, Stormwind. You can mail me at 123 Stormwind City, Elwynn Forest.',	'Not attending',	'',	'',	'Im sorry :('),
(28,	'griolfir@dell.com',	'Gerta',	'Starten',	'Kip',	'Starten',	0,	0,	'',	0,	'',	'Duh. I\'m in your wedding party. Do I have a choice?',	'Attending',	'I\'m allergic to what ever is in vegan food ',	'What\'s new pussy cat and I\'m in love with a stripper since that\'s how you met ',	'If you have grilled cheese ill have 2. Will be bringing the wife and kid'),
(29,	'hdickensons@clickbank.net',	'Marlin',	'Readett',	'Alyssa',	'Readett',	0,	0,	'',	1,	'',	'This is my chance to catch the bouquet!',	'Attending',	'',	'The Jeff Healey band-Angel eyes',	'I will bring Stunner for sure. Will try and leave kids but unsure on that'),
(30,	'rnothert@ycombinator.com',	'Maryanna',	'Rangall',	'',	'',	0,	1,	'Yes',	0,	'',	'Two words. Free. Booze.',	'Attending',	'No',	'',	'Will Edwardo be attending?'),
(31,	'lgoodbyu@ycombinator.com',	'Chrotoem',	'Bonallack',	'',	'',	0,	1,	'Yes',	0,	'',	'This is my chance to catch the bouquet!',	'Attending',	'No',	'No',	''),
(32,	'iableyv@apache.org',	'Randell',	'Heims',	'Cindy',	'Heims',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'',	''),
(33,	'lhatreyw@earthlink.net',	'Gunter',	'Peiser',	'Lianna',	'Hatrey',	1,	0,	NULL,	0,	NULL,	'No, I\'m lame.',	'Not attending',	NULL,	NULL,	NULL),
(34,	'echattox@drupal.org	',	'Correy',	'Manz',	'',	'',	1,	1,	NULL,	0,	NULL,	NULL,	'Not attending',	NULL,	NULL,	NULL),
(35,	'atimbsy@bloglovin.com',	'Fallon',	'Grouvel',	'Nick',	'Grouvel',	0,	0,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(36,	'aspoerlz@moonfruit.com',	'Meridith',	'Normand',	'',	'',	0,	1,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'',	'Love â¤ï¸You found your Ever After Love!ðŸ’•'),
(37,	'tbodycote10@trellian.com',	'Carlyle',	'Kaveney',	'',	'',	0,	1,	'Yes',	0,	'',	'Two words. Free. Booze.',	'Attending',	'Shellfish for my +1',	'Dream On(Aerosmith), Billy Jean(Michael Jackson), Ice Ice Baby(Vanilla Ice), Too Legit(To Quit)(MC Hammer)',	'Suck it Trebek'),
(38,	'madger11@wsj.com',	'Doria',	'Gaiter',	'Jim',	'Gaiter',	1,	0,	NULL,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(39,	'pittman.jessican@gmail.com',	'Jessica',	'Pittman',	'Alex',	'Stamos',	1,	1,	NULL,	0,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(40,	'rjosilowski12@live.com',	'Domeniga',	'Spofforth',	'Jeff',	'Spofforth',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'N/A ',	'',	''),
(41,	'bnizet13@usatoday.com',	'Torie',	'Goodbarne',	'',	'',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'no\r\n',	'Last Dance',	''),
(43,	'ejohann14@rakuten.co.jp',	'Agnese',	'O\'Harney',	'',	'',	0,	1,	'1',	0,	NULL,	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	NULL,	NULL,	NULL),
(44,	'mocrevy15@eepurl.com',	'Pandora',	'Reams',	'',	'',	0,	1,	'Yes',	0,	'',	'I can only make it to the ceremony.',	'Attending ceremony',	'No',	'',	''),
(45,	'phafford16@joomla.org',	'Marcus',	'Gethings',	'Janice',	'Gethings',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'No',	'Sugar Shack by Jimmy Gilmore and the Fireballs',	'Looking forward to a fun day.  You two are adorable'),
(46,	'lnewell17@reddit.com',	'Seumas',	'Poulett',	'Ayrin',	'Poulett',	1,	0,	NULL,	1,	NULL,	NULL,	'Not attending',	NULL,	NULL,	NULL),
(47,	'dbritch18@smugmug.com',	'Evangelin',	'Elkins',	'JC',	'Elkins',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'',	''),
(48,	'deasbie19@drupal.org',	'May',	'Shuker',	'',	'',	0,	1,	'Yes',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'None',	'oldies!! 60\"s-80\"s',	''),
(49,	'rbollin1a@chronoengine.com',	'Lisa',	'Salvatore',	'Del',	'Salvatore',	0,	0,	'',	0,	'',	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	'',	'\"Hello\" by Adele',	'Can the Butt Seester show up,,,,,,just kidding'),
(50,	'bmullane1b@google.de',	'Roshelle',	'Caseri',	'',	'',	0,	1,	'1',	0,	NULL,	'I would never dream of missing it! After all, it\'s bound to be a night full of questionable dancing.',	'Attending',	NULL,	NULL,	NULL);

-- 2019-12-07 14:19:45
