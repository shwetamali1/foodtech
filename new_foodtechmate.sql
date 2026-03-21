-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2026 at 01:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_foodtechmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `date` varchar(5) DEFAULT NULL,
  `month` varchar(5) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  `country_code` varchar(5) DEFAULT '+91',
  `user_id` int(11) NOT NULL,
  `payment_plan` varchar(100) DEFAULT NULL,
  `subscribe_id` int(11) NOT NULL,
  `payment_status` enum('pending','success','rejected') NOT NULL,
  `transaction_id` varchar(200) DEFAULT NULL,
  `json_response` longtext DEFAULT NULL,
  `subscription_start_date` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `first_name`, `last_name`, `email`, `mobile`, `country`, `payment_method`, `card_number`, `date`, `month`, `year`, `country_code`, `user_id`, `payment_plan`, `subscribe_id`, `payment_status`, `transaction_id`, `json_response`, `subscription_start_date`, `created_date`) VALUES
(1, 'shweta', 'Mali', 'malishweta7434@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 65, 'subcribe', 2, 'pending', NULL, NULL, '2025-09-27 00:00:00', '2025-09-27 09:26:47'),
(2, 'shweta', 'Mali', 'malishweta7434@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 65, 'report', 7, 'pending', NULL, NULL, '2025-09-27 00:00:00', '2025-09-27 09:31:07'),
(4, 'shweta', 'Mali', 'malishweta7434@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 65, 'report', 9, 'pending', NULL, NULL, '2025-09-27 00:00:00', '2025-09-27 10:09:55'),
(5, 'shweta', 'Mali', 'malishweta7434@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 65, 'report', 1, 'pending', NULL, NULL, '2025-09-27 00:00:00', '2025-09-27 11:03:30'),
(6, 'test', 'test', 'test@gmail.com', '7383198927', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 68, 'report', 1, 'pending', NULL, NULL, '2025-09-27 00:00:00', '2025-09-27 12:03:41'),
(7, 'test', 'test', 'chauhan.vimal4@gmail.com', '7383198927', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 68, 'subcribe', 1, 'pending', NULL, NULL, '2025-09-28 00:00:00', '2025-09-27 12:05:33'),
(8, 'Ganesh', 'Mali', 'prowessbuzz@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 69, 'report', 1, 'pending', NULL, NULL, '2025-09-27 00:00:00', '2025-09-27 14:48:37'),
(9, 'shweta', 'Mali', 'malishweta7434@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 65, 'report', 1, 'pending', NULL, NULL, '2025-09-27 00:00:00', '2025-09-27 14:55:45'),
(10, 'Ganesh', 'Mali', 'maliganesh01@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 70, 'report', 1, 'pending', NULL, NULL, '2025-09-27 00:00:00', '2025-09-27 21:56:25'),
(11, 'Ganesh', 'Mali', 'maliganesh01@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 70, 'subcribe', 2, 'pending', NULL, NULL, '2025-09-27 00:00:00', '2025-09-27 21:59:35'),
(12, 'Ganesh', 'Mali', 'maliganesh01@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 70, 'report', 7, 'pending', NULL, NULL, '2025-09-27 00:00:00', '2025-09-27 22:03:31'),
(13, 'shweta', 'Mali', 'malishweta7434@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 65, 'report', 9, 'pending', NULL, NULL, '2025-09-28 00:00:00', '2025-09-28 09:51:43'),
(14, 'test', 'test', 'chauhan.vimal4@gmail.com', '7383198927', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 68, 'report', 9, 'pending', NULL, NULL, '2025-10-02 00:00:00', '2025-10-02 09:14:01'),
(15, 'shweta', 'Mali', 'malishweta7434@gmail.com', '7588546837', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 65, 'report', 1, 'pending', NULL, NULL, '2025-10-04 00:00:00', '2025-10-04 09:18:30'),
(16, 'nitya', 'mali', 'nitya@gmail.com', '9403571671', 'India', 'Online', NULL, NULL, NULL, NULL, '+91', 78, 'subcribe', 2, 'pending', NULL, NULL, '2025-11-22 00:00:00', '2025-11-22 17:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE `business_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_categories`
--

INSERT INTO `business_categories` (`id`, `category`, `is_deleted`, `created_date`) VALUES
(1, 'Food License', '1', '2025-08-04 05:25:53'),
(2, 'GST Rregistrationz', '0', '2025-08-04 06:39:33'),
(3, 'test', '1', '2025-08-04 07:18:53'),
(4, 'business cateiry test', '0', '2025-08-05 16:23:48'),
(5, 'lael', '1', '2025-08-05 16:55:36'),
(6, 'ganesh mali', '0', '2025-08-07 02:49:48'),
(7, 'test bysises', '0', '2025-09-27 10:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `created_date`) VALUES
(1, 'vimal', 'chauhan', 'test@gmail.com', '7383198927', 'This is test contact', '2025-08-05 11:02:43'),
(2, 'Gordon', 'Davison', 'gordon.davison@gmail.com', '413558649', 'Hi,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nRevealed: The Hidden Systems I Used To Swap My Construction Job For A 7 Figure Online Income… \r\nAll Without Any Experience! \r\nEscape Plan IS1: Unlock The Blueprint to My 4 Million Dollar Digital Product Systems… And Use Them Yourself. \r\n\r\nhttps://www.youtube.com/watch?v=_A56-n-3Z4M\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://topcasworld.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Jordan Matthews', '2025-08-06 17:14:05'),
(3, 'Beulah', 'Farthing', 'beulah.farthing76@msn.com', '7736366417', 'We have a promotional offer for your website foodtechmate.com.\r\nIn 30 Seconds Or Less…\r\nSending Us A Surge Of 1,478 Clicks A Day 100% FREE\r\n(Sneak Any URL You Want, Even Affiliate Links, We Send Traffic To Affiliate Links Directly, And Make $285.78 A Day Doing That )\r\n(You Don’t Need A Website, Hosting, A Domain, Or Even To Write A Single word…)\r\nNo Technical Skills - No Experience - No Coding - No Setup - No Waiting\r\nWatch How We Generate 342 Clicks Per Hour In 27 Seconds Flat…\r\n\r\nSee it in action: https://www.novaai.expert/SneakAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-08 03:48:39'),
(4, 'Lin', 'Becerra', 'lin.becerra@gmail.com', '7712713154', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\n“30-Second Trick Turns My Phone Into\r\na $1,000/Day WiFI CASH BOT”\r\nJust Tap The \"Secret Button\" To Cash In From This $385 Billion A.I WiFi Cash Loophole!\r\n\r\nSee it in action: https://goldsolutions.pro/WiFiCashBot\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-10 04:59:49'),
(5, 'Louisa', 'Domingo', 'louisa.domingo27@gmail.com', '883893412', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nCREATE 100s of STUDIO QUALITY SCROLL-STOPPING SHORT VIDEO — From a Keyword, Auto-Prompt or Image\r\nHOOK VIEWERS IN SECONDS — With Visually Stunning, Cinematic Shorts\r\nBUILD A VIRAL BRAND — Gain Followers, Fame & Passive Income.\r\nBECOME A SHORTS CREATOR POWERHOUSE — No Camera, No Talking, No Editing Needed\r\n100% YouTube Monetization Friendly – Easily Customize Script, Voice or Branding to Avoid “AI-Only” Restrictions\r\nPOST & GO VIRAL ON YouTube, TikTok, Instagram, Facebook & More — In 1 Click\r\n\r\nSee it in action: https://www.novaai.expert/ShortBeastAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-11 03:29:22'),
(6, 'Yvonne', 'Kintore', 'yvonne.kintore@googlemail.com', '6831303769', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nAccess DeepSeek AI, ChatGPT, Google Veo3, Luma AI, Claude, Gemini Pro , Kling AI, Mistral, DALL.E, LLaMa & more—all from a single dashboard.\r\nNo subscriptions or no monthly fees—pay once and enjoy lifetime access.\r\nAutomatically switch between AI models based on task requirements.... AND MUCH MORE\r\n\r\nSee it in action: https://www.novaai.expert/AIModelSuite\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-11 03:29:23'),
(7, 'Estelle', 'Salomons', 'estelle.salomons@yahoo.com', '434543032', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWorld’s First Super Intelligent AI Chat That Unlocks ALL-ACCESS PASS To Every Premium AI Tool On Earth... With A Single Command\r\n\r\n(Imagine what you could create with ALL of them working together seamlessly.)\r\n\r\nUnlock the Entire Universe of AI Instantly.. Simply type or speak your request and watch as it intelligently routes your task to the PERFECT AI engine)\r\n\r\nSee it in action: https://www.novaai.expert/AISuperBOT\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-11 04:40:34'),
(8, 'Micaela', 'Stuart', 'micaela.stuart@outlook.com', '266723866', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nIf You Want FREE, Targeted Traffic \r\nFrom The TOP 3 Free Traffic Sources, \r\nThen Pay Close Attention...\r\nSee it in action: https://goldsolutions.pro/TrafficSniper\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-12 12:36:06'),
(9, 'Kathrin', 'Conners', 'kathrin.conners@hotmail.com', '249474377', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\n“The Underground Method That Creates Invisible Pages Google Can’t Resist… And Sends You Free Traffic on Demand”\r\nBrand New & Never Seen Before – Turn secret Ghost Pages into traffic‑pumping machines without anyone knowing what you’re doing.\r\nNo Website Needed – Ghost Pages become your site… instantly.\r\nZero Tech Skills Required – If you can click a mouse, you can do this.\r\nWorks Anywhere – Run this from anywhere in the world.\r\nPerfect for Beginners & Pros – Affiliate marketers, small biz owners, coaches… anyone who wants free buyer traffic fast.\r\nStay Totally Anonymous – Competitors can’t figure out your source, but they’ll see you everywhere.\r\nFast Setup – Be live and ready in under 30 minutes\r\n\r\nSee it in action: https://goldsolutions.pro/GhostPages\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-12 21:26:44'),
(10, 'Sharyn', 'Granados', 'granados.sharyn45@gmail.com', '7770868827', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\n“30-Second Trick Turns My Phone Into\r\na $1,000/Day WiFI CASH BOT”\r\nJust Tap The \"Secret Button\" To Cash In From This $385 Billion A.I WiFi Cash Loophole!\r\n\r\nSee it in action: https://goldsolutions.pro/WiFiCashBot\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-12 23:13:10'),
(11, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:07'),
(12, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:10'),
(13, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:12'),
(14, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:13'),
(15, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:15'),
(16, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:17'),
(17, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:26'),
(18, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:39'),
(19, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:41'),
(20, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:42'),
(21, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:44'),
(22, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:45'),
(23, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:47'),
(24, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:48'),
(25, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:50'),
(26, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:52'),
(27, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:54'),
(28, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:56'),
(29, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:57'),
(30, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:20:59'),
(31, 'gfswmrknkh', 'voehteiuzw', 'tmdttjhz@testform.xyz', '+1-513-878-9640', 'klidppkjnpglnsfrvutdnhnlgqgfzi', '2025-08-13 15:21:01'),
(32, 'Delores', 'Given', 'delores.given@msn.com', '3816593262', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\n DAILY TRAFFIC TO ANY URL FROM 10 X HIGH PERFORMING TRAFFIC SOURCES\r\nNO EXPERIENCE, EMAIL LIST OR TECH SKILLS REQUIRED\r\n\r\nSee it in action: https://goldsolutions.pro/TrafficManiac\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-13 16:12:43'),
(33, 'Kelly', 'Kortig', 'kelly.kortig@msn.com', '7032988553', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nCreate with Purpose\r\n������ Feeling stuck, overwhelmed, or unsure where to start?\r\nThis video breaks it all down. Step-by-step. No fluff. No hype. Watch it now. It might just be the turning point you’ve been waiting for. Watch now before it’s too late. \r\n\r\nWatch this video before it\'s gone. \r\n\r\nSee it in action: https://goldsolutions.pro/MonetizeYourFuture\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-14 09:12:22'),
(34, 'Mahalia', 'Sroka', 'mahalia.sroka35@yahoo.com', '6882230353', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nStop giving away boring PDFs!\r\nTurn any coloring page into an interactive lead magnet your audience will actually love.\r\n\r\nSee it in action: https://goldsolutions.pro/ColorMyLeads\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-14 10:16:35'),
(35, 'Benedict', 'Mattos', 'benedict.mattos27@gmail.com', '685422965', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nBACKLINK IGNITOR creates powerful backlinks in seconds.\r\nNo coding, no manual work – just click and rank!\r\n\r\nMore backlinks. More traffic. More sales.\r\nAll thanks to BACKLINK IGNITOR!\r\n\r\nSee it in action: https://goldsolutions.pro/BacklinkIgnitor\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-16 09:56:25'),
(36, 'Marylou', 'Rodriguez', 'rodriguez.marylou@gmail.com', '5626451560', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nAI has made it easier than ever to build a reliable business, powered by an email list that grows itself…and be managed in under 30 minutes per day.\r\nThis isn’t theory. It’s not hype.\r\nIt’s the exact system we used to generate $94,113 in just 11 weeks ... while building it live, from scratch, in front of a small test group.\r\n\r\nSee it in action: https://www.novaai.expert/AIScaleStack\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-16 12:11:26'),
(37, 'Brandie', 'Brookins', 'brandie.brookins@gmail.com', '9364782208', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\n 500 Side Hustles with ChatGPT: Split across 5 powerful sections (Writing, Marketing, Freelancing, Tools, Passive Income)\r\n 1000+ ChatGPT Prompts: Every idea comes with ready-to-use prompts to get results instantly\r\n Customizable Word Format: Change branding, colors, or text to match your business\r\n Expert Startup & Monetization Tips: We guide you with real examples and modern strategies\r\n Use It However You Want: Sell it, give it away, convert to video, publish to KDP – no limits\r\n Comes with Unrestricted PLR Rights: rebrand, repurpose, profit\r\n\r\nSee it in action: https://www.novaai.expert/500SideHustles\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-16 21:14:35'),
(38, 'Jami', 'McBrien', 'jami.mcbrien@yahoo.com', '7904347104', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWorld’s First AI App That Rank Any Link We Want #1 In Google For Any Keyword We Want... In 30 Seconds Or Less…\r\nSending Us A Surge Of 1,478 Clicks A Day 100% FREE\r\nNo Technical Skills - No Experience - No Coding - No Setup - No Waiting\r\nWatch How We Generate 342 Clicks Per Hour In 27 Seconds Flat…\r\n\r\nSee it in action: https://goldsolutions.pro/SneakAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-17 12:14:41'),
(39, 'Rene', 'Harney', 'rene.harney@yahoo.com', '3142530951', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nStill Can’t Profit With Tech Like ChatGPT4.0 Around? \r\n\r\nWorld\'s First AI App That Turns Any Idea, Url, Blog, Website, Keyword, Prompt or Script Into    Studio Quality Videos  In 100+ Languages \r\nIn Just 60 Seconds, For A Low One Time Fee\r\n\r\nVidNinja AI Allows Us To Generate 8,458 Free Clicks For Each Video We Create For Free…\r\n\r\n\r\nFirst 99 Action Taker Get Instant Access To VidNinja AI Accelerator\r\n\r\nVidNinja AI Eliminated The Need For Us To Create Videos Manually… \r\n\r\nSee it in action: http://novaai.expert/VidNinjaAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-17 15:15:22'),
(40, 'Steve', 'Witcher', 'witcher.steve40@gmail.com', '613209160', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nDo you want to build a profitable online business without spending countless hours and thousands of dollars creating content from scratch?\r\nAre you looking for a done-for-you product that you can sell as your own and keep ALL of the profits for yourself?\r\nAre you looking for high-quality content that you can take and turn into anything you want? A lead magnet, articles for your blog, social media content, etc?\r\nOr even sell private label rights to the entire thing as if you’d created it yourself?\r\nIf you answered “YES!” to any of these questions, the Essential Copywriting Toolkit PLR Package is the shortcut you’ve been looking for!\r\n\r\nSee it in action: https://goldsolutions.pro/EssentialCopywritingToolkit\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-17 18:04:28'),
(41, 'Allan', 'Lorenzini', 'lorenzini.allan@hotmail.com', '749904685', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nAI Search Ranker is the only custom software that can rank any webpage at the top of Google AI Mode.\r\n\r\nIn just one click, this software leapfrogs any website, landing page, blog, or business to the top of AI Mode results all with:\r\n\r\nNO coding...\r\nNO content changes...\r\nNO backlinks...\r\n\r\nSee it in action: https://goldsolutions.pro/AISearchRanker\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-18 04:36:50'),
(42, 'Launa', 'Simcox', 'simcox.launa@gmail.com', '123025551', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWhy Pay Hundreds Of Dollars For Multiple AI Subscriptions When AI ModelSuite Gives You Everything In One Powerful Package? \r\nAI ModelSuite is an all-in-one AI powerhouse that replaces chatbots, image generators, content creations, video generators, and more – all for a one-time payment of just $17!\r\nTotal Cost Without AI ModelSuite? $2500+ per Year! \r\nWhy spend $200+ per month when you can get it all for just $17 One Time?\r\nStop Overpaying – Get AI ModelSuite for Just $17 (One-Time!) \r\n\r\nNo Monthly Fees | Unlimited AI Power | One Toolkit for Everything \r\n\r\nSee it in action: https://goldsolutions.pro/AIModelSuite\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-18 06:30:36'),
(43, 'WesleywetlyJU', 'WesleywetlyJU', 'goreeckiandrzej10@gmail.com', '89727524978', 'URGENT MESSAGE! FINAL REMINDER: CLAIM YOUR $213,835.70 CASH https://script.google.com/macros/s/AKfycbwh7UNq_BUj0cgPuA4A4gmj-BbW3bmRkRNxMmvksWFZNkmBnGYn5vuxdlhMeZX_2_ta/exec/3r4n7s1p/7v9r/r/m6/8f1o8k2p/7n5t/5/jy/4s0g6a4t/5t5s/1/lu', '2025-08-18 21:10:15'),
(44, 'Penney', 'Dahlen', 'penney.dahlen@gmail.com', '219361240', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWorld\'s First AI Agent Powered By ChatGPT-5…\r\nThat Writes And Ranks Anything We Want… On The First Page Of Google… With ZERO SEO. And Zero Ads… \r\n\r\nSee it in action: https://goldsolutions.pro/ApexAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-19 13:01:52'),
(45, 'Cliff', 'Minnick', 'cliff.minnick@msn.com', '3506005650', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nForget spending weeks writing — Ebook Writer AI lets you create a polished eBook in just 10–15 minutes. Simply enter your topic, and the tool will generate chapters, format the text, add images, and even include affiliate links.\r\n\r\nWhy choose Ebook Writer AI?\r\n\r\nFast: a complete eBook in minutes.\r\n\r\nProfessional design, no skills required.\r\n\r\nBuilt-in monetization.\r\n\r\nPerfect for bloggers, coaches, marketers, and anyone who wants to sell knowledge through eBooks.\r\n\r\nTry it today > https://www.novaai.expert/eBookWriterAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-21 04:22:42'),
(46, 'Carol', 'Preiss', 'carol.preiss@hotmail.com', '103121814', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWhat if you could use the best AI models in the world without limits or extra costs?\r\nNow you can. With our brand-new AI-powered app, you’ll have ChatGPT, Gemini Pro, Stable Diffusion, Cohere AI, Leonardo AI Pro, and more — all under one roof.\r\n\r\nNo monthly subscriptions\r\n\r\nNo API key expenses\r\n\r\nNo experience required\r\n\r\nJust one dashboard, one payment, and endless possibilities.\r\n\r\nSee it in action: https://www.novaai.expert/AIModelSuite\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-21 10:14:33'),
(47, 'Clint', 'Binette', 'clint.binette@yahoo.com', '5417299533', 'We have a promotional offer for your website foodtechmate.com.\r\n\r\nA 100% Done-For-You Faceless YouTube Channel Build\r\nThe goal is to reach 100,000 subscribers and achieve a fully monetized channel that generates monthly income, paid by Google on the 21st. \r\nOver a 12-month period, 3 videos per week are created and uploaded with professional voiceovers and permission-based footage. \r\nNo camera or editing is required — every step is handled completely from start to finish.\r\n\r\nSee it in action: https://goldsolutions.pro/100KSubsYouTube\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-21 11:14:37'),
(48, 'Ryan', 'Harmer', 'harmer.ryan39@outlook.com', '6821452822', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nhese Ready-to-Use Prompts Turn Free AI Tools Like ChatGPT into a Personal Deal Hunter That Finds You Cheaper Alternatives, Travel Hacks, Cashback Opportunities, and Budget Wins in Seconds -\r\nAll Without Changing a Thing About Your Routine\r\nNo Coupons | No Extensions | No Guesswork | 100% Real Savings | 100% Resell Rights\r\n\r\nSee it in action: https://goldsolutions.pro/money-saving-prompts\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-22 01:21:57'),
(49, 'Henry', 'Shanahan', 'shanahan.henry@outlook.com', '715139618', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nSell Without Limits. Rebrand Like a Pro. Cash In on Every Sale!\r\nLaunch Your Own Training Video Empire\r\nThe Ultimate Learning Library with Unrestricted PLR\r\nOver 1,600 premium training videos\r\nin red-hot niches ready for instant monetization!\r\n\r\nSee it in action: https://goldsolutions.pro/TheUltimateLearningLibrary\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-22 16:06:09'),
(50, 'EdwardSesND', 'EdwardSesND', 'iren55kl@gmail.com', '83649149888', 'Hello. \r\nYou have 24 hours left to withdraw your money $213,495.23 - https://script.google.com/macros/s/AKfycbyV65BSRve5vZByy2kKSEBu08-60EGvUR2ipOFjdXgJIwFthRpwnLXTkaoYK1E5f4-8KA/exec/2v1t0g1u/6t9g/t/v1/5a9n7f1q/3z8z/3/k0/7w3n0s2i/7m8g/7/1o \r\nAfter 24 hours, your balance in our system will be reset.', '2025-08-22 22:24:58'),
(51, 'Stephan', 'Penton', 'penton.stephan@gmail.com', '621177196', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nImagine having an assistant who works around the clock, handling all the routine tasks, attracting clients, and generating profit even while you sleep. Grab AI SuperBot isn’t just another tool — it’s a complete solution that helps you work faster, smarter, and earn more without extra effort.\r\n\r\nWhy does this matter to you? Because time is your most valuable resource. With this bot, you’ll free up hours usually wasted on repetitive tasks and invest them into growing your business or personal projects. It’s your chance to reach a new level of efficiency and income.\r\n\r\nSee it in action: https://www.novaai.expert/AISuperBOT\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-24 15:46:38'),
(52, 'Micah', 'Schulte', 'micah.schulte@gmail.com', '443237577', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWorld’s First AI App That Instantly Builds Your Own “Udemy-Like” eLearning Platform - Preloaded With 100+ Ready-To-Sell, Red-Hot Online Courses\r\nIn One Single Dashboard, For A Low One-Time Fee!\r\nOnly 3 EASY Clicks - Create & Sell Stunning Online Courses on Your Own Udemy™-Style Platform to Hungry Buyers for Top Dollar.\r\n\r\nNo Reserach | No Course Creation | No Tech  Skills | No Monthly Fees Required\r\n\r\nSee it in action: https://www.novaai.expert/CourseBeastAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-25 03:58:00'),
(53, 'Anglea', 'Wilding', 'wilding.anglea@hotmail.com', '321261970', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nYou’ve invested in your website — now it’s time to make it work at full power. The new AI Scale Stack helps you turn visitors into paying customers: it shows where you’re losing leads and gives you the exact steps to keep their attention, boost conversions, and grow sales. Imagine your site not just as a showcase, but as a real business engine. Discover how it works — and start earning more today.\r\n\r\nSee it in action: https://www.novaai.expert/AIScaleStack\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-25 08:24:25'),
(54, 'Clemmie', 'Meisel', 'meisel.clemmie@gmail.com', '693286220', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWhy do you need this? Because UGC videos sell better than any banner or text ad — and brands pay $300–$500 per clip. With UGCfluencer, you can create these viral videos in just 5 seconds — no studio, no skills, no expenses. Simply type your text, and AI generates ultra-realistic influencer-style content that converts. Whether you want to monetize traffic or start a new income stream, this is your fast ticket into the UGC revolution.\r\n\r\nSee it in action: https://www.novaai.expert/UGCfluencer\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-26 00:48:46'),
(55, 'Albertha', 'Churchill', 'churchill.albertha@msn.com', '646016222', 'Hello,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWhy do you need this? To access the best AI tools—text, images, voice, code, video—without juggling dozens of subscriptions or paying monthly. Multiverse AI brings everything into one cloud dashboard, giving lifetime access to all current and future AI models with zero recurring fees. You get freedom, speed, and savings—all under your control. Discover how easy it is to create and scale content—Multiverse AI makes it possible.\r\n\r\nSee it in action: https://goldsolutions.pro/MultiverseAI\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\nAddress: 209 West Street Comstock Park, MI 49321\r\nLooking out for you, Ethan Parker', '2025-08-26 05:54:21'),
(56, 'Bette', 'Roller', 'bette.roller@gmail.com', '659756004', 'Hi,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWhy should you care? Because Book In A Day lets you turn your ideas into a polished, professional book in just hours—not months. No writing skills, no expensive editors, no formatting headaches. Simply follow the AI-driven, step-by-step system and you’re done! Publish your book, build authority, and start earning—effortlessly, swiftly, and stress-free.\r\n\r\nSee it in action: http://smartexperts.pro/BookInADay\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=foodtechmate.com \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.', '2025-08-27 18:39:13'),
(57, 'Gwendolyn', 'Cairns', 'gwendolyn.cairns@yahoo.com', '7053563766', 'Hi,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWhy do you need this? Because Passive Class from Lee Murray gives you a totally free Lead Capture Hub—a ready-to-use system to grow your own email list and start earning without losing time or reinventing the wheel.\r\n\r\nNo bland mastermind babble—just clear, actionable steps that turn curious visitors into subscribers, and subscribers into revenue. It\'s friendly, it\'s expert-backed, and it\'s built to upgrade your status as a money-maker online. Click through and see how quickly it turns potential into profit.\r\n\r\nSee it in action: http://smartexperts.pro/PASSIVECLASS\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=foodtechmate.com \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.', '2025-08-28 20:01:42'),
(58, 'Stuart', 'Ibsch', 'stuart.ibsch@yahoo.com', '3146560756', 'Hi,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWhy do you need this? Picture waking up anywhere — Bali, a café in Paris, or your couch — checking your phone and seeing a steady stream of buyer-ready clicks rolling in… without ads, outreach, or a website. That’s exactly what Rapid Traffic Flow delivers: a super-simple, plug-and-play system that gets traffic and sales flowing in minutes.\r\n\r\nWith Rapid Traffic Flow, you get a clear 3-step blueprint, AI‑powered boosters to automate the process, a “Hidden Hub” you can tap at will, and a solid refund guarantee if your traffic spike doesn’t happen — all for less than the cost of your next takeout order. Ready to stop chasing traffic and start capturing it? Dive in now and dominate the affiliate game today!\r\n\r\nSee it in action: https://smartexperts.pro/RapidTrafficFlow\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=foodtechmate.com \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.', '2025-08-29 05:39:08'),
(59, 'Rosalind', 'Lowell', 'rosalind.lowell@hotmail.com', '472699817', 'Hi,\r\n\r\nWe have a promotional offer for your website foodtechmate.com.\r\n\r\nWhy do you need this? Imagine launching your own AI store on WordPress, stocked with ready-to-sell GPTs and AI prompts—and starting to make money today. No design headaches, no tech setup, just a polished storefront that builds trust and delivers real sales straight out of the box.\r\n\r\nWhether you\'re a webmaster or money-maker, AI Store Fortune removes the tech barrier. Made for people who’d rather grow their traffic and income than tinker with confusing plugins. Want to finally turn AI ideas into stable income? Click to see how effortlessly you can own—and profit from—your AI business.\r\n\r\nSee it in action: https://smartexperts.pro/AIStoreFortune\r\n\r\nYou are receiving this message because we believe our offer may be relevant to you. \r\nIf you do not wish to receive further communications from us, please click here to UNSUBSCRIBE:\r\nhttps://smartexperts.pro/unsub?domain=foodtechmate.com \r\nAddress: Address: 1464 Lewis Street Roselle, IL 60177\r\nLooking out for you, Michael Turner.', '2025-08-29 06:09:20'),
(60, 'Roseanna', 'Soria', 'roseanna.soria@gmail.com', '4372268', 'Greetings,\r\n\r\nTake a look at an exclusive solution that fits foodtechmate.com.\r\n\r\nWhat makes it relevant: If you’re an online publisher or exploring new growth angles, and you’d like steady flow of views — with no additional platforms, without copywriting work, and no tech hassle — then **Social Safe List** is a simple solution.  \r\n\r\nOpen the door to closed communities already containing interested audiences. Simply place your link, share, and see people engage. Easy start, built-in materials, battle-tested ideas — you’re good.\r\n\r\nWant to know how you can get audience attention from actual users in a few minutes?\r\n\r\nPreview here: https://smartexperts.pro/SocialSafeList?foodtechmate.com\r\n\r\nYou are receiving this info because we believe it could be useful.  \r\nIf you would rather not see further emails, please click here to opt out:  \r\nhttps://smartexperts.pro/unsub?domain=foodtechmate.com  \r\n\r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\nRegards,  \r\nMichael Turner.', '2025-09-01 02:29:25'),
(61, 'Ladonna', 'Yarnold', 'ladonna.yarnold@googlemail.com', '351969576', 'Hello,\r\n\r\nThere is a method tailored for your website foodtechmate.com.\r\n\r\nThe reason this is relevant: You’re tired fiddling with sites, search optimization, or nonstop writing.  \r\n\r\nWith Auto Lead Machine, literally connect your autoresponder, write a quick campaign — and in 10–15 minutes, you begin to get targeted contacts arrive automatically.  \r\n\r\nJust add a short headline, pick an image, hit the start button, and see contacts land straight to your subscriber list with no effort.  \r\n\r\nIt’s like having a list builder — accurate, ready-to-go, and hassle-free. No website, no sharing, no complicated campaigns — just signups. All for less than a cup of coffee, with a simple return option if you’re not satisfied.  \r\n\r\nDiscover details here: https://smartexperts.pro/AutoLeadMachinee?foodtechmate.com  \r\n\r\nYou are receiving this message because this may benefit your business.  \r\nIf you do not wish to receive future emails from us, please click here to UNSUBSCRIBE:  \r\nhttps://smartexperts.pro/unsub?domain=foodtechmate.com  \r\n\r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\nLooking out for you, M. Turner.', '2025-09-01 13:59:58'),
(62, 'Chelsey', 'Fogle', 'chelsey.fogle55@googlemail.com', '167111820', 'Hello,\r\n\r\nWe have a tailored message for your website foodtechmate.com.\r\n\r\nWhy could this matter to you? Because you don’t need to spend on advertising or deal with ranking issues — Traffic Tsunami (FTT) manages it.  \r\n\r\nThis innovative tool can feature your site inside content generated by Gemini — and those placements stay present, delivering constant exposure.  \r\n\r\nFor digital entrepreneurs ready to act early, this is the right time. Learn how with almost no hassle you can be the answer in the AI landscape — well ahead of others.\r\n\r\nSee it in action: https://smartexperts.pro/TrafficTsunami?foodtechmate.com\r\n\r\nYou are receiving this letter because we believe our content may be of interest to you.  \r\nIf you no longer want to get further communications from us, please click here to remove:  \r\nhttps://smartexperts.pro/unsub?domain=foodtechmate.com\r\n\r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\nAll the best,  \r\nMichael Turner', '2025-09-01 14:03:26'),
(63, 'Elwood', 'Pollack', 'pollack.elwood@gmail.com', '3780038239', 'Greetings,\r\n\r\nWe have an offer for your website foodtechmate.com.\r\nhttps://topcasworld.pro/MultiverseAI?foodtechmate.com\r\n\r\nWhy is this useful?  \r\nTo access the best AI tools—content, visuals, speech, code, media—without keeping track of endless platforms.  \r\nMultiverse AI keeps it simple in one dashboard, giving unlimited usage rights to all existing and upcoming AI models with zero renewals.  \r\nYou get freedom, efficiency, and reduced costs—all under your control.  \r\nDiscover how easy it is to produce and grow content—Multiverse AI makes it possible.\r\n\r\nCheck the details: https://topcasworld.pro/MultiverseAI?foodtechmate.com\r\n\r\nYou are receiving this message because we believe our solution may be useful to you.  \r\nIf you do not wish to be contacted again, please click here to UNSUBSCRIBE:  \r\nhttps://topcasworld.pro/unsubscribe?domain=foodtechmate.com  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nSincerely,  \r\nEthan Parker', '2025-09-04 19:49:55'),
(64, 'Otilia', 'Baynes', 'otilia.baynes@gmail.com', '6815046922', 'Greetings, \r\n\r\nThere’s something new you might find useful for your site foodtechmate.com.  https://goldsolutions.pro/MMM?foodtechmate.com\r\n \r\nHere’s the idea: visualize having a steady process running in the background — with zero complex setup.  \r\n\r\nWith Monthly Money Masterclass, you select the path that matches your preference: provide a self-serve QR setup, or offer it as a managed package.  \r\n\r\nYou can collect a steady $5–$20 per customer monthly, or $200+ each month with just 5–10 clients — simple and repeatable.\r\n \r\nBenefit from the roadmap. You obtain a clear guide designed by people who tested it live. It’s fully actionable — a plan that simply runs. \r\n \r\nWant to explore further?  \r\n \r\nSee it in action: https://goldsolutions.pro/MMM?foodtechmate.com \r\n \r\nYou got this because it may align with your site’s focus.  \r\nShould you want to stop receiving our notes, press here to UNSUBSCRIBE:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com  \r\n \r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nBest regards,  \r\nEthan Parker', '2025-09-05 06:39:37'),
(65, 'Vickey', 'Culp', 'culp.vickey71@yahoo.com', '468590736', 'Greetings,\r\n\r\nWe developed a platform for your website foodtechmate.com.\r\n\r\nWhy do you need this? This helps you bypass endless SEO work and ad spend — all in a single step.  \r\n\r\nAPEX AI, powered by ChatGPT-5, right away produces and sets your content in top rankings — no hosting, no skills, no hidden expenses.  \r\n\r\nJust input a phrase, hit launch, and see qualified traffic flow in instantly.  \r\n\r\nIt’s your shortcut to being ahead in search while others are still working the hard way.  \r\n\r\nCheck the system: https://smartexperts.pro/ApexAI?foodtechmate.com\r\n\r\nYou are receiving this message as we consider this useful for your work.  \r\nIf you do not wish to receive future emails, please click here to UNSUBSCRIBE:  \r\nhttps://smartexperts.pro/unsub?domain=foodtechmate.com  \r\n\r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\nLooking out for you, Mike Turner.', '2025-09-06 01:02:11'),
(66, 'Rozella', 'Elledge', 'rozella.elledge@gmail.com', '691959376', 'Hi,\r\n\r\nWe have a limited solution for your website foodtechmate.com.\r\n\r\nWhy you need this: to have every initiative, partner program, or plan start bringing audience and results today — without spending a dime on ads or complex tools. Ghost Pages turns you into a hidden machine that Google absolutely trusts: you build hidden pages using a special Google asset, and they automatically start driving targeted visitors — while your competition is nowhere the wiser.\r\n\r\nIt’s easy, it’s fast, it’s clever: no domains, hosting, social media, or technical skills required — if you can click and copy, you can do this. Plus, it really works and expands: launch one Ghost Page and BAM — traffic flows wherever you want: affiliate links, e-com, contacts — you choose. Get going right away? Find out more and get outcomes that might surprise you.\r\n\r\nSee it in action: https://smartexperts.pro/GhostPages?foodtechmate.com\r\n\r\nYou are receiving this message because we believe our solution may be valuable to you.  \r\nIf you do not wish to receive further information from us, please click here to UNSUBSCRIBE:  \r\nhttps://smartexperts.pro/unsub?domain=foodtechmate.com  \r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\nLooking out for you, Michael Turner.', '2025-09-07 10:09:17'),
(67, 'Bryon', 'Paulsen', 'bryon.paulsen@gmail.com', '448127963', 'Hello,\r\n\r\nWe present some material for your website foodtechmate.com : https://goldsolutions.pro/TitanEdge?foodtechmate.com\r\n\r\nFed up with time-consuming routines, expensive actions, and never-ending routine?  \r\nIn just several days, you’ll learn a simple, step-by-step routine — just around 45 minutes each morning — that transforms the start of your day into consistent steps.  \r\nNothing to handle, no chasing audiences, no management stress.  \r\nJust straightforward guidance, added control, and the excitement of seeing your results arrive.  \r\nWant to explore it?\r\n\r\nTake a closer look: https://goldsolutions.pro/TitanEdge?foodtechmate.com\r\n\r\nYou are receiving this information because we think our content may be helpful to you.  \r\nIf you do not wish to receive further correspondence from us, please click here to UNSUBSCRIBE:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com  \r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nAll the best,  \r\nEthan Parker', '2025-09-08 10:54:17'),
(68, 'Cooper', 'Pineda', 'cooper.pineda@gmail.com', '89987794', 'Greetings,\r\n\r\nYou might be interested in something new for your website foodtechmate.com : https://goldsolutions.pro/BlackBoxProfits?foodtechmate.com\r\n\r\nHere’s why it could help:  \r\nIf you’re running a site, Black Box Profits is your direct path to steady growth — no technical setup, no endless writing.  \r\nJust add a concept, and the system creates a ready-to-sell micro-solution that acts as an online tool and runs by itself.\r\n\r\nWork smart, not harder: forget long guides, recorded videos, or self-branding.  \r\nBuild digital tools, not PDFs, that people buy — and all it takes is a thought and a short setup.  \r\nWant to discover how to start today?\r\n\r\nWatch it live: https://goldsolutions.pro/BlackBoxProfits?foodtechmate.com\r\n\r\nYou are receiving this message because we thought this might be relevant for you.  \r\nIf you prefer not to get updates from us, please follow this link to remove yourself:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nAll the best,  \r\nEthan Parker', '2025-09-09 08:25:12'),
(69, 'Clark', 'Brannon', 'clark.brannon@gmail.com', '6444787543', 'Good day,\r\n\r\nCheck out a unique opportunity that matches your domain foodtechmate.com : https://goldsolutions.pro/KidsTaleAI?foodtechmate.com\r\n\r\nWhy consider this? this solution can turn any idea into imaginative kids’ tales in video in just minutes — no prior experience needed, no big investments, no repeated costs. Your stories come with built-in narration, playful rhyme, soundtracks, subtitles — type your story and share instantly.\r\n\r\nEnvision the speed you might expand into the kids’ content market: publish on YouTube, TikTok, IG and see engagement flow. Or monetize on Fiverr, Etsy, or Gumroad at $50–$500 for every clip. You get a full license, fast availability, and continued support — for a one-time fair price. Looking to open new income channels?\r\n\r\nCheck the demo: https://goldsolutions.pro/KidsTaleAI?foodtechmate.com\r\n\r\nYou are reading this info because we think this might be of interest to you.  \r\nIf you choose not to receive further messages from us, visit this page to UNSUBSCRIBE:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nLooking forward,  \r\nEthan Parker', '2025-09-10 21:58:20');
INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `created_date`) VALUES
(70, 'Marcia', 'Facy', 'facy.marcia@yahoo.com', '686591773', 'Greetings,\r\n\r\nYou’ll find an update for foodtechmate.com foodtechmate.com https://goldsolutions.pro/VideoScriptProGPT?foodtechmate.com \r\n\r\nAs a site owner focused on content and reach?  \r\nThink of it: no wasted hours on drafting video texts — Video Script Pro GPT delivers for you, available on demand.  \r\nForget manual writing, just clear, engaging scripts that attract viewers — and help you scale with almost no time.\r\n\r\nInterested how easily it can increase attention, spare your effort, and let you concentrate on further expansion?\r\n\r\nTake a look: https://goldsolutions.pro/VideoScriptProGPT?foodtechmate.com\r\n\r\nYou are receiving this letter because we believe the tool may fit to you.  \r\nIf you do not wish to be sent further updates from us, please click here to UNSUBSCRIBE:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com\r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nWarm wishes,  \r\nEthan Parker', '2025-09-13 01:12:45'),
(71, 'Suzanne', 'Loy', 'loy.suzanne@outlook.com', '483654860', 'Hi,\r\n\r\nBringing over a exclusive resource for your website foodtechmate.com https://novaai.expert/KevinAI?foodtechmate.com\r\n\r\nVisualize launching a project and noticing results climb within hours — with no exhausting fine-tuning, without draining sessions.  \r\n\r\nResults With Kevin AI delivers a suite of AI tools + proven strategies that automate the busywork: crafting emails and more. Press go — the system produces, tests, delivers.  \r\n\r\nReady to leave behind the “I’m busy all day” routine and step into “I launch, I watch, I gain” mode?  \r\n\r\nCheck how it works: https://novaai.expert/KevinAI?foodtechmate.com\r\n\r\nYou are receiving this information because we believe our resource may be useful to you.  \r\nIf you do not wish to receive further messages, please click here to leave list:  \r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nAll the best,  \r\nEthan Parker', '2025-09-14 02:27:42'),
(72, 'Christoper', 'Bussau', 'christoper.bussau@outlook.com', '522848031', 'Hi,\r\n\r\nWe have a limited-time option for your site : https://smartexperts.pro/GhostPage?foodtechmate.com\r\n\r\nThe reason this is worth your time: it lets you generate steady flow of people and leads starting right away — avoiding costly ad platforms or technical stress. Ghost Pages positions you as a silent authority that Google recognizes: you set up quiet pages leveraging a trusted Google element, and they drive people interested in your content — as rivals stay behind.\r\n\r\nIt’s quick, it’s smart: forget about domains, servers, and socials, skills aren’t required — if you can click and copy, you’re set. Plus, it works and scales: create one and watch the flow come in to any link you choose — all depending on your strategy. You can begin right now! Explore how it works and experience growth.\r\n\r\nPreview the system: https://smartexperts.pro/GhostPage?foodtechmate.com\r\n\r\nYou are receiving this message because it could be relevant for your projects.  \r\nIf you do not wish to hear from us again, please click here to UNSUBSCRIBE:  \r\nhttps://smartexperts.pro/unsub?domain=foodtechmate.com  \r\nAddress: 1464 Lewis Street Roselle, IL 60177  \r\n\r\nBest regards,  \r\nMichael Turner.', '2025-09-14 13:00:33'),
(73, 'Kathie', 'Pinkham', 'pinkham.kathie@googlemail.com', '490804184', 'Good day,\r\n\r\nWe have a special offer for your website foodtechmate.com : https://goldsolutions.pro/VibeCodeBlueprint?foodtechmate.com\r\n\r\nWhy should this be relevant to you? Because Vibe Code Blueprint is your new system — launch high-value digital assets in no time, with no technical setup and minimal budget, while visitors and revenue arrive. Imagine being the creator behind the curtain, gaining on autopilot — while others are still working on funnels.\r\n\r\nThis isn’t just another tool — it’s a unique edge, like early Bitcoin but for digital assets, and it’s happening now. Jump in fast, stay ahead before the crowd catches up!\r\n\r\nCheck it out: https://goldsolutions.pro/VibeCodeBlueprint?foodtechmate.com\r\n\r\nYou are receiving this message because we believe our proposal may be relevant to you.  \r\nIf you do not wish to receive further communications, please click here to UNSUBSCRIBE:  \r\nhttps://goldsolutions.pro/unsubscribe?domain=foodtechmate.com  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nSincerely,  \r\nEthan Parker', '2025-09-16 11:15:01'),
(74, 'Gracie', 'Standley', 'gracie.standley@gmail.com', '3857858293', 'Hello,\r\n\r\nSharing with you something valuable that could be useful for foodtechmate.com https://topcasworld.pro/ChefMaster?foodtechmate.com\r\n\r\nConsider: you have over 13,300+ culinary cooking guides & videos, fully customizable and reusable with your branding, no cooking, no shooting, very little setup.  \r\n\r\nChefMaster Live is a streamlined path to launch: just put your label, share, and let it roll.  \r\n\r\nWish to grow within the cooking-video market, draw interest, and start your project almost instantly? Step inside here.\r\n\r\nPreview here: https://topcasworld.pro/ChefMaster?foodtechmate.com\r\n\r\nThis was sent in case it adds value to you.  \r\nIf you’d like no more updates, please click here to UNSUBSCRIBE:  \r\nhttps://topcasworld.pro/unsubscribe?domain=foodtechmate.com  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\nKind regards,  \r\nEthan Parker', '2025-09-17 00:32:54'),
(75, 'Michael', 'Smith', 'smith8michael08@gmail.com', '3072076448', 'A few simple SEO fixes could help your site rank higher.\r\nI’d be happy to send a short audit highlighting them.\r\nWant me to send it over?', '2025-09-17 11:38:20'),
(76, 'Cruz', 'Sparkman', 'cruz.sparkman@gmail.com', '3847521885', 'Hi there,\r\n\r\nWanted to let you know about an option for your website foodtechmate.com https://bravo-333.site/AIModelSuite?foodtechmate.com\r\n\r\nThe reason it’s important: streamline operations and deliver faster.  \r\nAI ModelSuite brings top AI tools combined in a single place — no monthly costs, no technical setup.  \r\nCreate articles, design visuals and clips, compare outputs, and switch between models instantly.\r\n\r\nWhat you gain: quick start, minimal manual work, higher margins.  \r\nOne-time just $17 (instead of $97 per month), 30-day return policy, extra launch perks included.  \r\nWant full control of all AIs from one hub?\r\n\r\nExplore it yourself: https://bravo-333.site/AIModelSuite?foodtechmate.com\r\n\r\nYou are receiving this mail because it might suit your needs.  \r\nIf you do not want further updates, please click here to UNSUBSCRIBE:  \r\nhttps://bravo-333.site/unsubscribe?domain=foodtechmate.com  \r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nWarm wishes,  \r\nEthan Parker', '2025-09-18 06:50:27'),
(77, 'NARYTHY866358NEYRTHYT', 'NARYTHY866358NEYRTHYT', 'xuuomxkx@tubermail.com', '88128165585', 'MERTYHRTHYHT866358MARETRYTR', '2025-09-19 01:49:09'),
(78, 'Hubert', 'Barreiro', 'hubert.barreiro@gmail.com', '44677770', 'Hey there,\r\n\r\nWe have a custom offer for your website foodtechmate.com https://www.novaai.expert/EveryAI?foodtechmate.com\r\n\r\nFrustrated by subscribing to countless AI tools?  \r\nWith EveryAI you unlock a single hub that offers plenty of professional AI solutions without ongoing costs.  \r\n\r\nLaunch online projects, generate descriptions, create branding, generate cinematic videos, talking avatars… and keep 100% of your profit under a business license.  \r\n\r\nReady to increase your income, reduce workload, and take charge of your results?  \r\nIt begins with this.\r\n\r\nSee it in action: https://www.novaai.expert/EveryAI?foodtechmate.com\r\n\r\nYou are receiving this info because we believe our update may be helpful to you.  \r\n\r\nIf you do not wish to get further communications from us, please click here to UNSUBSCRIBE:  \r\nhttps://www.novaai.expert/unsubscribe?domain=foodtechmate.com\r\n\r\nAddress: 209 West Street Comstock Park, MI 49321  \r\n\r\nLooking out for you,  \r\nEthan Parker', '2025-09-19 20:52:27'),
(79, 'pypemisk', 'pypemisk', 'og1xoq8u@hotmail.com', '83383187179', 'Hi, Well done! You\'re chosen to explore our new venture. Activate your account: https://tinyurl.com/5fwf29fz register. Note: Not sign up? Ignore this.', '2025-09-20 04:47:47'),
(80, 'Caitlin', 'Mota', 'caitlin.mota@outlook.com', '622617475', 'Hello there,\r\n\r\nWe have a special option for your website foodtechmate.com : https://www.youtube.com/watch?v=GY1x2NWs9EA?foodtechmate.com\r\n\r\nFrustrated by maintaining dozens of automation apps?  \r\nWith EveryAI you gain entry to a single hub that grants many intelligent systems with no recurring charges.  \r\n\r\nDevelop sites, produce text, create branding, render 8K motion videos, voice-driven characters… and keep 100% of your profit under a professional license.  \r\n\r\nLooking to boost profit, simplify tasks, and stay in full control?  \r\nIt all starts here.\r\n\r\nSee it in action: https://www.youtube.com/watch?v=GY1x2NWs9EA?foodtechmate.com', '2025-09-20 21:52:05'),
(81, 'Graig', 'Slowik', 'slowik.graig@gmail.com', '7058669564', 'The following compact product integrates with commonly used AI tools to support generating expanded audience... A AI-powered application coordinates visit growth natively... One of the array of widely used AI resources...\r\n\r\n\r\nhttps://loading-please-wait.online/AutoLeadMachine?domain=foodtechmate.com', '2025-09-21 08:43:08'),
(82, 'Mike', 'Fine', 'joel.fox.1965+foodtechmate.com@gmail.com', '511624646', 'Tired of the Grind? Let My Dual-Engine Profit Machine Do 95% of the Work for You, While You Live the Life You Were Always Meant to Live!\r\n\r\nhttps://europa-168.site/PASSIVECLASS', '2025-09-23 23:20:06'),
(83, 'Isobel', 'Plowman', 'mohamed.cortes.1977+foodtechmate.com@gmail.com', '619987238', 'AI Hub – the complete suite that grants use of every advanced AI tool — through every release — through a smooth interface.\r\n\r\n    ChatGPT (3.5 → 4.5 → 4o → 5 → Turbo → Nano|3.5 to 5 and beyond, including Turbo & Nano|all releases, from 3.5 to 5 with Turbo & Nano)  \r\n    Gemini (1.5 Pro → 2.0 Flash|all Pro & Flash editions|from 1.5 Pro to 2.0 Flash)  \r\n    Claude (3 Opus → Sonnet → Haiku|Opus, Sonnet & Haiku|from Opus to Haiku)  \r\n    Grok (1 through 4|all versions, 1–4|generations 1 to 4)  \r\n    DALL·E, Veo, Kling, ElevenLabs, DeepSeek, FLUX, LLaMA & more\r\n\r\nPlus — you receive all following generations integrated seamlessly.\r\n\r\n\r\nhttps://fingerprint01.online/MultiverseAI?foodtechmate.com', '2025-09-24 03:14:20'),
(84, 'Rick', 'Lavigne', 'lavigne.rick@gmail.com', '3383515380', 'This Innovative AI Tool Powered By ChatGPT-5…That Crafts And Positions What We Want…On The Initial Rankings Of Online Search…With No Technical Work… And Without Paid Promotion… Enabling Us To Earn nearly $700 Every Single Day… On Complete Automation.\r\n\r\nhttps://europa-168.site/APEXAI', '2025-09-24 22:46:31'),
(85, 'Randi', 'Valenti', 'randi.valenti@gmail.com', '134381225', 'A little-known tactic which generates low-profile pages Google and others rank for… , which also drives consistent traffic on demand\r\n\r\nhttp://europa-168.site/GhostPages?domain=foodtechmate.com', '2025-09-26 17:03:24'),
(86, 'Ganes', 'Mali', 'maliganesh01@gmail.com', '1234567890', 'test', '2025-09-28 10:06:22'),
(87, 'Alex', 'Swayer', 'alexswayer199@gmail.com', '3072076448', 'I came across your site and saw a few ways you could be attracting more search traffic. I help companies like yours do just that—without paying for ads.\r\n\r\nCan I share a few ideas?', '2025-10-01 11:13:45'),
(88, 'Gary', 'Charles', 'gary.charles@dominatebanners.com', '8054002077', 'We can place your website banner on top position in search engines when someone searches your keywords. If you are interested, fill online quote form on our website or send us your keywords and we\'ll tell you guaranteed amount of traffic that you can get. You can do online demo on our website and see how your website will appear on top of search engines.', '2025-10-03 06:34:28'),
(89, 'NwNhOihxPgs', 'VLXkOjCGWDAvF', 'simosejabo970@gmail.com', '3523485903', 'qNugzpmXKfleBAd', '2025-10-04 03:43:44'),
(90, 'wJtREFiWcGnOZyIe', 'wOIUsSrmqek', 'igapehok405@gmail.com', '7416168728', 'nruTlZPyC', '2025-10-04 17:43:01'),
(91, 'XEEKKwBNd', 'qSqCYIAvOuGsgGf', 'biyanojexeva61@gmail.com', '4661515064', 'djKKwqzZKFNBNji', '2025-10-05 02:02:53'),
(92, 'NARYTHY866358NEYRTHYT', 'NARYTHY866358NEYRTHYT', 'exvocoqq@wildbmail.com', '83797935627', 'MEKYUJTYJ866358MARTHHDF', '2025-10-09 03:42:23'),
(93, 'ojYytpdkmYVH', 'HvWTXKLhaPonsC', 'horuzuju662@gmail.com', '8361488440', 'hDYXlbfcPiPmmkqE', '2025-10-10 16:43:48'),
(94, 'Miller', 'Brown', 'millerbrown9296@gmail.com', '3072076448', 'Love your site design — very professional.\r\nI noticed it’s not showing up on Google.\r\nI offer SEO services that work — and I’d be happy to send you:\r\n•        My best offer\r\n•        Pricing\r\n•        Success stories\r\nJust say the word!', '2025-10-15 11:25:00'),
(95, 'ctJKXjzekkj', 'jBkcArAZgyjuUfPB', 'epufagehifo405@gmail.com', '7212674984', 'VWzobCpp', '2025-10-18 21:25:08'),
(96, 'WXOsdmVgCYZgWG', 'VhJacyETf', 'ayerusexefuy91@gmail.com', '4663310697', 'UFNzCvtYHbMZzK', '2025-10-18 22:52:18'),
(97, 'Noah', 'Garcia', 'noah71garcia@gmail.com', '3072076448', 'I came across your website — it looks great! But I noticed it’s not showing up on Google as strongly as it could.\r\n\r\nI help businesses like yours improve visibility and attract more traffic affordably.\r\nWould you like me to send over:\r\n\r\nA quick audit\r\n\r\nA simple proposal\r\n\r\nPast results\r\n\r\nPricing & suggestions\r\n\r\nNo pressure — just reply “Yes” and I’ll send the info right away.\r\n\r\nLooking forward to hearing from you!', '2025-10-19 09:29:48'),
(98, 'wnGqPIBXWE', 'LFGQygZECUS', 'xoxacikesu23@gmail.com', '3169297327', 'OzUEPWUhBOeemgv', '2025-10-20 01:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `document` varchar(100) DEFAULT NULL,
  `doc_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL,
  `uploaded_file` varchar(500) DEFAULT NULL,
  `status` enum('pending','approve','rejected') NOT NULL DEFAULT 'pending',
  `is_deleted` enum('0','1') DEFAULT '0',
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `document`, `doc_type_id`, `user_id`, `uploaded_by`, `uploaded_file`, `status`, `is_deleted`, `created_date`) VALUES
(1, 'Test', 4, 65, 1, '[\"1758965466.png\"]', 'pending', '1', '2025-09-27 09:31:09'),
(2, 'tts my pan', 5, 65, 65, '[\"1758966056.jpg\"]', 'pending', '0', '2025-09-27 09:38:09'),
(4, 'tets shweta', 4, 65, 65, '[\"1758967373.jpg\"]', 'pending', '0', '2025-09-27 10:01:40'),
(5, 'Test', 4, 65, 1, '[\"1758974798.png\"]', 'pending', '0', '2025-09-27 12:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE `document_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` (`id`, `type`, `is_deleted`, `created_date`) VALUES
(4, 'Adhar Card', '0', '2025-09-27 12:32:43'),
(5, 'Pan Card', '0', '2025-09-27 12:32:43'),
(6, 'Liecence', '0', '2025-09-27 12:32:43'),
(7, 'Test Card', '1', '2025-09-27 12:48:37'),
(8, 'Card Test', '0', '2025-09-27 12:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feature_documents`
--

CREATE TABLE `feature_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `uploaded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `feature_signature` varchar(64) NOT NULL,
  `feature_text` text NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_size` bigint(20) DEFAULT NULL,
  `file_mime` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_documents`
--

INSERT INTO `feature_documents` (`id`, `subscription_id`, `user_id`, `uploaded_by`, `feature_signature`, `feature_text`, `original_name`, `file_path`, `file_size`, `file_mime`, `created_at`, `updated_at`) VALUES
(5, 2, 78, 1, '66c4b2d06e0fbd67649224649937ed52', 'shortest video creation wait times', '1758966056 (2).jpg', 'feature_documents/u2UmukML1gsU4NZfXxKOEUjw6hktgeGPWt9XRdQU.jpg', NULL, NULL, '2025-11-21 09:27:55', '2025-11-21 09:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `liecenses`
--

CREATE TABLE `liecenses` (
  `id` int(11) NOT NULL,
  `liecense_number` varchar(200) DEFAULT NULL,
  `liecense_title` varchar(200) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_09_08_084447_create_payments_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_000000_create_users_table', 3),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 3),
(5, '2019_08_19_000000_create_failed_jobs_table', 4),
(6, '2014_10_12_000000_create_users_table', 0),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 0),
(8, '2014_10_12_100000_create_personal_access_tokens_table', 0),
(9, '2014_10_12_000000_create_users_table', 5),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 5),
(11, '2019_08_19_000000_create_failed_jobs_table', 5),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(13, '2025_11_21_121547_create_feature_documents_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `module_permission`
--

CREATE TABLE `module_permission` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `module_slug` varchar(50) DEFAULT NULL,
  `module_title` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `notification` text DEFAULT NULL,
  `sent_by` int(11) DEFAULT NULL,
  `send_to` int(11) NOT NULL,
  `status` enum('unread','read') DEFAULT 'unread',
  `sent_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification`, `sent_by`, `send_to`, `status`, `sent_date`) VALUES
(2, 'this is test notification', 1, 0, 'unread', '2025-07-29 04:32:41'),
(3, 'This is test notification dynamically', 1, 46, 'unread', '2025-09-18 13:47:13'),
(4, 'your purchased repport is ready to dwonlaod please vssit my repoprt', 1, 58, 'unread', '2025-09-20 17:25:50'),
(5, 'test', 65, 65, 'unread', '2025-09-28 09:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `r_payment_id` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `json_response` longtext NOT NULL,
  `billing_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `r_payment_id`, `method`, `currency`, `email`, `phone`, `amount`, `status`, `json_response`, `billing_detail_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'pay_RMZmgmYL4whOEN', 'upi', 'INR', 'abc@gmail.com', '+919403571681', '1500', 'upgrade', '{\"id\":\"pay_RMZmgmYL4whOEN\",\"entity\":\"payment\",\"amount\":150000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"9403571681@okicici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919403571681\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"787513774399\",\"upi_transaction_id\":\"47D72F4A25B81CAD9BD57713879BFE44\"},\"created_at\":1758965241,\"upi\":{\"vpa\":\"9403571681@okicici\"}}', 1, 65, '2025-09-27 09:27:38', '2025-09-27 09:27:38'),
(2, 'pay_RMZr5Ai81jKcsX', 'upi', 'INR', 'abc@gmail.com', '+919403571681', '20', 'success', '{\"id\":\"pay_RMZr5Ai81jKcsX\",\"entity\":\"payment\",\"amount\":2000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"7588546837@okicici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919403571681\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"367749686450\",\"upi_transaction_id\":\"4BDC39C2E02A977BD8B2A30DAE0B3EE3\"},\"created_at\":1758965491,\"upi\":{\"vpa\":\"7588546837@okicici\"}}', 2, 65, '2025-09-27 09:31:46', '2025-09-27 09:31:46'),
(3, 'pay_RMZt9YqVBgVFzU', 'upi', 'INR', 'abc@gmail.com', '+919403571681', '6300', 'success', '{\"id\":\"pay_RMZt9YqVBgVFzU\",\"entity\":\"payment\",\"amount\":630000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"9403571681@okicici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919403571681\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"787418243237\",\"upi_transaction_id\":\"D8C0AC795A586FF802D01F7B8F77FB71\"},\"created_at\":1758965608,\"upi\":{\"vpa\":\"9403571681@okicici\"}}', 1, 65, '2025-09-27 09:33:44', '2025-09-27 09:33:44'),
(5, 'pay_RMaW2NZJMbNGBp', 'upi', 'INR', 'abc@gmail.com', '+919403571681', '400', 'success', '{\"id\":\"pay_RMaW2NZJMbNGBp\",\"entity\":\"payment\",\"amount\":40000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"9403571681@okicici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919403571681\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"739023552531\",\"upi_transaction_id\":\"A94070F9FF71059A25EE551F5AE2C118\"},\"created_at\":1758967817,\"upi\":{\"vpa\":\"9403571681@okicici\"}}', 4, 65, '2025-09-27 10:10:32', '2025-09-27 10:10:32'),
(6, 'pay_RMbQhVii5kFi8L', 'upi', 'INR', 'abc@gmail.com', '+919403571681', '10999', 'success', '{\"id\":\"pay_RMbQhVii5kFi8L\",\"entity\":\"payment\",\"amount\":1099900,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"7588546837@okicici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919403571681\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"643672521195\",\"upi_transaction_id\":\"DACCD7D256A58E9CA230AD4CBD217626\"},\"created_at\":1758971035,\"upi\":{\"vpa\":\"7588546837@okicici\"}}', 5, 65, '2025-09-27 11:04:11', '2025-09-27 11:04:11'),
(7, 'pay_RMcTCLQ01ymJyx', 'upi', 'INR', 'abc@gmail.com', '+919429463972', '10999', 'success', '{\"id\":\"pay_RMcTCLQ01ymJyx\",\"entity\":\"payment\",\"amount\":1099900,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"7383198927@icici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919429463972\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"757653531177\",\"upi_transaction_id\":\"E550A99825E8510238788CF3BBC835ED\"},\"created_at\":1758974699,\"upi\":{\"vpa\":\"7383198927@icici\"}}', 6, 68, '2025-09-27 12:05:14', '2025-09-27 12:05:14'),
(8, 'pay_RMcU3WSu3gQrcm', 'upi', 'INR', 'abc@gmail.com', '+919429463972', '1500', 'success', '{\"id\":\"pay_RMcU3WSu3gQrcm\",\"entity\":\"payment\",\"amount\":150000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"7383198927@icici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919429463972\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"832919789771\",\"upi_transaction_id\":\"55417303060E43E31FE9575D31A45026\"},\"created_at\":1758974748,\"upi\":{\"vpa\":\"7383198927@icici\"}}', 7, 68, '2025-09-27 12:06:03', '2025-09-27 12:06:03'),
(9, 'pay_RMfGLjcTbA2aZe', 'upi', 'INR', 'maliganesh01@gmail.com', '+917588546837', '10999', 'success', '{\"id\":\"pay_RMfGLjcTbA2aZe\",\"entity\":\"payment\",\"amount\":1099900,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"success@razorpay\",\"email\":\"maliganesh01@gmail.com\",\"contact\":\"+917588546837\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"886812716862\",\"upi_transaction_id\":\"C64DA10D17A3CD53C267589437A7AC33\"},\"created_at\":1758984534,\"upi\":{\"vpa\":\"success@razorpay\"}}', 8, 69, '2025-09-27 14:50:16', '2025-09-27 14:50:16'),
(10, 'pay_RMfNnrreM825EA', 'upi', 'INR', 'malishweta7434@gmail.com', '+919403571681', '10999', 'success', '{\"id\":\"pay_RMfNnrreM825EA\",\"entity\":\"payment\",\"amount\":1099900,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"success@razorpay\",\"email\":\"malishweta7434@gmail.com\",\"contact\":\"+919403571681\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"511400296805\",\"upi_transaction_id\":\"4F640731C99AE3325BD65DDF19C0FD8E\"},\"created_at\":1758984957,\"upi\":{\"vpa\":\"success@razorpay\"}}', 9, 65, '2025-09-27 14:56:27', '2025-09-27 14:56:27'),
(11, 'pay_RMmY97czvynWrh', 'upi', 'INR', 'maliganesh01@gmail.com', '+917588546837', '10999', 'success', '{\"id\":\"pay_RMmY97czvynWrh\",\"entity\":\"payment\",\"amount\":1099900,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"success@razorpay\",\"email\":\"maliganesh01@gmail.com\",\"contact\":\"+917588546837\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"103954619879\",\"upi_transaction_id\":\"91139AB708908539E6D947FA18E32E63\"},\"created_at\":1759010196,\"upi\":{\"vpa\":\"success@razorpay\"}}', 10, 70, '2025-09-27 21:57:04', '2025-09-27 21:57:04'),
(12, 'pay_RMmbYfmN06ZiCT', 'netbanking', 'INR', 'maliganesh01@gmail.com', '+917588546837', '6999.3', 'success', '{\"id\":\"pay_RMmbYfmN06ZiCT\",\"entity\":\"payment\",\"amount\":699930,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":\"BARB_R\",\"wallet\":null,\"vpa\":null,\"email\":\"maliganesh01@gmail.com\",\"contact\":\"+917588546837\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"5979734\"},\"created_at\":1759010390}', 11, 70, '2025-09-27 22:00:05', '2025-09-27 22:00:05'),
(13, 'pay_RMme8EDGjyJrya', 'netbanking', 'INR', 'maliganesh01@gmail.com', '+917588546837', '6300', 'success', '{\"id\":\"pay_RMme8EDGjyJrya\",\"entity\":\"payment\",\"amount\":630000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":\"CNRB\",\"wallet\":null,\"vpa\":null,\"email\":\"maliganesh01@gmail.com\",\"contact\":\"+917588546837\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"9002140\"},\"created_at\":1759010536}', 1, 70, '2025-09-27 22:02:31', '2025-09-27 22:02:31'),
(14, 'pay_RMmfdVfVmXFbAr', 'netbanking', 'INR', 'maliganesh01@gmail.com', '+917588546837', '20', 'success', '{\"id\":\"pay_RMmfdVfVmXFbAr\",\"entity\":\"payment\",\"amount\":2000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"netbanking\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":\"BARB_R\",\"wallet\":null,\"vpa\":null,\"email\":\"maliganesh01@gmail.com\",\"contact\":\"+917588546837\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"bank_transaction_id\":\"5063825\"},\"created_at\":1759010621}', 12, 70, '2025-09-27 22:03:56', '2025-09-27 22:03:56'),
(15, 'pay_RMyk33WT4FSlD6', 'upi', 'INR', 'abc@gmail.com', '+919403571681', '400', 'success', '{\"id\":\"pay_RMyk33WT4FSlD6\",\"entity\":\"payment\",\"amount\":40000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"9890890098@okicici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919403571681\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"785914132722\",\"upi_transaction_id\":\"2D3417B1DE2DD1762797DEAC7696A142\"},\"created_at\":1759053131,\"upi\":{\"vpa\":\"9890890098@okicici\"}}', 13, 65, '2025-09-28 09:52:26', '2025-09-28 09:52:26'),
(16, 'pay_RN0cm5rGWnrjaF', 'upi', 'INR', 'abc@gmail.com', '+919429463972', '6300', 'upgrade', '{\"id\":\"pay_RN0cm5rGWnrjaF\",\"entity\":\"payment\",\"amount\":630000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"7383198927@icici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919429463972\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"977473503293\",\"upi_transaction_id\":\"FD7A08162A2C44D83439D175B1624B04\"},\"created_at\":1759059762,\"upi\":{\"vpa\":\"7383198927@icici\"}}', 1, 68, '2025-09-28 11:42:57', '2025-09-28 11:42:57'),
(17, 'pay_RN0erNpsKJNSEt', 'upi', 'INR', 'abc@gmail.com', '+919429463972', '1500', 'upgrade', '{\"id\":\"pay_RN0erNpsKJNSEt\",\"entity\":\"payment\",\"amount\":150000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"7383198927@icici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919429463972\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"958504631782\",\"upi_transaction_id\":\"7ECF64D8BF693F09FD00189C5BD84E41\"},\"created_at\":1759059880,\"upi\":{\"vpa\":\"7383198927@icici\"}}', 1, 68, '2025-09-28 11:44:55', '2025-09-28 11:44:55'),
(18, 'pay_RN19SLB8nRiAPj', 'upi', 'INR', 'abc@gmail.com', '+919429463972', '6300', 'upgrade', '{\"id\":\"pay_RN19SLB8nRiAPj\",\"entity\":\"payment\",\"amount\":630000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"7383198927@icici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919429463972\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"499980452839\",\"upi_transaction_id\":\"39441172F6F4F0BA7BE12F3F37C5479B\"},\"created_at\":1759061618,\"upi\":{\"vpa\":\"7383198927@icici\"}}', 1, 68, '2025-09-28 12:13:53', '2025-09-28 12:13:53'),
(19, 'pay_RN1GYxWX6SgBDI', 'upi', 'INR', 'abc@gmail.com', '+919429463972', '1500', 'success', '{\"id\":\"pay_RN1GYxWX6SgBDI\",\"entity\":\"payment\",\"amount\":150000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"7383198927@icici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919429463972\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"347796856351\",\"upi_transaction_id\":\"C7D5651C70E6ECC435CCC6253C4CD8CA\"},\"created_at\":1759062021,\"upi\":{\"vpa\":\"7383198927@icici\"}}', 1, 68, '2025-09-28 12:20:37', '2025-09-28 12:20:37'),
(20, 'pay_ROYF0MZw9tCcNi', 'upi', 'INR', 'abc@gmail.com', '+919429463972', '400', 'success', '{\"id\":\"pay_ROYF0MZw9tCcNi\",\"entity\":\"payment\",\"amount\":40000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"upi\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"Razorpay payment\",\"card_id\":null,\"bank\":null,\"wallet\":null,\"vpa\":\"9429463972@okicici\",\"email\":\"abc@gmail.com\",\"contact\":\"+919429463972\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"rrn\":\"886168561074\",\"upi_transaction_id\":\"463933B6AE47B01C500A678ABD427AD5\"},\"created_at\":1759396486,\"upi\":{\"vpa\":\"9429463972@okicici\",\"flow\":\"collect\"}}', 14, 68, '2025-10-02 09:15:02', '2025-10-02 09:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `reports_title` varchar(500) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `uploaded_video` varchar(500) DEFAULT NULL,
  `uploaded_pdf` varchar(500) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_deleted` enum('0','1') DEFAULT '0',
  `created_date` datetime DEFAULT current_timestamp(),
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `reports_title`, `slug`, `uploaded_video`, `uploaded_pdf`, `price`, `description`, `category_id`, `user_id`, `is_deleted`, `created_date`, `meta_title`, `meta_description`) VALUES
(10, 'aas df', 'aas-df', NULL, NULL, '1000', '<p>x</p>', 6, 1, '1', '2025-12-19 21:59:44', NULL, NULL),
(11, 'assasa', 'assasa', NULL, NULL, '1000', '<p>aaa</p>', 5, 1, '0', '2025-12-21 19:16:49', 'ss', 'assasa'),
(12, 'test', 'test', NULL, NULL, '2344', '<p>fdfdfd</p>', 1, 1, '0', '2025-12-30 13:14:07', 'meta title', 'meta dec');

-- --------------------------------------------------------

--
-- Table structure for table `report_categories`
--

CREATE TABLE `report_categories` (
  `id` int(11) NOT NULL,
  `category` varchar(500) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_categories`
--

INSERT INTO `report_categories` (`id`, `category`, `is_deleted`, `created_date`) VALUES
(1, 'Report category 11', '0', '2025-09-19 09:26:18'),
(2, 'test', '1', '2025-09-19 09:30:21'),
(3, 'Test rert catr', '1', '2025-09-19 11:40:16'),
(4, 'Bzzb', '1', '2025-09-20 16:08:24'),
(5, 'manufactring  report', '0', '2025-09-20 16:17:38'),
(6, 'test report', '0', '2025-09-27 10:05:40'),
(7, 'test card', '0', '2025-09-27 12:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `role_name` varchar(150) DEFAULT NULL,
  `permission_id` varchar(1500) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `permission_id`, `status`, `created_date`) VALUES
(1, 'Super Admin', '1,2,3,4,5,6,7,8,9,10,11,12,16,17,18,20,21,22,23,24,25', 'active', '2023-10-17 10:33:09'),
(6, 'Administration', '1,2,3,4,5,6,7,8,9,10,11,12,16,17,18,20,21,22,23,24,25', 'active', '2023-10-26 21:58:50'),
(8, 'Users', '1,19,4,5,6,10,13,14,9,26', 'active', '2025-06-11 15:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `services` varchar(500) DEFAULT NULL,
  `slug` varchar(200) NOT NULL,
  `service_type_id` int(11) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(60) DEFAULT NULL,
  `meta_description` varchar(160) DEFAULT NULL,
  `uploaded_pdf` varchar(500) DEFAULT NULL,
  `uploaded_file` varchar(500) DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '0',
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services`, `slug`, `service_type_id`, `price`, `description`, `meta_title`, `meta_description`, `uploaded_pdf`, `uploaded_file`, `is_deleted`, `created_date`) VALUES
(3, 'FSSAI Notice Assistance', 'fssai-notice-assistance', 2, '120', '<p>Receive expert guidance to handle FSSAI notices</p>', 'test meta', 'tets descpr', '[\"1750233205.pdf\"]', NULL, '0', '2025-06-18 13:23:29'),
(4, 'Food Label Validation', 'food-label-validation', 2, '150', '<p>Ensure your food product labels meet all regulatory standards</p>', 'test meta', 'ttsts', '[\"1750233205.pdf\"]', '[\"1758973554.png\"]', '0', '2025-07-08 12:44:14'),
(5, 'FSSAI License Application test', 'fssai-license-application-test', 1, NULL, 'Get your new FSSAI license with ease through our step-by-step process test', NULL, NULL, NULL, '[\"1758971587.png\"]', '0', '2025-09-27 11:13:10'),
(6, 'License Renewal & Modification', 'license-renewal-modification', 1, NULL, 'Keep your food license up to date or modify with our free renewal', NULL, NULL, NULL, '[\"1758972265.jpg\"]', '0', '2025-09-27 11:25:51'),
(7, 'test page serice', 'test-page-serice', 2, NULL, '<p>Food License Services in India – By Expert Food License Consultants Get Your Food License with Trusted Food Regulatory Services Starting or running a food business in India requires strict compliance with the Food Safety and Standards Authority of India (FSSAI) regulations.&nbsp;</p><p><strong>As a professional Food License Consultant, we provide end-to-end support for obtaining and renewing your food license at affordable costs. Our subscription</strong>-based model ensures hassle-free compliance, authentic documentation, and expert guidance, making us your reliable partner in Food Regulatory Services.&nbsp;</p><p>Types of Food Licenses in India Depending on the scale and nature of your food business, you need one of the following FSSAI licenses:&nbsp;</p><p>1. Basic FSSAI Registration (Petty Food Business License) For small food businesses with turnover up to ₹12 lakhs per year. Ideal for home kitchens, small retailers, petty food manufacturers, and local vendors.&nbsp;</p><p>2. State FSSAI License Mandatory for businesses with turnover between ₹12 lakhs – ₹20 crores. Applicable to medium-sized manufacturers, distributors, storage units, and transporters operating within a state.&nbsp;</p><p>3. Central FSSAI License Required for large-scale businesses with turnover above ₹20 crores. Compulsory for importers, exporters, e-commerce food operators, and businesses operating in multiple states. Documents Required for Food License To apply for an FSSAI food license, the following documents are generally required:&nbsp;</p><p>Identity Proof (Aadhar Card, PAN Card, Voter ID) Passport-size photographs of the applicant Proof of business premises (Electricity Bill, Rent Agreement, or Property Documents) Incorporation Certificate / Partnership Deed / Firm Registration (for companies/partnerships) List of food products to be manufactured or handled Food Safety Management Plan (FSMS) NOC from Municipality / Local Authority Import Export Code (for import/export businesses) Layout plan of processing unit (for manufacturers) Note:&nbsp;</p><p>The document list may vary depending on the type of license and business activity. Why Choose Us as Your Food License Consultant?&nbsp;</p><p>✅ End-to-End Food Regulatory Services – from registration to renewal.&nbsp;</p><p>✅ Affordable Subscription Plans – low-cost and hassle-free compliance.&nbsp;</p><p>✅ Expert Guidance – authentic and in-depth support for entrepreneurs.&nbsp;</p><p>✅ Faster Processing – reduce delays with professional handling.&nbsp;</p><p>✅ Business Growth Support – advisory on food safety, labeling, and complianc</p>', NULL, NULL, NULL, '[\"1759051282.png\"]', '0', '2025-09-28 09:21:25'),
(8, 'dcd', 'dcd', 1, '1000', '<p>Zzxz</p>', 'test meta  dmsldd;;\'q', 'tetsisnsbscxcdsddscvc vcb bv', NULL, NULL, '0', '2025-12-28 21:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `services_type`
--

CREATE TABLE `services_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_type`
--

INSERT INTO `services_type` (`id`, `type`, `created_date`) VALUES
(1, 'services 1', '2025-06-18 11:00:38'),
(2, 'services 2', '2025-06-18 11:00:48'),
(3, 'services 3', '2025-06-18 11:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_date`) VALUES
(1, 'chauhan.vimal4@gmail.com', '2025-09-22 16:39:28'),
(2, 'test@gmail.com', '2025-09-22 16:43:44'),
(4, 'test123@gmail.com', '2025-09-22 16:51:34'),
(5, 'admin@admin.com', '2025-09-22 16:52:11'),
(6, 'zehusoxu459@gmail.com', '2025-09-22 19:44:09'),
(7, 'maliganesh01@gmail.com', '2025-09-27 10:18:47'),
(8, 'qeccjsi0k8e78u0@yahoo.com', '2025-09-29 00:38:27'),
(9, 'utqlfchnb@yahoo.com', '2025-09-29 04:04:24'),
(10, 'eisexbtbrpxyqm@yahoo.com', '2025-09-29 09:41:24'),
(11, 'vlcllqyiesdjnidvv@yahoo.com', '2025-09-30 03:20:34'),
(12, 'quruvocoxus757@gmail.com', '2025-09-30 09:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `offer` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(50) NOT NULL,
  `per` varchar(50) DEFAULT NULL,
  `discount` varchar(10) DEFAULT NULL,
  `credits` varchar(100) DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`features`)),
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `title`, `offer`, `description`, `price`, `per`, `discount`, `credits`, `features`, `created_date`) VALUES
(1, 'Basic Plan', '30', 'Yearly Plan', '2000 RS', '', '25', NULL, '[\"FSSAI Registration (Turn over upto 12 lakh)\\r\\nFSSAI Renewal (Registration,State and Central)\\r\\nFssai modification\"]', '2025-08-06 17:30:07'),
(2, 'Premium', '75', 'Experience how slickmagic.AI transforms your short form content creation process.', '7000 RS', '', '10', NULL, '[\"Shortest video creation wait times\\r\\nCreate unlimited videos concurrently\"]', '2025-08-06 17:33:09'),
(3, 'Premium', '38', 'Experience how slickmagic.AI transforms your short form content creation process.', '9999 RS', '', '30', NULL, '[\"Everything in Starter\\r\\nCreate videos up to 110 seconds\\r\\nShortest video creation wait times\"]', '2025-08-06 17:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 1,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `employee_code` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `google_id` varchar(500) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT 8,
  `company_name` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `remember_token` varchar(500) DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT '0',
  `forgot_token` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `user_id`, `category_id`, `mobile`, `email`, `employee_code`, `password`, `google_id`, `user_role_id`, `company_name`, `country`, `state`, `city`, `avatar`, `status`, `remember_token`, `is_deleted`, `forgot_token`, `created_at`, `updated_at`) VALUES
(1, 'vimal', 'chauhan', 'vimal', 'vchauhan', 0, '', 'chauhan.vimal4@gmail.com', NULL, '$2y$10$BwolgxflRQUdZ8Tauryn3OHNoy4pBY9zPTc63W6R26MRCZYRr8Sx6', '', 1, NULL, NULL, NULL, NULL, '1.png', 'active', 'jBFYAPInAYfCC2pXMXGkBsxyrhQZb9lBGJCLgn9yuBHqZBl6S7fk1nN3wx0B', '1', '', '2023-08-09 22:05:08', '2025-04-01 03:42:58'),
(67, NULL, NULL, NULL, NULL, 1, NULL, 'swagatanhealthcare@gmail.com', NULL, '$2y$10$ZOgIcFM2Aat3vVIr8ejkmeJqXuHD7/S2GJPy.C75aP/0DoLPRXvkC', NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '5Re1SAt1ntqcBpipH3DUrVdfmm5B4lz74BWMOheTtC50QFnOvsRv01KxUp6O', '0', NULL, '2025-09-27 11:00:43', '2025-09-27 11:00:43'),
(68, 'test', 'test', 'test.test', NULL, 1, '7383198927', 'test@gmail.com', NULL, '$2y$10$Q63VQuQN24Ux1AzN4Wnl0uuQo4upZSoeLweKqEntVheofi0O1a8XW', NULL, 8, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '0', NULL, '2025-09-27 14:48:05', NULL),
(69, NULL, NULL, NULL, NULL, 1, NULL, 'prowessbuzz@gmail.com', NULL, '$2y$10$MTqGgwAzfTmZn.30SOGSHO46E72qHtwOpF5Bzzzl9vZO9kabPePPW', NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, 'yKuHOOWUXKNk96PnJRlSvMyndWWKKbjgjSFV7o6Vr3dq9CL91PmsSSbcEokI', '0', NULL, '2025-09-27 14:48:05', '2025-09-27 14:48:05'),
(70, 'Ganesh', 'Mali', NULL, NULL, 7, '7588546837', 'maliganesh01@gmail.com', NULL, '$2y$10$bek7jJQwZrnWDPkHkBRH6ucj2zxHiwjydyi3QJ.im1wA/l/LMKtvq', NULL, 8, 'ProwessBuzz', 'india', 'Maharashtra', 'Pune', NULL, NULL, 'vDLf7MuUlhkXmycX6Nqg4SvEoi8rt4uWC14x6djHe53NC3zaOoH8IO9Rpmhb', '0', '', '2025-09-27 21:53:48', '2025-09-27 21:53:48'),
(71, 'cPZEyQOhHbt', 'XQyLDWlqDmXW', 'cPZEyQOhHbt.XQyLDWlqDmXW53', '9242', 3, '4861431372', 'simosejabo970@gmail.com', '187995', '$2y$10$YXv8pklBAzr8E3IFRkP2je.R38G8obZWuYKCvJsxdiO3gyRTSJaI.', NULL, 8, 'MhWrYOJZ', 'india', 'QxWTrXZMRAZNJ', 'VzXfmEYmHwR', NULL, 'active', NULL, '0', NULL, NULL, NULL),
(72, 'OsIKqdReOydq', 'fwwhesdwU', 'OsIKqdReOydq.fwwhesdwU16', '8902', 6, '8801039063', 'igapehok405@gmail.com', '794870', '$2y$10$wenfz.i3DhzZ.gEQjoCbQulpLDNgqdoUtVqsbgPHOC2KAOzaCfzdK', NULL, 8, 'GChxVUwC', 'india', 'FCJjdfCOxplkqD', 'lnrCUvBsdfHmnGAu', NULL, 'active', NULL, '0', NULL, NULL, NULL),
(73, 'OfUYRWtPKozjfBTP', 'eNVqZCKdZzYJsC', 'OfUYRWtPKozjfBTP.eNVqZCKdZzYJsC81', '7323', 2, '8991352125', 'biyanojexeva61@gmail.com', '599923', '$2y$10$mmNfaddwOWg/xpt6d6tFROSLhhVsDNb8EJIYuxjAIxt3iJ7DpNaRu', NULL, 8, 'SoijRTvVJ', 'india', 'wRMPuYetPHgQMC', 'otEupycdIs', NULL, 'active', NULL, '0', NULL, NULL, NULL),
(74, 'LDFsEnaACswHMe', 'fYwTZIsBzqwTxz', 'LDFsEnaACswHMe.fYwTZIsBzqwTxz22', '6232', 3, '9455656912', 'horuzuju662@gmail.com', '890702', '$2y$10$1pzTGsaqD790s.NEFdG75.Ckt58/nyBWjGBgoBYp3kDPr6Xzt4wSa', NULL, 8, 'LdZiFEiLxeFWrDWi', 'india', 'ldvzsAeGIbEjP', 'SjrbUNjYAVt', NULL, 'active', NULL, '0', NULL, NULL, NULL),
(75, 'iyDFolSTlUFIVFo', 'nmOVEvjjF', 'iyDFolSTlUFIVFo.nmOVEvjjF43', '5873', 7, '3037391225', 'epufagehifo405@gmail.com', '198730', '$2y$10$UGx.Fq31UKDS2/u1PI3UPeEBaRc3TMTjAqQhCIulNSJH.MBaz6kBm', NULL, 8, 'LcUBWjjARpUlOXl', 'india', 'qKLBnWykNdpYBj', 'PFtnQXWydYJecNz', NULL, 'active', NULL, '0', NULL, NULL, NULL),
(76, 'RhQtszxLeSO', 'DzCsstvJzgPhyzJ', 'RhQtszxLeSO.DzCsstvJzgPhyzJ79', '9066', 4, '8576924332', 'ayerusexefuy91@gmail.com', '274909', '$2y$10$dbP75R6Umv6tDwtsogF8luguRJoB3IxIw3xSxPxwkTU1LwMeFq3SO', NULL, 8, 'xGBGcIHfk', 'india', 'OZogTdzpElNm', 'iToQmoXXVqEjl', NULL, 'active', NULL, '0', NULL, NULL, NULL),
(77, 'yZjYzfpp', 'taNXGShd', 'yZjYzfpp.taNXGShd24', '3807', 6, '3261252511', 'xoxacikesu23@gmail.com', '866320', '$2y$10$wdYTuVBUJLO7QfWffEGzteSwbLJOSbcC9aqYd84vKa3L3A/JL7EW6', NULL, 8, 'kkdmDzVispjktLm', 'india', 'aULfbtIjudR', 'rytxmhiooBPKy', NULL, 'active', NULL, '0', NULL, NULL, NULL),
(78, 'nitya', 'mali', 'nitya.mali31', '3595', 1, '9403571671', 'nitya@gmail.com', '229896', '$2y$10$yHaUtjW3.LExgVB3T.cIT.w2pWTTThgQgfnT.gGZlYZTE7J1n8JmS', NULL, 8, 'prowessbuzz', 'india', 'Maharashtra', 'Pune', NULL, 'active', NULL, '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

CREATE TABLE `user_request` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `adhar_number` varchar(50) NOT NULL,
  `start_date` varchar(10) DEFAULT NULL,
  `start_month` varchar(10) DEFAULT NULL,
  `start_year` varchar(10) DEFAULT NULL,
  `end_date` varchar(10) DEFAULT NULL,
  `end_month` varchar(10) DEFAULT NULL,
  `end_year` varchar(10) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_request`
--

INSERT INTO `user_request` (`id`, `first_name`, `last_name`, `email`, `phone`, `service_id`, `user_id`, `adhar_number`, `start_date`, `start_month`, `start_year`, `end_date`, `end_month`, `end_year`, `is_deleted`, `created_date`) VALUES
(1, 'sendy', 'chauhan', 'sendychuahan99@gmail.com', '7383198927', 2, 46, '457856894523', '8', '7', '2024', '17', '10', '2025', '0', '2025-09-13 16:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `web_menu`
--

CREATE TABLE `web_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `orders` int(11) DEFAULT NULL,
  `nav_item` text NOT NULL,
  `menu_icon` varchar(100) DEFAULT NULL,
  `permission_tag` varchar(100) DEFAULT NULL,
  `is_submenu` enum('No','Yes') NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_menu`
--

INSERT INTO `web_menu` (`id`, `title`, `url`, `controller`, `action`, `parent_id`, `orders`, `nav_item`, `menu_icon`, `permission_tag`, `is_submenu`, `status`) VALUES
(1, 'Dashboard', 'dashboard', 'Dashboard', 'index', 0, 1, '/dashboard', 'bi bi-speedometer', 'dashboard', 'No', 1),
(2, 'Manage Menu', 'web-menu', 'WebMenu', 'index', 0, 2, '/web-menu', 'bi bi-list', 'web-menu', 'No', 1),
(3, 'Manage User', 'users/list', 'Users', 'index,add', 16, 3, '/users/list', 'bi bi-users', 'users', 'No', 1),
(4, 'Subscriptions', 'subscriptions/list', 'Subscriptions', 'index,add', 0, 4, '/subscriptions/list', 'bi bi-list', 'subscriptions', 'No', 1),
(5, 'Settings', NULL, NULL, 'index,add', 0, 5, '/settings', 'bi bi-list', 'settings', 'Yes', 1),
(6, 'Reports', 'reports/list', 'Reports', 'index,add', 0, 6, '/reports/list', 'bi bi-list', 'reports', 'No', 1),
(7, 'User Requests', 'userrequest/list', 'Request', 'index,add', 0, 7, '/request/list', 'bi bi-list', NULL, 'No', 1),
(8, 'Services', 'services/list', 'Services', 'index,add', 0, 8, '/services/list', 'bi bi-list', 'services', 'No', 1),
(9, 'Documents', 'documents/list', 'Documents', 'index,add', 0, 9, 'documents/list', 'bi bi-list', 'documents', 'No', 1),
(10, 'Profiles', 'settings/profiles', 'Settings', 'index,add,profiles', 5, 1, '/settings/profiles', 'bi bi-list', 'settings', 'No', 1),
(11, 'Notifications', 'settings/notifications', 'Settings', 'index,add,profiles,notifications', 5, 2, '/settings/notifications', NULL, 'settings', 'No', 1),
(12, 'Subscriptions', 'settings/subscriptions', 'Settings', NULL, 5, 3, '/settings/subscriptions', NULL, 'settings', 'No', 1),
(13, 'My Services', 'settings/licenses', 'Settings', 'index,add,profiles,notifications', 5, 4, '/settings/licenses', NULL, 'settings', 'No', 1),
(14, 'My Reports', 'settings/reports', 'Settings', 'index,add,profiles', 5, 5, '/settings/reports', NULL, 'settings', 'No', 1),
(15, 'Dashboard', 'user-dashboard', 'Dashboard', 'index,add', 0, 1, '/user-dashboard', 'bi bi-speedometer', 'dashboard', 'No', 1),
(16, 'User Management', NULL, NULL, 'index,add', 0, 3, '/users', 'bi bi-list', 'users', 'Yes', 1),
(17, 'Business Category', 'category/list', 'Category', 'index,add', 20, 10, '/category/list', 'bi bi-list', 'category', 'No', 1),
(18, 'Documents', 'users/document', 'Users', 'index,add', 16, 4, '/users/document', 'bi bi-users', 'users', 'No', 1),
(19, 'Request', 'userrequest/request', 'userRequest', 'index,add', 0, 2, '/userrequest/request', 'bi bi-list', 'userrequest', 'No', 1),
(20, 'categories', NULL, NULL, 'index,add', 0, 11, '/category', 'bi bi-list', 'category', 'Yes', 1),
(21, 'Report Category', 'category/report-category', 'Category', 'index,add', 20, 12, '/category/report-category', NULL, 'category', 'No', 1),
(22, 'Document Category', 'category/doc-category', 'Category', 'index,add', 20, 3, '/category/doc-category', NULL, 'category', 'No', 1),
(23, 'Socials', NULL, 'Social', 'index,add', 0, 12, '/social', 'bi bi-list', 'social', 'Yes', 1),
(24, 'Contact Us', 'social/contact-us', 'Social', 'index,add', 23, 1, '/social/contact-us', NULL, 'social', 'No', 1),
(25, 'Subscribe Email', 'social/subscribe', 'Social', 'index,add', 23, 2, '/social/subscribe', NULL, 'social', 'No', 1),
(26, 'Final Documents', 'finaldocument/list', 'FinalDocument', 'index,download', 0, 13, 'finaldocument/list', 'bi bi-list', 'finaldocument', 'No', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_categories`
--
ALTER TABLE `business_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feature_documents`
--
ALTER TABLE `feature_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_documents_subscription_id_index` (`subscription_id`),
  ADD KEY `feature_documents_user_id_index` (`user_id`),
  ADD KEY `feature_documents_uploaded_by_index` (`uploaded_by`),
  ADD KEY `feature_documents_feature_signature_index` (`feature_signature`);

--
-- Indexes for table `liecenses`
--
ALTER TABLE `liecenses`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_permission`
--
ALTER TABLE `module_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `module_slug` (`module_slug`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `report_categories`
--
ALTER TABLE `report_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_type`
--
ALTER TABLE `services_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`);

--
-- Indexes for table `user_request`
--
ALTER TABLE `user_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_menu`
--
ALTER TABLE `web_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `document_type`
--
ALTER TABLE `document_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_documents`
--
ALTER TABLE `feature_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `liecenses`
--
ALTER TABLE `liecenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `module_permission`
--
ALTER TABLE `module_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `report_categories`
--
ALTER TABLE `report_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=907;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services_type`
--
ALTER TABLE `services_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_menu`
--
ALTER TABLE `web_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
