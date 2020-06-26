-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 12:28 PM
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
-- Database: `apotek`
--

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
(-2147483604, 'رحيمو الحوزي .. رائدة الفوتوغرافيا المغربية وشاهدةُ أحداثٍ تاريخية', 'value=\"{{ old(\'news_description\') }}\"    value=\"{{ old(\'news_description\') }}\"   value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"\r\n\r\n\r\n\r\nvalue=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"\r\n\r\n\r\n\r\nvalue=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"value=\"{{ old(\'news_description\') }}\"\r\n\r\nvalue=\"{{ old(\'news_description\') }}\"\r\n\r\n\r\n\r\n\r\n\r\n\r\nvalue=\"{{ old(\'news_description\') }}\" select * from news_tables', 'technology', 'salim ILYASS', 'yasseelle5@gmail.com', 'asset/img/20200418234758-b.png', '2020-04-18 22:47:58', '2020-04-19 23:15:43', '2020-04-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news_tables`
--
ALTER TABLE `news_tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_tables`
--
ALTER TABLE `news_tables`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
