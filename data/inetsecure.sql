--
-- Table structure for table `inetsecure`
--

CREATE TABLE `inetsecure` (
  `id` int(5) NOT NULL,
  `student` varchar(20) CHARACTER SET utf8 NOT NULL,
  `topic` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date_entered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Indexes for table `inetsecure`
--
ALTER TABLE `inetsecure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `inetsecure`
--
ALTER TABLE `inetsecure`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

