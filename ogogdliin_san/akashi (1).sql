-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 03:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akashi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'af9e0d0501fd8c9664ef65d250e5863b', '2023-11-14 10:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `aimag`
--

CREATE TABLE `aimag` (
  `aimag_id` int(11) NOT NULL,
  `aimag_ner` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aimag`
--

INSERT INTO `aimag` (`aimag_id`, `aimag_ner`) VALUES
(1, 'Улаанбаатар'),
(2, 'Архангай'),
(3, 'Баян-Өлгий'),
(4, 'Баянхонгор'),
(5, 'Булган'),
(6, 'Говь-Алтай'),
(7, 'Говьсүмбэр'),
(8, 'Дархан-Уул'),
(9, 'Дорноговь'),
(10, 'Дорнод'),
(11, 'Дундговь'),
(12, 'Завхан'),
(13, 'Орхон'),
(14, 'Өвөрхангай'),
(15, 'Өмнөговь'),
(16, 'Сүхбаатар'),
(17, 'Сэлэнгэ'),
(18, 'Төв'),
(19, 'Увс'),
(20, 'Ховд'),
(21, 'Хөвсгөл '),
(22, 'Хэнтий');

-- --------------------------------------------------------

--
-- Table structure for table `am_gazar`
--

CREATE TABLE `am_gazar` (
  `AM_id` int(11) NOT NULL,
  `AM_ner` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `AM_une` int(11) NOT NULL,
  `AM_utas` int(11) NOT NULL,
  `AM_medeelel` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DU_id` int(11) NOT NULL,
  `AM_image1` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `am_gazar`
--

INSERT INTO `am_gazar` (`AM_id`, `AM_ner`, `AM_une`, `AM_utas`, `AM_medeelel`, `DU_id`, `AM_image1`) VALUES
(1, 'Далай Тур Жуулчны Бааз | Dalai Tour Tourist Camp', 160, 99993916, '\"Далай Тур\" кэмп нь 17 жилийн турш идэвхитэй ажиллаж, Хөвсгөл нуурын эрэг дээр байрласан. Бид нэг дор 150 хүн хүлээн авах хүчин чадалтай. Манайд тухлан саатангаа далайд усан онгоцны аялал хийх боломжтой. Мөн Цаатан иргэдийн соёл, ахуйг хамгийн ойроос харж, зочлох боломжтой. Манайх жил бүр Цаатан фестиваль зохион байгуулдагаараа онцлогтой. \r\n\r\nМанайх хамгийн сүүлийн үеийн материал, онцлог хийц маягаар сууцнуудаа шинэчилж улам тохь тухтай болсон. Та бүхнийг урьж байна.', 21, 'хөвсгөл-амралт-1.jpg'),
(2, 'Баян Улаан Жуулчны бааз | Bayan Ulaan Camp', 120000, 88113283, 'Улаанбаатар хотоос Мөрөн хүртэл 800 км (засмал зам), Мөрөн хотоос Хатгал тосгон хүртэл 98,8км, Хатгалаас манай бааз хүртэл 27 км зайтай. ', 21, 'хөвсгөл-амралт-2.jpg'),
(3, 'Хөвсгөл Хийморь Ресорт | Khiimori Tourist Camp', 80000, 88885958, 'Хатгал - Жанхайн даваа, Хатгал тосгоноос 25км, УБ хотоос 805км зайд -', 21, 'хөвсгөл-амралт-3.jpg'),
(4, 'Их Хорго Жуулчны Бааз | Great Khorgo Tourist camp', 110000, 80118816, '- Дэлгэрэнгүй хаяг : Архангай аймгийн Тариат сумын нутаг дахь Хорго тэрхийн цагаан нуурын байгалийн цогцолборт газарт, Тэрхийн цагаан нуурын зүүн эрэгт Улаанбаатараас 670 км, Тариат сумын төвөөс 11 км-ийн зайд байрладаг.\r\n', 2, 'архангай-амралт-1.jpg'),
(5, 'Хүрхрээ Тур Жуулчны Бааз | Khurkhree Tour Tourist Camp', 30000, 99066686, 'Өвөрхангай аймаг, Бат-Өлзий сумын байгалийн цогцолборт газар болох Орхон голын хөндийд байрладаг. /сумын төвөөсөө 25 км зайд', 14, 'орхоны-хүрхрээ-амралт-1.jpg'),
(6, 'aruka', 700, 100, 'agjghhgoqjgqoghqihqgjoq', 2, 'terelj.jpg'),
(7, 'Ariuka amralt', 500, 123456789, 'afagnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn\r\nagnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnkgak', 21, 'miracle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dursgalt_gazar`
--

CREATE TABLE `dursgalt_gazar` (
  `DU_id` int(11) NOT NULL,
  `DU_ner` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DU_tailbar` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DU_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Image1` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Image2` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Image3` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `aimag_ner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dursgalt_gazar`
--

INSERT INTO `dursgalt_gazar` (`DU_id`, `DU_ner`, `DU_tailbar`, `DU_date`, `Image1`, `Image2`, `Image3`, `aimag_ner`) VALUES
(1, 'Хөвсгөл нуур', 'Хөвсгөл нуур нь Монгол улсын хойд хэсэгт Хөвсгөл аймагт далайн түвшнээс 1645 метр өндөрт оршдог цэнгэг устай нуур. Энэ нуур нь Монголын хажилийн настай хэмээн тооцоолсон байдаг. Нийт усны эзлэхүүн 381 км³ байдаг нь дэлхийн цэнгэг усны 0.4 хувьтай тэнцэнэ.\r\nмгийн их эзлэхүүнтэй, хамгийн гүн нуур юм. Хөвсгөл нуур нь дэлхийн арван долоон эртний нуурын нэг юм. 2 сая гаруй \r\nХөвсгөл нуурт 46 гол горхи цутгах бөгөөд ганцхан Эгийн гол эх авч урсан Сэлэнгэ мөрөнд цутгана. Явсаар нийт 1000 км зайг туулан Байгал нуурт цутгадаг. Энэ хоёр нуурын хоорондын шууд зай нь ердөө 200 км.\r\n\r\nХөвсгөл нуурын хамгийн гүн хэсэгтээ 262 метр, урт нь 136 км, хамгийн өргөн хэсэг нь 36,5 км ажээ.\r\n\r\nХөвсгөл нуурын байгалийн цогцолбор газар Сибирийн тайга, Төв Азийн хээр талын бүсийн шилжилтийн хэсэгт хамаарна. Хөвсгөл нуурын өмнөд, хойд эрэгт орших Хатгал, Турт гэсэн хоёр боомтын хооронд зун цагт усан тээвэр хийгддэг. Хөвсгөл нуурын эргэн тойрон фосфоритоор баялаг. Уг нуур нь Монгол улсын аялал жуулчлалын томоохон чиглэл юм.Эрт дээр үед хөвсгөл нуурыг Оюу-эрдэнэ хэмээн нэрлэдэг байжээ.\r\nХөвсгөл нуур нь Монгол улсын хойд хэсэгт Хөвсгөл аймагт далайн түвшнээс 1645 метр өндөрт оршдог цэнгэг устай нуур. Энэ нуур нь Монголын хажилийн настай хэмээн тооцоолсон байдаг. Нийт усны эзлэхүүн 381 км³ байдаг нь дэлхийн цэнгэг усны 0.4 хувьтай тэнцэнэ.\r\nмгийн их эзлэхүүнтэй, хамгийн гүн нуур юм. Хөвсгөл нуур нь дэлхийн арван долоон эртний нуурын нэг юм. 2 сая гаруй \r\nХөвсгөл нуурт 46 гол горхи цутгах бөгөөд ганцхан Эгийн гол эх авч урсан Сэлэнгэ мөрөнд цутгана. Явсаар нийт 1000 км зайг туулан Байгал нуурт цутгадаг. Энэ хоёр нуурын хоорондын шууд зай нь ердөө 200 км.\r\n\r\nХөвсгөл нуурын хамгийн гүн хэсэгтээ 262 метр, урт нь 136 км, хамгийн өргөн хэсэг нь 36,5 км ажээ.\r\n\r\nХөвсгөл нуурын байгалийн цогцолбор газар Сибирийн тайга, Төв Азийн хээр талын бүсийн шилжилтийн хэсэгт хамаарна. Хөвсгөл нуурын өмнөд, хойд эрэгт орших Хатгал, Турт гэсэн хоёр боомтын хооронд зун цагт усан тээвэр хийгддэг. Хөвсгөл нуурын эргэн тойрон фосфоритоор баялаг. Уг нуур нь Монгол улсын аялал жуулчлалын томоохон чиглэл юм.Эрт дээр үед хөвсгөл нуурыг Оюу-эрдэнэ хэмээн нэрлэдэг байжээ.', '2023-11-07 02:15:59', 'хөвсгөл-нуур-1.jpg', 'хөвсгөл-нуур-1.jpg', 'хөвсгөл-нуур-1.jpg', 21),
(2, 'Хоргын тогоо', 'Хорго нь Архангай аймгийн нутагт орших унтарсан галт уул юм.\r\n\r\nХорго хэмээх газар Архангай аймгийн Тариат сумын төвд оршдог. Хэн ч саатан хоргодом энэхүү үзэсгэлэнт нутгийг 1965 оноос дархан цаазат газрын, 1994 оноос байгалийн цогцолборт газрын зэрэглэлээр улсын тусгай хамгаалалтад авчээ. Одоогоос 9 мянга орчим жилийн өмнө дэлбэрч байгаад унтарсан галт уул юм гэдгийг манай газар зүйн эрдэмтэд тогтоожээ. Өөрөөр хэлбэл энэ нь манай орны унтарсан галт уулуудын дотроос хамгийн сүүлд унтарсан галт уул төдийгүй жаахан хэтрүүлбэл уур нь савсаж байгаа “шинэхэн” уул.\r\n\r\nХорго уул нь далайн түвшнээс дээш 2240 метрийн өндөр бөгөөд Хорго уулаас оргилон гарсан халуун хайлмал бодис магма нь газрын уруу даган зүүн тийшээ Суман, Чулуут голын хөндийгөөр зуугаад километр урссан байдаг. Энэ замаар барагцаалбал 10-20 километр өргөн хөндийгөөр урссан магма нь 40-50 метр зузаан хүрмэн чулуун хучилга болон царцсан байж магад гэж эрдэмтэд таамагласан байдаг.\r\n\r\nМөн Хорго уулыг 2 удаа дэлбэрсэн гэж ч ярилцдаг. Уулын тогооны амсар нь 50 градус орчим налуу, 100 орчим метр гүнзгий 300-400 метр диаметртэй дугуй хэлбэртэй. Хоргын тогоон дотор нь сандал, ширээ шиг том том хүрмэн чулуу ундуй сундуй хөглөрч байдаг учир явахад бэрхтэй. Тогоон дотор зөвхөн баруун талаас нь л маш болгоомжтой орж болно. Хорго уулаас урагш зургаан километр орчимд Суман голын зүүн гар талд Тариат сумын төвөөс баруун урагш 3 орчим километр зайтай газарт чулуун гэр гэж сонирхолтой үзмэр бий. Буцлан урсч явахдаа халуун хайлмал магмын хөөс царцан хагарч 170 орчим сантиметр өндөртэй хүрмэн чулуун гэрийн “тооно”, “үүд” бий болгон тогтсон нь энэ. Ийм чулуун гэр манай бусад унтарсан галт ууланд байхгүй.\r\n\r\nХоргын өөр нэг гайхамшиг бол тэндхийн хүрмэн чулуун гадаргын завсар зайд ургасан намхан загзгар хуш модны самар болон бусад жимс нэн элбэг байдаг явдал. Бас хүрмэн чулуунд агуй хонгил элбэг. Хорго уулаас 20 орчим километрт Босгын, Хярын, Сугын тогоо гэж гурван унтарсан галт уул бий. Босгын тогоо нь баруун хойшоо сэтэрсэн боловч ёроолдоо нууртай. Хорго орчмын шаврын царам уулаас туйлын ховор, дээд зэргийн эрдэнийн чулуу алмаз олдсон. Тэрийг нь дээхэн үед Зөвлөлт холбоот улс ашиглаж байсан гэдэг.', '2023-05-06 08:28:14', 'хоргын-тогоо-1.jpg', 'хоргын-тогоо-2.jpg', 'хоргын-тогоо-3.jpg', 2),
(12, 'Цонжин болдог', 'Энэхүү цогцолбор нь Улаанбаатар хотоос 53 км зайд байгалийн сайхан цогцолсон Туул голын ойролцоо Төв аймгийн Эрдэнэ сумын нутаг “Цонжин болдог” хэмээх түүхэн үйл явдалтай холбоотой газарт байрладаг. Монгол орны ихэнх түүх соёлын дурсгалт болон байгалийн үзэсгэлэнт газруудад хүрэхийн тулд замын хүнд нөхцөлд 300-аас дээш км замыг туулж байж хүрдэгтэй харьцуулахад энэ нь маш том давуу тал юм. Цогцолборын нийт талбай нь 212 га бөгөөд цогцолборын төвд морьт хөшөө байрлана. Морьт хөшөө нь суурийн хэсгийн байгууламжийн хамт 48 метр өндөр юм. Суурийн хэсэг нь 10 метр өндөр 30 метрийн диаметртэй дугуй хэлбэртэй, морьт хөшөө нь 38 метр өндөр юм. Хөшөөний суурийн хэсэгт хааны музей, үзвэрийн танхим, ресторан, бар, хурлын танхим, бэлэг дурсгалын дэлгүүр зэрэг байрлана. Хөшөөний танхимаас морины сүүлэнд байрлуулсан цахилгаан шатаар морины бөгсөн бие хүртэл яваад цааш цээжин дундуур нь явган явж эмээлийн бүүргээр гарч улмаар морины хүзүүн дээгүүр явж толгойных нь орой дээр гаран цогцолборын эргэн тойрны байгалийн сайхныг ажиглаж болно. Морьт хөшөөг тойрон 200 гаруй гэр буудал байрлах бөгөөд орчин үеийн тавилга, тоног төхөөрөмжөөр бүрэн тоноглогдсон. Гэр буудлууд нь XIII зууны үеийн Монголын овог аймгуудын хэрэглэж байсан эртний тамганы хэлбэрээр байрласан байна. Шөнийн цагт олон төрлийн гэрлийн тусламжтайгаар тэнгэрт түгэх одод мэт гэрэлтэн харагдах болно. Энэхүү хөшөөт цогцолбор нь дэлхийн хамгийн том морьт хөшөө юм. Энэхүү хөшөөт цогцолбор нь гадаадын төдийгүй дотоодын жуулчдад ч багагүй ач холбогдолтой юм. Учир нь Чингэс хааны үр удам болсон монголчууд маань Их хааныхаа дурсгалын хамгийн том цогцолборыг зорин очсоноор түүний гайхамшигт байгууламжийг үзэж сонирхохын сацуу байгалийн сайхан, цэвэр агаарт амрах, хурал зөвлөгөөн, уулзалт семинар, хүлээн авалт хийх боломжтой.', '2023-10-29 09:13:27', 'CNtbaVJUEAA5XoT.jpg', 'CNtbaVJUEAA5XoT.jpg', 'CNtbaVJUEAA5XoT.jpg', 18),
(13, 'Тэрхийн цагаан нуур', 'Тэрхийн Цагаан нуур нь Архангай аймгийн Тариат сумын нутагт Хоргын тогооны дэргэд байрлах цэнгэг уст нуур. Хангайн нуруунаас эх авсан Хойд, Урд Тэрхийн голын урсгал Хорго галт уулын халуун хайлмал бодист боогдон үүсчээ.\r\n\r\nНуурын голд орших жижиг арал дээр шувууд үүрээ засаж өндөглөдөг. Нууранд хар галуу их ирдэг бөгөөд 5 метр хүртэл гүн рүү шумбан загасаар хооллодог байна. Цурхай зэрэг Сэлэнгийн савын загастай. Мөн ховор шувууд амьдардаг. Нуурын Толгой нь Хоргын дархан газарт багтдаг.\r\n\r\nЭнэ нуурт 10 гаруй гол цутгадгаас хамгийн том нь Тэрхийн гол юм. Харин ганц гол эх аван гадагш урсдаг бас тэр нь Суман гол юм. Тэрхүү гол нь цаашлаад 50 орчим километр урсаад Чулуутын голд цутгадаг.\r\n\r\nТус нуурыг 2011 онд CNN мэдээллийн төв аялах шилдэг газруудын нэгт багтаажээ.', '2023-10-29 09:19:45', 'Tehiin_tsagaan_nuur.jpg', 'Tehiin_tsagaan_nuur.jpg', 'Tehiin_tsagaan_nuur.jpg', 2),
(14, 'Алтай таван богд', 'Монгол Алтайн нурууны Алтай Таван Богд уул нь Монгол улсын хамгийн өндөр уулс юм. Энэ ч утгаараа Монгол орны дээвэр хэмээгддэг. Таван Богд уул нь Баян-Өлгий аймгийн Улаанхус сумд оршдог.\r\n\r\nТаван Богд уул нь таван үндсэн оргилтой ба Монголын хамгийн том гурван мөсөн гол болох Потанины мөсөн гол, Александрын мөсөн гол, Гранегийн мөсөн голууд Таван Богдод оршдог. Эдгээрээс хамгийн том нь Потанины мөсөн гол бөгөөд 14 орчим км урттай.\r\n\r\nАнхлан 1956 онд Монголын уулчид авирч байснаас хойш 700 гаруй уулчид авирсан ба гадаад дотоодын уулчдын авирах дуртай уул болоод байна[1].\r\n\r\n1996 онд Алтай Таван Богд уул, Хотон, Хурган, Даян нуур, Ховд, Хар салаа, Цагаан салаа, Сонгинот, Ёлт зэрэг голуудын ай савуудыг хамруулан Алтай Таван Богдын байгалийн цогцолборт газар хэмээн улсын хамгаалалтанд авсан. 2012 онд Алтай Таван Богд уулыг төрийн тахилгат уул болгон 4 жилд нэг тахиж байхаар болсон[2].', '2023-10-29 09:23:02', 'altai_tawan_bogd.jpg', 'altai_tawan_bogd.jpg', 'altai_tawan_bogd.jpg', 3),
(15, 'Улаан цутгалан', 'Улаан цутгалан — Монгол улсын Өвөрхангай аймгийн нутагт, Орхон голд цутгах Улаан гол дээрх хүрхрээ юм.\r\n\r\nХүрхрээний өндөр нь 24 метр байдаг бол Орхон голын усны их багаас хамаарч 25-50 метрийн хооронд хэлбэлзэж байдаг болохоор Монгол улсын хамгийн өргөн хүрхрээ болно. Хархорин сумаас урагш 135 км зайтай. Улаан цутгалангийн хүрхрээ нь Монгол орны аялал жуулчлалын гол зорин очих газруудын нэг юм. ', '2023-10-29 09:25:11', 'oworhangai.jpg', 'oworhangai.jpg', 'oworhangai.jpg', 14),
(16, 'Тайхар чулуу', 'Тайхар чулуу нь Архангай аймгийн Их тамир сумын нутагт Тамирын голын хөвөөнд орших, бүдүүн ширхэгт боржин чулуун цохио. VII–IX зууны бичээс дурсгалын зүйл ихтэй.\r\n\r\nЭнэхүү чулуун хөшөөний тухай олон домог, шинжлэх ухааны тайлбарууд байдаг. Тайхар чулуу нь анх гурвалжин хэлбэртэй байсан бөгөөд 17-р зуунд Галданбошигт хайрт хатан Анудаа зориулан чулууг дөрвөлжилсөн түүхтэй.\r\n\r\nМөн дээгүүр нь чулуу шидэж давуулах эр хүний хүчийг сорьдог.', '2023-10-29 09:26:51', 'taihar_chuluu.jpg', 'taihar_chuluu.jpg', 'taihar_chuluu.jpg', 2),
(18, 'asfawfa', 'asfgagadga a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a ', '2023-11-14 13:59:06', 'howsgolha1.jpg', 'howsgolha3.jpg', 'howsgolha2.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aimag`
--
ALTER TABLE `aimag`
  ADD PRIMARY KEY (`aimag_id`);

--
-- Indexes for table `am_gazar`
--
ALTER TABLE `am_gazar`
  ADD PRIMARY KEY (`AM_id`);

--
-- Indexes for table `dursgalt_gazar`
--
ALTER TABLE `dursgalt_gazar`
  ADD PRIMARY KEY (`DU_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aimag`
--
ALTER TABLE `aimag`
  MODIFY `aimag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `am_gazar`
--
ALTER TABLE `am_gazar`
  MODIFY `AM_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dursgalt_gazar`
--
ALTER TABLE `dursgalt_gazar`
  MODIFY `DU_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;