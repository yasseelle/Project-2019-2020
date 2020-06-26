-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 09:38 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitnews`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tabels`
--

CREATE TABLE `category_tabels` (
  `id` int(11) NOT NULL,
  `category_name` varchar(1020) NOT NULL,
  `category_discription` text NOT NULL,
  `category_image` varchar(1020) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_tabels`
--

INSERT INTO `category_tabels` (`id`, `category_name`, `category_discription`, `category_image`, `deleted_at`) VALUES
(-2147483643, 'spor', 'tال', 'رياضة هي مجهود جسدي عادي أو مهارة تُمَارَس بموجب قواعد مُتفق عليها بهدف الترفيه أو المنافَسة أو المُتعة أو التميز أو تطوير المهارات أو تقوية الثقة بالنفس أو الجسد . واختلاف الأهداف من حيث اجتماعها أو انفرادها يميز الرياضات ، بالإضافة إلى ما يضيفه اللاعبون أو الفِرَق من تأثيرٍ على رياضاتهم.^?<P', NULL),
(-2147483642, 'tech', 'nology3 me', 'thods, and processes used to achieve goals. People can use technology to: Produce goods or services. Carry out goals, such as scientific investigation or sending a spaceship to the moon. Solve problems, such as disease or famine^?I?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment_tables`
--

CREATE TABLE `comment_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `USERID` varchar(1020) NOT NULL,
  `COMMENT` text NOT NULL,
  `NEWID` int(11) NOT NULL,
  `created_by_name` varchar(1020) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_tables`
--

INSERT INTO `comment_tables` (`id`, `USERID`, `COMMENT`, `NEWID`, `created_by_name`, `updated_at`, `created_at`) VALUES
(3, '', '7', -396006292, 'o i\'où fsdfs sfgf\r\n\r\nsdfgsdfg\r\n\r\ndfsgsdfgdf?\0\0*', NULL, NULL),
(4, '', '7', -194677900, ' for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post?\0\0*', NULL, NULL),
(5, '', '7', -512876433, 'ther new comment ds an other new comment ds an other new comment ds\r\nan other new comment ds an other new comment ds an other new comment ds an other new comment ds?\0\0*', NULL, NULL),
(6, '', '7', -194677900, ' for this one?\0\0$', NULL, NULL),
(7, '', '7', -512859104, 'this one?\0\0%', NULL, NULL),
(8, '', '7', -378263693, ' work?\0\0*', NULL, NULL),
(9, '', '7', -378244320, 'working?\0\0*', NULL, NULL),
(10, '', '6', -429298079, 'l try?\0\0*', NULL, NULL),
(11, '', '7', -1288167325, 'omment?\0\0*', NULL, NULL),
(12, '7', 'thanks', -2147483606, 'salim ILYASS', '2020-06-09', '2020-06-09'),
(13, '10', 'NICE', -2147483614, 'jabbari ilyass', '2020-06-09', '2020-06-09'),
(14, '7', 'thank you', 45, 'salim ILYASS', '2020-06-09', '2020-06-09'),
(15, '7', 'thanks 2', 45, 'salim ILYASS', '2020-06-09', '2020-06-09'),
(16, '10', 'thanks 3', 45, 'jabbari ilyass', '2020-06-09', '2020-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `imgs_tables`
--

CREATE TABLE `imgs_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_path` varchar(1020) NOT NULL,
  `img_news_id` int(10) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imgs_tables`
--

INSERT INTO `imgs_tables` (`id`, `img_path`, `img_news_id`, `deleted_at`) VALUES
(1, 'asset/img/20200609125530-prestige_4k_wallpaper_image2_anime.jpg', 45, NULL),
(2, 'asset/img/20200609125530-prestige_4k_wallpaper_image2_cities.jpg', 45, NULL),
(3, 'asset/img/20200609125530-prestige_4k_wallpaper_image2_nature.jpg', 45, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(1020) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_03_185034_create_user_table', 1),
(4, '2020_04_05_191427_create_category_table', 2),
(5, '2020_04_06_162741_create_news_tabel', 3),
(6, '2020_04_06_185319_create_news_tabel', 4),
(7, '2020_04_06_195047_create_img_tabel', 5),
(8, '2020_04_13_203434_coment_table', 6),
(9, '2020_04_17_043901_add_column_deleted_at', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news_tables`
--

CREATE TABLE `news_tables` (
  `id` int(20) NOT NULL,
  `News_title` varchar(340) NOT NULL,
  `News_discription` text NOT NULL,
  `News_Category` varchar(340) NOT NULL,
  `News_created_by` varchar(340) NOT NULL,
  `created_by_email` varchar(340) NOT NULL,
  `img` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_tables`
--

INSERT INTO `news_tables` (`id`, `News_title`, `News_discription`, `News_Category`, `News_created_by`, `created_by_email`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(-2147483617, 'رحيمو الحوزي .. رائدة الفوتوغرافيا المغربية وشاهدةُ أحداثٍ تاريخية', 'توثيق أحداث تاريخية، وتغطيات، وتأبيد لصور البلاد وأناسها منذ ما قبل استقلال المغرب، هكذا قضت الرّاحلة رحيمو الحوزي مسارها الإبداعي الذي عُدّت فيه أوّل مصوّرة فوتوغرافية مغربية.\r\n\r\nوغادرت ابنة مدينة تطوان دنيا النّاس والبلاد ترزح تحت وطأة جائحة عالمية، بعدما كانت من بين من غطّوا زيارات ملكية إلى شمال المغرب قام بها الملكان الراحلان الحسن الثاني ومحمد الخامس، وزيارات سياسيين وفاعلين بارزين من داخل المغرب وخارجه، من بينهم أحمد بلافريج، وكانت من بين من أرّخوا لأحداث طبعت السنوات الأولى التي تلت استقلال المغرب مثل زلزال أكادير الكبير.\r\n\r\nوقال جعفر عاقيل، رئيس الجمعية المغربية للفنّ الفوتوغرافي أستاذ الفوتوغرافيا بالمعهد العالي للإعلام والاتصال بالرباط، إنّ الراحلة من رواد الفوتوغرافيا المغربية، التي جاءت في سياق تقليد فوتوغرافي خصب تأسّس في شمال المغرب، ووثّقت أحداثا تاريخية، وبدأت تغطيّاتها الفوتوغرافية قبل استقلال البلاد.\r\n\r\nأستاذ الفوتوغرافيا بالمعهد العالي للإعلام والاتصال بالرباط أضاف في تصريح لهسبريس أنّ الراحلة رحيمو الحوزي كانت مراسلة لمجموعة من المنابر الإعلامية، وكان زوجها مصوّرا، وأوقفا حياتهما الزوجية في ما بعد وأخذ كلّ منهما مساره في المجال الفوتوغرافي.', 'technology', 'ahmed ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200407194334-profile.jpg', '2020-04-07 18:43:34', '2020-04-18 12:39:55', '2020-04-18'),
(-2147483616, 'This article is about the use and knowledge of techniques and processes for producing goods and services. For other uses, see Technology (disambiguation).', 'Technology (\"science of craft\", from Greek τέχνη, techne, \"art, skill, cunning of hand\"; and -λογία, -logia[2]) is the sum of techniques, skills, methods, and processes used in the production of goods or services or in the accomplishment of objectives, such as scientific investigation. Technology can be the knowledge of techniques, processes, and the like, or it can be embedded in machines to allow for operation without detailed knowledge of their workings. Systems (e.g. machines) applying technology by taking an input, changing it according to the system\'s use, and then producing an outcome are referred to as technology systems or technological systems.\r\n\r\nThe simplest form of technology is the development and use of basic tools. The prehistoric discovery of how to control fire and the later Neolithic Revolution increased the available sources of food, and the invention of the wheel helped humans to travel in and control their environment. Developments in historic times, including the printing press, the telephone, and the Internet, have lessened physical barriers to communication and allowed humans to interact freely on a global scale.\r\n\r\nTechnology has many effects. It has helped develop more advanced economies (including today\'s global economy) and has allowed the rise of a leisure class. Many technological processes produce unwanted by-products known as pollution and deplete natural resources to the detriment of Earth\'s environment. Innovations have always influenced the values of a society and raised new questions in the ethics of technology. Examples include the rise of the notion of efficiency in terms of human productivity, and the challenges of bioethics.', 'technology', 'ahmed ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200407200059-job_icon.png', '2020-04-07 19:00:59', NULL, NULL),
(-2147483615, 'Peter Navarro on his qualifications to disagree with Dr. Anthony Fauci on coronavirus treatments: \'I\'m a social scientist', 'dropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdowndropdown', 'sport', 'ahmed ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200407215101-job_icon.png', '2020-04-07 20:51:01', '2020-04-07 20:51:01', NULL),
(-2147483614, 'Peter Navarro on his qualifications to disa', 'dropdowndsqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'sport', 'ahmed ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200407215126-Xqruchj.jpg', '2020-04-07 20:51:26', '2020-04-07 20:51:26', NULL),
(-2147483613, 'حفل الأدب العربي بالكثير من القصائد والنثر الذي يحث على الأسفار والرحلات كما حفل بالكثير الذي يعارض ذلك. ينسب للإمام [ الشافعي ] من قوله حاضاً على الرحلة والسفر:', 'بعد بذلِ جهدٍ كبيرٍ والتعب في العمل أو الدراسة يستمتع الناس بقضاء العطلة في الراحة، أو في السفر وزيارة المعالم الأثرية، والاستمتاع بجمال المناظر الطبيعيّة، ومعرفة أهم المعالم السياحية، والتعرّف على مختلف الشعوب، وعاداتهم، وتقاليدهم، وأطباقهم، ولكن السفر يحتاج لبعض الترتيبات. في هذا المقال سنتحدّث عن السفر وعن أهمّ النصائح التي يجب اتباعها عند السفر.', 'sport', 'ahmed ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200408033715-stylo.jpg', '2020-04-08 02:37:14', '2020-04-08 02:37:15', NULL),
(-2147483612, 'حفل الأدب العربي بالكثير من القصائد والنثر الذي يحث على الأسفار والرحلات كما حفل بالكثير الذي يعارض ذلك. ينسب للإمام [ الشافعي ] من قوله حاضاً على الرحلة والسفر:', 'قصائد والنثر الذي يحث على الأسفار والرحلات كما حفل قصائد والنثر الذي يحث على الأسفار والرحلات كما حفل قصائد والنثر الذي يحث على الأسفار والرحلات كما حفل قصائد والنثر الذي يحث على الأسفار والرحلات كما حفل قصائد والنثر الذي يحث على الأسفار والرحلات كما حفل قصائد والنثر الذي يحث على الأسفار والرحلات كما حفل قصائد والنثر الذي يحث على الأسفار والرحلات كما حفل قصائد والنثر الذي يحث على الأسفار والرحلات كما حفل قصائد والنثر الذي يحث على الأسفار والرحلات كما حفل', 'technology', 'ahmed ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200408033925-Banner.jpg', '2020-04-08 02:39:24', '2020-04-08 02:39:25', NULL),
(-2147483611, 'رحيمو الحوزي .. رائدة الفوتوغرافيا المغربية وشاهدةُ أحداثٍ تاريخية', 'توثيق أحداث تاريخية، وتغطيات، وتأبيد لصور البلاد وأناسها منذ ما قبل استقلال المغرب، هكذا قضت الرّاحلة رحيمو الحوزي مسارها الإبداعي الذي عُدّت فيه أوّل مصوّرة فوتوغرافية مغربية.[nl][nl]وغادرت ابنة مدينة تطوان دنيا النّاس والبلاد ترزح تحت وطأة جائحة عالمية، بعدما كانت من بين من غطّوا زيارات ملكية إلى شمال المغرب قام بها الملكان الراحلان الحسن الثاني ومحمد الخامس، وزيارات سياسيين وفاعلين بارزين من داخل المغرب وخارجه، من بينهم أحمد بلافريج، وكانت من بين من أرّخوا [nl][nl]ss[nl][nl]لأحداث طبعت السنوات الأولى التي تلت استقلال المغرب مثل زلزال أكادير الكبير.[nl][nl]وقال جعفر عاقيل، رئيس الجمعية المغربية للفنّ الفوتوغرافي أستاذ الفوتوغرافيا بالمعهد العالي للإعلام والاتصال بالرباط، إنّ الراحلة من رواد الفوتوغرافيا المغربية، التي جاءت في سياق تقليد فوتوغرافي خصب تأسّس في شمال المغرب، ووثّقت أحداثا تاريخية، وبدأت تغطيّاتها الفوتوغرافية قبل استقلال البلاد.[nl][nl]أستاذ الفوتوغرافيا بالمعهد العالي للإعلام والاتصال بالرباط أضاف في تصريح لهسبريس أنّ الراحلة رحيمو الحوزي كانت مراسلة لمجموعة من المنابر الإعلامية، وكان زوجها مصوّرا، وأوقفا حياتهما الزوجية في ما بعد وأخذ كلّ منهما مساره في المجال الفوتوغرافي.', 'sport', 'ahmed ILYASS', 'yasseelle5@gmail.com', 'asset/img/1587334944.png', '2020-04-09 22:09:51', '2020-04-19 10:49:56', NULL),
(-2147483610, 'test for spacing and shift spacing with some hanges of encoding utf8', 'in this field i just try to write a paragraph that contain some spaces with subspace to see if it\'s working so here is the firstone\r\n\r\n\r\n\r\n\r\n\r\n6 subspace  i thing i\'m just goig to cappy to se make the result apear in a large way\r\n\r\n\r\nin this field i just try to write a paragraph that contain some spaces with subspace to see if it\'s working so here is the firstone\r\n\r\n\r\n\r\n\r\n\r\n6 subspace  i thing i\'m just goig to cappy to se make the result apear in a large way', 'sport', 'ahmed ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200409234156-fordfiesta.jpg', '2020-04-09 22:41:56', '2020-04-09 22:41:56', NULL),
(-2147483606, 'خروقات مدير \"لاماب\" لقوانين المملكة المغربية تصل رئيس الحكومة', 'وصلت فضيحة احتقار خليل الهاشمي، المدير العام لوكالة المغرب العربي للأنباء (لاماب)، لمؤسسة المجلس الوطني للصحافة، باعتباره الهيئة المغربية الوحيدة المختصة بالتنظيم الذاتي لقطاع الصحافة والنشر بالمغرب، إلى رئيس الحكومة.[nl][nl]وكان خليل الهاشمي قد عمم بلاغا يوم الإثنين 23 مارس 2020، أخبر فيه أنه سيصدر بطاقة للصحافة، بديلة عن تلك التي يسلمها المجلس الوطني للصحافة، مبررا ذلك بأنه\" لا يمكن فرض الشروط التي وضعها المجلس الوطني للصحافة، الهيئة غير الدستورية، الذي لا تتمتع فيه وكالة المغرب العربي للأنباء لا بصفة ناخب ولا بصفة منتخب، لمنح بطاقة الصحافة\".[nl][nl]وحسب ما علمت هسبريس، فإن رئيس المجلس الوطني للصحافة، يونس مجاهد، راسل رئيس الحكومة، سعد الدين العثماني، بشأن الخروقات الكبيرة التي أقدم عليها خليل الهاشمي، والتي أبدى فيها \"احتقارا\" غير مسبوق لمؤسسة تشتغل وفقا للقانون المغربي، وصدرت قوانينها المنظمة في الجريدة الرسمية بتأشير من الملك محمد السادس عبر ظهائر.[nl][nl]وفي الوقت الذي تؤكد فيه القوانين المنظمة للمجلس الوطني للصحافة أنه الهيئة الوحيدة المخول لها إصدار البطائق المهنية للصحافيين في المغرب، حذرت مراسلة رئيس المجلس من خرق مدير الوكالة الرسمية للدولة لما تنص عليها القوانين المنظمة للصحافة والنشر بالمملكة.[nl][nl]المراسلة أوضحت أن ما مجموعه 61 صحافيا من صحافيي الوكالة تسلموا بطائق الصحافة الممنوحة من طرف المجلس برسم سنة 2020، بعدما تقدموا بملفاتهم طبقا لما تنص عليه النصوص القانونية والتنظيمية الجاري بها العمل، في حين يرجع عدم تسلم 70 صحافيا لبطائقهم المهنية إلى عدم اكتمال ملفاتهم القانونية، وخصوصا غياب وثيقة السجل العدلي.[nl][nl]وجدد المجلس التأكيد أن \"لاماب\" قامت بخرق سافر للقوانين الجاري بها العمل في المملكة المغربية، وهي سابقة في عمل المؤسسات الوطنية، خاصة وأن الوكالة مؤسسة عمومية استراتيجية، معتبرا أنه ليس من صلاحيات إدارتها المطالبة بتغيير قوانين المملكة، بقدر ما تظل صلاحياتها محصورة في إدارة وتدبير هذه المؤسسة العمومية المنتجة للأخبار.[nl][nl]ورد المجلس الوطني على بلاغ الهاشمي بتأكيد أن المجلس يمنح البطاقة طبقا للمرسوم رقم 121-19-2، الصادر في الجريدة الرسمية عدد 6764 بتاريخ 28 مارس 2019، ويطبق هذا المرسوم ما ينص عليه القانون رقم 89.13 المتعلق بالنظام الأساسي للصحافيين المهنيين، والقانون رقم 90.13 القاضي بإحداث المجلس الوطني للصحافة.[nl][nl]واستغرب المجلس الوطني للصحافة، في وقت سابق، جهل أو تجاهل إدارة وكالة المغرب العربي للأنباء لهذه المقتضيات القانونية، وتعميمها في بلاغ رسمي صادر باسم المؤسسة، بالإضافة إلى تجاوز الاختصاصات الممنوحة لها بمقتضى القانون، التي ليس من حقها تحريف الصفة القانونية للمجلس الوطني للصحافة؛ حيث إن طبيعته القانونية محددة بالظهير الشريف رقم 1.16.24 بتنفيذ القانون رقم 90.13 القاضي بإحداثه.[nl][nl]ونبه المجلس إلى أن إدارة الوكالة بقرارها منح بطاقة صحافة بديلة، تخرق مقتضيات المادة 12 من القانون رقم 89.13 المتعلق بالنظام الأساسي للصحافيين المهنيين، الذي ينص على أنه \"يتعرض للعقوبات المقررة في مجموعة القانون الجنائي\" كل من \"انتحل صفة صحافي مهني أو من في حكمه لغرض ما دون أن يكون حاصلا على بطاقة الصحافة المهنية\" أو قام عمدا \"بتسليم بطاقات مشابهة لبطاقة الصحافة المهنية المنصوص عليها في هذا القانون\".', 'technology', 'ahmed ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200411194817-ar.png', '2020-04-11 18:48:17', '2020-04-11 18:48:17', NULL),
(-2147483605, 'رحيمو الحوزي .. رائدة الفوتوغرافيا المغربية وشاهدةُ أحداثٍ تاريخية', 'hello[sp][sp]qsdfqsgfgsdsdfgsd[sp][sp][sp][sp]sdtzgsfg[sp][sp][sp][sp]sfgdfsdfg[sp][sp] sdgdsfgdfgdf[sp][sp][sp][sp]sdfgsdfsdfg[sp][sp] [nl][nl][nl]dfsgsdgdfg[sp][sp]sdsdfgdfsg[sp][sp][sp][sp]sfdgsdffdgs[sp][sp]sfdgsdfgdsfg[nl][nl]dfsgdfsg [nl][nl][nl][nl][nl]dfsgdsfgdfgdfgdfgsdgdsgdsfgdsffdddddddddddfffffffffffffffffffffffffffffffffffffddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddssssssssssssssssssssssssssssssssssssssssssss[nl][nl]sgdsdfgsdfg', 'sport', 'salim ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200418234413-800px-English_language.svg.png', '2020-04-18 22:44:13', '2020-04-18 22:44:13', NULL),
(-2147483604, 'رحيمو الحوزي .. رائدة الفوتوغرافيا المغربية وشاهدةُ أحداثٍ تاريخية', 'value=\"{{ old(\'news_description\') }}\"    value=\"{{ old(\'news_description\') }}\"   value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"\r\n\r\n\r\n\r\nvalue=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"\r\n\r\n\r\n\r\nvalue=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"\r\n\r\nvalue=\"{{ old(\'news_description\') }}\"\r\n\r\n\r\n\r\n\r\n\r\n\r\nvalue=\"{{ old(\'news_description\') }}\" select * from news_tables', 'technology', 'salim ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200418234758-b.png', '2020-04-18 22:47:58', '2020-04-19 23:15:43', '2020-04-19'),
(45, 'coronavirus about lockdown', 'The UK has recorded its lowest daily rise in the number of coronavirus deaths since before lockdown on 23 March, latest government figures show.[nl][nl]A further 55 people died after testing positive with the virus as of 17:00 BST on Sunday, taking the total to 40,597.[nl][nl]This included no new deaths announced in both Scotland and Northern Ireland for the second consecutive day.[nl][nl]However, there tends to be fewer deaths reported on Mondays, due to a reporting lag over the weekend.[nl][nl]The number of new UK cases on Monday - 1,205 - is also the lowest number since the start of lockdown.[nl][nl]The welcome drop in deaths being announced is encouraging news.[nl][nl]But they come with a big caveat - there are always delays recording fatalities over the weekend.[nl][nl]Last Monday there were just over 100 new deaths announced, but other days last week topped 300.[nl][nl]Nonetheless, it does show that progress is being made. Two Mondays ago there were more than 120 deaths and in the week before that there were 160.[nl][nl]During the peak of the virus there were more than 1,000 deaths a day.[nl][nl]The challenge now will be making sure the figures stay low as restrictions are eased.[nl][nl]Another difficulty facing the government is that, even with the extra testing in place, not all infections appear to be getting picked up.[nl][nl]Monday\'s data shows there were 1,205 new infections diagnosed, but surveillance suggests the true figure may be five times higher.', 'tech', 'salim ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200609125530-prestige_4k_wallpaper_image2_nature.jpg', '2020-06-09 11:55:30', '2020-06-09 11:55:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(340) NOT NULL,
  `email` varchar(340) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(340) NOT NULL,
  `remember_token` varchar(133) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usertables`
--

CREATE TABLE `usertables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(340) NOT NULL,
  `lastname` varchar(340) NOT NULL,
  `email` varchar(340) NOT NULL,
  `password` longtext NOT NULL,
  `user_profile_img` varchar(340) NOT NULL,
  `role` varchar(340) NOT NULL,
  `phone_number` varchar(340) NOT NULL,
  `cuntry` varchar(340) NOT NULL,
  `city` varchar(340) NOT NULL,
  `birth_day` varchar(340) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertables`
--

INSERT INTO `usertables` (`id`, `name`, `lastname`, `email`, `password`, `user_profile_img`, `role`, `phone_number`, `cuntry`, `city`, `birth_day`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'jabbari', 'ilyass', 'jabbari.ilyass.me@gmail.com', '$2y$10$6pA1p96GpSF.76FPzM5N5eoUlp3CjXjVNMXLIUnLAzwzCsl/gQUaC', '', 'user', '0642777358', 'morocco', 'japan', '2009-12-31', '2020-04-04 18:49:52', '2020-04-04 18:49:52', NULL),
(5, 'sohail', 'ILYASS', 'yasseelle8@gmail.com', '$2y$10$/wmqRNnUeMihjNjkZveIFeiU9sRw7dh8EFYyvk5wK8PZ6bPZq/BdW', '', 'user', '0676744819', 'morocco', 'IFRANE', '1951-12-31', '2020-04-04 18:51:46', '2020-04-17 02:18:28', NULL),
(6, 'sas', 'ILYASS', 'yasseelle6@gmail.com', '$2y$10$gYTnBHjA//RGSSfh3oIB3.Dx0BeI1K8gyzMMw0r7zclMS3DcTUM3m', '', 'user', '0676744819', 'morocco', 'IFRANE', '2015-12-03', '2020-04-04 19:09:26', '2020-04-17 04:03:41', '2020-04-17 05:03:41'),
(7, 'salim', 'ILYASS', 'yasseelle5@gmail.com', '$2y$10$TAyKfjOxFE.RDhc1B76GIuv5mwlLFBP5JELuQG5txRQ5F9nalTBbS', '', 'admin', '0676744819', 'morocco', 'IFRANE', '2015-12-28', '2020-04-04 20:33:30', '2020-04-04 20:33:30', NULL),
(8, 'alami', 'karim', 'yasseelle3@gmail.com', '$2y$10$KxtW0Kd.qUpftLe1RTmlJulDukgTN3CHTVvIYhB2XGg6cgozy23Ja', '', 'user', '0642777358', 'morocco', 'IFRANE', '2015-12-15', '2020-04-21 18:46:22', '2020-04-21 18:46:22', NULL),
(9, 'alami', 'karim', 'yasseelle2@gmail.com', '$2y$10$.UKjLSqMXTU4AcXeVHXsEOY5l4hz8GWrL2GQUUij2/LYTR7ZTbz1q', '', 'user', '0642777358', 'morocco', 'IFRANE', '2015-12-15', '2020-04-21 18:49:41', '2020-04-21 18:49:41', NULL),
(10, 'jabbari', 'ilyass', 'yasseelle9@gmail.com', '$2y$10$ZNAXDGCpkQu4DhOmiLrevOPxZwGnXKxaajkkyqeTMSkspUFBSAoWi', '', 'user', '0642777358', 'morocco', 'IFRANE', '2015-12-10', '2020-06-09 11:46:58', '2020-06-09 11:46:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tabels`
--
ALTER TABLE `category_tabels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_tables`
--
ALTER TABLE `comment_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgs_tables`
--
ALTER TABLE `imgs_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_tables`
--
ALTER TABLE `news_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usertables`
--
ALTER TABLE `usertables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usertables_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tabels`
--
ALTER TABLE `category_tabels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment_tables`
--
ALTER TABLE `comment_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imgs_tables`
--
ALTER TABLE `imgs_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news_tables`
--
ALTER TABLE `news_tables`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertables`
--
ALTER TABLE `usertables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
