-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2026 at 06:19 AM
-- Server version: 11.8.9-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET FOREIGN_KEY_CHECKS = 0;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u171790771_shristiyam`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) NOT NULL DEFAULT 'Admin',
  `author_role` varchar(255) DEFAULT NULL,
  `read_time` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` timestamp NULL DEFAULT NULL,
  `views_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `slug`, `excerpt`, `content`, `image`, `author_name`, `author_role`, `read_time`, `is_featured`, `is_published`, `published_at`, `views_count`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Navigating New EPR Mandates: A Strategic Roadmap for Enterprise FMCG Brands', 'navigating-new-epr-mandates-strategic-roadmap', 'How progressive enterprise brands are transitioning from compliance risk to value creation by integrating food-grade PCR resins and automated digital weighbridge audit ledgers.', '<p>As environmental governance tightens globally, corporate Extended Producer Responsibility (EPR) is undergoing a major evolution. Where brands previously viewed recycling quotas purely as a compliance cost center, market leaders are now leveraging closed-loop PCR supply chains to insulate themselves from virgin petrochemical price volatility.</p>\n\n<h2>The Shift to Immutable Digital Audit Trails</h2>\n<p>Historically, the informal waste sector lacked digital tracking, exposing brand owners to compliance discrepancies and greenwashing accusations. Today, decentralized material recovery facilities utilize cloud-connected weighbridges, NIR multi-spectral optical sorting, and GPS geo-tagging at every handover point.</p>\n\n<blockquote>\n\"Circularity is no longer just about diverting tons from landfills; it is about guaranteeing purity, traceability, and verifiable carbon offset data that stands up to statutory audits.\"\n</blockquote>\n\n<h2>Three Core Directives for Enterprise Brands</h2>\n<p>To establish a resilient compliance framework for current and upcoming regulatory cycles, supply chain directors should focus on three foundational pillars:</p>\n\n<ul>\n<li><strong>Polymer Rationalization:</strong> Transitioning from unrecyclable multi-material pouches to mono-material polyethylene (PE) or polypropylene (PP) barrier films that can be readily re-extruded.</li>\n<li><strong>Minimum PCR Incorporation:</strong> Formulating rigid packaging lines to incorporate at least 25% to 50% food-grade rPET or blow-molding rHDPE without sacrificing drop-impact strength.</li>\n<li><strong>Direct Proactive Auditing:</strong> Establishing long-term off-take contracts with accredited Producer Responsibility Organisations that maintain real-time digital registries.</li>\n</ul>\n\n<h2>Looking Ahead: The Value of High-Purity Resins</h2>\n<p>With vacuum degassing and multi-stage alkaline washing, modern Post-Consumer Recycled resins meet stringent international food-contact safety thresholds. Forward-looking enterprises that integrate these materials early will secure premium tier quotas, lower ESG capital costs, and safeguard their global consumer trust.</p>', NULL, 'Alex Vance', 'Head of Sustainability & ESG', '2 Min Read', 1, 1, '2026-09-26 04:48:07', 4, 'Navigating New EPR Mandates: A Strategic Roadmap', 'How enterprise brands are transitioning from statutory compliance risk to value creation with food-grade PCR resins and digital weighbridge audit ledgers.', '2026-09-29 04:48:07', '2026-10-06 19:47:48'),
(2, 2, 'Overcoming Intrinsic Viscosity Loss in High-Performance rPET', 'overcoming-intrinsic-viscosity-loss-rpet', 'Exploring solid-state polycondensation (SSP) and vacuum degassing techniques that maintain structural clarity in recycled beverage bottles.', '<p>One of the persistent engineering hurdles in closing the loop on PET bottles is the thermal and hydrolytic degradation that occurs during mechanical reprocessing. In this technical deep-dive, we examine the reaction kinetics of solid-state polycondensation (SSP) and how precise vacuum degassing preserves IV levels above 0.80 dL/g for high-speed stretch blow molding.</p>\n<h2>Key Technical Findings</h2>\n<p>Through closed-loop vacuum decontamination and molecular chain rebuilding, rPET can match the mechanical rigidity, crystal haze tolerance, and stress-crack resistance of virgin resin.</p>', '/assets/images/blog-rpet-bottles.jpg', 'Dr. R. Ramanathan', 'Lead Polymer Scientist', '1 Min Read', 0, 1, '2026-09-24 04:48:07', 1, 'Overcoming Intrinsic Viscosity Loss in High-Performance rPET', 'Exploring solid-state polycondensation (SSP) and vacuum degassing techniques for rPET beverage bottles.', '2026-09-29 04:48:07', '2026-10-03 13:33:39'),
(3, 1, 'Understanding Category I vs. Category II Statutory Targets', 'understanding-category-i-vs-category-ii-statutory-targets', 'A breakdown of recycling quotas, verification obligations, and penalty mitigation across rigid and flexible polymer matrices.', '<p>State and national environmental guidelines delineate packaging polymers into distinct compliance categories. Understanding the operational differences between Category I (rigid plastic packaging) and Category II (flexible plastic packaging of single or multi-layer) is vital for setting procurement targets.</p>\n<h2>Compliance Benchmarks</h2>\n<p>Producers, Importers, and Brand Owners (PIBOs) must account for scrap generation, recycling efficiency ratios, and submit authenticated proof of end-of-life processing on regulatory portal systems.</p>', NULL, 'Priya Sharma', 'Regulatory Affairs Lead', '1 Min Read', 0, 1, '2026-09-19 04:48:07', 1, 'Understanding Category I vs Category II Targets', 'Statutory recycling targets, verification rules, and compliance guidance for rigid vs flexible polymers.', '2026-09-29 04:48:07', '2026-10-03 13:32:57'),
(4, 4, 'Why Automated GPS & QR Geo-tagging is Ending Greenwashing', 'automated-gps-qr-geotagging-ending-greenwashing', 'How immutable audit trails protect brand reputation by linking recycled pellets directly back to authenticated municipal sourcing coordinates.', '<p>Greenwashing scrutiny has made paper certificates obsolete. Enterprise purchasers demanding institutional credibility now require batch-level traceability that verifies the origin, collection timestamp, logistics carrier, and processing facility coordinates of every metric ton recycled.</p>\n<h2>Digital Chain of Custody</h2>\n<p>By connecting weighbridge optical recognition cameras and mobile app check-ins, circular supply chains achieve absolute transparency from ward-level scrap collectors to finished polymer pallets.</p>', '/assets/images/facility-mrf-sorting.jpg', 'Vikram Sethi', 'VP of Digital Systems', '1 Min Read', 0, 1, '2026-09-15 04:48:07', 2, 'Why Automated GPS & QR Geo-tagging Ends Greenwashing', 'How digital traceability and tamper-proof chain-of-custody ledgers protect brand reputation.', '2026-09-29 04:48:07', '2026-10-03 13:34:12'),
(5, 3, 'Blueprint for Decentralized Material Recovery Facilities (MRFs)', 'blueprint-decentralized-material-recovery-facilities-mrfs', 'Examining the capital economics and operational flow of 25 MT/day modular MRF hubs deployed in smart city clusters.', '<p>Centralized mega-landfills are ecologically unviable. Modular, decentralized Material Recovery Facilities located at municipal periphery hubs offer superior route economics, reduced transport emissions, and faster turnaround times for dry waste segregation.</p>\n<h2>Operational Economics</h2>\n<p>A 25 MT/day facility with automated balers and magnetic eddy-current separators recovers over 92% of recyclable dry fractions, providing immediate local feedstock to recycling processors.</p>', '/assets/images/service-mrf-plant.jpg', 'Karan Patel', 'Director of Infrastructure', '1 Min Read', 0, 1, '2026-09-09 04:48:07', 1, 'Blueprint for Decentralized Material Recovery Facilities', 'Operational design, capital outlay, and recovery efficiencies for 25 MT/day decentralized MRFs.', '2026-09-29 04:48:07', '2026-10-03 13:33:17'),
(6, 3, 'Integrating the Informal Sector: Direct Financial Inclusion Metrics', 'integrating-informal-sector-financial-inclusion-metrics', 'How formal digital banking, transparent piece rates, and health insurance drive measurable Social Return on Investment (SROI).', '<p>Over 80% of waste collection in emerging economies is powered by informal waste pickers. Elevating their livelihoods through formal identity registrations, direct bank deposit payments, and protective safety gear is both a moral imperative and an operational strength.</p>\n<h2>Measurable SROI Outcomes</h2>\n<p>Providing dignity and financial independence to frontline green workers boosts worker retention, stabilizes raw material volumes, and fulfills corporate ESG criteria under global sustainability standards.</p>', '/assets/images/service-csr-welfare.jpg', 'Sunita Rao', 'Head of Social Welfare & CSR', '1 Min Read', 0, 1, '2026-09-03 04:48:07', 1, 'Integrating the Informal Sector: Social Impact Metrics', 'Direct financial inclusion, fair piece rates, and social safety nets for frontline circular workforce.', '2026-09-29 04:48:07', '2026-10-03 13:34:03'),
(7, 2, 'Thermal Co-Processing of Multilayer Plastics in Cement Kilns', 'thermal-co-processing-multilayer-plastics-cement-kilns', 'Optimizing calorific value (>3,400 kcal/kg) and controlling chlorine content to safely replace fossil coal in heavy manufacturing.', '<p>Non-recyclable multi-layered plastics (MLP) present the greatest challenge for zero-waste initiatives. When mechanical recycling is unviable, engineered Refuse Derived Fuel (RDF) offers an environmentally sound alternative via high-temperature cement kiln co-processing.</p>\n<h2>Clean Combustion Dynamics</h2>\n<p>At kiln temperatures exceeding 1,400°C, combustible polymers undergo complete thermal mineralisation without forming dioxins or furans, substantially displacing fossil coal and lowering industrial net carbon emissions.</p>', '/assets/images/service-rdf-fuel.jpg', 'Dr. R. Ramanathan', 'Lead Polymer Scientist', '1 Min Read', 0, 1, '2026-08-28 04:48:07', 0, 'Thermal Co-Processing of Multilayer Plastics', 'Energy recovery, kiln co-processing parameters, and emissions monitoring for non-recyclable polymer fractions.', '2026-09-29 04:48:07', '2026-09-29 08:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `description`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'EPR Compliance', 'epr-compliance', 'Extended Producer Responsibility regulations, statutory compliance quotas, and audit guidelines.', 1, 1, '2026-09-29 04:48:07', '2026-09-29 04:48:07'),
(2, 'PCR Polymer Science', 'pcr-polymer-science', 'Technical formulation, viscosity optimization, and material testing of recycled resins.', 1, 2, '2026-09-29 04:48:07', '2026-09-29 04:48:07'),
(3, 'Zero-Waste & ESG', 'zero-waste-esg', 'Decentralized MRF operations, informal sector welfare, and corporate lifecycle sustainability.', 1, 3, '2026-09-29 04:48:07', '2026-09-29 04:48:07'),
(4, 'Digital Traceability', 'digital-traceability', 'Cloud weighbridge ledgers, QR geo-tagging, and immutable circular audit documentation.', 1, 4, '2026-09-29 04:48:07', '2026-09-29 04:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_logos`
--

DROP TABLE IF EXISTS `client_logos`;
CREATE TABLE `client_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_logos`
--

INSERT INTO `client_logos` (`id`, `name`, `logo_path`, `website_url`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Aura Beverages', '/assets/logos/logo-aura.png', NULL, 1, 1, '2026-10-01 23:02:11', '2026-10-01 23:02:11'),
(2, 'EcoPack Global', '/assets/logos/logo-ecopack.png', NULL, 2, 1, '2026-10-01 23:02:11', '2026-10-01 23:02:11'),
(3, 'Nexus Automotive', '/assets/logos/logo-nexus.png', NULL, 3, 1, '2026-10-01 23:02:11', '2026-10-01 23:02:11'),
(4, 'Solis Homecare', '/assets/logos/logo-solis.png', NULL, 4, 1, '2026-10-01 23:02:11', '2026-10-01 23:02:11'),
(5, 'Verdia Foods', '/assets/logos/logo-verdia.png', NULL, 5, 1, '2026-10-01 23:02:11', '2026-10-01 23:02:11'),
(6, 'Metro Smart Cities', '/assets/logos/logo-metro.png', NULL, 6, 1, '2026-10-01 23:02:11', '2026-10-01 23:02:11'),
(7, 'Apex Industrial', '/assets/logos/logo-apex.png', NULL, 7, 1, '2026-10-01 23:02:11', '2026-10-01 23:02:11'),
(8, 'TerraPak Resins', '/assets/logos/logo-terrapak.png', NULL, 8, 1, '2026-10-01 23:02:11', '2026-10-01 23:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `requirement` varchar(255) DEFAULT NULL,
  `projected_volume` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `resume_path` varchar(255) DEFAULT NULL,
  `source` varchar(255) NOT NULL DEFAULT 'contact_page',
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `admin_notes` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
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
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_size` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `user_id`, `filename`, `original_name`, `mime_type`, `file_type`, `file_size`, `path`, `created_at`, `updated_at`) VALUES
(6, 1, 'blog-rpet-bottles.jpg', 'blog-rpet-bottles.jpg', 'image/jpeg', 'image', 618876, 'media/blog-rpet-bottles.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(7, 1, 'extrusion-pelletizing-line.jpg', 'extrusion-pelletizing-line.jpg', 'image/jpeg', 'image', 829314, 'media/extrusion-pelletizing-line.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(8, 1, 'facility-mrf-sorting.jpg', 'facility-mrf-sorting.jpg', 'image/jpeg', 'image', 1029764, 'media/facility-mrf-sorting.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(9, 1, 'india-circular-map.jpg', 'india-circular-map.jpg', 'image/jpeg', 'image', 605290, 'media/india-circular-map.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(10, 1, 'india-mrf-facility.jpg', 'india-mrf-facility.jpg', 'image/jpeg', 'image', 953898, 'media/india-mrf-facility.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(11, 1, 'polymer-testing-lab.jpg', 'polymer-testing-lab.jpg', 'image/jpeg', 'image', 700168, 'media/polymer-testing-lab.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(12, 1, 'product-rhdpe-pellets.jpg', 'product-rhdpe-pellets.jpg', 'image/jpeg', 'image', 628266, 'media/product-rhdpe-pellets.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(13, 1, 'product-rldpe-film.jpg', 'product-rldpe-film.jpg', 'image/jpeg', 'image', 700168, 'media/product-rldpe-film.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(15, 1, 'product-rpp-copolymer.jpg', 'product-rpp-copolymer.jpg', 'image/jpeg', 'image', 829314, 'media/product-rpp-copolymer.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(16, 1, 'regional-network-map.jpg', 'regional-network-map.jpg', 'image/jpeg', 'image', 731281, 'media/regional-network-map.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(17, 1, 'service-csr-welfare.jpg', 'service-csr-welfare.jpg', 'image/jpeg', 'image', 750730, 'media/service-csr-welfare.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(18, 1, 'service-mrf-plant.jpg', 'service-mrf-plant.jpg', 'image/jpeg', 'image', 1064713, 'media/service-mrf-plant.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(19, 1, 'service-rdf-fuel.jpg', 'service-rdf-fuel.jpg', 'image/jpeg', 'image', 876883, 'media/service-rdf-fuel.jpg', '2026-09-29 09:46:28', '2026-09-29 09:46:28'),
(23, 1, 'shristiyam_logo.png', 'shristiyam_logo.png', 'image/png', 'image', 88319, 'media/shristiyam_logo.png', '2026-09-30 07:24:50', '2026-09-30 07:24:50'),
(24, 1, 'logo_1790773608_HGam0S.png', '1.jpg-removebg-preview.png', 'image/png', 'image', 71154, 'media/logo_1790773608_HGam0S.png', '2026-09-30 07:36:48', '2026-09-30 07:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_29_040830_add_profile_fields_to_users_table', 2),
(5, '2026_09_29_042109_create_media_table', 3),
(7, '2026_09_29_083853_create_enquiries_table', 4),
(8, '2026_09_29_093500_create_policies_table', 5),
(9, '2026_09_29_100000_create_blog_categories_table', 6),
(10, '2026_09_29_100001_create_blogs_table', 6),
(11, '2026_09_30_120000_create_settings_table', 7),
(12, '2026_10_02_100000_create_testimonials_table', 8),
(13, '2026_10_02_110000_create_client_logos_table', 9),
(14, '2026_11_04_000001_create_job_openings_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

DROP TABLE IF EXISTS `policies`;
CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `title`, `slug`, `content`, `meta_description`, `is_published`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', 'privacy-policy', '<h2>1. Introduction</h2>\n<p>Welcome to our website. We respect your privacy and are committed to protecting your personal data. This privacy policy informs you how we look after your personal data when you visit our website and tells you about your privacy rights and how the law protects you.</p>\n\n<h2>2. Information We Collect</h2>\n<p>We may collect, use, store, and transfer different kinds of personal data about you, including:</p>\n<ul>\n    <li><strong>Identity Data:</strong> First name, last name, and organization title.</li>\n    <li><strong>Contact Data:</strong> Email address, phone number, and mailing address.</li>\n    <li><strong>Technical Data:</strong> Internet protocol (IP) address, browser type and version, time zone setting, and operating system.</li>\n    <li><strong>Usage Data:</strong> Information about how you use our website, products, and services.</li>\n</ul>\n\n<h2>3. How We Use Your Information</h2>\n<p>We will only use your personal data when the law allows us to. Most commonly, we will use your personal data to:</p>\n<ul>\n    <li>Provide quotes, procurement information, and customer support.</li>\n    <li>Process contact inquiries, consultation bookings, and service requests.</li>\n    <li>Improve our website, communications, and customer relationships.</li>\n    <li>Comply with statutory and regulatory obligations.</li>\n</ul>\n\n<h2>4. Data Security</h2>\n<p>We have put in place appropriate security measures to prevent your personal data from being accidentally lost, used, altered, or accessed in an unauthorized way.</p>\n\n<h2>5. Contact Us</h2>\n<p>If you have any questions about this privacy policy or our data privacy practices, please contact us via our website contact page.</p>', 'Our privacy policy explains how we collect, use, and protect your information.', 1, 1, '2026-09-29 04:11:02', '2026-09-29 04:11:02'),
(2, 'Terms of Service', 'terms-of-service', '<h2>1. Agreement to Terms</h2>\n<p>By accessing or using our website, you agree to be bound by these Terms of Service. If you disagree with any part of the terms, you may not access our website or services.</p>\n\n<h2>2. Intellectual Property Rights</h2>\n<p>Unless otherwise stated, all intellectual property rights for all material on this website are owned by CircuFlow and its licensors. All intellectual property rights are reserved.</p>\n\n<h2>3. User Responsibilities</h2>\n<p>When using our website and submitting contact forms, you agree:</p>\n<ul>\n    <li>To provide accurate, current, and complete information.</li>\n    <li>Not to use the website for any unlawful purpose or prohibited activity.</li>\n    <li>Not to attempt unauthorized access to any portion or feature of the website.</li>\n</ul>\n\n<h2>4. Limitation of Liability</h2>\n<p>In no event shall CircuFlow, nor its directors, employees, or agents, be liable for any indirect, consequential, or special liability arising out of or in any way related to your use of this website.</p>\n\n<h2>5. Governing Law</h2>\n<p>These Terms shall be governed and construed in accordance with applicable statutory laws, without regard to its conflict of law provisions.</p>', 'Our terms of service outline the rules and regulations for using our website and services.', 1, 2, '2026-09-29 04:11:02', '2026-09-29 04:11:02'),
(3, 'Cookie Policy', 'cookie-policy', '<h2>1. What Are Cookies</h2>\n<p>Cookies are small text files that are placed on your computer or mobile device by websites that you visit. They are widely used to make websites work more efficiently and provide analytical information.</p>\n\n<h2>2. How We Use Cookies</h2>\n<p>We use cookies for a variety of reasons, including:</p>\n<ul>\n    <li><strong>Essential Cookies:</strong> Required for the operation of our website, including session authentication and security.</li>\n    <li><strong>Analytical / Performance Cookies:</strong> Allow us to recognize and count the number of visitors and see how visitors move around our site.</li>\n    <li><strong>Functionality Cookies:</strong> Used to recognize you when you return to our website to remember your preferences.</li>\n</ul>\n\n<h2>3. Managing Cookies</h2>\n<p>Most web browsers allow you to control cookies through their browser settings. You can choose to block or delete cookies at any time.</p>', 'Learn how our website uses cookies and tracking technologies to ensure the best browsing experience.', 1, 3, '2026-09-29 04:11:02', '2026-09-29 04:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1j1X6zyhkrBtsyPdZIva3DcPRZ3eDi131JX5xIdD', NULL, '2409:40c2:2d:9267:841a:fce5:de09:758e', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiakFIbjV2eDUyZFBKQ0kzc3Nod3BjemVkNVJPUzd3SFlVck9WZk1iMSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc2hyaXN0aXlhbS5ibHVlYmFzZXRlY2hub2xvZ2llcy5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1793696902),
('hHWX4z1aaVgmrIaK6CZ9KqywgrpBo9dL3KsTvGUj', NULL, '68.183.29.165', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVZSZmRhR3o1M2pmdkpWeGg5ZjY0bjlwTkI3bFZxcHJ0ZXhtRFRFYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc2hyaXN0aXlhbS5ibHVlYmFzZXRlY2hub2xvZ2llcy5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1793729392),
('Q8dHF69BCpCfHxVjToqdzFFyyartjuGwqULTNcmk', 1, '2409:40c2:2d:9267:912:eca5:4f3:1723', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjR1QzA3cXJEYVZQaXRpN0VQdjNhRHloamd4T09TRkVVSFJhR1g0NCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc2hyaXN0aXlhbS5ibHVlYmFzZXRlY2hub2xvZ2llcy5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1793698469),
('ScV64a71J2LQ6Kl5JNJy4PyCKxCoJenXds24b7NH', NULL, '2409:40c2:2e:a4d:acb5:9ad9:f076:4b56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXM0S1YwaFNoOUUzUVRQdGxaOVAxMDQ5clBJSTJnTjZ1d0c2dVZrbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vc2hyaXN0aXlhbS5ibHVlYmFzZXRlY2hub2xvZ2llcy5jb20vY2FyZWVycyI7czo1OiJyb3V0ZSI7czo3OiJjYXJlZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1793771385),
('Sl3bgajl0bfr29lceDpkojZJ54NfOtRqaSO82TBo', NULL, '2401:4900:1c7e:834c:e040:95cb:9082:c3b8', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.6.2 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXUxZHU1YUdYZEk3STJqZ2pqNnpSaFVreVJ5eWRhVEVWQUh1REJIaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc2hyaXN0aXlhbS5ibHVlYmFzZXRlY2hub2xvZ2llcy5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1793697077),
('tyd32LUqCKX3lby8NFh6BNTVNd5AitxfjSLX5Q3H', NULL, '2409:40c2:2d:9267:3d4b:31a5:17ba:6d36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU25uV1ducm9uMW4waHBzVVd4RUFLc1BZU3lUemNXQXhyYXFpRUFLWiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc2hyaXN0aXlhbS5ibHVlYmFzZXRlY2hub2xvZ2llcy5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1793699306),
('ycAv23K81L3YLLkQ6957rxxephTwZfxhX69rL88B', NULL, '2401:4900:1c45:f58:6441:b063:8938:100e', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.6.2 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzl4Z0RPdk1NUGNtdGtaT0o4S0ZvN1RHNDVzZmhKbkZhclVPSjdMQSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vc2hyaXN0aXlhbS5ibHVlYmFzZXRlY2hub2xvZ2llcy5jb20vYmxvZ3MiO3M6NToicm91dGUiO3M6NToiYmxvZ3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1793771664),
('zANYsl8Tl6uyHXc6oBLPZmEu3Npvil2ZxjhQDLAU', NULL, '2401:4900:1c7e:834c:e040:95cb:9082:c3b8', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.6.2 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2U2bjBIRDdPaXJxb2xoZG9VOE90MmxNWXpFakh6YkRjMTF4Wk5FcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vc2hyaXN0aXlhbS5ibHVlYmFzZXRlY2hub2xvZ2llcy5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1793697277);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'SHRISTIYAM', 'branding', 'text', '2026-09-30 07:19:01', '2026-09-30 07:36:48'),
(2, 'site_tagline', '', 'general', 'text', '2026-09-30 07:19:01', '2026-09-30 07:24:50'),
(3, 'site_logo', 'https://shristiyam.bluebasetechnologies.com/storage/media/logo_1790773608_HGam0S.png', 'branding', 'text', '2026-09-30 07:19:01', '2026-10-02 06:29:45'),
(4, 'site_favicon', NULL, 'branding', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(5, 'contact_email', 'admin@shristiyam.com', 'contact', 'text', '2026-09-30 07:19:01', '2026-09-30 08:24:45'),
(6, 'contact_phone', '7020784898 / 9112327953', 'contact', 'text', '2026-09-30 07:19:01', '2026-09-30 08:24:45'),
(7, 'contact_address', 'PL.NO.151, RAMDASPETH, NEAR TULI IMPERIAL HOTEL, Nagpur- 440010, Maharashtra', 'contact', 'textarea', '2026-09-30 07:19:01', '2026-09-30 08:24:45'),
(8, 'business_hours', 'Monday - Friday: 9:00 AM - 6:00 PM', 'contact', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(9, 'epr_desk_email', 'epr.compliance@shristiyam.com', 'contact', 'text', '2026-09-30 07:19:01', '2026-10-09 14:59:42'),
(10, 'polymer_sales_email', 'sales@circuflow-demo.com', 'contact', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(11, 'pro_badge', 'Statutory Registered PRO', 'regulatory', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(12, 'certifications', 'ISO 14001:2015, ISO 9001:2015, Ocean-Safe Certified', 'regulatory', 'textarea', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(13, 'timezone', 'Asia/Kolkata', 'localization', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(14, 'date_format', 'd M Y', 'localization', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(15, 'social_linkedin', 'https://linkedin.com/company/circuflow', 'social', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(16, 'social_twitter', 'https://twitter.com/circuflow', 'social', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(17, 'social_facebook', 'https://facebook.com/circuflow', 'social', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(18, 'social_youtube', 'https://youtube.com', 'social', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(19, 'meta_title', 'CircuFlow | Next-Gen Circular Economy & Waste Management Solutions', 'seo', 'text', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(20, 'meta_description', 'CircuFlow delivers high-grade PCR polymer resins, statutory EPR compliance, decentralized zero-waste municipal MRFs, and traceable circular supply chains.', 'seo', 'textarea', '2026-09-30 07:19:01', '2026-09-30 07:19:01'),
(21, 'copyright_text', '© 2026 SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED. All rights reserved.', 'seo', 'textarea', '2026-09-30 07:19:01', '2026-09-30 08:24:45'),
(22, 'company_legal_name', 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED', 'branding', 'text', '2026-09-30 08:24:45', '2026-09-30 08:24:45'),
(23, 'company_cin', 'U74900ME2026PTC473633', 'regulatory', 'text', '2026-09-30 08:24:45', '2026-09-30 08:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_title` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `author_avatar` varchar(255) DEFAULT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL DEFAULT 5,
  `badge` varchar(255) DEFAULT NULL,
  `quote` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `author_name`, `author_title`, `company`, `author_avatar`, `rating`, `badge`, `quote`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Jonathan Reyes', 'VP of Sustainable Packaging', 'Aura Global', '/assets/avatars/avatar-1.png', 5, '18,250 MT EPR Fulfilled', 'CircuFlow\'s food-grade rPET granules and digital weighbridge integration allowed us to exceed our statutory EPR quotas 3 months ahead of schedule with zero compliance discrepancy during state audits.', 1, 1, '2026-10-01 22:40:02', '2026-10-01 22:40:02'),
(2, 'Dr. Aris Thorne', 'Urban Infrastructure Commissioner', 'Metro Smart Cities', '/assets/avatars/avatar-2.png', 5, '89.4% Landfill Diversion', 'The decentralized Material Recovery Facility model deployed by CircuFlow transformed our municipal waste diversion rate from 42% to 89.4% while establishing formal digital banking and safety gear for 180+ local workers.', 1, 2, '2026-10-01 22:40:02', '2026-10-01 22:40:02'),
(3, 'Claire Dupont', 'Chief Materials Engineer', 'Nexus Automotive', '/assets/avatars/avatar-3.png', 5, '-68% Carbon Footprint', 'The melt flow index and structural drop-impact resilience of CircuFlow\'s rHDPE and rPP copolymer resins match virgin petrochemical polymers, helping us cut Scope 3 carbon emissions without sacrificing part quality.', 1, 3, '2026-10-01 22:40:02', '2026-10-01 22:40:02'),
(4, 'Vikram Sethi', 'Global Head of ESG & Sourcing', 'Solis Consumer', '/assets/avatars/avatar-4.png', 5, '100% Audit Verified', 'Every single consignment of PCR resin comes with verifiable batch origin data and tamper-proof portal compliance certificates. Our audit readiness and stakeholder trust have never been higher.', 1, 4, '2026-10-01 22:40:02', '2026-10-01 22:40:02'),
(5, 'Monica Alvarez', 'Procurement Director', 'Verdia Foods & Packaging', '/assets/avatars/avatar-5.png', 5, '99.4% Batch Purity', 'Replacing virgin polymer with CircuFlow\'s decontaminated rPET flakes in our blow-molding preforms resulted in zero line stoppages and flawless optical clarity across our bottling line.', 1, 5, '2026-10-01 22:40:02', '2026-10-01 22:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `job_openings`
--

DROP TABLE IF EXISTS `job_openings`;
CREATE TABLE `job_openings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL DEFAULT 'Nagpur / Pan-India',
  `employment_type` varchar(255) NOT NULL DEFAULT 'Full-Time',
  `experience` varchar(255) DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `icon_type` varchar(255) NOT NULL DEFAULT 'compliance',
  `badge_text` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_openings`
--

INSERT INTO `job_openings` (`id`, `title`, `slug`, `department`, `location`, `employment_type`, `experience`, `overview`, `description`, `icon_type`, `badge_text`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'EPR & Compliance Advisory', 'epr-compliance-advisory', 'EPR & Compliance Advisory', 'Nagpur HQ', 'Full-time', '2 - 5 Years', 'Auditing, CPCB portal quota allocation, PIBO target fulfillment, and statutory environmental returns filing.', NULL, 'shield', 'Full-time', 1, 1, '2026-11-04 10:00:00', '2026-11-04 10:00:00'),
(2, 'BioEnergy & Alternative Fuels', 'bioenergy-alternative-fuels', 'BioEnergy & Alternative Fuels', 'Plant Operations • Central India', 'Full-time', '3 - 7 Years', 'Processing agricultural and industrial solid waste into high-CV Refuse Derived Fuel (RDF) and industrial biomass pellets.', NULL, 'flame', 'Full-time', 1, 2, '2026-11-04 10:00:00', '2026-11-04 10:00:00'),
(3, 'Supply Chain & MRF Management', 'supply-chain-mrf-management', 'Supply Chain & Logistics', 'Regional Hubs • Field Operations', 'Full-time', '2 - 5 Years', 'Direct municipal material recovery facility (MRF) aggregation, waste-worker formalization, and fair pricing mechanisms.', NULL, 'truck', 'Full-time', 1, 3, '2026-11-04 10:00:00', '2026-11-04 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `job_title`, `bio`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yogesh', 'admin@admin.com', '+1 (555) 234-5678', 'Administrator', 'Senior administrator managing website operations and access.', '2026-09-29 04:18:54', '$2y$12$8bLSvbGWpJ62GZXuLW.BKOwEJQX83xHUbhkxMuBCB4NL62.Ke/eh6', 'R90qbXoEgDp9VwmMDaCVQzUv13Yfip3xDZMByKBgv7QZGRdaVvsbt6WJWUIw', '2026-09-28 04:06:39', '2026-09-30 00:05:15'),
(2, 'Sarah Connor', 'sarah.c@company.io', NULL, NULL, NULL, '2026-09-29 04:18:55', '$2y$12$oAuNJwM.xhXB6t2Dghc9AeEenCqy8b2IjarLQLdxM0Y625DbBBbTu', NULL, '2026-09-28 04:06:41', '2026-09-29 04:18:55'),
(3, 'Marcus Chen', 'marcus.chen@company.io', NULL, NULL, NULL, '2026-09-29 04:18:55', '$2y$12$O9xLGMYH1pj8ta0XRvv/MOQGnIKMAvgb5f93HuKTj5Vswh/4yZ/mC', NULL, '2026-09-28 04:06:41', '2026-09-29 04:18:55'),
(4, 'Elena Rostova', 'elena.r@company.io', NULL, NULL, NULL, '2026-09-29 04:18:55', '$2y$12$EIzpZU0YXYdZnOVi/iP0BuX.HKpLGqIlaLiBwp9Q9pj9myr7ZtVGm', NULL, '2026-09-28 04:06:41', '2026-09-29 04:18:55'),
(5, 'David Kim', 'david.kim@company.io', NULL, NULL, NULL, '2026-09-29 04:18:55', '$2y$12$I0R/PnqQckrehH5Jb81DfuSg2T5sQkh7VhJoYRADI/zcsKrr4UpiO', NULL, '2026-09-28 04:06:41', '2026-09-29 04:18:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `client_logos`
--
ALTER TABLE `client_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `job_openings`
--
ALTER TABLE `job_openings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_openings_slug_unique` (`slug`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `policies_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_logos`
--
ALTER TABLE `client_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_openings`
--
ALTER TABLE `job_openings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
SET FOREIGN_KEY_CHECKS = 1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
