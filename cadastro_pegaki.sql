SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegaki`
--

-- --------------------------------------------------------

--
-- Table structure for table `estabelecimentos`
--

CREATE TABLE ESTABELECIMENTOS
(
estabelecimento_id int(11) not null auto_increment,
nomefantasia varchar(255) not null,
rua varchar(255),
bairro varchar(255),
cidade varchar(100),
uf varchar(2),
cep varchar(10),

PRIMARY KEY (estabelecimento_id)
)