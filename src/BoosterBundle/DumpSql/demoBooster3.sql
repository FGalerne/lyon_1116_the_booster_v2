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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booster`
--

LOCK TABLES `booster` WRITE;
/*!40000 ALTER TABLE `booster` DISABLE KEYS */;
INSERT INTO `booster` VALUES (1,1,'0fd0946a7a08553de28dfcc599e615b7.jpeg','Grenoble',38000,'1985-10-29','Acteur','Marketing','Communication','Développement Commercial','Gestion financière (finance, comptabilité, …)','Projet de financement, d’Investissement','Ressources Humaines','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisedc.<span style=\"text-decoration: underline;\"><strong></strong></span><strong></strong>',NULL,NULL,NULL,'21f2ba16ca55395ae0c2a99d54607ad3'),(2,3,'1986462b09f77ca1642c77b21a497356.png','Saint-Etienne',42000,'1977-07-17','Marketing Sportif','Marketing','Communication','Développement Commercial','Gestion financière (finance, comptabilité, …)','Projet de financement, d’Investissement','Ressources Humaines','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco',NULL,NULL,NULL,'300efd384c70d698bd90ed7453d04ddf'),(3,14,NULL,'fribourg en brisgau',27458,'1982-06-13','Entrepreneur','Digital','Projet de financement, d’Investissement','Juridique','Communication',NULL,NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at purus nibh. Cras metus nulla, vestibulum in auctor ac, fermentum vitae tellus. Donec sed aliquam nisl. Sed eu leo id est pretium',3,1,5,'253d946e5bcac3dcc2e2a1534e161153');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (1,'hello@riadhacini.com','hello@riadhacini.com','hello@riadhacini.com','hello@riadhacini.com',1,NULL,'$2y$13$gT5LO3WWV6wNikpPJ7ERau4WN7Xi/kp6UA.zbm9FqnEyP9Hil1UYK','2017-01-25 17:37:46','SpGd8gMqRnT3Dm-rTMjPRD3URMFC71q1r9nXChS6tEc',NULL,'a:1:{i:0;s:12:\"ROLE_BOOSTER\";}','M.','Chabat','Alain',NULL,'2017-01-25 11:42:00',NULL,NULL,NULL,NULL,1),(2,'riad.hacini.pro@gmail.com','riad.hacini.pro@gmail.com','riad.hacini.pro@gmail.com','riad.hacini.pro@gmail.com',1,NULL,'$2y$13$dgiPMtNlktQX3suuU06Qe.JQm.2xopnv/C9geVPSbk2HnIP4PEBte','2017-01-25 15:55:17','Edf_30VJATi6Mjbh2VwaEDy7suUR0jmbG-pE-LQErR4',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','Hacini','Riad',638933008,'2017-01-25 11:56:00',1,NULL,'Developpeur','RIAD HACINI S.A.R.L',1),(3,'booster1@test.com','booster1@test.com','booster1@test.com','booster1@test.com',1,NULL,'$2y$13$ZCYfgkmWzvUMcAG3osbiTud5sAspH2vUlgQ7NibDvP9OHcVKPDBwm','2017-01-27 14:27:06','c79yCE-2ehGKXiC560IdAG2JHDNUiJWDaGnsKmDsUD0',NULL,'a:1:{i:0;s:12:\"ROLE_BOOSTER\";}','M.','Federer','Roger',NULL,'2017-01-25 16:15:00',NULL,NULL,NULL,NULL,1),(4,'booste1@test.com','booste1@test.com','booste1@test.com','booste1@test.com',1,NULL,'$2y$13$a8hidB5gqbgSxWOOFSDf5.2BWz1um/nhplAhXH/Hm.3fj/ot7IAaS','2017-01-27 14:33:13','9R0sT3GQ8ZSCf2d5FIDK0_JvEfQjjWR8A_t3FLzdiPs',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','Gandon','Laurie',606060606,'2017-01-25 16:20:00',1,NULL,'CTO','Les Leadeuses',1),(5,'booster2@test.com','booster2@test.com','booster2@test.com','booster2@test.com',1,NULL,'$2y$13$aP/0UlOuzZaTJNbqDnwFXupA.uOID801Mpm8nDHMrGZN5MOgHg5XK','2017-01-27 13:25:11','DKQupk-mrDNqkz4o-hGmusAXvGMP_uArY-Uj53mDOVE',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','Hacini','Riad',638921138,'2017-01-25 16:23:00',0,'12345678912345','Développeur','Espeka S.A.R.L',1),(6,'booster3@test.com','booster3@test.com','booster3@test.com','booster3@test.com',1,NULL,'$2y$13$jsQ/hhN4qcO1JsC0f3X2Qug1DhUuXWYYULT3QtFJ1p6F.tnidhOCa','2017-01-27 10:08:38','XkJKASB6UPkN8UKBbR9YBGOCu-N-VhabBDJeShpM3ZQ',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','Silva','Axelle',632254578,'2017-01-25 16:28:00',1,NULL,'Developpeuse','Ax-Web',1),(7,'booste2@test.com','booste2@test.com','booste2@test.com','booste2@test.com',1,NULL,'$2y$13$7yoObEfX.qac2y473sjnBerS2lg1JcbfuPyzGNcYY.QnkiVaI8rba','2017-01-27 14:33:42','Aw_b7FF4ST0wHtSKwBjhpLBbHbSYjhBeXzHAPyvgjxI',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','Chanteloup','Yann',202020202,'2017-01-25 16:49:00',1,NULL,'Photographe','Yann Photography',1),(8,'booste4@test.com','booste4@test.com','booste4@test.com','booste4@test.com',1,NULL,'$2y$13$da9xFGLBgCuBBQi1xXW.nuWNaFn6fMYQZNVTpsY.GWZpsfrBnAHe2','2017-01-25 16:53:58','OotGLmMAB24vQPo_Y829QZvCg7G-JdOmftELHJXRw-w',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','PainAuChocolat','Christian',303030303,'2017-01-25 16:52:00',0,'14785236985214','Developpeur','La Mie Caline',1),(9,'booste5@test.com','booste5@test.com','booste5@test.com','booste5@test.com',1,NULL,'$2y$13$09/vIbrpL.TYYDFuynrg3..wOqBJ/MfeJLjECbvMM1igBmwGBR6.y','2017-01-25 16:56:57','cOG06539U0RvgotPiEFaj1l5mQ41SNkPtl71le92xUQ',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','Gomes','Nicolas',125458796,'2017-01-25 16:55:00',1,NULL,'Developpeur','NGDO.COM',1),(10,'booste6@test.com','booste6@test.com','booste6@test.com','booste6@test.com',1,NULL,'$2y$13$dI87JmNGtXYD2ny8vtQuQOj7TOqjFMd7CrDF.bAmYD/OQH9fnLwQW','2017-01-25 16:59:30','xgy26xEHNBIIRRZpQw3xqcGKSNRZGJ3iCU5XSs27ZK4',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','Javazzo','Kevin',258745698,'2017-01-25 16:58:00',1,NULL,'50 Balles','50balles Corp.',1),(11,'booste7@test.com','booste7@test.com','booste7@test.com','booste7@test.com',1,NULL,'$2y$13$J1VcSG4WFdza8ZAN.kH5D.byCHErnMncmWpn4l2MDzoBfdvJAdp3e','2017-01-25 17:22:06','5eZ490W5oD4Mj7MU60Iizi13QGGY1FII_Ry3OkPcYNo',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','Dabin','Florent',212459865,'2017-01-25 17:20:00',0,'12589632547895','CTO','Dabin & Cie.',1),(12,'booste8@test.com','booste8@test.com','booste8@test.com','booste8@test.com',1,NULL,'$2y$13$g.14cBhqxXO8413bMwYjZ.32L/mKftxP.4O96T/VXRQ1LWijEeSnW','2017-01-25 17:24:40','QoKi_PbSg40RPG2Qyb7mMEtsJV0xjO_ZnDVO5f1ykbA',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','Fradet','Alexandre',1458796512,'2017-01-25 17:23:00',1,NULL,'JAVA','Fradou',1),(13,'booste9@test.com','booste9@test.com','booste9@test.com','booste9@test.com',1,NULL,'$2y$13$viJKfEqER3rMqSscBxjPwO.xE9ihbIIw4v6d9wDRC7PfET5G00CYm','2017-01-25 17:31:18','Ke45v8LYzjRNX0Hfa-yO6QCt6HpwKjCAOipNaOX3dIo',NULL,'a:1:{i:0;s:11:\"ROLE_BOOSTE\";}','M.','Janvier','Matthieu',638921158,'2017-01-25 17:29:00',0,'14569852365478','President','ASSE Coeur Vert',1),(14,'booster4@test.com','booster4@test.com','booster4@test.com','booster4@test.com',1,NULL,'$2y$13$X82lOhq3xgkbpJFMP/z0AuYEMXy1hz7YMjCGVvr/TYMcHdWWiyP0K','2017-01-27 14:31:17','AEBhSPhb5lY8sDTjDQQxgjCgvhWEO7htLys9cyM_OSI',NULL,'a:1:{i:0;s:12:\"ROLE_BOOSTER\";}','M.','Bono','Jean',NULL,'2017-01-27 10:09:00',NULL,NULL,NULL,NULL,1),(15,'admin@test.com','admin@test.com','admin@test.com','admin@test.com',1,NULL,'$2y$13$ecWWD8HRrqj18IDmpPi3yOSMsHWGdrn4fW9HrEgwqtIm578iIoCxe','2017-01-27 13:27:43','30yzI47FgTYsCbOSAdcoZFr7JQZQ0oTXUSDGFPbfyTE',NULL,'a:2:{i:0;s:12:\"ROLE_BOOSTER\";i:1;s:16:\"ROLE_SUPER_ADMIN\";}','M.','Adi','Jacques',NULL,'2017-01-27 13:26:00',NULL,NULL,NULL,NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger`
--

LOCK TABLES `messenger` WRITE;
/*!40000 ALTER TABLE `messenger` DISABLE KEYS */;
INSERT INTO `messenger` VALUES (1,7,14,'Photographier des petits chatons mignons - Jean','Salut Jean Bonot, j\'accepte avec joie ton coup de boost, je serais enchant&eacute; de travailler avec toi !','2017-01-27 14:05:51',1,0),(2,14,7,'Photographier des petits chatons mignons - Jean','Merci de ta confiance Yann, Quand es-tu disponible ?','2017-01-27 14:08:06',1,0),(3,14,7,'Photographier des petits chatons mignons - Jean','Super, j\'ai &eacute;t&eacute; ravi de travailler avec toi, les photos des chatons sont vraiment <strong>de toute beaut&eacute;</strong> !<br />Je valide la fin du projet de mon cot&eacute;, au plaisir de retravailler ensemble.','2017-01-27 14:10:04',1,0),(4,7,14,'Exposition photo de chats mignons ! - Jean','Salut Jean Bono, j\'accepte &eacute;videment de retravailler avec toi, trops g&eacute;nial !','2017-01-27 14:30:52',1,0),(5,14,7,'Exposition photo de chats mignons ! - Jean','Et voila, c\'est d&eacute;ja termin&eacute;, je valide !','2017-01-27 14:31:59',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,5,'Photographier la lune un soir de pleine lune','Digital','Bonjour, Je souhaite photographier la lune un soir de pleine lune, pour ceci j\'aurrais besoin d\'une assistance technique pour choisir les bons objectifs.',1,'Open',0,'2017-01-27 09:48:41',NULL),(2,5,'Photographier des petits chatons mignons','Marketing','Bonjour, pour une sc&eacute;ance photo de chatons mignons, j\'organise un casting internationnal dans 3 mois. Pour ceci j\'aurais besoin d\'une assistance logistique, trouver le lieu, le jury, etc...',1,'Done',0,'2017-01-27 09:54:15','2017-01-27 14:14:27'),(3,5,'Créer un appareil photo en 4 dimentions','Innovation','Pour la cr&eacute;ation d\'un appareil qui permettra de prendre des photos en 4 dimention, j\'ai besoin des conseils d\'un math&eacute;maticien sp&eacute;cialis&eacute; dans la physique quantique, ou d\'un psychologue.',0,'Open',0,'2017-01-27 09:57:43',NULL),(4,5,'Exposition photo de chats mignons !','Communication','Bonjour, pour l\'organisation d\'une exposition photo de chats mignons en mars 2017, j\'aurais besoin d\'aide pour communiquer sur l\'&eacute;venement.',1,'In_progress',0,'2017-01-27 14:19:31',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_subscription`
--

LOCK TABLES `project_subscription` WRITE;
/*!40000 ALTER TABLE `project_subscription` DISABLE KEYS */;
INSERT INTO `project_subscription` VALUES (1,2,2,'Bonjour Yann, En tant qu\'expert Logisticien, j\'ai d&eacute;ja particip&eacute; &agrave; l\'organisation de tels &eacute;v&eacute;nements dans le pass&eacute;. Je peux vous offrir 7 heures de mon temps pour vous aider &agrave; r&eacute;aliser votre projet.','Open',7,'2017-01-27 10:05:42',NULL,NULL,NULL,NULL,0,0),(2,3,2,'Bonjour Yann, Je m\'appelle Jean Bono, je suis expert en manequina f&eacute;lin, je propose 3 heures de mon temps pour vous aider &agrave; mener &agrave; bien votre projet.<br />Cordialement,','Done',3,'2017-01-27 10:19:48','C\'était génial, un grand merci à Jean Bono !','Génial, j\'ai adoré travailler avec Yann, c\'est le meilleur.',5,4,1,1),(3,2,1,'Bonjour Yann, je suis un champion de la com ! Et je kiff les croquettes! <br />Je t\'offre 6 h de mon temps super pr&eacute;cieux pour t\'aider &agrave; communiquer sur ton &eacute;venement !','Open',6,'2017-01-27 14:22:41',NULL,NULL,NULL,NULL,0,0),(4,3,4,'Salut Yann, j\'aimerais vraiment retravailler avec toi, ton id&eacute;e d\'expo photo est vraiment cool ! Je te donnerais ma vie pour le projet, mais c\'est limit&eacute; &agrave; 12 heures !','In_progress',12,'2017-01-27 14:26:24',NULL,'Parfait, comme toujours <3.',NULL,5,1,0),(5,2,4,'Bonjour Yann, je suis un champion de la com ! Et je kiff les croquettes! <br />Je t\'offre 6 h de mon temps super pr&eacute;cieux pour t\'aider &agrave; communiquer sur ton &eacute;venement !','Open',6,'2017-01-27 14:28:11',NULL,NULL,NULL,NULL,0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `society`
--

LOCK TABLES `society` WRITE;
/*!40000 ALTER TABLE `society` DISABLE KEYS */;
INSERT INTO `society` VALUES (1,2,'14db72e5d046d738ef9f0accc5cc7be0.jpeg','Espeka Secret Project','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad min.','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.<br />Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.espeka.com',NULL,NULL,NULL,NULL,'1952a28a1e0a46716fca758210a955de'),(2,4,'08dba2674809fb94e12b07e60da47268.jpeg','Les Leadeuses','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mifr','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.les-leadeuses.com',NULL,NULL,NULL,NULL,'840292c4194de7683858d001a4788ade'),(3,5,'0e053d1dda5cba5eeaa16e62c72bf1b7.jpeg','Espeka S.A.R.L','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab ld.','<h3>Traduction de H. Rackham (1914)</h3>\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p>','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.espeka.com',NULL,NULL,NULL,NULL,'9496044ee97d33d3b24930a739904057'),(4,6,'de4cd61bf486e8c9b83baac3ee6a2848.jpeg','Ax-Web','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantiumveritatis et quasi architecto beatae vitae dicta sunt explicabo.','<h3>Traduction de H. Rackham (1914)</h3>\r\n<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p>','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.ax-web.com',NULL,NULL,NULL,NULL,'60fa783da6b72bd7ae39dd8daef028a7'),(5,7,'3a49506a424c8261e20573a3d6de3d93.jpeg','Yann Photography','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium !','<h3>Section 1.10.33 du \"De Finibus Bonorum et Malorum\" de Ciceron (45 av. J.-C.)</h3>\r\n<p>\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p>','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.yann.com',3,9,1,NULL,'8362e5de560d48b78b1b6b1cffcf5cba'),(6,8,'9b42549117377b4f5f1e81f58a7c9a5f.jpeg','La Mie Câline','Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestia.','<h3>Section 1.10.33 du \"De Finibus Bonorum et Malorum\" de Ciceron (45 av. J.-C.)</h3>\r\n<p>\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p>','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.lamiecaline.com',NULL,NULL,NULL,NULL,'69a05fd270aa3c025d40a415bd0e5b56'),(7,9,'b16f0534470fd2ad675f6b79542d4e8d.jpeg','NGDO.com','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','<h3>Le passage de Lorem Ipsum standard, utilis&eacute; depuis 1500</h3>\r\n<p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p>','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.ngdo.com',NULL,NULL,NULL,NULL,'782361ae33fd0fa6c11a1b1b84f69021'),(8,10,'f17261db8ca69a0186d456097665d290.jpeg','50 Balles Corporation','Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores','<h3>Section 1.10.32 du \"De Finibus Bonorum et Malorum\" de Ciceron (45 av. J.-C.)</h3>\r\n<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.50balles.com',NULL,NULL,NULL,NULL,'efd12b1d5d58fae933c9567e0859becd'),(9,11,'807c144cffab6bbe5fd139902fab3778.jpeg','Dabin & Cie.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad min.','<h3>Section 1.10.32 du \"De Finibus Bonorum et Malorum\" de Ciceron (45 av. J.-C.)</h3>\r\n<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.dabin.com',NULL,NULL,NULL,NULL,'3fc2f34bcb4cfd0c0e84a4b9b9b5c0ce'),(10,12,'5374980c68135b74f2b2bb7be880b1d7.jpeg','Fradou','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad min.','<h3>Section 1.10.32 du \"De Finibus Bonorum et Malorum\" de Ciceron (45 av. J.-C.)</h3>\r\n<p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.fradou.com',NULL,NULL,NULL,NULL,'422037b153b00b0a84a112881267f894'),(11,13,'9cbbf6e8259fc499be4e755be4de836d.jpeg','ASSE Coeur Vert','But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a com.','<h3>Section 1.10.33 du \"De Finibus Bonorum et Malorum\" de Ciceron (45 av. J.-C.)</h3>\r\n<p>\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p>','https://www.linkedin.com/in/hacini-riad','https://www.facebook.com/riri.caps.3','https://twitter.com/riad_hacini','https://www.youtube.com/user/NormanFaitDesVideos','www.asse-coeurvert.com',NULL,NULL,NULL,NULL,'5572b0abec519b1c5da01c693c8d2670');
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
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` datetime DEFAULT NULL,
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

-- Dump completed on 2017-01-27 14:40:44
