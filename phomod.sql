

CREATE TABLE `freelancers` (
  `ID` int(11) NOT NULL,
  `FULL_NAME` varchar(70) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PROFILE_ID` varchar(50) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `WHATSAPP` varchar(20) NOT NULL,
  `WEBSITE` varchar(100) NOT NULL,
  `INSTAGRAM` varchar(100) NOT NULL,
  `EMAIL` varchar(45) DEFAULT NULL,
  `REGION` varchar(35) DEFAULT NULL,
  `CITY` varchar(35) DEFAULT NULL,
  `LANCER_TYPE` varchar(25) DEFAULT NULL,
  `COMPANY_NAME` varchar(50) DEFAULT NULL,
  `WORKING_DAYS` varchar(20) NOT NULL,
  `CATEGORY` varchar(100) DEFAULT NULL,
  `TRAVEL` varchar(10) DEFAULT NULL,
  `VERIFIED` varchar(3) DEFAULT NULL,
  `RATING` int(10) DEFAULT NULL,
  `FEATURED` varchar(3) DEFAULT NULL,
  `DESCRIPTION` varchar(1000) DEFAULT NULL,
  `PWD` varchar(255) NOT NULL,
  `RESET_PWD` int(11) NOT NULL,
  `DATE_CREATED` varchar(15) NOT NULL,
  `TIME_CREATED` varchar(15) NOT NULL,
  `DATE_VERIFIED` varchar(15) NOT NULL,
  `TIME_VERIFIED` varchar(15) NOT NULL
) 

INSERT INTO `freelancers` (`ID`, `FULL_NAME`, `USERNAME`, `PROFILE_ID`, `PHONE`, `WHATSAPP`, `WEBSITE`, `INSTAGRAM`, `EMAIL`, `REGION`, `CITY`, `LANCER_TYPE`, `COMPANY_NAME`, `WORKING_DAYS`, `CATEGORY`, `TRAVEL`, `VERIFIED`, `RATING`, `FEATURED`, `DESCRIPTION`, `PWD`, `RESET_PWD`, `DATE_CREATED`, `TIME_CREATED`, `DATE_VERIFIED`, `TIME_VERIFIED`) VALUES
(1, 'kwame opoku appiah', 'otherside', 'profile-1', '0241565659', '0547569644', 'www.other-studios.com', 'www.instagram.com/otherside', 'appiah@gmail.com', 'upper west', 'kumasi', 'model', 'O - SIDE STUDIOS', 'Mon - Sun', 'Wedding,Portrait', 'NO', 'YES', 900, 'YES', 'I am a very good photographer', 'kwame', 0, '', '', '', ''),
(2, 'Samuel Baffoe', 'tender', 'profile-2', '0241565659', '', '', '', 'tender@gmail.com', 'Upper East', 'Kumasi', 'model', 'Tender Photography', 'Mon - Sun', 'Model,events,graduation, Wedding', 'YES', 'YES', 100, 'YES', NULL, '$2y$10$XVEzpQg77b1nLfULC8Xh6OqGjpCU0vDRKkwOdZuOSbsD9RhJZvlpC', 762339, '', '', '', ''),
(3, 'Emmanuel Adjabeng Appiah ', 'prof', 'profile-3', '0241565659', '', '', '', 'appiahkwame274@gmail.com', 'Northern', 'Kumasi', 'photographer', 'Prof', 'Mon - Sun', 'Wedding,portrait, Graduation', 'YES', 'YES', 230, 'NO', NULL, '$2y$10$ydQ559terJs.pJg27J/yCejFJpLT3NJglHAMbu/Rp3jhnqH6Mg11G', 274119, '', '', '', ''),
(4, 'oppong andrews', 'drew', 'profile-4', '0241565659', '', '', '', 'appiah@gmail.com', 'brong', 'accra', 'photographer', 'drew', '', 'Wedding,Portrait', 'YES', 'YES', 900, 'YES', 'I am a very good photographerI am a very good photographerI am a very good photographerI am a very good photographer', '', 0, '', '', '', ''),
(5, 'Owura Dwomoh', 'dwomoh', 'profile-5', '0241565666', '0277990988', 'www.ddstudios.com', 'www.instagram.com/owuradd', 'dwomoh@gmail.com', 'Ashanti', 'Offinso', 'photographer', 'Dwomoh Studioz', 'Mon - Sat', 'Street,model,events,wedding', 'YES', 'YES', 405, 'YES', NULL, '$2y$10$AVvUASpl/gl30xJ/OMvt/evKlQvMIiA.GvM/qRAV2IXXWf2eTG9JS', 0, '', '', '', ''),
(6, 'hanif issah', 'unruly', 'profile-6', '0241565659', '', '', '', 'appiah@gmail.com', 'brong east', 'tema', 'model', 'unruly', '', 'Wedding,Portrait', 'YES', 'YES', 230, 'YES', NULL, '', 0, '', '', '', ''),
(8, 'silas essel', 'papa', 'profile-7', '0241565659', '', '', '', 'appiah@gmail.com', 'ashanti', 'kumasi', 'model', 'papa', '', 'Wedding,Portrait', 'YES', 'YES', 900, 'YES', 'I am a very good photographer', '', 0, '', '', '', ''),
(9, 'asamoah joshua', 'fashion', 'profile-8', '0241565659', '', '', '', 'fashion@gmail.com', 'savannah', 'kumasi', 'model', 'fashion', '', 'Street,Model,Events,Street', 'YES', 'YES', 100, 'YES', NULL, '', 0, '', '', '', ''),
(10, 'kwabena benedict', 'kobby', 'profile-9', '0241565659', '', '', '', 'kwame274@gmail.com', 'greater accra', 'accra', 'photographer', 'kobby', '', 'Wedding,Portrait', 'YES', 'YES', 230, 'NO', NULL, '', 0, '', '', '', ''),
(11, 'adu collins', 'chemi', 'profile-10', '0241565659', '', '', '', 'appiah@gmail.com', 'eastern', 'accra', 'photographer', 'chemi', '', 'Wedding,Portrait', 'NO', 'YES', 900, 'YES', 'I am a very good photographer', '', 0, '', '', '', ''),
(12, 'prince love', 'peeL', 'profile-11', '0241565659', '', '', '', 'peel@gmail.com', 'western', 'accra', 'photographer', 'peeL', '', 'Street,Model,Events,Street', 'YES', 'YES', 100, 'NO', NULL, '', 0, '', '', '', ''),
(13, 'YTL', 'ytl', 'profile-12', '0241565659', '', '', '', 'appiahkk274@gmail.com', 'central', 'tema', 'model', 'ytl', '', 'Wedding,Portrait', 'NO', 'YES', 230, 'YES', NULL, '', 0, '', '', '', ''),
(15, 'hi', 'othersiderr', 'profile-13', '0241564456', '', '', '', 'dwomoher@gmail.com', 'hi', 'hi', 'Photographer', 'hi', 'hi', 'hi', 'NO', 'NO', 8, 'NO', NULL, 'hi', 0, '', '', '', ''),
(16, 'Sampson Osei', 'samposa', 'profile-14', '0245669932', '0241566548', 'www.samphotograph.com', 'www.instagram.com/sampso', 'samposer@gmail.com', 'Ashanti', 'Abuakwa', 'Photographer', 'Sampo Photography', 'Mon - Sat', 'Wedding, Outdooring, Portrait, Graduation', 'NO', 'YES', 10, 'NO', NULL, 'mypass', 0, '', '', '', ''),
(17, 'Kwame Opoku Appiah ', 'quame', 'profile-15', ' 024157752', '0547042326', 'www.quamephot.com', 'www.instagram.com/quame', 'appiahkk@gmail.com', 'Ashanti', 'Kwadaso', 'Photographer', 'Quame Photo Studios', 'Mon - Fri', 'Portrait, Model', 'NO', 'NO', 5, 'NO', NULL, 'hi', 0, '', '', '', ''),
(18, 'Kwame Opoku Appiah ', 'quamerr', 'profile-16', ' 024157751', '0547042326', 'www.quamephot.com', 'www.instagram.com/quame', 'appiahdkk@gmail.com', 'Ashanti', 'Kwadaso', 'Photographer', 'Quame Photo Studios', 'Mon - Fri', 'Portrait, Model', 'NO', 'NO', 50, 'NO', NULL, 'hi', 0, '', '', '', ''),
(20, 'Samuel Baffoe', 'Tende', 'profile-18', '0546589655', '0547042324', 'www.quamephot.com', 'www.instagram.com/quame', 'tenderr@gmail.com', 'Ashanti', 'Adum', 'Photographer', 'Tender Studios', 'Mon - Sun', 'Portrait, Wedding, Graduation', 'NO', 'NO', 200, 'NO', NULL, 'hi', 0, '', '', '', ''),
(21, 'Hi', 'Tenderrr', 'profile-19', '0214563258', '', '', '', 'appiarrh@gmail.com', 'Hi', 'I', 'Photographer', 'Hi', 'Hi', 'Hi', 'NO', 'YES', 100, 'YES', NULL, 'hi', 0, '', '', '', ''),
(22, 'Emmanuel Boateng', 'Emma', 'profile-20', '0244563215', '0541223326', 'www.emmaphotos.com', 'www.instagram.com/emma', 'emmmaboat12@gmail.com', 'Ashanti', 'Kwadaso', 'Photographer', 'Emma Studios', 'Mon - Sat', 'Wedding, Engagement, Graduation', 'NO', 'YES', 500, 'YES', NULL, 'hello', 0, '', '', '', ''),
(23, 'Andrew Oppong', 'lucci', 'profile-21', '0241523672', '', '', '', 'luccidrew@gmail.com', 'Ashanti', 'Fiapre', 'Photographer', 'Phomod', 'Mon - Sat', 'Wedding,Graduation', 'YES', 'YES', 17, 'YES', NULL, 'asdfg123', 0, '', '', '', ''),
(24, 'Kwame Opoku Appiah', 'othersider', 'profile-22', '0241565659', '', '', '', 'dwomoh15@gmail.com', 'Ashanti ', 'Kumasi', 'Photographer', '', 'Mon - Fri ', 'Wedding', 'NO', 'YES', 5, 'YES', NULL, 'hi', 0, '', '', '', ''),
(25, 'Kwame Opoku Appiah', 'newuser', 'profile-23', '020456987', '', '', '', 'newuser@gmail.com', 'Accra', 'Kumasi', 'Photographer', '', 'Mon - Fri', 'Wedding', 'NO', 'NO', NULL, NULL, NULL, '$2y$10$mnDwXEK/OIJSn9gRuyQOyOFrOEu500IUtxA35amsvHnaNKl.mdkyS', 0, '', '', '', ''),
(26, 'Kodom Gyasi Jehoshaphat', 'kgee', 'profile-24', '0245236589', '', '', '', 'kgee@gmail.com', 'Brong ', 'Sunyani', 'Photographer', 'Kgee Studios', 'Mon - Sun', 'Wedding,matriculation,graduation', 'YES', 'YES', 302, 'NO', NULL, '$2y$10$cCKj0wqgXzB.mtaxiHdFx.UWfglV/3jEGfCUaLgjoVO1RGueCEBMK', 0, '', '', '', ''),
(27, 'Afum Mensah Bismark', 'drake', 'profile-25', '0245163254', '0200000000', 'www.afum.com', 'www.instagram.com/ghdrake', 'afum@gmail.com', 'Ashanti', 'Kumasi', 'Photographer', '', 'Mon - Sat', 'Wedding', 'NO', 'NO', NULL, NULL, NULL, '$2y$10$1/de2zqQCCEH7NSsGQMeXeLehKO4.e1v/rjgdAiRYyQF.fdXBtm/C', 0, '', '', '', ''),
(28, 'Baffoe Kwarteng Samuel', 'friedten', 'profile-26', '0245152369', '', '', '', 'sammy@gmail.com', 'Ashanti', 'Kumasi', 'Photographer', '', 'Mon - Sun', 'Wedding', 'NO', 'NO', 12000, NULL, NULL, '$2y$10$7NjkI2H914eamfGET5LqrOROyGFMvXIswvWmqk7d0tVWu9Pcm3UdK', 0, '', '', '', ''),
(29, 'John Jarben', 'johnny', 'profile-27', '540245678', '0244788667', 'www.johnny-shot.com', '@johnnyj', 'johnjj@gmail.com', 'Ashanti', 'Abuakwa', 'Photographer', 'Jj Studios', 'Mon - Sat', 'Wedding', 'NO', 'YES', NULL, NULL, NULL, '$2y$10$KY5TBdDJoLbHAtPbRbs/LuNLFLmspJcUpSbcohvwBeOJKBhba0Mom', 0, '', '', '', ''),
(30, 'Osei Adjei', 'ooadj', 'profile-28', '0245332323', '0553263258', '', '', 'oseiadj@gmail.com', 'Western', 'Sefwi', 'Photographer', 'Odd Photography', 'Mon - Sun', 'Wedding', 'NO', 'YES', NULL, 'NO', NULL, '$2y$10$00689XJQieoYzgpXjz4D1Ogage4cqm5ndWwSuEgTaY78Uc5w1CGPO', 0, '', '', '', ''),
(31, 'Selector', 'selector', 'profile-29', '54548488787', '', '', '', 'selector@gmail.com', 'Selector', 'Selector', 'Photographer', '', 'Mon - Sat', 'Wedding', 'NO', 'NO', NULL, NULL, NULL, '$2y$10$wbAev5GEQ2FgQBSwZq9zZ.wNxc/7kdzKObvGa0hYCBZjAJYjfuCpy', 0, '', '', '', ''),
(36, 'Gertrude Agyemang', 'getty', 'profile-30', '0283872735', '', '', '', 'getty@gmail.com', 'Ashanti', 'Abuakwa', 'Model', 'Gertrude Beauties', 'Mon - Fri', 'Photography,modelling', 'YES', 'YES', 12000, 'YES', NULL, '$2y$10$ou6KHt1MHrRJ/2Oyc5guNud79CfgDkwSjCPNpnLjVZmGVymQ.Bjtq', 0, '', '', '', ''),
(37, 'New User', 'newuser1', 'profile-31', '0254521454', '', '', '', 'newuser1@gmail.com', 'Ashanti', 'Abuakwa', 'Photographer', '', 'Mon - Sun', 'Photography', 'YES', 'NO', NULL, NULL, NULL, '$2y$10$Uq.8tYNYDtFlL6EMNqkNdepXuxlLlUdikQeDDZdJqmtQKpEsufRhK', 0, '', '', '', '');


CREATE TABLE `gallery` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `IMG_SRC` varchar(100) NOT NULL
) 

INSERT INTO `gallery` (`ID`, `USERNAME`, `IMG_SRC`) VALUES
(1, 'otherside', '5ee39cd93f0a2.jpg'),
(2, 'otherside', '5ee39cd94beb4.jpg'),
(3, 'otherside', '5ee39cd957f21.jpg'),
(4, 'otherside', '5ee39cd965818.jpg'),
(5, 'fashion', '5ee3a62f42e5a.jpg'),
(6, 'fashion', '5ee3a6c779f16.jpg'),
(7, 'fashion', '5ee3a6c79eb7a.jpg'),
(8, 'fashion', '5ee3a6c7aef21.jpg'),
(9, 'drew', '5ee3a8062dedb.jpg'),
(10, 'drew', '5ee3a8063b5d1.jpg'),
(11, 'drew', '5ee3a80644b7a.jpg'),
(12, 'drew', '5ee3a80650fab.jpg'),
(13, 'drew', '5ee3a8066690e.jpg'),
(14, 'fashion', '5ee3a837e9913.jpg'),
(15, 'fashion', '5ee3a9e30655b.jpg'),
(16, 'fashion', '5ee3a9f07ddcc.jpg'),
(17, 'fashion', '5ee3aa4417a6d.jpg'),
(19, 'chemi', '5ee3b0b01bd86.jpg'),
(20, 'chemi', '5ee3b0b02d295.jpg'),
(21, 'chemi', '5ee3b0b04419e.jpg'),
(22, 'chemi', '5ee3b0b04d6e4.jpg'),
(23, 'chemi', '5ee3b0b059af2.jpg'),
(24, 'chemi', '5ee3b0b06056b.jpg'),
(25, 'chemi', '5ee3b0b069e95.jpg'),
(36, 'tender', '5ee406f581a37.jpg'),
(37, 'tender', '5ee406f58de2e.jpg'),
(38, 'tender', '5ee406f599e72.jpg'),
(40, 'tender', '5ee406f5bfa8d.jpg'),
(46, 'tender', '5ee406f612fed.jpg'),
(47, 'tender', '5ee406f61ca34.jpg'),
(48, 'tender', '5ee406f628a44.jpg'),
(51, 'tender', '5ee406f6426cc.jpg'),
(54, 'chemi', '5ee67cf50508f.jpg'),
(58, 'otherside', '5eea766a52a48.jpg'),
(64, 'lucci', '5ef6376bba41e.jpg'),
(65, 'lucci', '5ef6379607224.jpg'),
(66, 'lucci', '5ef63796286d7.jpg'),
(67, 'lucci', '5ef6379634710.jpg'),
(68, 'lucci', '5ef6379643690.jpg'),
(91, 'johnny', '5f0c2d1d18b63.jpg'),
(95, 'kgee', '5f3803fd4ca73.jpg'),
(97, 'tender', '5f3877d17ecdd.jpg'),
(98, 'tender', '5f3877df2463c.jpg'),
(103, 'tender', '5f39e2bf34ed2.jpg'),
(317, 'dwomoh', '5f4249f641a7b.jpg'),
(318, 'dwomoh', '5f4249f66a026.jpg'),
(319, 'dwomoh', '5f4249f69061e.jpg'),
(320, 'dwomoh', '5f4249f6ca020.jpg'),
(321, 'dwomoh', '5f4249f6dbc2e.jpg'),
(324, 'dwomoh', '5f4249f72670d.jpg'),
(325, 'dwomoh', '5f4249f7498aa.jpg'),
(326, 'dwomoh', '5f4249f75b08f.jpg'),
(327, 'dwomoh', '5f4249f777ee3.jpg'),
(330, 'dwomoh', '5f4249f7cf4c9.jpg'),
(331, 'dwomoh', '5f4249f7dfa11.jpg'),
(334, 'dwomoh', '5f4249f818a97.jpg'),
(336, 'dwomoh', '5f4249f83f1a3.jpg'),
(343, 'dwomoh', '5f4249f8b4b01.jpg'),
(344, 'dwomoh', '5f424c71364c9.jpg'),
(349, 'dwomoh', '5f424ed20a3ee.jpg'),
(350, 'dwomoh', '5f424ed21998a.jpg'),
(351, 'dwomoh', '5f424ed225efc.jpg'),
(352, 'dwomoh', '5f424f3f21ea1.jpg'),
(353, 'dwomoh', '5f424f3f64b25.jpg'),
(354, 'dwomoh', '5f424f3f9ec3b.jpg'),
(365, 'dwomoh', '5f4253e1bd7fe.jpg'),
(366, 'dwomoh', '5f4253e1dc440.jpg'),
(367, 'dwomoh', '5f4253e1e52ea.jpg'),
(465, 'getty', '5f50b3e23843d.jpg'),
(466, 'getty', '5f50b3e24831e.jpg'),
(467, 'getty', '5f50b3e25d7b1.jpg'),
(468, 'getty', '5f50b3e26e154.jpg'),
(469, 'getty', '5f50b3e2834b3.jpg'),
(470, 'getty', '5f50b3e293adc.jpg'),
(471, 'getty', '5f50b3e2ab856.jpg'),
(472, 'getty', '5f50b3e2bc39a.jpg'),
(474, 'getty', '5f50b3e2d5231.jpg'),
(475, 'getty', '5f50b3e2e6cc4.jpg'),
(476, 'getty', '5f50b3e300f5b.jpg'),
(477, 'getty', '5f50b3e31850b.jpg'),
(478, 'getty', '5f50b3e330300.jpg'),
(479, 'getty', '5f50b3e34e041.jpg'),
(480, 'getty', '5f50b3e35bbc2.jpg'),
(481, 'getty', '5f50b3e36e03c.jpg'),
(482, 'getty', '5f50b3e38bd07.jpg'),
(483, 'getty', '5f50b3e39d1a5.jpg'),
(484, 'getty', '5f50b3e3b3bd1.jpg'),
(485, 'getty', '5f50b3e3c78b8.jpg'),
(486, 'getty', '5f50b3e3dc4bf.jpg'),
(487, 'getty', '5f50b3e3f1c3c.jpg'),
(488, 'getty', '5f50b3e40ac6a.jpg'),
(489, 'getty', '5f50b3e41ec43.jpg'),
(490, 'getty', '5f50b3e434a00.jpg'),
(491, 'getty', '5f50b3e454f4b.jpg'),
(492, 'getty', '5f50b3e463afc.jpg'),
(493, 'getty', '5f50b3e470db8.jpg'),
(494, 'getty', '5f50b3e47be19.jpg'),
(495, 'getty', '5f50b3e483a61.jpg'),
(496, 'getty', '5f50b3e48eb13.jpg'),
(497, 'getty', '5f50b3e496751.jpg'),
(498, 'getty', '5f50b3e4a173c.jpg'),
(499, 'getty', '5f50b3e4a9653.jpg'),
(500, 'getty', '5f50b3e4b43a1.jpg'),
(501, 'getty', '5f50b3e4c1a2f.jpg'),
(502, 'getty', '5f50b3e4cfa5e.jpg'),
(503, 'getty', '5f50b3e4d97f1.jpg'),
(504, 'getty', '5f50b3e4e47d5.jpg'),
(505, 'getty', '5f50b3e4ec444.jpg'),
(506, 'getty', '5f50b3e5032f1.jpg'),
(507, 'getty', '5f50b3e50b003.jpg'),
(508, 'getty', '5f50b3e518adc.jpg'),
(509, 'getty', '5f50b3e5231fd.jpg'),
(510, 'getty', '5f50b3e52e10c.jpg'),
(511, 'getty', '5f50b3e53df29.jpg'),
(512, 'getty', '5f50b3f5a5046.jpg');


CREATE TABLE `individual` (
  `ID` int(11) NOT NULL,
  `USER_ID` varchar(50) NOT NULL,
  `PROFILE_ID` varchar(50) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PIC` varchar(100) NOT NULL
) 
INSERT INTO `individual` (`ID`, `USER_ID`, `PROFILE_ID`, `NAME`, `EMAIL`, `PIC`) VALUES
(1, '102476528003387089843', 'AndroidnPc5f5025b8ef8b1', 'Android n Pc', 'asareosei274@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GirTjwBjANwFaGCDqTK7ApkTxCF08n6UHmvonOS=s96-c'),
(2, '111552732836930630937', 'OthersideDrew5f50a70635d65', 'Otherside Drew', 'drewotherside@gmail.com', 'https://lh6.googleusercontent.com/-X3N9IcShcCQ/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclmFfwmkkgQdH_1dtb60FQZ0');

CREATE TABLE `profile_pic` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `IMG_SRC` varchar(100) NOT NULL,
  `COVER` varchar(100) NOT NULL
) 

INSERT INTO `profile_pic` (`ID`, `USERNAME`, `IMG_SRC`, `COVER`) VALUES
(17, 'otherside', 'otherside.jpg', 'ucotherside.jpg'),
(18, 'tender', 'tender.jpg', 'uctender.jpg'),
(19, 'prof', '', 'ucprof.jpg'),
(20, 'drew', 'drew.jpg', 'ucdrew.jpg'),
(21, 'dwomoh', 'dwomoh.jpg', 'ucdwomoh.jpg'),
(22, 'unruly', 'unruly.jpg', 'ucunruly.jpg'),
(23, 'papa', 'papa.jpg', 'ucpapa.jpg'),
(24, 'fashion', 'fashion.jpg', 'ucfashion.jpg'),
(25, 'kobby', 'kobby.jpg', 'uckobby.jpg'),
(26, 'chemi', 'chemi.jpg', 'ucchemi.jpg'),
(27, 'peeL', 'peeL.jpg', 'ucpeeL.jpg'),
(28, 'ytl', 'ytl.jpg', 'ucytl.jpg'),
(29, 'Tende', 'Tende.jpg', ''),
(30, 'Tenderrr', 'tenderrr.jpg', ''),
(31, 'Emma', 'Emma.jpg', ''),
(32, 'lucci', 'lucci.jpg', 'uclucci.jpg'),
(33, 'othersider', 'othersider.jpeg', ''),
(34, 'newuser', 'newuser.jpg', ''),
(35, 'kgee', 'kgee.jpg', ''),
(36, 'drake', 'drake.jpg', ''),
(37, 'friedten', 'friedten.jpg', ''),
(38, 'johnny', 'johnny.jpg', ''),
(39, 'ooadj', 'ooadj.jpg', ''),
(41, 'selector', 'selector.jpg', ''),
(42, 'magetad', 'magetad.jpg', ''),
(43, 'magetad', 'magetad.jpg', ''),
(44, 'magetad', 'magetad.jpg', ''),
(45, 'getty', 'getty.jpg', 'ucgetty.jpg'),
(48, 'newuser1', 'newuser1.jpg', '');

ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `individual`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `profile_pic`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `freelancers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

ALTER TABLE `gallery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;

ALTER TABLE `individual`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `profile_pic`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

