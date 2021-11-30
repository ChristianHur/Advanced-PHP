-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 04:03 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--
DROP TABLE IF EXISTS `Employee`;

CREATE TABLE `Employee` (
  `eid` varchar(50) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`eid`, `first_name`, `last_name`, `email`, `position`, `company`, `country`) VALUES
('0038676', 'Valentine', 'Pitkethly', 'vpitkethly6s@toplist.cz', 'Clinical Specialist', 'Livetube', 'Philippines'),
('0051433', 'Jeanelle', 'Hansod', 'jhansod51@illinois.edu', 'Director of Sales', 'Voomm', 'Poland'),
('0058871', 'Von', 'Gerhartz', 'vgerhartzlo@kickstarter.com', 'Project Manager', 'Pixope', 'Brazil'),
('0065213', 'Kimberlyn', 'Emeney', 'kemeney3l@jiathis.com', 'Automation Specialist I', 'Jaxspan', 'Indonesia'),
('0070282', 'Glynda', 'Dinsey', 'gdinseyhg@yandex.ru', 'Software Engineer III', 'Linktype', 'China'),
('0074720', 'Adella', 'Schuelcke', 'aschuelcken1@nba.com', 'Quality Engineer', 'Abata', 'France'),
('0098309', 'Junie', 'Waistell', 'jwaistelloe@ask.com', 'Civil Engineer', 'Yakidoo', 'Indonesia'),
('0109438', 'Vikky', 'Calderhead', 'vcalderhead62@patch.com', 'Computer Systems Analyst III', 'Midel', 'Russia'),
('0110181', 'Ivy', 'Smullen', 'ismullenfn@harvard.edu', 'Editor', 'Jayo', 'Kenya'),
('0130550', 'Paulie', 'Bendell', 'pbendellps@fda.gov', 'Professor', 'Fivespan', 'Sweden'),
('0140119', 'Fidole', 'Christensen', 'fchristensenrk@mozilla.org', 'Quality Control Specialist', 'Aimbu', 'China'),
('0141685', 'Link', 'Millward', 'lmillward9d@prlog.org', 'Executive Secretary', 'Eimbee', 'South Africa'),
('0146858', 'Opalina', 'Grigoire', 'ogrigoireqj@shutterfly.com', 'Associate Professor', 'Rhynyx', 'China'),
('0173775', 'Cammy', 'Kent', 'ckentr6@ebay.co.uk', 'Marketing Assistant', 'Skimia', 'China'),
('0177358', 'Fawne', 'Witul', 'fwitulcn@bravesites.com', 'Information Systems Manager', 'Quatz', 'Indonesia'),
('0194469', 'Elle', 'Harkin', 'eharkink2@hexun.com', 'Account Representative III', 'Meemm', 'China'),
('0218276', 'Hersh', 'McDonand', 'hmcdonand1z@instagram.com', 'Technical Writer', 'Minyx', 'Portugal'),
('0221596', 'Alana', 'Snailham', 'asnailham1e@storify.com', 'Nurse Practicioner', 'Agivu', 'Indonesia'),
('0231633', 'Kean', 'Allon', 'kallon9t@soup.io', 'VP Marketing', 'Youbridge', 'Canada'),
('0240248', 'Janina', 'Lambrick', 'jlambrickea@blog.com', 'Editor', 'Layo', 'China'),
('0240328', 'Brnaba', 'McCrea', 'bmccreakd@dropbox.com', 'Graphic Designer', 'Browseblab', 'Thailand'),
('0243970', 'Jeth', 'MacGiolla Pheadair', 'jmacgiollapheadairdo@prweb.com', 'Chief Design Engineer', 'Lazz', 'Poland'),
('0261527', 'Hyacinthia', 'Slimmon', 'hslimmonoq@imageshack.us', 'General Manager', 'Avamba', 'Brazil'),
('0266482', 'Francine', 'Jobling', 'fjoblingl1@abc.net.au', 'Structural Engineer', 'Linkbuzz', 'Philippines'),
('0292594', 'Livia', 'Merle', 'lmerledg@mashable.com', 'Clinical Specialist', 'Pixope', 'China'),
('0293743', 'Shell', 'Casswell', 'scasswelldu@t-online.de', 'Staff Scientist', 'Devbug', 'Estonia'),
('0296400', 'Myer', 'Cosser', 'mcossere2@ibm.com', 'Administrative Officer', 'BlogXS', 'Palestinian Territory'),
('0297009', 'Estevan', 'Martynka', 'emartynkabh@homestead.com', 'Dental Hygienist', 'Tambee', 'Bangladesh'),
('0297252', 'Aurea', 'Beeho', 'abeeho9r@google.com.au', 'Dental Hygienist', 'Skinix', 'Ivory Coast'),
('0300136', 'Jeromy', 'Nickolls', 'jnickolls9u@fema.gov', 'Analyst Programmer', 'Fivechat', 'Czech Republic'),
('0304387', 'Helsa', 'Flatley', 'hflatleyj3@eepurl.com', 'Assistant Professor', 'Shufflester', 'Ghana'),
('0369061', 'Dew', 'Caulkett', 'dcaulkett6n@reuters.com', 'Administrative Assistant I', 'Flipbug', 'Kenya'),
('0374145', 'Nikita', 'Meak', 'nmeakec@ucla.edu', 'Geological Engineer', 'Wikivu', 'Norway'),
('0387660', 'Gerta', 'Gittus', 'ggittusce@youku.com', 'Information Systems Manager', 'Centidel', 'Vietnam'),
('0406673', 'Nedi', 'Standell', 'nstandellja@smugmug.com', 'Account Coordinator', 'Youspan', 'United States'),
('0423825', 'Ronald', 'Stonebridge', 'rstonebridge5v@nih.gov', 'Administrative Officer', 'Pixope', 'Czech Republic'),
('0425785', 'Karina', 'Talby', 'ktalbyqx@taobao.com', 'Environmental Specialist', 'Twitterwire', 'Canada'),
('0431813', 'Sergent', 'Pattesall', 'spattesallrq@sciencedaily.com', 'Health Coach IV', 'Divavu', 'Germany'),
('0445103', 'Zebulon', 'Tomlinson', 'ztomlinsonau@usatoday.com', 'Editor', 'Skalith', 'Czech Republic'),
('0446220', 'Mel', 'Kilpatrick', 'mkilpatrickh7@xrea.com', 'Assistant Manager', 'Jamia', 'China'),
('0451391', 'Henka', 'Posen', 'hposen1i@pagesperso-orange.fr', 'Chemical Engineer', 'Jabbersphere', 'Argentina'),
('0470733', 'Kath', 'Cristofalo', 'kcristofalom3@xing.com', 'Account Representative II', 'Nlounge', 'Nigeria'),
('0493228', 'Amalia', 'Matzke', 'amatzkeb5@soundcloud.com', 'Recruiter', 'Vinder', 'Sweden'),
('0499129', 'Cy', 'Tibald', 'ctibaldg1@eventbrite.com', 'Mechanical Systems Engineer', 'Riffwire', 'Japan'),
('0507861', 'Randee', 'Ida', 'ridanh@wired.com', 'Developer III', 'Gabtune', 'China'),
('0528230', 'Margarita', 'Cullnean', 'mcullnean95@yolasite.com', 'Engineer I', 'Avaveo', 'Belize'),
('0531624', 'Stirling', 'I\'anson', 'sianson1l@yelp.com', 'Senior Editor', 'Kwinu', 'Brazil'),
('0535777', 'Jacky', 'MacSherry', 'jmacsherryr7@plala.or.jp', 'Senior Financial Analyst', 'Flashset', 'Portugal'),
('0541713', 'Audrie', 'Mullinger', 'amullinger7n@ezinearticles.com', 'Programmer Analyst IV', 'Twitterbridge', 'Philippines'),
('0552592', 'Boone', 'Woodhouse', 'bwoodhouse44@shinystat.com', 'Account Executive', 'Divape', 'China'),
('0585291', 'Delmar', 'Pointing', 'dpointing2h@chronoengine.com', 'Director of Sales', 'Browseblab', 'China'),
('0602036', 'Cornie', 'Thonason', 'cthonasonc1@loc.gov', 'Media Manager I', 'Kazu', 'China'),
('0608294', 'Farleigh', 'Scud', 'fscudx@networksolutions.com', 'Safety Technician IV', 'Thoughtstorm', 'Cameroon'),
('0612333', 'Ignace', 'Livezey', 'ilivezeyr@who.int', 'Statistician I', 'Blognation', 'Philippines'),
('0622352', 'Abra', 'Gallagher', 'agallagherel@godaddy.com', 'Software Consultant', 'Realfire', 'Gambia'),
('0627493', 'Garey', 'Stickley', 'gstickleyoj@amazonaws.com', 'Actuary', 'Voolith', 'Russia'),
('0632611', 'Roch', 'Coat', 'rcoatbu@marriott.com', 'Geologist I', 'Kwinu', 'Poland'),
('0639916', 'Morey', 'MacMenemy', 'mmacmenemyls@twitpic.com', 'Assistant Professor', 'Voomm', 'France'),
('0653860', 'Jordon', 'Warmisham', 'jwarmishammh@myspace.com', 'Assistant Professor', 'Riffpath', 'Sweden'),
('0672497', 'Timmy', 'Drummond', 'tdrummondj0@moonfruit.com', 'Software Engineer III', 'Jetpulse', 'Tajikistan'),
('0690404', 'Jada', 'Duckerin', 'jduckerinfw@vistaprint.com', 'Social Worker', 'Dablist', 'China'),
('0696323', 'Alastair', 'Dowley', 'adowleyd6@creativecommons.org', 'Programmer Analyst IV', 'Voomm', 'Mexico'),
('0697117', 'Grant', 'Simpkins', 'gsimpkinsf3@adobe.com', 'Junior Executive', 'Zoozzy', 'China'),
('0703084', 'Alaine', 'Larvin', 'alarvinlf@vistaprint.com', 'Account Coordinator', 'Skimia', 'Moldova'),
('0719386', 'Daphna', 'Lillie', 'dlillie33@about.me', 'Help Desk Operator', 'Twiyo', 'Kazakhstan'),
('0724780', 'Blancha', 'Manthorpe', 'bmanthorpeqa@amazon.co.uk', 'Safety Technician II', 'Zooveo', 'Democratic Republic of the Congo'),
('0742177', 'Leyla', 'Dominetti', 'ldominettiih@networkadvertising.org', 'Programmer II', 'Edgepulse', 'Argentina'),
('0745498', 'Goran', 'Flewitt', 'gflewittnr@jimdo.com', 'Food Chemist', 'Riffwire', 'Kyrgyzstan'),
('0749793', 'Lolly', 'Hawkwood', 'lhawkwoodnc@blog.com', 'Pharmacist', 'Realmix', 'Canada'),
('0760382', 'Joanne', 'Muscott', 'jmuscottf2@blog.com', 'Engineer I', 'Jatri', 'China'),
('0774072', 'Abagael', 'Benedicto', 'abenedictoe3@dot.gov', 'Assistant Media Planner', 'Tekfly', 'Philippines'),
('0798746', 'Joshua', 'Banks', 'jbankse4@shutterfly.com', 'Internal Auditor', 'Wikivu', 'Haiti'),
('0800242', 'Ollie', 'Bootland', 'obootlandg5@networkadvertising.org', 'Analyst Programmer', 'Babbleblab', 'Russia'),
('0805319', 'Dorise', 'Hampshaw', 'dhampshaw7c@epa.gov', 'Safety Technician I', 'Photofeed', 'Ukraine'),
('0825554', 'Renado', 'Del Dello', 'rdeldello4b@infoseek.co.jp', 'Safety Technician II', 'Tekfly', 'Monaco'),
('0835533', 'Brannon', 'Duiged', 'bduigedqb@indiatimes.com', 'Chief Design Engineer', 'Jamia', 'Egypt'),
('0840782', 'Derek', 'Rizzelli', 'drizzellikv@google.ca', 'Office Assistant II', 'Kamba', 'China'),
('0843609', 'Moria', 'Durn', 'mdurnfp@google.co.uk', 'Product Engineer', 'Ntags', 'Gambia'),
('0847223', 'Natty', 'Nannini', 'nnanninioi@tamu.edu', 'Editor', 'Topdrive', 'Indonesia'),
('0860992', 'Giovanna', 'Bardnam', 'gbardnamex@wikimedia.org', 'Tax Accountant', 'Twitterbridge', 'China'),
('0880410', 'Tally', 'Rotchell', 'trotchellh5@mashable.com', 'VP Marketing', 'Realmix', 'China'),
('0886514', 'Fayth', 'Piris', 'fpirisgr@businessinsider.com', 'Recruiter', 'Aimbu', 'South Korea'),
('0888435', 'Armand', 'Nodin', 'anodin1r@va.gov', 'Research Associate', 'Skiptube', 'Georgia'),
('0888783', 'Elmer', 'Abeau', 'eabeauf0@mashable.com', 'Desktop Support Technician', 'Jetwire', 'China'),
('0894425', 'Thomasina', 'Stiff', 'tstiff3f@hugedomains.com', 'Social Worker', 'Wordware', 'Poland'),
('0894478', 'Valma', 'Melrose', 'vmelrosekr@house.gov', 'Mechanical Systems Engineer', 'Einti', 'Russia'),
('0939840', 'Clarie', 'Royl', 'croylbb@booking.com', 'Analyst Programmer', 'Oozz', 'Palestinian Territory'),
('0960431', 'Theadora', 'Waller', 'twallerek@businesswire.com', 'Engineer IV', 'Realbridge', 'China'),
('0965210', 'Thayne', 'Wymer', 'twymercc@elegantthemes.com', 'Project Manager', 'Realblab', 'Poland'),
('0966787', 'Elston', 'MacClure', 'emacclureoz@1688.com', 'Safety Technician IV', 'Trilia', 'Ireland'),
('0969398', 'Frederico', 'Comazzo', 'fcomazzou@unesco.org', 'Civil Engineer', 'Innojam', 'Poland'),
('0970934', 'Berna', 'MacLardie', 'bmaclardiepd@hp.com', 'Librarian', 'Ozu', 'Indonesia'),
('0974136', 'Marty', 'Scarre', 'mscarre2a@canalblog.com', 'Developer IV', 'Lajo', 'Argentina'),
('0976135', 'Appolonia', 'Sprigg', 'asprigg87@guardian.co.uk', 'Help Desk Operator', 'Twitterwire', 'Indonesia'),
('0976514', 'Candis', 'Giff', 'cgiffh1@addthis.com', 'Social Worker', 'Dynabox', 'United States'),
('0995329', 'Maxim', 'Fusedale', 'mfusedalehw@barnesandnoble.com', 'Pharmacist', 'Meedoo', 'Indonesia'),
('1010981', 'Way', 'Copeman', 'wcopemangi@themeforest.net', 'Human Resources Manager', 'Jazzy', 'Vietnam'),
('1084510', 'Tami', 'Jansky', 'tjanskycq@bbc.co.uk', 'Dental Hygienist', 'Voolia', 'Colombia'),
('1089701', 'Jaine', 'Denne', 'jdenneml@blog.com', 'Compensation Analyst', 'DabZ', 'Mexico'),
('1092927', 'Nikolaus', 'Oswald', 'noswaldnm@feedburner.com', 'Nurse Practicioner', 'Quinu', 'Brazil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`eid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
