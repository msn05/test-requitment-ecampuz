-- Table 

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `mhs_name` varchar(225) NOT NULL,
  `mhs_nim` int(11) NOT NULL,
  `mhs_angkatan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `mhs_name`, `mhs_nim`, `mhs_angkatan`) VALUES
(1, 'a', 1234, 2019),
(2, 'b', 4231, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa_nilai`
--

CREATE TABLE `tb_mahasiswa_nilai` (
  `mhs_nilai_id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL,
  `mk_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa_nilai`
--

INSERT INTO `tb_mahasiswa_nilai` (`mhs_nilai_id`, `mhs_id`, `mk_id`, `nilai`) VALUES
(1, 1, 1, 80),
(2, 2, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_matakuliah`
--

CREATE TABLE `tb_matakuliah` (
  `id` int(11) NOT NULL,
  `mk_kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`id`, `mk_kode`) VALUES
(1, 'MK303'),
(2, 'MK201');

-- SELECT max join dasar on pivot
SELECT m.mhs_name, m.mhs_nim, max(mn.nilai) 
  FROM tb_mahasiswa_nilai as mn 
  LEFT JOIN tb_matakuliah as mk on mk.id = mn.mk_id 
  LEFT JOIN tb_mahasiswa as m on m.id = mn.mhs_id 
where mk.mk_kode = "MK303";