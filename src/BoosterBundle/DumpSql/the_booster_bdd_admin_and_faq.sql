-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: the_booster_bdd
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `booster`
--

DROP TABLE IF EXISTS `booster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `work_status` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `competence_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `competence_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `competence_3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `competence_4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `competence_5` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `competence_6` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `presentation` text COLLATE utf8_unicode_ci,
  `hours_given` int(11) DEFAULT NULL,
  `project_done_number` int(11) DEFAULT NULL,
  `average_notation` int(11) DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_EF769FAD989D9B62` (`slug`),
  UNIQUE KEY `UNIQ_EF769FADA76ED395` (`user_id`),
  CONSTRAINT `FK_EF769FADA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booster`
--

LOCK TABLES `booster` WRITE;
/*!40000 ALTER TABLE `booster` DISABLE KEYS */;
/*!40000 ALTER TABLE `booster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credits`
--

DROP TABLE IF EXISTS `credits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_instruction_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `attention_required` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `credited_amount` decimal(10,5) NOT NULL,
  `crediting_amount` decimal(10,5) NOT NULL,
  `reversing_amount` decimal(10,5) NOT NULL,
  `state` smallint(6) NOT NULL,
  `target_amount` decimal(10,5) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4117D17E8789B572` (`payment_instruction_id`),
  KEY `IDX_4117D17E4C3A3BB` (`payment_id`),
  CONSTRAINT `FK_4117D17E4C3A3BB` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_4117D17E8789B572` FOREIGN KEY (`payment_instruction_id`) REFERENCES `payment_instructions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credits`
--

LOCK TABLES `credits` WRITE;
/*!40000 ALTER TABLE `credits` DISABLE KEYS */;
/*!40000 ALTER TABLE `credits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,'C’est quoi The Booster ? ','<p>The Booster est la première plateforme de Crowdfunding de Compétences au service de l’Entrepreneuriat et de l’Economie. Elle est gratuite et sans engagement.\nElle s’adresse d’une part à toute personne, en France et dans le monde, désireuse d’aider l’entrepreneuriat et l’économie en investissant son temps libre et ses compétences. Et d’autre part à tout entrepreneur ou porteur de projet qui a besoin d’aide pour faire grandir son projet et son activité.</p>','Vos premiers pas sur The Booster'),(2,'Qui trouve-t-on sur The Booster ? ','<p>La communauté The Booster est composée des : </p><ul><li>\n« Boosters » : toute personne physique désireuse de donner de son temps libre.</li>\n<li>« Boostés » : porteurs de projet, jeunes entrepreneurs, dirigeants d’entreprise.</li></ul>','Vos premiers pas sur The Booster'),(3,'C’est quoi un Coup de Boost ? ','<p>Un Coup de Boost c’est un besoin, une demande d’aide déposée par un Boosté sur le site The Booster. \nCette action permet au Boosté de faire appel à la communauté des Boosters inscrits sur le site.\nUn Coup de Boost ne peut porter que sur une prestation intellectuelle.</p>','Vos premiers pas sur The Booster'),(4,'Qui peut utiliser The Booster ? Combien coûte l’inscription ? ','<p>The Booster est ouvert à toute personne désirant offrir de son temps libre et de ses compétences et à tout entrepreneur ou entreprise ayant des besoins de faire évoluer son activité ou son projet grâce à des prestations intellectuelles.\n</p><ul><li>Pour les Boosters :\nVous devez avoir 18 ans minimum pour vous inscrire sur notre site. Pour valider votre inscription, nous vous demanderons une copie de pièce d\'identité.\n\n</li><li>Pour les Boostés : \nSi vous souhaitez vous inscrire en en tant que personne physique, vous devez avoir 18 ans minimum pour vous inscrire. Pour valider le dépôt d’un projet, nous vous demanderons une copie de votre pièce d\'identité.\nLes personnes morales (entreprises, associations, collectivités territoriales) peuvent également s’inscrire, dès lors qu\'elles renseignent leur SIRET. \n</li></ul><p>Que vous soyez Booster ou Boosté, l’inscription en tant que membre est totalement gratuite et sans engagement.</p>','Vos premiers pas sur The Booster'),(5,'A quoi ça sert de s’inscrire sur The Booster ?','<ul><li>Pour les Boosters, l’inscription permet de créer un espace personnel afin de pouvoir répondre aux demandes de Coup de Boost des Boostés;\n</li><li>Pour les Boostés, l’inscription permet de créer un espace personnel afin de présenter son projet ou son entreprise. Par la suite il pourra y déposer des demandes de Coup de Boost  (ou besoins) afin de solliciter l’aide de l’ensemble des Boosters;\n</li><li>Pour les Boosters autant que les Boostés : recevoir la newsletter The Booster et se tenir au courant des actualités du site et des nouveaux projets.\n</li></ul>','Vos premiers pas sur The Booster'),(6,'Comment s’inscrire sur The Booster ? ','<p>Rien de plus simple :) Rendez-vous sur la page d’inscription. \nIl vous suffit de saisir une adresse email et un mot de passe puis de valider. \nVous recevrez ensuite un email de validation pour activer votre compte.</p>','Vos premiers pas sur The Booster'),(7,'Comment se connecter à mon compte une fois inscrit sur The Booster ?','<p>Une fois inscrit sur The Booster, connectez-vous à tout moment en cliquant sur le lien Se connecter situé en haut à droite du site ou bien en vous rendant directement sur la page de connexion.<p>','Vous êtes un Booster'),(8,'Comment contacter The Booster ?','<p>Pour toute question concernant la gestion de votre compte ou la navigation sur le site, vous pouvez nous contacter à l’adresse suivante : contact@the-booster.com</p>','Vos premiers pas sur The Booster'),(9,'Comment donner un Coup de Boost à un Boosté ?','<p>Donner un Coup de Boost c\'est offrir votre temps libre et vos compétences.\nPour cela inscrivez-vous sur The Booster, via la page d’inscription, créez ensuite votre espace personnel et le profil qui détaille vos compétences et vos envies. \nEnfin, il suffit de parcourir le site et de consulter les Coup de Boost déposés par les Boostés. Choisissez celui qui vous intéresse et proposez directement au Boosté, via un message personnalisé, le nombre d’heures que vous désirez lui donner. \nLe Boosté vous contacte en retour via la messagerie interne de The Booster afin que vous puissiez vous rencontrer.</p>','Vous êtes un Booster'),(10,'J\'ai proposé mon aide à un Boosté, comment annuler ma proposition ?','<p>Vous pouvez annuler votre réponse à un Coup de Boost à tout moment : que le Boosté ait accepté votre proposition ou non. Nous vous conseillons afin de respecter une certaine convivialité, quel que soit le stade d\'avancement de votre relation avec le Boosté, de le prévenir le plus rapidement de votre annulation afin qu\'il puisse trouver d\'autres Boosters.</p>','Vous êtes un Booster'),(11,'Comment contacter un Boosté ? ','<p>Pour contacter un Boosté, une messagerie interne est à votre disposition au sein de votre espace personnel. Vous pouvez ainsi communiquer librement et en toute sécurité avec les Boostés qui ont accepté votre aide. Une fois les premiers échanges réalisés et afin de faciliter vos contacts dans la réalité, nous vous conseillons d\'échanger vos coordonnées (téléphone, email, skype...).</br> \nVos coordonnées ne seront visibles que par le Boosté avec lequel vous échangez et ces données ne seront pas accessibles par des tiers.</p>','Vous êtes un Booster'),(12,'Les Contacts directs entre Boosté et Booster sont-ils possibles sur le site ?','<p>Sur The Booster seuls les Boostés ont des profils et des présentations visibles de tous, même des visiteurs non-inscrits.</p>\n<p>Lorsque vous êtes inscrit en tant que Booster votre profil est totalement invisible autant pour les visiteurs que pour les Boostés et personne ne peut vous solliciter. \nLes contacts directs ne sont pas possibles.  C\'est uniquement lorsqu\'un Booster propose son aide à un Boosté que la communication entre eux est possible grâce à la messagerie interne du site.</p>','Vous êtes un Booster'),(13,'Comment évaluer un Booster ou un Boosté ?','<p>Evaluer et laisser un commentaire est important.<br/>Après avoir validé sur votre espace personnel la réalisation de votre mise en relation avec un Boosté ou Booster vous pourrez procéder à l’évaluation du Boosté ou Booster : \n</p><ul><li>soit à partir d’un email automatique vous proposant d’évaluer le Booster ou le Boosté. \n</li><li>Soit directement à partir de votre espace personnel en cliquant sur le bouton « Evaluer » qui se trouve au niveau du Coup de Boost que vous avez réalisé.\n</li></ul>\n<p>L’évaluation est simple, elle correspond à votre niveau de satisfaction et d’appréciation de la relation que vous avez vécue. Elle se compose :\nD’une note allant de 1 à 5 étoiles, 5 étant le niveau de satisfaction maximale\nD’un commentaire libre détaillant vos avis et impressions. \n</p><p>\nCes évaluations apparaitront sur le profil du Booster et du Boosté et seront visibles de la manière suivante : \nPour les Boosters : uniquement des Boostés avec lesquels il est en relation. \nPour les Boostés : de l’ensemble des visiteurs du site The Booster. \n</p><p>\nChaque évaluation sera validée par notre équipe de modération (respect des notions d’éthique et de bienveillance du site) puis publiée sur le profil du Boosté et du Booster.</p>','Vous êtes un Booster'),(14,'Quels types de demandes (Coups de Boost) peut-on déposer sur The Booster ?','<p>Notre équipe de modération est là pour vous aider à bien définir votre besoin, votre Coup de Boost.\nThe Booster a mis en place des règles de modération qui nous permettent de valider les projets,  les entreprises et leurs besoins qui correspondent à nos valeurs. \n</p>\n<p>Sur The Booster il n’est pas possible d’utiliser un coup de boost pour : </p>\n<ul><li> vendre un produit ou un service ou en faire la publicité,\n</li><li> recruter, \n</li><li> demander la réalisation d’une prestation manuelle,\n</li><li> publier une annonce à caractère commercial ou promotionnel,\n</li><li> contribuer à la réalisation ou le développement d’une activité illicite ou en contradiction avec la loi. </li></ul>','Vous êtes un Boosté'),(15,'Comment déposer un Coup de Boost sur The Booster ?','<p>Pour déposer un Coup de Boost deux possibilités :</p> \n<ul><li>soit vous êtes déjà inscrit et vous avez validé la présentation de votre projet ou de votre entreprise, il suffit alors de déposer autant de Coups de Boost que souhaité, rendez-vous sur la partie droite de votre espace personnel dédié : Déposer un Coup de Boost  \n</li><li>soit il faut vous inscrire sur The Booster, via la page d’inscription, compléter la présentation de votre projet ou de votre entreprise. Une fois votre présentation validée (par notre équipe de modération) vous pourrez alors déposer autant de Coups de Boost que souhaité.</li></ul>\n','Vous êtes un Boosté'),(16,'Quand et comment annuler le dépôt d\'un Coup de Boost ?','<p>Vous pouvez annuler le dépôt d\'un Coup de Boost à tout moment et sans aucune justification. Cependant si vous avez déjà initié un contact avec un Booster, nous vous conseillons de le prévenir directement de l\'annulation de votre besoin.</p>','Vous êtes un Boosté'),(17,'Comment modifier son Coup de Boost ?','<p>Si vous désirez modifier totalement votre Coup de Boot nous vous conseillons de le supprimer et d\'en créer un nouveau. \n</p><p>Cependant si vous désirez modifier ou apporter des détails supplémentaires à votre Coup de Boost sachez que celui-ci devra être à nouveau modéré puis validé par nos équipes. Pendant le temps de la modération votre Coup de Boost n\'est plus visible sur le site. Les Boosters qui auraient déjà proposé leur aide sont prévenus et mis en attente.</p>','Vous êtes un Boosté'),(18,'Peut-on améliorer la visibilité de ses Coups de Boost sur le site ? ','<p>Nous avons mis en place des services payants qui permettent d\'accroître la visibilité de votre projet ou votre entreprise et donc de faciliter l\'accès à l\'ensemble de vos Coups de Boost.\n</p><p>2 solutions sont proposées : </p>\n<ul><li>A la Une\n</li><li>En tête de liste\n</li></ul>\n<p>Vous pouvez souscrire à ces services au moment du dépôt de votre besoin (Coup de Boost) ou à n’importe moment pour les besoins que vous avez déjà publiés.\nPour cela il suffit de cliquer sur le bouton « Mettre en avant » que vous trouverez dans votre espace personnel puis de sélectionner l\'option choisie (A la Une ou En tête de Liste).</p>','Vous êtes un Boosté'),(19,'Les Contacts directs entre Boosté et Booster sont-ils possibles sur le site ?','<p>Sur The Booster seuls les Boostés ont des profils et des présentations visibles de tous, même des visiteurs non-inscrits. \nLorsque vous êtes inscrit en tant que Booster votre profil est totalement invisible autant pour les visiteurs que pour les Boostés et personne ne peut vous solliciter. \nLes contacts directs ne sont pas possibles.  C\'est uniquement lorsqu\' un Booster propose son aide à un Boosté que la communication entre eux est possible.</p>','Vous êtes un Boosté'),(20,'The Booster : une plateforme gratuite','<p>L\'ensemble du site, depuis les processus d\'inscription jusqu\'aux mises en relation est gratuit. Ainsi The Booster vous offre une plateforme unique et entièrement gratuite afin de faciliter les rencontres, la génération de projets et leur réalisation.\n</p><p>Seuls les services proposés aux Boostés pour accroître la visibilité de leurs Coups de Boost sont payants et optionnels. \nLa communauté des Boosters ne sera jamais sollicitée commercialement de notre part ou incitée à payer un service.</p>','Fonctionnement de The Booster'),(21,'Quelle confidentialité pour mes données ?','<p>Nous sommes particulièrement attachés à la confidentialité des informations soumises par nos utilisateurs. \n</P><P>Nous ne divulguons aucune information sur nos utilisateurs, nous ne fournissons en aucun cas des données personnelles à des tiers ou à des partenaires. Pour toute demande d\'information complémentaire, n\'hésitez pas à nous écrire à : contact@the-booster.com</P>','Fonctionnement de The Booster'),(22,'Vous avez constaté un fonctionnement anormal ?','<p>Bien que nous veillions à vous offrir un site et un service le plus fiable et accessible possible, nous ne sommes pas à l’abri de dysfonctionnements lors de votre navigation.\n</p>\n<p>Vous qui êtes les utilisateurs de notre site vous êtes les mieux à même pour nous signaler les dysfonctionnements ou améliorations que vous avez constatés en explorant notre site et ses fonctionnalités. Votre signalement est important car il nous permettra de corriger rapidement le problème.\n</p>\n<p>N\'hésitez donc pas à nous contacter à contact@the-booster.com afin de nous signaler tout fonctionnement anormal, et en nous apportant le plus de détails possibles sur le problème rencontré.</p>','D’autres questions ?'),(23,'Vous avez constaté un comportement contraire aux valeurs de The Booster ?','<p>The Booster est une communauté naissante et notre rôle est d\'encadrer, de surveiller et modérer l\'ensemble des contenus de notre site. Cependant, notre engagement éthique va au delà de la simple mise en relation entre les Boostés et les Booster. Nous sommes très vigilants sur le fonctionnement et les relations qui se nouent grâce à nos efforts et souhaitons être informés de tout usage ou comportement qui ne serait pas en phase avec nos valeurs.\nEn tant qu\'utilisateurs de notre plateforme, c\'est grâce à vous qu\'elle grandit et se développe en permanence, c\'est donc vous qui êtes les plus à même de nous signaler ce qui peut vous sembler anormal ou les situations pouvant poser problème.\n</p>\n<p>Nous sommes à votre écoute via l\'adresse contact@the-booster.com</p>','D’autres questions ?'),(24,'Vous avez une suggestion à nous faire ?','<p>Nous sommes convaincus que c’est grâce aux remarques et suggestions de nos membres que The Booster pourra toujours mieux répondre à leurs attentes.\nNous sommes donc toujours à l\'écoute de vos bonnes idées, suggestions d\'améliorations et demandes de fonctionnalités!\n</p>\n<p>Merci de nous faire part de toutes vos bonnes idées : contact@the-booster.com</p>','D’autres questions ?');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financial_transactions`
--

DROP TABLE IF EXISTS `financial_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financial_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `extended_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:extended_payment_data)',
  `processed_amount` decimal(10,5) NOT NULL,
  `reason_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `requested_amount` decimal(10,5) NOT NULL,
  `response_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `tracking_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_type` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1353F2D9CE062FF9` (`credit_id`),
  KEY `IDX_1353F2D94C3A3BB` (`payment_id`),
  CONSTRAINT `FK_1353F2D94C3A3BB` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_1353F2D9CE062FF9` FOREIGN KEY (`credit_id`) REFERENCES `credits` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financial_transactions`
--

LOCK TABLES `financial_transactions` WRITE;
/*!40000 ALTER TABLE `financial_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `financial_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `title` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `type_project` tinyint(1) DEFAULT NULL,
  `siret_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `professional_function` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `validation_society` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`),
  UNIQUE KEY `UNIQ_957A6479444F97DD` (`phone`),
  UNIQUE KEY `UNIQ_957A64793D05145B` (`siret_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (1,'guylaine@the-booster.com','guylaine@the-booster.com','guylaine@the-booster.com','guylaine@the-booster.com',1,NULL,'$2y$13$rCL8hDl1CdYkGNT/FYqvt.znseylX4ZtepVUWcX6jQOnvbUcav/tW','2017-02-02 10:43:14','-uUwzMVumDjqnb4rOz5ml1l1TCmeUP5GJ-zAW-68RT0',NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}','Mme','Antonini','Guylaine',NULL,'2017-02-02 10:18:00',NULL,NULL,NULL,NULL,1),(3,'nicolas@the-booster.com','nicolas@the-booster.com','nicolas@the-booster.com','nicolas@the-booster.com',1,NULL,'$2y$13$3t4T5SvubqYUdUkKzb03/u/cnHVWtN5ArtW0z1iQ9ozpg94hfMhQK','2017-02-02 10:54:39','cRvfs99rseEtRGA7Ei-DY66FOLv8xbCw1RD1kC9La7c',NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}','M.','Antonini','Nicolas',NULL,'2017-02-02 10:51:00',NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger`
--

DROP TABLE IF EXISTS `messenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `user1_read` tinyint(1) NOT NULL DEFAULT '0',
  `user2_read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_E22A430156AE248B` (`user1_id`),
  KEY `IDX_E22A4301441B8B65` (`user2_id`),
  CONSTRAINT `FK_E22A4301441B8B65` FOREIGN KEY (`user2_id`) REFERENCES `fos_user` (`id`),
  CONSTRAINT `FK_E22A430156AE248B` FOREIGN KEY (`user1_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger`
--

LOCK TABLES `messenger` WRITE;
/*!40000 ALTER TABLE `messenger` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_instruction_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E52FFDEE8789B572` (`payment_instruction_id`),
  CONSTRAINT `FK_E52FFDEE8789B572` FOREIGN KEY (`payment_instruction_id`) REFERENCES `payment_instructions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_instructions`
--

DROP TABLE IF EXISTS `payment_instructions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10,5) NOT NULL,
  `approved_amount` decimal(10,5) NOT NULL,
  `approving_amount` decimal(10,5) NOT NULL,
  `created_at` datetime NOT NULL,
  `credited_amount` decimal(10,5) NOT NULL,
  `crediting_amount` decimal(10,5) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `deposited_amount` decimal(10,5) NOT NULL,
  `depositing_amount` decimal(10,5) NOT NULL,
  `extended_data` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:extended_payment_data)',
  `payment_system_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reversing_approved_amount` decimal(10,5) NOT NULL,
  `reversing_credited_amount` decimal(10,5) NOT NULL,
  `reversing_deposited_amount` decimal(10,5) NOT NULL,
  `state` smallint(6) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_instructions`
--

LOCK TABLES `payment_instructions` WRITE;
/*!40000 ALTER TABLE `payment_instructions` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_instructions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_instruction_id` int(11) NOT NULL,
  `approved_amount` decimal(10,5) NOT NULL,
  `approving_amount` decimal(10,5) NOT NULL,
  `credited_amount` decimal(10,5) NOT NULL,
  `crediting_amount` decimal(10,5) NOT NULL,
  `deposited_amount` decimal(10,5) NOT NULL,
  `depositing_amount` decimal(10,5) NOT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `reversing_approved_amount` decimal(10,5) NOT NULL,
  `reversing_credited_amount` decimal(10,5) NOT NULL,
  `reversing_deposited_amount` decimal(10,5) NOT NULL,
  `state` smallint(6) NOT NULL,
  `target_amount` decimal(10,5) NOT NULL,
  `attention_required` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_65D29B328789B572` (`payment_instruction_id`),
  CONSTRAINT `FK_65D29B328789B572` FOREIGN KEY (`payment_instruction_id`) REFERENCES `payment_instructions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `society_id` int(11) DEFAULT NULL,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_status` tinyint(1) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `given_time` int(11) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2FB3D0EEE6389D24` (`society_id`),
  CONSTRAINT `FK_2FB3D0EEE6389D24` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_subscription`
--

DROP TABLE IF EXISTS `project_subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booster_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `given_time` int(11) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booster_commentaries` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `society_commentaries` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `booster_note` int(11) DEFAULT NULL,
  `society_note` int(11) DEFAULT NULL,
  `booster_validation` tinyint(1) NOT NULL DEFAULT '0',
  `society_validation` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_896180B0F85E4930` (`booster_id`),
  KEY `IDX_896180B0166D1F9C` (`project_id`),
  CONSTRAINT `FK_896180B0166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  CONSTRAINT `FK_896180B0F85E4930` FOREIGN KEY (`booster_id`) REFERENCES `booster` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_subscription`
--

LOCK TABLES `project_subscription` WRITE;
/*!40000 ALTER TABLE `project_subscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `society`
--

DROP TABLE IF EXISTS `society`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `society` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `society_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `punch_line` longtext COLLATE utf8_unicode_ci NOT NULL,
  `presentation` longtext COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hours_taken` int(11) DEFAULT NULL,
  `average_notation` int(11) DEFAULT NULL,
  `project_done_number` int(11) DEFAULT NULL,
  `denied_boosters` int(11) DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D6461F2989D9B62` (`slug`),
  UNIQUE KEY `UNIQ_D6461F2A76ED395` (`user_id`),
  CONSTRAINT `FK_D6461F2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `society`
--

LOCK TABLES `society` WRITE;
/*!40000 ALTER TABLE `society` DISABLE KEYS */;
/*!40000 ALTER TABLE `society` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `society_id` int(11) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_723705D1E6389D24` (`society_id`),
  CONSTRAINT `FK_723705D1E6389D24` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-02 11:02:33
