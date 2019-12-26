-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2019 at 01:48 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.2.18-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_jci`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `image` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `status`, `password`, `remember_token`, `created_at`, `updated_at`, `zone_id`, `user_group_id`, `image`) VALUES
(2, 'Admin User1', 'm@gmail.com', '1', '$2y$10$YQKAcGlsX6Uf/okqKVkX.uIqNpje68vJys6xqkpHHJJvmAmRSAj52', '8stAmaiUPRIO6aZenAe5kgIcyy7jsVYqgNlRInRIqxYTXlQ2pxcIIyI9vMOc', '2018-11-26 23:05:46', '2019-12-23 22:01:31', NULL, 1, '1577157650.png');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `position_id`, `image`, `status`, `link_url`, `created_at`, `updated_at`) VALUES
(6, '1', 1, '1568169841.png', '1', NULL, '2019-09-01 19:11:19', '2019-09-11 06:44:01'),
(7, '2', 1, '1568169904.png', '1', NULL, '2019-09-08 08:34:12', '2019-09-11 06:45:04'),
(8, 'tes', 1, '1568169916.png', '1', NULL, '2019-09-08 09:06:54', '2019-09-11 06:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `banner_positions`
--

CREATE TABLE `banner_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_positions`
--

INSERT INTO `banner_positions` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Main', '1', NULL, NULL),
(2, 'Popup', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `identifier` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `priority`, `status`, `created_at`, `updated_at`, `identifier`) VALUES
(1, '1', NULL, NULL, '1', '2019-09-03 04:51:19', '2019-09-03 04:51:19', NULL),
(2, '3', NULL, NULL, '1', '2019-09-03 04:52:23', '2019-09-03 04:52:32', NULL),
(3, 'Category1', NULL, NULL, '1', '2019-09-08 08:15:09', '2019-09-08 08:15:09', NULL),
(4, 'g1', NULL, NULL, '1', '2019-12-23 22:14:53', '2019-12-23 22:14:53', 'gallery'),
(5, 'd1', NULL, NULL, '1', '2019-12-23 22:15:03', '2019-12-23 22:15:03', 'downloads');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug_url` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'for nested purpose',
  `details` text,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `priority` int(11) NOT NULL DEFAULT '0',
  `image` varchar(222) DEFAULT NULL,
  `seo_keywords` text,
  `seo_title` text,
  `url` varchar(255) NOT NULL,
  `seo_description` text,
  `position_id` int(11) NOT NULL COMMENT 'menu_position',
  `large_image` varchar(255) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `featured` enum('1','0') NOT NULL,
  `link_url` varchar(222) DEFAULT NULL,
  `section_url` varchar(222) DEFAULT NULL,
  `link_type` enum('C','S','E') NOT NULL DEFAULT 'C',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `allow_to_delete` enum('1','0') NOT NULL DEFAULT '1',
  `widget_identifier` varchar(222) DEFAULT NULL,
  `is_widget` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `slug_url`, `parent_id`, `details`, `status`, `priority`, `image`, `seo_keywords`, `seo_title`, `url`, `seo_description`, `position_id`, `large_image`, `menu_id`, `featured`, `link_url`, `section_url`, `link_type`, `created_at`, `updated_at`, `allow_to_delete`, `widget_identifier`, `is_widget`) VALUES
(1, 'Home', 'Home', 0, '<p><span style="font-family: &quot;Courier New&quot;, Courier, monospace, arial, sans-serif; font-size: 14px; white-space: pre-wrap;">Blastline India (P) Ltd is the pioneer and leader in the Anti-Corrosion Industry in India. It consists of a group of business entities catering to every need of the anti-corrosion industry in the country with overseas presence in various countries like Saudi Arabia, Kuwait, Qatar, Bahrain, UK and USA through their Associate Companies.  </span></p>\r\n<pre class="aLF-aPX-K0-aPE" style="user-select: text; font-family: &quot;Courier New&quot;, Courier, monospace, arial, sans-serif; margin-top: 0px; margin-bottom: 0px; white-space: pre-wrap; overflow-wrap: break-word; font-size: 14px;">\r\nLed by a dynamic management team, it has been able to adopt to changing needs of the industry and has forayed into all related niche areas like production and export of Machines, Accessories, Abrasives other specialized equipments and instruments used in the Anti-corrosion industry.  It is also involved in major contract works in India and abroad as well as imports and distribution of high quality coating equipments and systems of foreign manufacturers. \r\n&nbsp;</pre>\r\n<p>&nbsp;</p>', '1', 0, 'image_1.jpg', 'BGAS training, CSWIP training, Welding & Painting inspection training, Sandblasting and painting courses, BGAS-CSWIP course in cochin, CSWIP 3.1 courses in cochin, BGAS & CSWIP training in cochin-kerala', 'Blastline institute provides the surface Preparation and Painting- BGAS & CSWIP training, API & ISO training, NDT training, Welding & Painting inspector courses. ', 'content', ' BGAS & CSWIP Training | API & ISO Training | Blastline Institute', 2, '', 13, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(2, 'Blastline India', 'Blastline-India', 0, '<p style="text-align: justify;">Blastline India (P) Ltd is the pioneer and leader in the Anti-Corrosion Industry in India. It consists of a group of business entities catering to every need of the anti-corrosion industry in the country with overseas presence in various countries like Saudi Arabia, Kuwait, Qatar, Bahrain, UK and USA through their Associate Companies.    Led by a dynamic management team, it has been able to adopt to changing needs of the industry and has forayed into all related niche areas like production and export of Machines, Accessories, Abrasives other specialized equipments and instruments used in the Anti-corrosion industry.  It is also involved in major contract works in India and abroad as well as imports and distribution of high quality coating equipments and systems of foreign manufacturers.   Being passionate about the need for excellence in this Industry, having recognized the lack of facilities to train qualified professionals in this field, and as part of fulfilling their social commitment to the Industry, Blastline India has established a state-of-the-art training center in Cochin backed by various International Certification Bodies.</p>', '1', 0, 'db_sub.jpg', NULL, NULL, 'content', NULL, 3, '', 13, '1', NULL, NULL, 'C', NULL, '2019-12-19 10:07:15', '1', NULL, '0'),
(3, 'Courses', 'course', 0, '<p>hai how</p>', '1', 0, '', 'BGAS-CSWIP coaching classes in cochin, CSWIP welding inspection course in cochin-kerala, CSWIP welding inspector course in cochin-kerala, QC welding inspector course in cochin-kerala', 'Blastline provides the courses certified by BISP including welding inspection, Anti-corrosion technique courses,QA/QC courses in kerala, BGAS-CSWIP courses.', 'content', 'API training and certification | Sandblasting and painting courses  ', 3, '', 13, '1', NULL, 'course', 'S', NULL, '2019-09-12 16:34:50', '1', NULL, '0'),
(4, 'Enquiry', 'Enquiry', 0, '', '1', 0, '', 'BGAS Training, CSWIP training, Welding Inspection Training, Painting Inspection training, Sandblasting and painting courses, BGAS course in Cochin, CSWIP course in cochin, BGAS Training in cochin, CSWIP Training in cochin, CSWIP training in kerala, BGAS training in kerala, CSWIP 3.1 preparatory courses in cochin, BGAS preparatory courses in cochin, Painting Inspector courses in cochin-kerala, Welding Inspector courses in cochin-kerala, Welding Inspection courses in cochin-kerala, Painting Inspection courses in cochin-kerala, QA/QC courses in kerala-cochin, CSWIP courses in India, BGAS courses in India, BGAS coaching classes in cochin, CSWIP coaching classes in cochin, CSWIP 3.1 courses in cochin-kerala, CSWIP welding inspection course in cochin, CSWIP welding inspection course in kerala, CSWIP welding inspector course in cochin, CSWIP welding inspector course in kerala, QC welding inspector course in cochin, QC welding inspector course in kerala, BISP cochin', 'Blastline Institute of Surface Preparation and Painting- BGAS & CSWIP training, API & ISO training, NDT training, Welding & Painting inspector courses', 'content', 'BGAS & CSWIP Training | API & ISO Training | Blastline Institute', 3, '', 13, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(6, 'Gallery', 'Gallery', 0, '<p>hai</p>', '1', 0, '', 'Welding Inspection courses in cochin, QA/QC courses in kerala, BGAS-CSWIP courses in India,API training and certification', 'Blastline is the best institute in Kochi who provides the International courses, Preparatory courses, Protective and Marine Paint courses,Pressure equipment training ASME section IX', 'photo', 'American petroleum institute training courses | NDT training kochi ', 3, '', 13, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(7, 'News', 'News', 0, '<p>hai</p>', '1', 0, '', '', '', 'news', '', 3, '', 13, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(8, 'Contact Us', 'enquiry', 0, '<div style="text-align: center; "><span style="font-size: larger;"><span style="color: rgb(0, 153, 255);"><strong>BLASTLINE INSTITUTE OF SURFACE PREPARATION &amp; PAINTING</strong></span></span></div>\r\n<div style="text-align: center; ">L F Plaza ( Above State Bank of India - near Pottakuzhy L.F.Church ), Pottakuzhi, Kaloor-Perandoor Road&nbsp;</div>\r\n<div style="text-align: center; ">Elamakkara P.O, Kochi, Kerala, India, Pin-682 026</div>\r\n<div style="text-align: center; ">Tel: <strong>+91-484-2408477, 2537344</strong><br>\r\nEmail: <strong>info@blastlineinstitute.com</strong> <br>\r\n<strong>For alternate email_id: <a href="mailto:bisp@blastlineindia.com">Click here</a></strong><br>\r\n<br>\r\n<br>\r\n<br>\r\n<br>\r\n<em>For more details, Please drop your details in the form given below.</em><br>\r\n&nbsp;</div>', '1', 0, 'image_8.jpg', 'Sandblasting and painting courses and training,NDT training and courses,API training and certification', 'Blastline will provide you the complete courses including BGAS training, CSWIP training, Welding & Painting inspection training, Sandblasting and painting courses,CSWIP 3.1 courses.  Contact us for more course details at +91-484-2408477, 2537344', 'contact', 'BGAS & CSWIP | API, ISO, WPS/WPQR | Blastline Institute | Contact us ', 3, '', 13, '1', NULL, 'enquiry', 'S', NULL, '2019-09-12 16:41:59', '1', NULL, '0'),
(9, 'Tell a Friend', 'Tell a Friend', 0, '', '1', 0, '', '', '', 'content', 'BGAS & CSWIP Training | API & ISO Training | Blastline Institute', 2, '', 13, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(11, 'Downloads', '', 0, '<p>hai</p>', '1', 0, '', 'BGAS Training, CSWIP training, Welding Inspection Training, Painting Inspection training, Sandblasting and painting courses, BGAS course in Cochin, CSWIP course in cochin, BGAS Training in cochin, CSWIP Training in cochin, CSWIP training in kerala, BGAS training in kerala, CSWIP 3.1 preparatory courses in cochin, BGAS preparatory courses in cochin, Painting Inspector courses in cochin-kerala, Welding Inspector courses in cochin-kerala, Welding Inspection courses in cochin-kerala, Painting Inspection courses in cochin-kerala, QA/QC courses in kerala-cochin, CSWIP courses in India, BGAS courses in India, BGAS coaching classes in cochin, CSWIP coaching classes in cochin, CSWIP 3.1 courses in cochin-kerala, CSWIP welding inspection course in cochin, CSWIP welding inspection course in kerala, CSWIP welding inspector course in cochin, CSWIP welding inspector course in kerala, QC welding inspector course in cochin, QC welding inspector course in kerala, BISP cochin', 'Blastline Institute of Surface Preparation and Painting- BGAS & CSWIP training, API & ISO training, WPS & WPQR training, Welding & Painting inspector courses', 'content', '', 2, '', 13, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(14, 'CSWIP 3.1 WELDING INSPECTOR LEVEL - 2', '', 20, '<b style="line-height: 16px; font-family: verdana, helvetica, arial, sans-serif">Suitable for:</b>\r\n<div id="bodyContent_CourseInformation_SuitableForPanel" style="line-height: 16px; font-family: verdana, helvetica, arial, sans-serif"><span id="bodyContent_CourseInformation_SuitableForLabel">Inspection engineers and supervisory staff. The course is ideal for inspectors requiring preparation for the CSWIP examinations - Welding Inspector&nbsp;<br />\r\nThose with little or no previous welding experience are advised to attend the Certificate in Visual Inspection of Welds course to prepare for this course.</span></div>\r\n<p><b>Course Content:</b><br />\r\n<span id="bodyContent_CourseInformation_CourseContentLabel"><br />\r\nThe duties and responsibilities of a welding inspector; fusion welding processes; typical weld defects; types of steel; carbon-manganese, low alloy and stainless steels; hardening of steels; weldability; heat treatment; parent metal defects; visual inspection; testing parent metals and welds; destructive tests; NDT techniques; welder and procedure approval; codes and standards; outline of safe working practices; practice in examination questions; continuous and end-of-course assessment. In addition, candidates meeting the CSWIP requirements for eligibility complete the relevant CSWIP examination on day 5.</span></p>\r\n<p><b>Certification/Awarding Body:</b><br />\r\n<br />\r\n<img id="bodyContent_CourseInformation_CourseLogoRepeater_LogoImage_0" class="courseLogo" alt="CSWIP" src="http://www.twitraining.com/images/logos/small/cswip.jpg" /></p>\r\n<p>&nbsp;<br />\r\n<b>Course Objectives:</b><br />\r\n<span id="bodyContent_CourseInformation_CourseObjectivesLabel"> </span></p>\r\n<ul style="line-height: 1.7em; margin: 0px">\r\n    <li style="line-height: 1.3em; margin: 10px 0px 0px">To understand factors which influence the quality of fusion welds in steels</li>\r\n    <li style="line-height: 1.3em; margin: 10px 0px 0px">To recognise characteristics of commonly used welding processes in relation to quality control</li>\r\n    <li style="line-height: 1.3em; margin: 10px 0px 0px">To interpret drawing instructions and symbols to ensure that specifications are met</li>\r\n    <li style="line-height: 1.3em; margin: 10px 0px 0px">To set up and report on inspection of welds, macrosections and other mechanical tests</li>\r\n    <li style="line-height: 1.3em; margin: 10px 0px 0px">To assess and report on welds to acceptance levels</li>\r\n    <li style="line-height: 1.3em; margin: 10px 0px 0px">To confirm that incoming material meets stipulated requirements and recognise the effects on weld quality of departure from specification</li>\r\n    <li style="line-height: 1.3em; margin: 10px 0px 0px">To be in a position to pass the Welding Inspector - Level 2 examinations</li>\r\n</ul>\r\n<p><strong>Entry Requirements:</strong></p>\r\n<ul>\r\n    <li>Personnel working in welding industry who can produce a certificate of at-least 3 years experience.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<div>&nbsp;</div>', '1', 1, '', '', '', 'ttt', '', 0, '', 25, '0', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(15, 'BGAS CSWIP PAINTING INSPECTOR GRADE 2/3', '', 20, '<div>\r\n<div><strong>Suitable for:<br />\r\n<br type="_moz" />\r\n</strong></div>\r\n<div>Candidates with or without experience in the Painting Inspection Industry. &nbsp;Candidates will be assessed during the course and advised on either grade 3 or 2 exam route dependent on their progress during training.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Course Content:</strong></div>\r\n<div>&nbsp;</div>\r\n<div>Corrosion theory; surface preparation; surface contaminants and tests; paint constituents and technology; solutions and dispersions; drying and curing properties and performance; specified painting conditions; cathodic protection; holiday / pinhole detection; paint-application methods; paint / paint film testing; paint identification; metal coatings; paint faults; colour; inspection methods; specification requirements; health and safety and working practices.</div>\r\n<div>&nbsp;</div>\r\n<div><b>Certification/Awarding Body:</b><br />\r\n<br />\r\n<img id="bodyContent_CourseInformation_CourseLogoRepeater_LogoImage_0" class="courseLogo" alt="BGAS-CSWIP" src="http://www.twitraining.com/images/logos/small/bgas_cswip.jpg" /></div>\r\n</div>\r\n<p>&nbsp;<strong>Course Objectives:</strong></p>\r\n<ul>\r\n    <li>To understand the principles of pipeline coatings</li>\r\n    <li>To understand the importance of surface preparation</li>\r\n    <li>To appreciate the difficulties associated with pipeline site coating</li>\r\n    <li>To understand the practical methods of testing and inspection</li>\r\n    <li>To interpret the requirements of standards</li>\r\n    <li>To meet the syllabus requirements for the BGAS-CSWIP Site Coatings Inspector examination</li>\r\n</ul>\r\n<div>&nbsp;</div>\r\n<div><strong>Who should attend?</strong></div>\r\n<div>&nbsp;</div>\r\n<div>Coating Assurance and control inspector &amp; contractors, inspection company employees, paint company employees and sales personnel, surface preparers &amp; coating applicators.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Pre-requisite:</strong></div>\r\n<div>&nbsp;</div>\r\n<div>&#61501; ITI diploma holders &#61501; Engineers &#61501; Science graduates</div>\r\n<div id="bodyContent_CourseInformation_ObjectivesPanel" style="line-height: 16px; font-family: verdana, helvetica, arial, sans-serif">&nbsp;</div>\r\n<p>&nbsp;</p>', '1', 0, 'image_15.jpg', '', '', 'test', '', 2, '', 25, '0', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(51, 'BGAS-CSWIP SITE COATING INSPECTOR', '', 20, '<p><strong>Suitable for:</strong></p>\r\n<div>Candidates with or without previous experience in site coating inspection wishing to attain BGAS-CSWIP approval as a Site Coating Inspector. &nbsp;Suitable for individuals engaged in the inspection and coating of new and existing pipelines. &nbsp;This approval is very useful to welding inspectors as it can extend their working time capability on any given project.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Course Content:</strong></div>\r\n<div>&nbsp;</div>\r\n<div>Corrosion; specified coating conditions; surface preparation methods and standards; surface contaminants and tests for detection; coating technology; film thickness; coal tar enamels; special situations; hot applied tapes; cold applied laminate tapes; grease based tapes; self-adhesive overwrap tapes; polyethylene cladding; fillers, mastics and putties; heat shrinkable plastics; powder coatings; urethane MCLs; holiday detection; concrete coatings; internal coatings; cathodic protection; stages of pipeline construction; handling, transport and storage; pipeline surveys, health and safety; coating faults; working practices and quality.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Course Objectives:</strong></div>\r\n<ul>\r\n    <li>To understand the principles of pipeline coatings</li>\r\n    <li>To understand the importance of surface preparation</li>\r\n    <li>To appreciate the difficulties associated with pipeline site coating</li>\r\n    <li>To understand the practical methods of testing and inspection</li>\r\n    <li>To interpret the requirements of standards</li>\r\n    <li>To meet the syllabus requirements for the BGAS-CSWIP Site Coatings Inspector examination</li>\r\n</ul>\r\n<div><strong>Who should attend?</strong></div>\r\n<ul>\r\n    <li>Experienced coating industry personnel who are aspiring for higher levels of Inspection Grading examinations.</li>\r\n    <li>Diploma holders or graduates preparing for Inspector Grade exams.</li>\r\n    <li>Engineers or graduates preparing for Inspector Grade exams.</li>\r\n</ul>\r\n<div><strong>Pre-requisite:</strong></div>\r\n<div>&nbsp;</div>\r\n<div>&#61501; ITI Diploma Holder &#61501; University Science graduates &#61501; Engineer &#61501; Experienced Personnel in Anti-Corrosion Industry.</div>', '1', 0, '', '', '', '', '', 0, '', 25, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(53, 'TWI-Training July', '', 0, '', '1', 0, 'image_53.jpg', '', '', '', '', 28, 'large_53.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(54, 'TWI-Training  July Batch', '', 0, '', '1', 0, 'image_54.jpg', '', '', '', '', 28, 'large_54.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(55, 'TWI-Training July 1', '', 0, '', '1', 0, 'image_55.jpg', '', '', '', '', 28, 'large_55.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(16, 'CSWIP 3.2 SENIOR WELDING INSPECTOR LEVEL - 3', '', 20, '<p><strong>Suitable for:</strong></p>\r\n<div>Experienced welding inspectors and quality control staff, especially those who are proceeding to the CSWIP Senior Welding Inspector examination. &nbsp;It is essential that course members have a knowledge of the subjects covered in the course Welding Inspector before joining this course.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Course Content:</strong></div>\r\n<div>&nbsp;</div>\r\n<div>Function and responsibilities of a senior welding inspector; defects in welds; weld symbol interpretation; interpretation of NDT reports; documentation of welding; approval and certification procedures; general principles of supervision; case studies; planning; organisation; interpretation of fractured surfaces; auditing; practice in typical examination questions; course assessments.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Course Objectives:</strong></div>\r\n<ul>\r\n    <li>To understand the various facets of welding inspection and quality control</li>\r\n    <li>To assess the validity of a welding procedure</li>\r\n    <li>To recognise origins of weld defects</li>\r\n    <li>To interpret features of a fracture surface and prepare detailed reports</li>\r\n    <li>To scrutinise and correct inspection reports</li>\r\n    <li>To plan, organize and supervise use of skilled inspectors and NDT personnel</li>\r\n    <li>To conduct pre-, during and post welding audits</li>\r\n    <li>To be in a position to pass the relevant examination</li>\r\n</ul>\r\n<div><strong>Entry Requirements:</strong></div>\r\n<ul>\r\n    <li>Certified Welding Inspector Level - 2 with minimum 2 years experience / Overall 5 years experience in welding field with CSWIP Level - 2.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '1', 0, '', '', '', '', '', 0, '', 25, '0', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(17, 'AWS CWI TO CSWIP BRIDGING WELDING INSPECTION LEVEL 2', '', 14, '<p>\n<div>This course is suitable for the candidates holding aws cwi certificate requiring CSWIP approval and welding inspector certification.&nbsp;</div>\n<div>&nbsp;</div>\n<div><strong>Entry requirements:</strong></div>\n<div>Present holder of AWS CWI (certified welding inspector) certificate.</div>\n<div>CSWIP Welding inspector examination for candidates with appropriate experience as specified in CSWIP document CSWP-WI-6-92 available on the site: <strong>www.cswip.com&nbsp;</strong></div>\n<div>&nbsp;</div>\n<div><strong>Additional requirements and informations:</strong></div>\n<div>2 passport size photographs</div>\n<div>Candidates resume with experience (cv type)</div>\n<div>TWI CSWIP assesment form&nbsp;</div>\n<div>(This can be sent prior to the enrollment to us for approval @mail id bisp@blastlineindia.com)</div>\n<div>A valid Eyesight certificate&nbsp;</div>\n<div>Proof of eligibility</div>\n<div>TWI enrollment form&nbsp;</div>\n<div>Course fee GBP 550*&nbsp;</div>\n<div>&nbsp;</div>\n</p>', '1', 8, '', '', '', '', '', 0, '', 25, '0', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(18, 'Schedule', 'Schedule', 0, '', '1', 0, 'image_18.jpg', 'Welding & Painting inspector training in kerala-cochin, Coating inspector training in kerala-cochin, american petroleum institute training courses in kerala-cochin', 'We are the only TWI authorized customer service agent for Kerala. Also provides the courses including CSWIP welding, WPS and WPQR training, BGAS courses.', 'content', 'Welding & Painting inspector training | Coating inspector | Blastline', 2, '', 13, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(19, 'Manu, Kuwait', '', 0, '<p>I think the course was excellent for someone like me. Thanks for all&nbsp;the great work and your dedication for teaching&nbsp; with hands on Practical Experience. Hats off to Blastline!</p>', '1', 0, '', '', '', '', '', 0, '', 27, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(25, 'Blastline Institute Picture 4', '', 0, '', '0', 0, '', '', '', '', '', 26, '', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(26, 'Blastline Institute Picture 5', '', 0, '', '1', 0, 'image_26.jpg', '', '', '', '', 26, 'large_26.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(27, 'Blastline Institute Picture 6', '', 0, '', '1', 0, 'image_27.jpg', '', '', '', '', 26, 'large_27.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(28, 'Blastline Institute Picture 7', '', 0, '', '1', 0, 'image_28.jpg', '', '', '', '', 26, 'large_28.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(29, 'Blastline Institute Picture 8', '', 0, '', '1', 0, 'image_29.jpg', '', '', '', '', 26, 'large_29.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(32, 'BGAS SITE COATING INSPECTOR', '', 13, '<p>&nbsp;This course is suitable for plant operations, plant inspection, NDT, inspection and quality assurance/quality control personnel with prior qualification or experience.</p>\r\n<div>&nbsp;</div>\r\n<div><strong>Entry requirements:</strong></div>\r\n<div>Entry requirements can be found in document CSWIP 11-01: requirements for the certification of plant inspectors available at www.cswip.com.</div>\r\n<div>NDT level II qualification (ACCP, CSWIP, PCN) in three methods (CSWIP 3.1 welding inspector, or BGAS painting inspector are acceptable as methods) or</div>\r\n<div>An ONC engineer or equivalent or</div>\r\n<div>Holds CSWIP 3.2 senior welding inspection or</div>\r\n<div>Has satisfactory pre-assessed work experience in plant inspection (section 3.6 of requirement documents).</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Additional requirements and informations:</strong></div>\r\n<div>2 passport sized photographs</div>\r\n<div>Candidate resume with experience (cv type)</div>\r\n<div>Twi cswip assesment form&nbsp;</div>\r\n<div>(this can be send prior to the enrollment to us for approval and mail id bisp@blastlineindia.com)</div>\r\n<div>A valid eyesight certificate&nbsp;</div>\r\n<div>Proof of eligibility</div>\r\n<div>Twi enrollment form</div>\r\n<div>Course fee (please contact us)</div>\r\n<div>(fee and seminar can be changeable subject to TWI, UK advice)</div>', '1', 0, '', '', '', '', '', 0, '', 25, '0', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(33, 'CSWIP PLANT INSPECTION', '', 13, '<p>&nbsp;This course is suitable for Plant operations, Plant inspection, NDT, Inspection and Quality Assuarance/Quality Control personnel with prior qualification or experience.&nbsp;</p>\r\n<div>&nbsp;</div>\r\n<div><strong>Entry requirements:</strong></div>\r\n<div>Entry requirements can be found in document CSWIP 11-01: requirements for the certification of plant inspectors available at www.cswip.com.</div>\r\n<div>NDT Level II qualification (ACCP, CSWIP, PCN) in three methods (CSWIP 3.1 welding inspector, or BGAS painting inspector are acceptable as methods) or</div>\r\n<div>An ONC engineer or equivalent or</div>\r\n<div>Holds CSWIP 3.2 senior welding inspection or</div>\r\n<div>Has satisfactory pre-assessed work experience in plant inspection (section 3.6 of requirement documents).</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Additional requirements and informations:</strong></div>\r\n<div>2 passport size photographs</div>\r\n<div>Candidate resume with experience (cv type)</div>\r\n<div>TWI CSWIP assesment form (download here)&nbsp;</div>\r\n<div>(This can be send prior to the enrollment to us for approval and mail id bisp@blastlineindia.com)</div>\r\n<div>A valid Eyesight certificate&nbsp;</div>\r\n<div>Proof of eligibility</div>\r\n<div>TWI enrollment form&nbsp;</div>\r\n<div>Course fee (please contact us)&nbsp;</div>\r\n<div>(fee and seminar can be changeable subject to TWI, UK advice)</div>', '1', 0, '', '', '', '', '', 0, '', 25, '0', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(34, 'RADIOGRAPHIC TESTING (RT)', '', 13, '<p>&nbsp;This course is suitable for the candidates after completion of their education and wish to make their career in quality control field.&nbsp;</p>\r\n<div>&nbsp;</div>\r\n<div>a fresh jobseeker in quality control department or in mechanical field always needs specilization before they gets assignment in particular department as they have to work in accordance with international quality standards.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>An SSLC/Plus Two passed candidates also has good job opportunity upon successful completion of ndt training and certification as ndt technician which has good demand in gulf sector.</div>\r\n<div><span class="Apple-tab-span" style="white-space:pre">	</span></div>\r\n<div>Radiographic testing (RT), or Industrial Radiography, is a Non Destructive Testing (NDT) method of inspecting materials for hidden defects by using the ability of short wavelength electromagnetic radiation to penetrate various materials. It is mostly used to find the defect in the weld by using X ray Machine &amp; Gamma Ray Camera to penetrate the materials. The rays are captured on the otherside using radiographic films or sensors. The beam of radiation passes through defect and produces a latent image in the films with varying densities according to the amount of radiation reaching the other side of the material.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>NDT is normally applied during construction, operative and maintenance of projects such as Oil and Natural Gas Rig, Gas Oil Separation Plants (GOSP), refineries, power plant, ship building, chemical plants, fertilizers, automobile, nuclear plants, aerospace, steel plants etc.&nbsp;</div>', '1', 0, '', '', '', '', '', 0, '', 25, '0', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(35, 'MAGNETIC PARTICLE TESTING (MT)', '', 13, '<p>&nbsp;This course is suitable for the candidates who want to make their career in quality control field.&nbsp;</p>\r\n<div>A fresh jobseeker in quality control department or in mechanical field always needs specilization before they gets assignment in particular department as they have to work in accordance with international quality standards.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>An SSLC/Plus two passed candidate also has good job opportunity upon successful completion of ndt training and certification as ndt technician which has good demand in gulf sector.</div>\r\n<div><span class="Apple-tab-span" style="white-space:pre">	</span></div>\r\n<div>Magnetic Particle Testing (MT) is part of non destructive testing for detecting the surface and sub surface defects in ferrous materials. It is done by applying an external magnetic field or electric current through the ferrous materials. The defect in the ferrous materials is found using the principle of magnetic flux which will leave the area where the flaw is located. The magnetic flux will leave the area where there is flaw. The common method of magnetic particle inspection uses finely powdered ferric or ferric oxide particles in an appropriate liquid, most often kerosene. The particles are often colored or coated with fluorescent dyes that can be made visible with uv light.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>NDT is normally applied during construction, operative and maintenance of projects such as oil and natural gas rig, Gas Oil Separation Plants (GOSP), refineries, power plant, ship building, chemical plants, fertilizers, automobile, nuclear plants, aerospace, steel plants etc.</div>', '1', 0, '', '', '', '', '', 0, '', 25, '0', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(36, 'ULTRASONIC TESTING (UT)', '', 13, '<p>&nbsp;This course is suitable for the candidates after completion of their graduation to make their career in quality control field.&nbsp;</p>\r\n<div>&nbsp;</div>\r\n<div>a fresh jobseeker in quality control department or in mechanical field always needs specilization before they gets assignment in particular department as they have to work in accordance with international quality standards.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>SSLC/Plus Two passed candidates also have good job opportunities upon successful completion of NDT training and certification as NDT Technician which has good demand in the Gulf (Middle East).</div>\r\n<div><span class="Apple-tab-span" style="white-space:pre">	</span></div>\r\n<div>Ultrasonic Testing is a non destructive testing where, very short ultrasonic pulse-waves with frequencies ranging from 0.1-15 MHZ and occasionally up to 50 MHZ are launched into materials to detect internal flaws. The technique is also commonly used to determine the thickness of the testing objects, for example, to monitor corrosion inside pipes. This test is performed on ferric or other metals or alloys but also can be used on concrete or wood structures.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>In Ultrasonic Testing the ultrasonic diagnostic machine is used to pass the ultrasonic vibrations over the object being inspected. The ultrasonic diagnostic machine is normally separated using couplant such as oil or water as in the case. The sound energy thus introduced propagates through the materials in the form of waves. When there is a discontinuity (such as a crack) in the wave path, part of the energy is reflected back from the flaw surface. The reflected wave signal is transformed into an electrical signal by the transducer and is displayed on a screen.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>NDT is normally applied during construction, operative and maintainance of projects such as oil and natural gas rig, Gas Oil Separation Plants (GOSP), refineries, power plant, ship building, chemical plants, fertilizers, automobile, nuclear plants, aerospace, steel plants etc.</div>', '1', 0, '', '', '', '', '', 0, '', 25, '0', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(38, 'Ganesh Kumar, Kasargod', '', 0, '<p>The training was very inspirational, energising, bringing lots of ideas, with both substantial and in-depth knowledge together with case studies, learning from experience and being fully practice-oriented.Well-balanced composition of participants, which contributed to interesting and focused discussions and exchanges.</p>', '1', 0, '', '', '', '', '', 0, '', 27, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(41, 'Blastline Institute', 'Blastline Institute', 0, '<p style="text-align: justify;"><strong>The Blastline Institute of Surface Preparation and Painting (BISP)</strong>, was originally established in 2006 to mould professionals in industrial grade anti-corrosion applications. However, its gamut of training programs was later expanded to include International Grading programs in Welding and Coating Inspection as well as Certification programs I Non-Destructive Testing (NDT).</p>\r\n<p>We have corporate partnerships or grading compatibility with renowned international organizations such as:</p>\r\n<p>1.<span class="Apple-tab-span" style="white-space:pre">	</span><strong>SSPC</strong> (Society for Protective Coatings, USA)</p>\r\n<p>2.<span class="Apple-tab-span" style="white-space:pre">	</span><strong>NACE</strong> (National Association of Corrosion Engineers, USA)</p>\r\n<p>3.<span class="Apple-tab-span" style="white-space:pre">	</span><strong>ASNT</strong> (American Society for Non-Destructive Testing, USA)</p>\r\n<p>4.<span class="Apple-tab-span" style="white-space:pre">	</span><strong>TWI</strong> (The Welding Institute, UK)</p>\r\n<p style="text-align: justify;">Training programs conducted by BISP are executed by highly experienced Engineers and Instructors with the help of latest machineries and tools in addition to a state-of-the art simulation facility which is getting ready. &nbsp;</p>\r\n<p style="text-align: justify;">The training and certification is so complete and up-to-date that those who pass out from BISP and enter the industry shall not be found wanting in their skills, capabilities or qualification.</p>', '1', 0, '', 'BGAS-CSWIP coaching classes in cochin, CSWIP welding inspection course in cochin-kerala, CSWIP welding inspector course in cochin-kerala, QC welding inspector course in cochin-kerala. ', 'Blastline provides International Grading programs in Welding and Coating Inspection as well as Certification programs in Non-Destructive Testing (NDT) and QC inspector courses. ', 'content', 'BGAS & CSWIP Training | QC inspector courses | Blast line ', 3, '', 13, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(42, 'Career Possibilities', 'Career-Possibilities', 0, '<p style="text-align: justify;">It is estimated that approximately 20 million tons of industrial paint is produced annually world-wide. Such large amount of paint requires a proportionately large number of personnel for its application, supervision and quality control.<br>\r\n<br>\r\nStructural work and fabrication is another multi-billion industry in which there is a huge demand for personnel with Quality Control certifications related to welding.</p>\r\n<p>“Non-Destructive Testing” is another field which offers a great career opportunity in a wide group of analysis techniques used in science and industry to evaluate properties of a material, component or system without causing damage to the object getting tested. &nbsp;Because NDT does not permanently alter the article being inspected, is a highly valuable technique that can save both money and time in product evaluation, troubleshooting and research.</p>\r\n<p style="text-align: justify;">There is a tremendous shortage of qualified persons in the above mentioned areas. &nbsp;To fill the huge gap between demand and supply of such personnel, BISP offers internationally recognized certificate courses right at your doorstep-in Cochin. &nbsp;And the demand is ever-increasing for qualified Blasters, Painters, Painting Supervisors, <a href="http://www.blastlineinstitute.com/?page=courses&amp;cid=3&amp;pid=17" style="\r\ntext-decoration: none;\r\n">Painting Inspectors</a>, Welders, <a href="http://www.blastlineinstitute.com/?page=courses&amp;cid=3&amp;pid=12" style="\r\ntext-decoration: none;\r\n">Welding Inspectors</a> and Non-Destructive Test (<a href="http://www.blastlineinstitute.com/?page=courses&amp;cid=3&amp;pid=23" style="\r\ntext-decoration: none;\r\n">NDT</a>) Personnel – especially in Middle East, Europe, Far East and within the country.</p>\r\n<p>&nbsp;</p>', '1', 0, 'image_42.jpg', 'WPS and WPQR training, Welding & Painting inspector training in kerala-cochin, Coating inspector training in kerala-cochin', 'We provide Sandblasting painting courses and training, BGAS training, Contact us for more course details at +91-484-2408477, 2537344.', 'content', 'NDT training | API training | BAGS courses | Blastline | Career', 12, '', 13, '', NULL, 'content', 'C', NULL, '2019-09-12 17:03:06', '0', 'career-possibilities', '0'),
(43, 'Downloads', 'downloads', 0, 'It is estimated that approximately 0 million tons of industrial paint is produced annually world-wide.  Such large amount of paint requires a proportionately...', '1', 0, '', '', '', '', '', 0, '', 0, '', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(44, 'Testimonials', '', 0, '', '1', 0, '', '', '', '', '', 0, '', 0, '', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(56, 'TWI-Training July 2', '', 0, '', '1', 0, 'image_56.jpg', '', '', '', '', 28, 'large_56.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(57, 'TWI-Training July 3', '', 0, '', '1', 0, 'image_57.jpg', '', '', '', '', 28, 'large_57.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(58, 'TWI-Training July 4', '', 0, '', '1', 0, 'image_58.jpg', '', '', '', '', 28, 'large_58.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(59, 'TWI-Training July 5', '', 0, '', '1', 0, 'image_59.jpg', '', '', '', '', 28, 'large_59.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(60, 'TWI-Training July 6', '', 0, '', '1', 0, 'image_60.jpg', '', '', '', '', 28, 'large_60.jpg', 18, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(45, 'CERTIFIED PROTECTIVE COATING APPLICATOR - INDUSTRIAL GRADE', '', 17, '<p>Duration: &nbsp;1 month<span class="Apple-tab-span" style="white-space: pre"> <br />\r\n</span>Class Time: 9am to 5pm</p>\r\n<div>&nbsp;</div>\r\n<div><strong>Course Description</strong></div>\r\n<div>&nbsp;</div>\r\n<div style="text-align: justify">This certification program is designed for project workers employed by the contractor, who wish to obtain knowledge and skills about mechanical as well as abrasive blast cleaning and protective coating application. &nbsp;The training includes the operation of airless spray equipment incorporating the use of a paint simulator and actual hands-on spraying. &nbsp;While using the simulator you will learn the proper technique for airless spray painting by using a program that simulates real life situations and equipment used in the field.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Course Content</strong></div>\r\n<div>&nbsp;</div>\r\n<div>&#61501; Principles of surface preparations &#61501; Hand and tool cleaning methods &#61501; Abrasive blast cleaning</div>\r\n<div>&#61501; High pressure water jet cleaning &#61501; Proper spray techniques &#61501; Proper mixing techniques</div>\r\n<div>&#61501; Different methods of painting such as by brush, rollers, conventional and airless spray guns.</div>\r\n<div>&#61501; A general understanding of corrosion, its causes and remedies.</div>\r\n<div>&#61501; Different types of paints, their compositions and protective action</div>\r\n<div>&#61501; Safety and safe working conditions as well as health hazards and their preventive measures.</div>\r\n<div>&#61501; The course will be inclusive of a week of extensive practical training.</div>\r\n<div>&#61501; Basic mathematics for fundamental calculations, conversions and quantity survey will also be covered.</div>\r\n<div>&#61501; Common painting faults &amp; remedies</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Who should attend</strong></div>\r\n<div>&nbsp;</div>\r\n<div>Contractors, project supervisors and project workers involved in application of protective coatings.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Pre-requisite<br />\r\n<br type="_moz" />\r\n</strong></div>\r\n<div>The candidate should have cleared at least 10th standard education of any approved examination board in India.</div>\r\n<p>&nbsp;</p>', '1', 0, '', '', '', '', '', 0, '', 25, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(46, 'CERTIFIED PROTECTIVE COATING SUPERVISOR / QC INSPECTORS - INDUSTRIAL GRADE', '', 17, '<p>Duration: &nbsp;7 days<span class="Apple-tab-span" style="white-space: pre"> </span></p>\r\n<div>Class time: &nbsp;9am to 5pm</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Course Description:</strong></div>\r\n<div>&nbsp;</div>\r\n<div style="text-align: justify">This program is designed to present the basic technology of coating application and inspection. &nbsp;It provides both technical and practical fundamentals for coating inspection works on various structures. &nbsp;The services of a supervisor or Inspector having this knowledge is vital in preventing incorrect coating applications leading to coating failures.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Course Content:</strong></div>\r\n<div>&nbsp;</div>\r\n<div>&#61501; Role of the Inspector &#61501; Mechanism of corrosion and its effects on metals</div>\r\n<div>&#61501; The different grades of surface preparation</div>\r\n<div>&#61501; Abrasive used in blast cleaning and the surface profiles obtained</div>\r\n<div>&#61501; The various equipments and test instruments and their uses</div>\r\n<div>&#61501; Different types of paints in use and their ingredients</div>\r\n<div>&#61501; Selection of paint &nbsp;&#61501; Quantity survey &#61501; Climatic conditions to be checked</div>\r\n<div>&#61501; Calculation and measurement of paint film thickness &#61501; Adhesion to the substrate</div>\r\n<div>&#61501; Paint life and storage etc. &#61501; Coating specifications &#61501; Occupational safety and health hazards</div>\r\n<div>&#61501; Inspection procedures &#61501; Coating failures &#61501; MSDS and product data sheet review</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Course format</strong></div>\r\n<div>&nbsp;</div>\r\n<div style="text-align: justify">The course progresses through classroom lectures interspersed with hands-on practical on various equipment and instruments associated with quality control of surface preparation and coating applications.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Who should attend?</strong><br />\r\n&nbsp;</div>\r\n<div style="text-align: justify">Quality Assurance and Control inspectors, contractors, inspection company employees, coating manufactures and distributor sales personnel, paint company employees, surface prepares and coating applicators.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Pre-requisite:</strong><br />\r\n&nbsp;</div>\r\n<div>&#61501; ITI diploma holders &nbsp;&#61501; Engineers &nbsp;&#61501; Science Graduates</div>\r\n<div>&nbsp;</div>', '1', 0, '', '', '', '', '', 0, '', 25, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(47, 'BASIC COURSE FOR PAINTING INSPECTORS(COURSE CODE: BGP)', '', 17, '<p>Duration : &nbsp;10 days<br />\r\nClass time: &nbsp;10am to 1pm or 2pm to 5pm</p>\r\n<div>&nbsp;</div>\r\n<div style="text-align: justify">This course prepares the candidate for higher levels of Coating inspector certifications that are recognized around the world. &nbsp;It covers most of the topics mentioned in previous courses, but in more depth.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Who should attend?</strong></div>\r\n<div>&nbsp;</div>\r\n<div>&bull;<span class="Apple-tab-span" style="white-space: pre"> </span>Experienced coating industry personnel who are aspiring for higher levels of inspection grading examinations</div>\r\n<div>&bull;<span class="Apple-tab-span" style="white-space: pre"> </span>Diploma holders or graduates preparing for inspector Grade exams</div>\r\n<div>&bull;<span class="Apple-tab-span" style="white-space: pre"> </span>Engineers or graduates preparing for Inspector Grade exams.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Pre-requisite:</strong></div>\r\n<div>&nbsp;</div>\r\n<div>&#61501; ITI Diploma Holder &nbsp;&#61501; University Science graduates &#61501; Engineer Experienced Personnel in Anti-Corrosion Industry</div>', '1', 0, '', '', '', '', '', 0, '', 25, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(48, 'BASIC COURSE FOR WELDING INSPECTORS(COURSE CODE:CSP)', '', 19, '<p>Duration: &nbsp;10 days<br />\r\nClass time: &nbsp;10am to 1pm</p>\r\n<div>This course prepares the candidate &nbsp;for higher levels of Welding Inspector certifications that are recognized around the world. &nbsp;It covers all subjects required to pass welding inspector examinations at global standards.</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Who should attend?<br />\r\n<br type="_moz" />\r\n</strong></div>\r\n<div>\r\n<div>&bull;Experienced welding industry personnel who are aspiring for higher levels of Inspection Grading examinations</div>\r\n<div>&bull;Diploma holders or graduates preparing for Inspector Grade Exams</div>\r\n<div>&bull;Engineers or graduates preparing for Inspector Grade exams</div>\r\n<div>&nbsp;</div>\r\n</div>\r\n<div><strong>Pre-requisite:<br />\r\n<br type="_moz" />\r\n</strong></div>\r\n<div>&bull; &nbsp;ITI Diploma Holders / University Science graduates / Engineers &ndash; Experienced Personnel in welding industry.</div>\r\n<p>&nbsp;</p>', '1', 0, '', '', '', '', '', 0, '', 25, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(49, 'ASNT GRADING LEVEL 2 (COURSE CODE:NDT2)', '', 21, '<p><strong>What is ASNT?</strong></p>\r\n<div>&nbsp;</div>\r\n<div style="text-align: justify">ASNT stands for &ldquo;America Society for &ldquo;Non-Destructive Testing&rdquo; and it happens to be one of the most reputed and authentic certification bodies in the field of NDT.</div>\r\n<div style="text-align: justify">&nbsp;</div>\r\n<div style="text-align: justify">Among various certification levels of ASNT, the most sought &ndash; after one is ASNT level-2 which enables a person to set up and calibrate testing equipment, conduct the inspection according to codes and standards and compile work instructions for a team of technicians. &nbsp;They are also authorized to report, interpret, evaluate and document testing results. &nbsp;They can also supervise and train Level 1 technicians. &nbsp;In addition to testing methods, they will be familiar with applicable codes and standards and will have some knowledge of the manufacture and service of tested products.</div>\r\n<div style="text-align: justify">&nbsp;</div>\r\n<div>BISP is authorized to certify LEVEL &ndash; 2 personnel in some of the most popular testing methods such as:</div>\r\n<div>&nbsp;</div>\r\n<div>&bull;<span class="Apple-tab-span" style="white-space: pre"> </span>Radiographic Testing(RT)</div>\r\n<div>&bull;<span class="Apple-tab-span" style="white-space: pre"> </span>Ultrasonic Testing(UT)</div>\r\n<div>&bull;<span class="Apple-tab-span" style="white-space: pre"> </span>Magnetic Particle Testing(MT)</div>\r\n<div>&bull;<span class="Apple-tab-span" style="white-space: pre"> </span>Penetrant Testing(PT)</div>\r\n<div>&bull;<span class="Apple-tab-span" style="white-space: pre"> </span>Radiographic Testing Film Interpretation(RTFI) and several more methods</div>\r\n<div>&nbsp;</div>\r\n<div>Duration of the course<span class="Apple-tab-span" style="white-space: pre"> </span>&nbsp; &nbsp; &nbsp; &nbsp;:<span class="Apple-tab-span" style="white-space: pre"> </span>1 month for any four methods</div>\r\n<div>Minimum qualification &nbsp; &nbsp; &nbsp; &nbsp;:<span class="Apple-tab-span" style="white-space: pre"> </span>SSLC passed (as per document)</div>', '1', 0, '', '', '', '', '', 0, '', 25, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0'),
(50, 'COURSES IN NON-DESTRUCTIVE TESTING', '', 0, '<p style="text-align: justify;">Non-Destructive testing consists of a number of non-invasive techniques to determine the integrity of a material, component or a structure or quantitatively measure some characteristic of an object. &nbsp;Or simply put it is &ldquo;testing without doing harm to the object being tested&rdquo;. &nbsp;Some typical applications of NDT are:</p>\n<div>&nbsp;</div>\n<div>1.<span class="Apple-tab-span" style="white-space:pre">	</span>Flaw detection</div>\n<div>2.<span class="Apple-tab-span" style="white-space:pre">	</span>Leak detection</div>\n<div>3.<span class="Apple-tab-span" style="white-space:pre">	</span>Location determination</div>\n<div>4.<span class="Apple-tab-span" style="white-space:pre">	</span>Dimensional measurements</div>\n<div>5.<span class="Apple-tab-span" style="white-space:pre">	</span>Structure &amp; micro structure characterization</div>\n<div>6.<span class="Apple-tab-span" style="white-space:pre">	</span>Estimation of mechanical &amp; physical properties</div>\n<div>7.<span class="Apple-tab-span" style="white-space:pre">	</span>Stress and dynamic response measurements</div>\n<div>8.<span class="Apple-tab-span" style="white-space:pre">	</span>Material Sorting</div>\n<div>9.<span class="Apple-tab-span" style="white-space:pre">	</span>Chemicals Composition Determination etc.,</div>\n<div>&nbsp;</div>\n<div><strong>Applications</strong></div>\n<div>&nbsp;</div>\n<div>NDT is used in a variety of settings that covers a wide range of industrial activities in such diverse fields as:</div>\n<div>&nbsp;</div>\n<div style="text-align: justify;">&#61501; Automotive&nbsp;&#61501; Aviation/ Aerospace&nbsp;&#61501; Powerplants &#61501; Construction &#61501; Maintenance and repair &nbsp;&#61501; Manufacturing &#61501; Industrial plants such as Nuclear, Petrochemical, Power, Refineries, Pulp and Paper, Fabrication shops, Mine processing and their Risk Based Inspection programmes &#61501; Pipelines &#61501; Railways &#61501; Wire Rope Testing for, Crane Wires, Rope-way Wires &#61501; Medical imaging applications, to name a few.</div>\n<div>&nbsp;</div>\n<div style="text-align: justify;">Successful and consistent application of nondestructive testing techniques depends heavily on appropriate training, experience and integrity. &nbsp;Personnel involved in application of Industrial NDT methods and interpretation of results should be certified, and in some industrial sectors certification is enforced by law or by the applied codes and standards.</div>', '1', 0, '', '', '', '', '', 0, '', 25, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0');
INSERT INTO `contents` (`id`, `title`, `slug_url`, `parent_id`, `details`, `status`, `priority`, `image`, `seo_keywords`, `seo_title`, `url`, `seo_description`, `position_id`, `large_image`, `menu_id`, `featured`, `link_url`, `section_url`, `link_type`, `created_at`, `updated_at`, `allow_to_delete`, `widget_identifier`, `is_widget`) VALUES
(62, 'Preparatory Training', 'Preparatory Training', 0, '<div>Blastline Institute provides very effective coaching classes for additional in-depth knowledge in Welding and Painting Inspection.</div>\n<div>&nbsp;</div>\n<div>This is conducted by our own in-house faculty members and consists of elaborate classes on complete theroy and practicals&nbsp;using &nbsp;unique specimens, gauges and genuine instruments. Needless to mention, these turn out to be great confidence&nbsp;boosters for those who are preparing to attempt International Welding Inspector and International Painting Inspector examinations.</div>\n<div>&nbsp;</div>\n<table width="100%" border="0" cellpadding="1" cellspacing="1" class="crs">\n    <tbody>\n        <tr>\n            <td colspan="2"><span style="color: rgb(48, 142, 219);"><strong>A P I CERTIFICATE PROGRAMME&nbsp;</strong></span></td>\n        </tr>\n        <tr>\n            <td width="60px">&nbsp;</td>\n            <td>\n            <div>&nbsp;</div>\n            <div><strong><span style="color: rgb(0, 0, 0);"><a href="index.php?page=courses&amp;cid=3&amp;pid=20">API 510 ( PRESSURE VESSEL INSPECTOR )</a></span></strong></div>\n            </td>\n        </tr>\n        <tr>\n            <td>&nbsp;</td>\n            <td><a href="index.php?page=courses&amp;cid=3&amp;pid=21"><strong>API 570 ( PIPING INSPECTOR )</strong></a></td>\n        </tr>\n        <tr>\n            <td>&nbsp;</td>\n            <td><a href="index.php?page=courses&amp;cid=3&amp;pid=22"><strong>API 653 ( ABOVE GROUND STORAGE TANK INSPECTOR )</strong></a></td>\n        </tr>\n    </tbody>\n</table>\n<p>\n<table width="100%" border="0" cellpadding="1" cellspacing="1" class="crs">\n    <tbody>\n        <tr>\n            <td colspan="2"><span style="color: rgb(48, 142, 219);"><strong>NON-DESTRUCTIVE TESTING (NDT)</strong></span><strong>&nbsp;</strong></td>\n        </tr>\n        <tr>\n            <td width="60px">&nbsp;</td>\n            <td>\n            <div>&nbsp;</div>\n            <div><a href="index.php?page=courses&amp;cid=3&amp;pid=25"><strong>Radiographic Testing (RT)</strong></a></div>\n            </td>\n        </tr>\n        <tr>\n            <td>&nbsp;</td>\n            <td><a href="index.php?page=courses&amp;cid=3&amp;pid=24"><strong>Visual Testing (VT)</strong></a></td>\n        </tr>\n        <tr>\n            <td>&nbsp;</td>\n            <td><a href="index.php?page=courses&amp;cid=3&amp;pid=26"><strong>Ultrasonic Testing (UT)</strong></a></td>\n        </tr>\n        <tr>\n            <td>&nbsp;</td>\n            <td><a href="index.php?page=courses&amp;cid=3&amp;pid=27"><strong>Mangnetic Particle Testing (MT)</strong></a></td>\n        </tr>\n        <tr>\n            <td>&nbsp;</td>\n            <td><a href="index.php?page=courses&amp;cid=3&amp;pid=28"><strong>Radiographic Test Film Interpretation (RTFI)</strong></a></td>\n        </tr>\n    </tbody>\n</table>\n</p>\n<div>For schedule of preparatory batches and more details please contact us on&nbsp;<strong>0484-2408477 or 2537344&nbsp;</strong>or <strong>bisp@blastlineindia.com</strong>&nbsp;</div>', '1', 0, '', '', '', 'content', '', 3, '', 13, '1', NULL, NULL, 'C', NULL, NULL, '1', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `content_positions`
--

CREATE TABLE `content_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_positions`
--

INSERT INTO `content_positions` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Top Menu', '1', NULL, NULL),
(2, 'Top Sub Menu', '1', NULL, NULL),
(3, 'Main Menu', '1', NULL, NULL),
(6, 'Footer Menu', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content_position_relations`
--

CREATE TABLE `content_position_relations` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_position_relations`
--

INSERT INTO `content_position_relations` (`id`, `content_id`, `position_id`, `created_at`, `updated_at`) VALUES
(4, 5, 1, '2019-09-08 10:29:39', '2019-09-08 10:29:39'),
(9, 1, 1, '2019-09-11 07:53:46', '2019-09-11 07:53:46'),
(11, 4, 2, '2019-09-11 16:00:59', '2019-09-11 16:00:59'),
(15, 10, 2, '2019-09-11 16:21:27', '2019-09-11 16:21:27'),
(16, 10, 3, '2019-09-11 16:21:27', '2019-09-11 16:21:27'),
(17, 11, 3, '2019-09-11 16:37:50', '2019-09-11 16:37:50'),
(20, 3, 1, '2019-09-12 20:34:50', '2019-09-12 20:34:50'),
(21, 3, 2, '2019-09-12 20:34:50', '2019-09-12 20:34:50'),
(23, 8, 1, '2019-09-12 20:41:59', '2019-09-12 20:41:59'),
(28, 42, 3, '2019-09-12 21:03:06', '2019-09-12 21:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `parent_id`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, NULL, '1', '2019-09-03 04:51:19', '2019-09-03 04:51:19'),
(2, '3', NULL, NULL, '1', '2019-09-03 04:52:23', '2019-09-03 04:52:32'),
(3, 'Category1', NULL, NULL, '1', '2019-09-08 08:15:09', '2019-09-08 08:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `priority` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `title`, `image`, `status`, `priority`, `updated_at`, `created_at`, `parent_id`) VALUES
(20, 'Protective And Marine Painting Course', 'image_20.pdf', '1', 0, NULL, NULL, NULL),
(21, 'API Training Programe Prospectus1', 'image_21.pdf', '1', 0, '2019-12-24 03:49:58', NULL, 5),
(22, 'BGAS Painting Inspector Grade 2 & Grade 1', 'image_22.pdf', '1', 0, NULL, NULL, NULL),
(23, 'CSWIP Senior Welding Inspector - Level 3 & Level 2', 'image_23.pdf', '1', 0, NULL, NULL, NULL),
(24, 'Protective & Marine Painter by PCSC', 'image_24.pdf', '1', 0, NULL, NULL, NULL),
(25, 'BISP Certified Preparatory Courses', 'image_25.pdf', '1', 0, NULL, NULL, NULL),
(26, 'NDT Courses', 'image_26.pdf', '1', 0, NULL, NULL, NULL),
(30, 'Pressure Equipment Training ASME Section IX', 'image_30.pdf', '1', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `event_date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `location` varchar(222) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `details` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `featured` enum('1','0') NOT NULL DEFAULT '0',
  `zone_id` int(11) DEFAULT NULL,
  `image` varchar(222) DEFAULT NULL,
  `identifier` varchar(100) DEFAULT NULL,
  `slug_url` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `event_date`, `time`, `location`, `priority`, `status`, `details`, `created_at`, `updated_at`, `featured`, `zone_id`, `image`, `identifier`, `slug_url`) VALUES
(1, '1', NULL, NULL, NULL, NULL, '1', NULL, '2019-12-24 03:37:04', '2019-12-24 03:37:04', '0', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` datetime NOT NULL,
  `details` text NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `priority`, `status`, `created_at`, `details`, `updated_at`) VALUES
(1, 'test', 0, '1', '2015-09-24 00:00:00', '<p>testing</p>', NULL),
(2, 'sdsd', NULL, '1', '2019-09-08 05:14:45', '<p>sadsad<br></p>', '2019-09-08 05:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `large_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `identifier` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT 'I',
  `video_url` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `large_image`, `parent_id`, `status`, `created_at`, `updated_at`, `identifier`, `video_url`) VALUES
(1, 'rerewr', NULL, NULL, 1, '1', '2019-09-08 09:18:52', '2019-09-08 09:21:30', 'I', NULL),
(2, 'erew', 'gallery_1568308780.png', NULL, 1, '1', '2019-09-12 21:19:40', '2019-09-12 21:19:40', 'I', NULL),
(3, 'e', 'gallery_1577159415.png', NULL, 4, '1', '2019-12-23 22:20:16', '2019-12-23 22:20:16', 'gallery', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `fe_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quick_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_in_admin` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `show_in_fe` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '1',
  `query_string` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `need_sub_menu` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `category` enum('C','T','M','A') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `parent_id`, `status`, `fe_url`, `admin_url`, `icon`, `quick_icon`, `created_at`, `updated_at`, `show_in_admin`, `show_in_fe`, `priority`, `query_string`, `need_sub_menu`, `category`) VALUES
(1, 'Gallery Category', 0, '1', NULL, 'category', 'category.jpeg', NULL, '2018-11-26 23:05:46', '2018-11-26 23:05:46', '1', '0', 1, 'gallery', '0', 'M'),
(3, 'Downloads ', NULL, '1', NULL, 'downloads', 'downloads.png', NULL, NULL, NULL, '1', '0', 1, 'downloads', '0', 'C'),
(6, 'Banner', NULL, '1', NULL, 'banner', 'banner.png', NULL, NULL, NULL, '1', '0', 1, NULL, '0', 'C'),
(9, 'Content', NULL, '1', NULL, 'content', 'content.png', NULL, NULL, NULL, '1', '0', 1, NULL, '0', 'C'),
(10, 'News', NULL, '1', NULL, 'news', 'news.png', NULL, NULL, NULL, '1', '0', 1, NULL, '0', 'C'),
(11, 'Events', NULL, '1', NULL, 'event', 'career.jpeg', NULL, NULL, NULL, '1', '0', 1, 'event', '0', 'C'),
(12, 'Zone Events', NULL, '1', NULL, 'event', 'testimonial.png', NULL, NULL, NULL, '1', '0', 1, 'zoneevent', '0', 'C'),
(14, 'Gallery', NULL, '1', NULL, 'gallery', 'gallery.png', NULL, NULL, NULL, '1', '0', 1, 'gallery', '0', 'C'),
(15, 'Programe', NULL, '1', 'enquiry', 'programe', NULL, NULL, NULL, NULL, '1', '0', 1, NULL, '0', 'C'),
(16, 'National Governing Board', 0, '1', NULL, 'team', NULL, NULL, NULL, NULL, '0', '0', 1, 'national-governing-board', '1', 'T'),
(17, 'National Executive Committee', 16, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'national-executive-committee', '0', 'T'),
(18, 'Natioan Directors', 16, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'natioan-directors', '0', 'T'),
(19, 'Zone Presidents', 16, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'zone-presidents', '0', 'T'),
(20, 'National Appointees', 0, '1', NULL, 'team', NULL, NULL, NULL, NULL, '0', '0', 1, 'national-appointees', '0', 'T'),
(21, 'Committee', 20, '1', NULL, 'team', NULL, NULL, NULL, NULL, '0', '0', 1, 'committee', '0', 'T'),
(22, 'NOM Co-ordinate', 20, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'nom-co-ordinate', '0', 'T'),
(23, 'JCI India Foundation', 21, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'jci-india-foundation', '0', 'T'),
(24, 'Administrative Committee', 21, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'administrative-committee', '0', 'T'),
(25, 'Finance Committee', 21, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'finance-committee', '0', 'T'),
(26, 'Challenge Editorial Board', 21, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'challenge-editorial-board', '0', 'T'),
(27, 'National Head Quarter', 0, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'national-head-quarter', '0', 'T'),
(28, 'Zone Governing Board', 0, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'zone-governing-board', '0', 'T'),
(29, 'Past National Presidents', 0, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'past-national-presidents', '0', 'T'),
(30, 'International Corner', 0, '1', NULL, 'team', NULL, NULL, NULL, NULL, '1', '0', 1, 'international-corner', '0', 'T'),
(31, 'Admin User', 0, '1', NULL, 'adminuser', 'category.jpeg', NULL, '2018-11-26 17:35:46', '2018-11-26 17:35:46', '1', '0', 1, NULL, '0', 'M'),
(32, 'Download Category', 0, '1', NULL, 'category', 'category.jpeg', NULL, '2018-11-26 17:35:46', '2018-11-26 17:35:46', '1', '0', 1, 'downloads', '0', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_categories_table', 1),
(2, '2018_11_07_141037_create_gallery_table', 1),
(3, '2020_11_05_000000_create_menu_table', 1),
(4, '2020_11_05_000000_create_product_table', 1),
(5, '2020_11_05_000000_create_admin_table', 2),
(6, '2014_10_12_000000_create_brands_table', 3),
(7, '2018_11_05_000000_create_bannerPositions_table', 3),
(8, '2018_11_05_000000_create_banners_table', 3),
(9, '2018_11_05_000000_create_contentPositionRelation_table', 3),
(10, '2018_11_05_000000_create_contentPosition_table', 3),
(11, '2018_11_06_083232_create_enquiry_table', 3),
(12, '2020_11_05_000000_create_content_table', 3),
(13, '2014_10_12_000000_create_featuredProducts_table', 4),
(14, '2014_10_12_000000_create_offerProducts_table', 4),
(15, '2018_11_06_083232_create_productGallery_table', 5),
(16, '2014_10_12_000000_create_popularProducts_table', 6),
(17, '2014_10_12_000000_create_orderDetails_table', 7),
(18, '2014_10_12_000000_create_orders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `details` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `featured` enum('1','0') NOT NULL DEFAULT '0',
  `image` varchar(222) DEFAULT NULL,
  `identifier` varchar(100) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `slug_url` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `priority`, `status`, `details`, `created_at`, `updated_at`, `featured`, `image`, `identifier`, `zone_id`, `slug_url`) VALUES
(1, 'test', 0, '1', '<p>testing</p>', NULL, NULL, '0', NULL, NULL, NULL, NULL),
(2, 'd', NULL, '1', '<p>fdfsdf<br></p>', '2019-09-08 05:09:44', '2019-12-24 03:33:27', '0', NULL, NULL, 3, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `programes`
--

CREATE TABLE `programes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `details` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `featured` enum('1','0') NOT NULL DEFAULT '0',
  `zone_id` int(11) DEFAULT NULL,
  `slug_url` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programes`
--

INSERT INTO `programes` (`id`, `title`, `priority`, `status`, `details`, `created_at`, `updated_at`, `featured`, `zone_id`, `slug_url`) VALUES
(1, 'test', 0, '1', '<p>testing</p>', NULL, NULL, '0', NULL, NULL),
(2, 'd', NULL, '1', '<p>fdfsdf<br></p>', '2019-09-08 05:09:44', '2019-12-24 03:37:50', '0', 3, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `image` varchar(222) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `identifier` varchar(50) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `title`, `designation_id`, `image`, `year`, `priority`, `status`, `created_at`, `updated_at`, `identifier`, `zone_id`) VALUES
(1, 'test', NULL, NULL, NULL, 0, '1', '2015-09-24 00:00:00', NULL, '0', NULL),
(2, 'sdsd', NULL, NULL, NULL, NULL, '1', '2019-09-08 05:14:45', '2019-09-08 05:14:45', '0', NULL),
(4, '2', NULL, NULL, 2019, NULL, '1', '2019-12-19 06:41:58', '2019-12-19 06:42:06', NULL, NULL),
(7, '1', 1, NULL, 2019, NULL, '1', '2019-12-19 07:22:04', '2019-12-19 07:46:05', 'national-governing-board', 1),
(8, '2', NULL, NULL, NULL, NULL, '1', '2019-12-19 07:46:21', '2019-12-19 07:46:21', 'national-governing-board', NULL),
(9, 'natioan-directors', NULL, NULL, NULL, NULL, '1', '2019-12-19 09:58:44', '2019-12-19 09:58:44', 'natioan-directors', NULL),
(10, 'zone-presidents', NULL, NULL, NULL, NULL, '1', '2019-12-19 09:58:56', '2019-12-19 09:58:56', 'zone-presidents', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` datetime NOT NULL,
  `details` text NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `priority`, `status`, `created_at`, `details`, `updated_at`) VALUES
(1, 'test', 0, '1', '2015-09-24 00:00:00', '<p>testing</p>', NULL),
(2, 'sdsd', NULL, '1', '2019-09-08 05:14:45', '<p>sadsad<br></p>', '2019-09-08 05:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'manojvijayanaluva@gmail.com', 'manoj', 'vijayan', '$2y$10$mgBzY/PReH5d2wiT26BH8O8AxUvVfOgmp5Dkv.ORp6f5DZk1n2N6C', '1', '2019-03-03 06:18:40', '2019-03-03 06:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` enum('A','Z') COLLATE utf8mb4_unicode_ci DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `title`, `priority`, `status`, `created_at`, `updated_at`, `level`) VALUES
(1, 'Admin', NULL, '1', '2019-09-03 04:51:19', '2019-09-03 04:51:19', 'A'),
(2, 'User', NULL, '1', '2019-09-03 04:52:23', '2019-09-03 04:52:32', 'Z');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `title`, `parent_id`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, NULL, '1', '2019-09-03 04:51:19', '2019-09-03 04:51:19'),
(2, '3', NULL, NULL, '1', '2019-09-03 04:52:23', '2019-09-03 04:52:32'),
(3, 'Category1', NULL, NULL, '1', '2019-09-08 08:15:09', '2019-09-08 08:15:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_positions`
--
ALTER TABLE `banner_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_positions`
--
ALTER TABLE `content_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_position_relations`
--
ALTER TABLE `content_position_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programes`
--
ALTER TABLE `programes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `banner_positions`
--
ALTER TABLE `banner_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `content_positions`
--
ALTER TABLE `content_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `content_position_relations`
--
ALTER TABLE `content_position_relations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `programes`
--
ALTER TABLE `programes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
