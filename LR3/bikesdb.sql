-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 19 2022 г., 22:06
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bikesdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bikes`
--

CREATE TABLE `bikes` (
  `id` int(11) NOT NULL,
  `img_path` varchar(45) NOT NULL,
  `bikename` varchar(45) NOT NULL,
  `biketype` int(11) NOT NULL,
  `bikedescription` longtext NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bikes`
--

INSERT INTO `bikes` (`id`, `img_path`, `bikename`, `biketype`, `bikedescription`, `cost`) VALUES
(1, 'Forward_Sporting_27,5_1.2_(2022).jpg', 'Forward Sporting 27,5 1.2 (2022)', 1, 'Горный велосипед Forward Sporting 27,5 1.2 (2022) подарит вам незабываемые впечатления. Любительский уровень оборудования. Спортивное седло чётко регулируется и защищает от натёртостей и ушибов. Эргономичная и прочная система FWD HDL-S311, 42x34x24T обеспечит эффективное кручение педалей. Прочная и лёгкая стальная рама Hi-Ten. Ободные механические тормоза Promax TX-117 являются отличным решением для преодоления как спортивных, так и спокойных маршрутов. Задний переключатель LTWOO A 2 увеличивает возможности велосипедиста.', 14570),
(2, 'Stark_Tank_29.1_D_Steel_(2022).jpg', 'Stark Tank 29.1 D Steel (2022)', 1, 'Горный велосипед Stark Tank 29.1 D Steel (2022) относится к категории велосипедов высокой прочности. Задний переключатель Shimano Tourney RD-TY21 помогает выбрать нужную передачу и сделать ход велосипеда оптимальным. Седло YBT YBT-1017 отличается анатомичным спортивным дизайном и рассчитано на повседневные поездки. Стальная рама рассчитана на высокие нагрузки. Покрышки Citron CT-1201 2,1\" рассчитаны на интенсивный режим работы. Дисковые механические тормоза Apse ADC-11 приспособлены сделать вашу езду безопасной в любой ситуации. Модель укомплектована системой GS-S307.', 21670),
(3, 'Forward_Sporting_29_XX_D_(2022).jpg', 'Forward Sporting 29 XX D (2022)', 1, 'Горный велосипед Forward Sporting 29 XX D (2022) – ваш выбор, если вы хотите исследовать новые места и ездить по дорогам любого типа. Универсальное спортивное седло позволит избежать дискомфорта и натирания. У велосипеда дисковые механические тормоза Tektro MD-M280. Задний переключатель Shimano Altus RD-M2000 помогает легко регулировать передачи, менять параметры движения. Рама Hi-Ten – воплощение инновационных наработок от команды инженеров бренда. Трансмиссия с шатунами Prowheel Charm 32NW, алюминиевая обладает большим запасом прочности. Модель оснащена любительским уровнем оборудования.', 26990),
(4, 'Stark_Outpost_26.1_D_Steel_(2022).jpg', 'Stark Outpost 26.1 D Steel (2022)', 1, 'Горный велосипед Stark Outpost 26.1 D Steel (2022) относится к группе эконом-класса. Уменьшенный вес шатунов GS-S307, позволяет точнее передавать нагрузку на каретку велосипеда. Модель собрана на базе рамы из стали. Дисковые механические тормоза apse adc-11 приспособлены сделать вашу езду безопасной в любой ситуации. За безопасное и своевременно переключение скоростей отвечает задний переключатель Shimano Tourney RD-TY21. Модель оснащена седлом YBT YBT-1017 спортивной геометрии. Конструкцию модели дополняют шипастые покрышки Citron CT-1201 2,1\", устойчивые к повреждениям.', 19900),
(5, 'Stark_Madness_BMX_3_(2022).jpg', 'Stark Madness BMX 3 (2022)', 2, 'Stark Madness BMX 3 (2022) – удачная BMX-модель для трюков. Жёсткая вилка Stark Rigid идеальна для города. Модель собрана на базе рамы Hi-Ten 13A из стали. Велосипед оснащён любительским уровнем оборудования. Велосипед укомплектован системой CW CW-BFC10-2. Ободные механические тормоза Sparkle U-969D сокращают время торможения и обеспечивают комфортное управление байком. Покрышки Kenda K905 2,35\" позволяют быстро набрать скорость независимо от типа и влажности покрытия. Лёгкое седло Cionli #9066 с повышенным уровнем устойчивости к износу.', 16990),
(6, 'Stark_Madness_BMX_1_(2022).jpg', 'Stark Madness BMX 1 (2022)', 2, 'Трюковая BMX-модель Stark Madness BMX 1 (2022) — разработка для увлечённых экстремалов, которая создана с учетом всех требований для велосипедов своего типа. На велосипеде стоит любительское оборудование. У велосипеда хорошие ободные механические тормоза Sparkle U-969D, которые быстро схватываются с колёсами и останавливают их. Байк создан на базе стальной рамы Hi-Ten 13A. Покрышки Kenda K905 2,35\" выдерживают тренировки на сложных каменистых трассах. Седло Cionli #9066 идеально для трюкового катания на высокой скорости. Шатуны CW CW-J великолепно передают энергию велосипедиста от педалей к звёздочкам. Велосипед оборудован жёсткой вилкой Stark Rigid.', 14720),
(7, 'Stark_Madness_BMX_4_(2022).jpg', 'Stark Madness BMX 4 (2022)', 2, 'Stark Madness BMX 4 (2022) — если Вы любите экстрим, то эта модель просто создана для вас. Велосипед оборудован седлом Cionli #9066 спортивной геометрии. Жёсткая вилка Stark Rigid идеальна для асфальтированных дорог. Оборудование стандартной комплектации. Рама Hi-Ten 13A из стали порадует трубами повышенной прочности. Ребристые покрышки Kenda K905 2,35\". Ободные механические тормоза Sparkle U-969D велосипеда останавливают его моментально, независимо от качества дорожного покрытия. Педали крепятся к шатунам CW CW-BFC10-2.', 18990),
(8, 'Stark_Madness_BMX_2_(2022).jpg', 'Stark Madness BMX 2 (2022)', 2, 'Экстремальный велосипед Stark Madness BMX 2 (2022) впечатляет своими техническими возможностями и эффектным внешним видом. Велосипед укомплектован любительским уровнем оборудования. Фирменные покрышки Kenda K905 2,35\" порадуют прекрасным сцеплением с грунтом. Седло Cionli #9066 обладает стильным дизайном и высокими техническими характеристиками. Ободные механические тормоза Sparkle U-969D обеспечивают быстрое торможение и повышают безопасность. Жёсткая вилка Stark Rigid мало весит и удобна. Стальная рама Hi-Ten 13A отличается устойчивостью и удобством. Модель укомплектована шатунами CW CW-J.', 15230),
(9, 'Dewolf_Asphalt_20_(2022).jpg', 'Dewolf Asphalt 20 (2022)', 3, 'Городской велосипед DEWOLF ASPHALT 20 максимально удобный и функциональный для катания. При покупке не придется ничего докупать. В комплекте все предусмотрено: крылья, багажник, подножка, а также передний и задний фонарь. Подходит стандартный автомобильный насос. Не нужно искать переходники и тратить время на накачку колес. Максимальное соотношение в компоновке качественных продуктов, навесного оборудования и аксессуаров в комплекте позволит насладиться каждым моментом.', 42990),
(10, 'Stels_Navigator_375_Z010_(2022).jpg', 'Stels Navigator 375 Z010 (2022)', 3, 'Дорожный велосипед Stels Navigator 375 Z010 (2022) для ежедневного катания. Тормозная система велосипеда – ободные механические тормоза Ободные (V-типа). В конструкции предусмотрен задний переключатель цепи со звезды на звезду. Жесткая вилка Жесткая, сталь для городских условий. Велосипед оборудован седлом комфортного дизайна. Модель оснащена системой 44Т. Основной компонент данной модели – высококачественная стальная рама сталь.', 20400),
(11, 'Aspect_Weekend_(2022).jpg', 'Aspect Weekend (2022)', 3, 'Комфортный велосипед Aspect Weekend (2022) – легкий и надежный компаньон для поездок по городу. На велосипеде стоят ободные механические тормоза V-brake, которые дают точный результат даже в неблагоприятную погоду. Универсальные покрышки Kenda K1118 26x1.95 с ярко выраженным протектором. Прочность и четкость работы трансмиссии обеспечивает переключатель Shimano Altus RD-M310. Демократичная стоимость и эффективная работа навесного оборудования любительской комплектации – несомненные преимущества данной модели. Алюминиевая рама ALU 6061 обладает высокой износоустойчивостью. Цепная передача оснащена износоустойчивыми шатунами PROWHEEL Alloy 24/34/42T*170mm.', 40490),
(12, 'Stels_Energy_III_K010_(2022).jpg', 'Stels Energy III K010 (2022)', 3, 'Stels Energy III K010 (2022) обладает крайне легкой и удобной конструкцией для наиболее эффективного передвижения по городу. Эргономичный велопривод 38Т. Комфортное седло с повышенным уровнем комфорта посадки. Основой модели является рама из алюминиевого сплава, которая обладает достойными весовыми и прочностными характеристиками. Байк оборудован планетарным переключателем, чтобы менять передачи во время поездки. Ободные механические тормоза ножной являются отличным решением для преодоления как спортивных, так и спокойных маршрутов. На модель установлено любительское оборудование. Жёсткая вилка идеальна для асфальтированных дорог.', 42800),
(13, 'Aspect_Komodo_7_(2022).jpg', 'Aspect Komodo 7 (2022)', 4, 'Складной велосипед Aspect Komodo 7 (2022) разработан для покорения увлекательных комфортных маршрутов. Жёсткая вилка Steel хорошо поглощает вибрацию. Основой модели является рама ALU Folding, 24 из алюминиевого сплава, которая обладает достойными весовыми и прочностными характеристиками. Ободные механические тормоза Tektro V-brake сокращают время торможения и обеспечивают комфортное управление байком. Модель обладает прочными покрышками Wanda P1023 24x2.125. В комплектацию велосипеда входит система Prowheel PRO-452PP-1 52T*170L. Байк оборудован переключателем Shimano RD-FT35 7sp, чтобы менять передачи во время поездки.', 42990),
(14, 'Forward_Arsenal_20_1.0_(2022).jpg', 'Forward Arsenal 20 1.0 (2022)', 4, 'Складной велосипед Forward Arsenal 20 1.0 (2022) подарит возможность наслаждаться спокойной поездкой и удобством управления. Предусмотрен задний переключатель. Прочное и комфортное седло для велосипедного релакса и лёгкого вело-фитнеса. Модель укомплектована стандартным уровнем оборудования. Стальная рама отличается устойчивостью и удобством. Прочная система FWD GS-S112, 40T, стальная. Жёсткая вилка Сталь Hi-Ten идеальна для города.', 8810),
(15, 'Forward_Arsenal_20_2.0_(2022).jpg', 'Forward Arsenal 20 2.0 (2022)', 4, 'Складной велосипед Forward Arsenal 20 2.0 (2022) – это модель начального уровня. Жёсткая вилка Сталь Hi-Ten хорошо поглощает вибрацию. Эргономичное седло FWD Comfort. Переключение скоростей осуществляется при помощи заднего переключателя Sun Run RD-HG-04B. Велосипед оснащён системой FWD GS-S112, 40T, стальная. Складная стальная рама обеспечивает велосипеду компактность. Стандартный уровень оборудования. Простой и надежный ножной тормоз срабатывает без задержек, останавливая велосипед в том месте и в то время, когда нужно его владельцу.', 11060),
(16, 'Forward_Valencia_24_1.0_(2022).jpg', 'Forward Valencia 24 1.0 (2022)', 4, 'Forward Valencia 24 1.0 (2022) не займет много места для хранения или транспортировки. Жёсткая вилка Hi-Ten идеальна для города. Педали крепятся к шатунам FWD GS-S112, 40T. В числе плюсов велосипеда нельзя не отметить продуманность всех узлов, выгодную цену и стандартное оборудование от известных производителей. Велосипедное седло FWD Comfort для любителей городского катания. Стальная рама Hi-Ten разработана с учетом всех требований, чтобы обеспечить комфортную и плавную езду.', 9440),
(17, 'Forward_Unit_20_1.0_(2022).jpg', 'Forward Unit 20 1.0 (2022)', 5, 'Forward Unit 20 1.0 (2022) обеспечит здоровый досуг вашему ребенку! Стальная рама Hi-Ten разработана с учетом всех требований, чтобы обеспечить малышу комфортную и плавную езду. Седло повышенной комфортности FWD City Kid чётко регулируется и защищает от натёртостей и ушибов. Жёсткая вилка Hi-Ten для активного катания. Велосипед укомплектован шатунами FWD GS-S112, 32T.', 7820),
(18, 'Giant_XtC_Jr_20_(2022).jpg', 'Giant XtC Jr 20 (2022)', 5, 'Giant XtC Jr 20 (2022) впечатляет своим красивым дизайном и создан специально для малышей и их безопасного катания. Его легкие покрышки Giant Junior Sport, 20x2.1\", 22 tpi отлично держат трассу. Система alloy, 32t, 127mm выдерживает значительную нагрузку и оптимальна при интенсивном катании. Прочность и четкость работы трансмиссии обеспечивает переключатель Shimano Tourney. Маневренность транспортному средству обеспечивает алюминиевая рама. Материалы седла Giant Jr. Sports устойчивы к износу и трению. На велосипед установлены надёжные ободные механические тормоза alloy, linear pull.', 34990),
(19, 'Novatrack_Novara_Disc_20_6 sp_(2022).jpg', 'Novatrack Novara Disc 20\" 6 sp. (2022)', 5, 'Удобный и маневренный велосипед Novatrack Novara Disc 20\" 6 sp. (2022), ориентированный на активных детей. Вилка Novatrack для комфортной езды по ухабистой дороге. Уменьшенный вес шатунов позволяет точнее передавать нагрузку на каретку велосипеда. Седло Novatrack выполнено из качественных материалов. Переключение скоростей осуществляется при помощи системы Shimano Tourney TY21. Дисковые механические тормоза STG обеспечивают быстрое торможение и повышают безопасность. Прочная и лёгкая алюминиевая рама Алюминий AL- 6061.', 19190),
(20, 'Novatrack_Wind_16_(2022).jpg', 'Novatrack Wind 16\" (2022)', 5, 'Детский велосипед Novatrack Wind 16\" (2022) станет надежным спутником ребёнка в весёлых играх и поездках с родителями и друзьями. Жёсткая вилка идеальна для города. Велосипед имеет ободные механические тормоза Novatrack Caliper для эффективного и быстрого торможения. Комфорт передвижения обеспечивает рама HI-TENSILE, выполненная из стали. На велосипед установлено лёгкое и практичное седло Novatrack удобной формы для комфортных поездок.', 7560);

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `typename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `typename`) VALUES
(1, 'Горный'),
(2, 'Экстремальный'),
(3, 'Комфортный'),
(4, 'Складной'),
(5, 'Детский');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `birthday` date NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL,
  `hobby` text NOT NULL,
  `vk_link` text NOT NULL,
  `blood_type` text NOT NULL,
  `rh_factor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fullname`, `birthday`, `address`, `gender`, `hobby`, `vk_link`, `blood_type`, `rh_factor`) VALUES
(24, 'ivanthebestfifa21@mail.ru', '35b3f0a46c324aa1577bf2ed8280425a', '', '0000-00-00', '', 'Мужской', '', '', 'I', '+');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
