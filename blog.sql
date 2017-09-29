-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2017 at 06:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `pid` int(100) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `user` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `pid`, `comment`, `user`, `reg_date`) VALUES
(48, 46, 'sounds good!!!', 'murthi', '2017-06-16 18:23:26'),
(47, 47, 'Awesome!!!!', 'murthi', '2017-06-16 18:23:14'),
(46, 48, 'loving this!!!', 'murthi', '2017-06-16 18:23:01'),
(45, 49, 'I like this!!!', 'murthi', '2017-06-16 18:22:53'),
(44, 46, 'Awesome!!!', 'vasu', '2017-06-16 18:22:30'),
(43, 47, 'great info!!!', 'vasu', '2017-06-16 18:22:21'),
(42, 48, 'Useful Info!!!', 'vasu', '2017-06-16 18:22:04'),
(41, 49, 'great content!!!', 'vasu', '2017-06-16 18:21:50'),
(40, 50, 'Sounds Interesting!!', 'vasu', '2017-06-16 18:21:28'),
(39, 50, 'Nice!!!\r\n', 'murthi', '2017-06-16 18:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `title`) VALUES
(67, 'images/fifth.jpg', 'How to Write an Awesome Blog Post in 5 Steps '),
(66, 'images/fourth.png', '16 Rules of Blog Writing and Layout. Which Ones Are You Breaking? [And Infographic]'),
(65, 'images/third.png', '10 Top Business Blogs and Why They Are Successful'),
(64, 'images/second.png', 'The 15 best blogging and publishing platforms on the Internet today. Which blog is for you?'),
(63, 'images/first.jpg', 'How to Write a Blog Post: A Simple Formula + 5 Free Blog Post Templates');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `user`, `pass`) VALUES
(2, 'kranthi', 'kranthi610@gmail.com', 'hanumans123@'),
(3, 'vasu', 'vasugundeti@gmail.com', '1234'),
(4, 'Divya', 'thalladivya194@gmail.com', '1234'),
(8, 'murthi', 'murthi@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `reg_date`) VALUES
(47, 'The 15 best blogging and publishing platforms on the Internet today. Which blog is for you?', 'Reading the signs a couple of years ago it was easy to assume that the art of blogging was set to die a painful death at the hands of social networks like Facebook and Twitter and others. While social has changed how we communicate online, blogging remains a core part of things.\r\n\r\nIn fact, the truth is that thereâ€™s never been a better time to blog. Social networks help build audiences and deliver content to readers, and more established blogs and websites often link to or aggregate smaller sites, sending swarms of viewers to read articles â€” The Daily Mail aside.\r\n\r\nSo, whether youâ€™re a blogger returning from a break, seeking a new home or are looking to write online for the first time, hereâ€™s our guide to what blogging platforms are out there.', '2017-06-16 18:15:23'),
(48, '10 Top Business Blogs and Why They Are Successful', 'Does your business have a blog? Are you looking to generate engaging comments and new daily visitors? If so, look no further.\r\n\r\nThis article showcases 10 top blogs in multiple markets. Follow their lead to take your blog from good to great. And if you donâ€™t have a business blog yet, nowâ€™s the perfect time to get in the game!\r\n\r\nEach of these successful blog examples has incorporated unique features that have attracted thousands of readers. The great news is that you donâ€™t have to reinvent the wheelâ€”just model the best. Take a look at these thriving blogs and apply the same success strategies to your own blog.\r\n\r\n#1: Sweet Leaf Tea\r\n\r\nSweet Leaf Tea is a blog site that sells specialty teas. Theyâ€™ve figured out a way to humanize their blog while staying true to their brand. Sweet Leaf Tea uses their blog design to bring a less formal, more human touch to their brand.', '2017-06-16 18:16:38'),
(49, '16 Rules of Blog Writing and Layout. Which Ones Are You Breaking? [And Infographic]', 'Newspapers have their drawbacks but one thing they do right is to make sure their stories are easy to read. By that, I mean how they actually format and layout the newspaper and each individual story. Of course, first newspapers hit you with a headline that makes you really want to read more.\r\n\r\n\r\nSomething like this headline works wonders:\r\n\r\nTHE KING OF POP IS DEAD! How he really died! 10,000 pills in 6 months\r\n\r\nSensational tabloids aside, the content in newspapers is usually good ~ the writing\'s high quality and they usually get their facts straight.\r\n\r\nBut quality content isn\'t all you expect when you buy a newspaper and it isn\'t enough for blog writing either.\r\n\r\nAll newspapers make sure their content is easy to read by constraining the width of their columns and that\'s what their readers expect.\r\n\r\nBlog writers need to do the same and format their blog posts so they\'re easy to read. Long narrow newspaper columns mean your eye can easily jump from the end of one line to the beginning of the next without losing its place.\r\n\r\nIf the column\'s too wide readers will keep getting lost unless they enlist their finger to help them keep track. Even if they do that they\'ll get frustrated and won\'t enjoy the reading experience.', '2017-06-16 18:18:14'),
(46, 'How to Write a Blog Post: A Simple Formula + 5 Free Blog Post Templates', 'Before you start to write, have a clear understanding of your target audience. What do they want to know about? What will resonate with them? This is where creating your buyer personas comes in handy. Consider what you know about your buyer personas and their interests while you\'re coming up with a topic for your blog post.\r\n\r\nFor instance, if your readers are millennials looking to start their own business, you probably don\'t need to provide them with information about getting started in social media -- most of them already have that down. You might, however, want to give them information about how to adjust their approach to social media from a more casual, personal one to a more business-savvy, networking-focused approach. That kind of tweak is what separates you from blogging about generic stuff to the stuff your audience really wants (and needs) to hear.\r\n\r\nDon\'t have buyer personas in place for your business? Here are a few resources to help you get started:', '2017-06-16 18:14:13'),
(50, 'How to Write an Awesome Blog Post in 5 Steps ', 'Now that Iâ€™m done thoroughly mangling that vague metaphor, letâ€™s get down to business. You know you need to start blogging to grow your business, but you donâ€™t know how. In this post, Iâ€™ll show you how to write a blog post in five simple steps that people will actually want to read. Ready? Letâ€™s get started.\r\n\r\nHow to Write a Blog Post in Five Easy Steps [Summary]:\r\n\r\nStep 1: Plan your blog post by choosing a topic, creating an outline, conducting research, and checking facts.\r\nStep 2: Craft a headline that is both informative and will capture readersâ€™ attentions.\r\nStep 3: Write your post, either writing a draft in a single session or gradually word on parts of it.\r\nStep 4: Use images to enhance your post, improve its flow, add humor, and explain complex topics.\r\nStep 5: Edit your blog post. Make sure to avoid repetition, read your post aloud to check its flow, have someone else read it and provide feedback, keep sentences and paragraphs short, donâ€™t be a perfectionist, donâ€™t be afraid to cut out text or adapt your writing last minute.', '2017-06-16 18:19:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
