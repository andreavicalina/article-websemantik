-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2021 at 06:20 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semantik`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_author` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `link` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `newest` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `id_author`, `gambar`, `tanggal`, `link`, `isi`, `newest`) VALUES
(2, 'Ariana Grande', 2, 'ariana grande.jpg', '2021-01-16', 'https://www.arianagrande.com', '<p>Guess what?&nbsp;<strong>NEW ALBUM BABY &lt;3</strong></p>\r\n\r\n<p>Check out Ariana&#39;s official website for further notification!</p>\r\n', '2021-01-16 00:22:02'),
(3, 'Niall Horan New Album Heartbreak Weather', 2, 'Niall Horan.jpg', '2021-01-08', 'http://www.niallhoran.com/', '<p>Heartbreak Weather is out&nbsp;<strong>NOW</strong>!!!</p>\r\n', '2021-01-16 00:26:31'),
(4, 'Beth Gibbons', 1, 'beth gibbons.jpg', '0000-00-00', 'http://bethgibbons.net/', '<p><strong>Beth Gibbons</strong>&nbsp;is an English singer and songwriter. She is the singer and&nbsp;lyricist&nbsp;for the band&nbsp;Portishead.</p>\r\n', '2021-01-16 12:38:52'),
(5, 'One Direction 2021 Reunion?', 2, 'one direction.jpg', '2021-01-06', 'https://www.onedirectionmusic.com//gb/home.html', '<p>As you guys likely knows, 2020 was the ten year anniversary celebration since the boys were formed on&nbsp;<a href=\"https://www.capitalfm.com/artists/x-factor/\"><em>The X Factor</em></a>&nbsp;and were launched into stardom practically overnight.</p>\r\n\r\n<p>Fans had high hopes this milestone would be when the boys chose to get back together, whether it be for a one off performance or even a more permanent comeback.</p>\r\n\r\n<p>Sadly, this wasn&#39;t the case, as they marked the occasion with heartfelt messages and throwbacks to their iconic time as a band on social media.</p>\r\n\r\n<p>Harry made a rare appearance on Twitter, writing alongside a snap of the boys embracing on stage: &quot;I&rsquo;ve been struggling to put into words how grateful I am for everything that&rsquo;s happened over the last ten years.&quot;</p>\r\n\r\n<p>&quot;I&rsquo;ve seen things and places that I&rsquo;d only ever dreamt of when I was growing up.&quot;</p>\r\n\r\n<p>However, 2020 was no ordinary year and the&nbsp;<a href=\"https://www.capitalfm.com/news/coronavirus/\">COVID-19</a>&nbsp;pandemic saw artists across the globe forced to postpone and cancel major plans, tours and performances, with practically&nbsp;<em>everything</em>&nbsp;being forced to go virtual.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>So, it perhaps isn&#39;t so surprising they decided to skip any 10 year reunion plans they may have had after all.</p>\r\n\r\n<p>Which, of course, leaves us with 2021.</p>\r\n\r\n<p>Whilst none of us quite know what the future holds, either with 1D or the ongoing global pandemic, but we all remain optimistic next year can&#39;t be quite as bad as this one, right?!</p>\r\n\r\n<p>So, maybe the bookmakers looking to next year as a reunion date isn&#39;t so crazy after all!</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-01-16 19:52:12'),
(6, 'John Legend Heartwarming Message for Wife after suffering miscarriage', 3, 'john legend.jpg', '2021-01-06', 'https://www.johnlegend.com/', '<p>John Legend performed single Never Break at the&nbsp;<a href=\"https://www.standard.co.uk/topic/billboard-music-awards\">Billboard Music Awards</a>&nbsp;and dedicated the ballad to his wife&nbsp;<a href=\"https://www.standard.co.uk/topic/chrissy-teigen\">Chrissy Teigen</a>.</p>\r\n\r\n<p>The awards show marked 41-year-old Legend&rsquo;s first performance since Teigen, 34, announced they had lost their baby, a son named Jack, late last month.</p>\r\n\r\n<p>Legend wore a suit while seated at a piano and before starting the song, he said: &ldquo;This is for Chrissy.&rdquo;</p>\r\n\r\n<p>Legend&rsquo;s emotional ballad was preceded by host Kelly Clarkson taking a moment to praise the couple for their strength,</p>\r\n\r\n<p>&ldquo;I want to take a moment to talk about a friend who inspires me on the daily,&rdquo; she said.</p>\r\n\r\n<p>&ldquo;Not only as a musician, a songwriter, but as a human. John Legend is one of my favourite people on this planet and it&rsquo;s easy for us all to feel that way about them because he and Chrissy just have this warm way of inviting us into their world, the highs and the lows.&rdquo;</p>\r\n\r\n<p>Teigen received support worldwide after publicly sharing news that she had lost her baby.</p>\r\n\r\n<p>In a poignant social media post, she said she and Legend were in &ldquo;deep pain&rdquo;. Teigen, who married Legend in 2013, had been updating fans throughout her pregnancy.</p>\r\n\r\n<p>She had been in hospital after suffering excessive bleeding.</p>\r\n\r\n<p>Teigen said: &ldquo;We are shocked and in the kind of deep pain you only hear about, the kind of pain we&rsquo;ve never felt before.</p>\r\n\r\n<p>&ldquo;We were never able to stop the bleeding and give our baby the fluids he needed, despite bags and bags of blood transfusions. It just wasn&rsquo;t enough.&rdquo;</p>\r\n\r\n<p>Legend and Teigen are also parents to four-year-old daughter Luna and two-year-old son Miles.</p>\r\n', '2021-01-16 20:00:50'),
(7, 'Ed Sheeran Expecting Baby with wife', 4, 'ed sheeran.jpg', '2021-01-04', 'https://www.edsheeran.com/', '<p>Singer and songwriter Ed Sheeran, who has 31.4 million followers on Instagram and four Grammy wins, is now&nbsp;reportedly expecting a baby&nbsp;with his wife, Cherry Seaborn.</p>\r\n\r\n<p>According to the Sun, his wife Cherry is reportedly in&nbsp;her third trimester&nbsp;and they&#39;re expecting their baby before the end of the summer.</p>\r\n\r\n<p>Cherry, who works as a risk manager at a high-profile accounting firm, has been given&nbsp;&quot;unlimited time off&quot;&nbsp;from her work to &quot;pursue other projects alongside becoming a mum,&quot; according to a source at the Sun.</p>\r\n\r\n<p>Ed Sheeran may have hinted about his major life changes after announcing he&#39;d be going on a break from social media at the end of 2019.</p>\r\n\r\n<p>Congrats to Ed and Cherry!</p>\r\n', '2021-01-16 20:09:01'),
(8, 'The Chainsmokers Massive Drive-in Concert', 3, 'the chainsmokers.jpg', '2021-01-15', 'https://www.thechainsmokers.com/', '<p>A massive &quot;drive-in&quot; Chainsmokers concert in the Hamptons over the weekend has sparked a state investigation and drawn a ton of backlash online. But a handful of concertgoers told BuzzFeed News that they felt &quot;very safe&quot; and that they did not feel at risk for contracting or unknowingly spreading the&nbsp;<a href=\"https://www.buzzfeednews.com/collection/coronavirus\" target=\"_blank\">coronavirus</a>&nbsp;by attending.</p>\r\n\r\n<p>The concert in Water Mill&nbsp;<a href=\"https://guestofaguest.com/hamptons/music/a-drive-in-chainsmokers-concert-is-hitting-the-hamptons-this-weekend\" target=\"_blank\">sold ticket packages</a>&nbsp;starting at $850. VIP access went for as much as $25,000 and included an RV. The event&#39;s website&nbsp;<a href=\"https://www.tixr.com/groups/intheknow/events/jaja-presents-safe-sound-hamptons-chainsmokers-18912\" target=\"_blank\">declared that all proceeds</a>&nbsp;will go toward local and national charities.</p>\r\n\r\n<p>An estimated 2,000 people attended the concert on Saturday. And while many Chainsmokers fans boasted on social media about their unique and exclusive concert experience, a video originally taken by someone onstage with the band, and was later&nbsp;<a href=\"https://twitter.com/FirenzeMike/status/1287484244433022979\" target=\"_blank\">shared to Twitter</a>, has people concerned about the potential health risks an event of this scale could pose.<br />\r\n<br />\r\nSpecifically, people are concerned that a crowd gathered in what appeared to be a pit section were&nbsp;<a href=\"https://twitter.com/dances/status/1287485471799390210\" target=\"_blank\">not properly socially distanced</a>. Social media photos on the ground showed widespread distancing between people partying on or near their cars in their designated lots, but the photos taken of the pit at night do not show clear markings of where and how crowds were controlled.</p>\r\n\r\n<p>On Monday, after BuzzFeed News reported on the concert, the state of New York launched an investigation into the event and if, or how, the Town of Southampton issued a permit for the concert despite New York&#39;s Declared State of Emergency banning non-essential gatherings of more than 50 people.</p>\r\n\r\n<p>In the Know Experience, one of the main organizers of the event, said that there were dividers separating individual parties in that contested pit area, and that &quot;guests were also instructed that they would not be allowed to leave their designed spots for any reason other than to use the restroom.&quot;</p>\r\n', '2021-01-16 21:20:30'),
(9, 'Justin Bieber Battling Lyme Disease', 4, 'justin bieber.jpg', '2021-01-07', 'https://www.justinbiebermusic.com/', '<p>Justin Bieber will reveal in his documentary why so many people thought he was battling deep depression ... fact is, he was, but it was the result of contracting Lyme disease.</p>\r\n\r\n<p>Sources who have seen the documentary -- which drops January 27 -- tell us Justin and others in his life discuss the scary symptoms he endured in 2019. He says during much of the year his condition went undiagnosed. Doctors struggled to figure out what was wrong with him, but couldn&#39;t put their finger on it until late last year.</p>\r\n\r\n<p>You may recall this photo of Justin crying taken back in October. It&#39;s made clear in the documentary ... Justin was indeed batting extreme depression because he was suffering and no one knew what was wrong with him.</p>\r\n\r\n<p>We&#39;re told no one knows how Justin contracted the disease, but it comes from a tick bite. Symptoms include rashes, headaches, fever and fatigue.</p>\r\n\r\n<p>The good news. He&#39;s now been diagnosed, he&#39;s being treated with the proper meds, his skin has cleared up, and he&#39;s now ready for&nbsp;<a href=\"https://www.tmz.com/2020/01/03/justin-bieber-post-malone-travis-scott-kehlani-new-album-features/\"><strong>his upcoming album release</strong></a>&nbsp;and tour -- so he says in the documentary.</p>\r\n\r\n<p>You may remember Justin kept saying he was going to release a new song and it kept getting delayed. We&#39;re told the delay was because everyone wanted to make sure he was well enough to release an album and tour. He is, and now it&#39;s all a go.</p>\r\n', '2021-01-16 21:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id_author` int(11) NOT NULL,
  `nama_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id_author`, `nama_author`) VALUES
(1, 'Mhd. Syahrizal'),
(2, 'Amatul Noor Damanik'),
(3, 'Andrea Vicalina'),
(4, 'Franklin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
