
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `addcourier` (
  `id` int(11) NOT NULL,
  `courier_id` varchar(255) NOT NULL,
  `docketNumber` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sname` varchar(55) NOT NULL,
  `smobile` varchar(55) NOT NULL,
  `semail` varchar(55) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `saddress` varchar(300) NOT NULL,
  `tofpkts` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `actualwt` varchar(20) NOT NULL,
  `courierdate` varchar(20) NOT NULL,
  `rname` varchar(55) NOT NULL,
  `rmobile` varchar(20) NOT NULL,
  `remail` varchar(55) NOT NULL,
  `raddress` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cost` int(11) NOT NULL,
  `nofpkts` int(11) NOT NULL,
  `chargewt` varchar(20) NOT NULL,
  `descri` varchar(200) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `addcourier` (`id`, `courier_id`, `docketNumber`, `sname`, `smobile`, `semail`, `saddress`, `tofpkts`, `actualwt`, `courierdate`, `rname`, `rmobile`, `remail`, `raddress`, `cost`, `nofpkts`, `chargewt`, `descri`, `added_date`, `image`) VALUES
(9, 'CO-759570', '487585', 'Avinash Singh', '8574857474', 'avinash@gmail.com', 'Manipur', 'Boxes', '5487', '2021-11-03', 'Animesh Verma', '9685748574', 'animesh@gmail.com', 'Chennai', 2600, 25, '26', 'added_date', 'Sun Nov 14, 2021 07:41:46 am', ''),
(10, 'CO-193312', '5487969', 'Ram Kumar Singh', '8574857474', 'ram@gmail.com', 'Dhanbad', 'Boxes', '2500', '2021-11-05', 'Animesh Verma', '9685748574', 'animesh@gmail.com', 'Raipur', 2600, 1500, '26', 'We are known for offering reliable Rail Cargo Services', 'Sun Nov 14, 2021 08:26:52 am', ''),
(11, 'CO-382487', '13548', 'Ramesh Singh', '9698574859', 'ramesh@gmail.com', 'Manipur', 'Boxes', '5487', '2021-06-08', 'Animesh Verma', '9685748574', 'animesh@gmail.com', 'Chennai', 2789, 100, '26', 'Our professionals make sure that the goods are safely delivered', 'Sun Nov 14, 2021 08:31:39 am', ''),
(15, 'CO-856400', '44558877', 'Avinash Singh', '9698574859', 'avinash@gmail.com', 'Nagaland', 'Fragile', '2500', '01/10/2021', 'Rajan Singh', '9454786782', 'rajan@gmail.com', 'Diphu', 2514, 250, '2500', 'We are known for offering reliable Rail Cargo Services', 'Sun Nov 14, 2021 17:03:31 pm', '0258_2003.jpg'),
(16, 'CO-606113', '11234578', '0258', '0258', 'a@gmail.com', '25879', 'Select', '25879', '265799', '265799', '265799', 'e@gmail.com', '254789', 254789, 254789, '2157', 'We are known for offering reliable Rail Cargo Services', 'Tue Nov 16, 2021 16:29:58 pm', '0258_8285.jpg');

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `random_user_id` varchar(255) NOT NULL,
  `USN_id` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `alternate_phone` varchar(255) NOT NULL,
  `present_address` varchar(500) NOT NULL,
  `present_state` varchar(255) NOT NULL,
  `present_pincode` varchar(255) NOT NULL,
  `permanent_address` varchar(500) NOT NULL,
  `permanent_state` varchar(255) NOT NULL,
  `permanent_pincode` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `admin_info` (`id`, `random_user_id`, `USN_id`, `dob`, `gender`, `alternate_phone`, `present_address`, `present_state`, `present_pincode`, `permanent_address`, `permanent_state`, `permanent_pincode`, `image`) VALUES
(9, 'EV-850120', 'avinash01', '20-01-1996', 'Male', '9696857485', 'Kashipur', 'Uttar Pradesh', '2558743', 'State Street', 'Goa', '277004', '1637367587_2321.jpg'),
(10, 'EV-873105', 'ramesh01', '20-01-1996', 'Male', '9696857485', 'Kashipur', 'Andhra Pradesh', '277001', 'Ramnagar', 'Andhra Pradesh', '200147', 'ramesh01_5356.png');


CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(220) NOT NULL,
  `USN` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin_login` (`id`, `Fullname`, `USN`, `mobile`, `PASSWORD`, `Email`, `Question`, `Answer`) VALUES
(3, 'Avinash Singh', 'avinash01', '9696858527', '111', 'avinashsingh4494@gmail.com', 'What is your fav dish?', 'chicken'),
(4, 'PRITI SINGH', 'avinash02', '9696858527', '11', 'avinashsingh4494@gmail.com', 'What is your fav dish?', 'chicken'),
(5, 'Ramesh Tiwari', 'ram02', '9696858527', '11', 'avinashsingh4494@gmail.com', 'What is your nickname?', 'ram'),
(6, 'Ramesh Verma', 'ramesh01', '9696858527', '111', 'avinashsingh4494@gmail.com', 'What is your fav dish?', 'chicken');



CREATE TABLE `apply_now_careers` (
  `id` int(11) NOT NULL,
  `career_id` varchar(255) NOT NULL,
  `job_id` varchar(300) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `exp` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `highestQualification` varchar(255) NOT NULL,
  `college` varchar(200) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `about` varchar(800) NOT NULL,
  `applied_time` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `apply_now_careers` (`id`, `career_id`, `job_id`, `fname`, `exp`, `contact`, `email`, `highestQualification`, `college`, `skills`, `about`, `applied_time`, `image`) VALUES
(10, 'AP-590671', 'JD-365621', 'Avinash Singh', '4 Yrs', '9698587485', 'avinashsingh4494@gmail.com', 'Graduate', 'Veltech University', 'Driver', 'We’re always looking for talented workers, creative directors', 'Tue Nov 23, 2021 08:11:16 am', 'AP-590671_Avinash Singh.pdf'),
(11, 'AP-413810', 'JD-387640', 'Rakesh Verma', '2 Yrs', '9698574859', 'rakeshverma@gmail.com', 'Intermediate', 'Assam Rifles School', 'Driver', 'We’re always looking for talented workers, creative directors', 'Tue Nov 23, 2021 08:15:33 am', 'AP-413810_Rakesh Verma.jpg');



CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `addressline1` varchar(300) NOT NULL,
  `addressline2` varchar(300) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `contacts` (`id`, `uid`, `name`, `contact`, `email`, `pan`, `aadhar`, `addressline1`, `addressline2`, `image`) VALUES
(1, 'Driver', 'PRITI SINGH', '9696746283', 'avinashvtu5952@gmail.com', '145478964885785858', '25253636', 'KAUSHLAYA VATIKA', 'C/o POONAM DEVI KASHIPUR NEW COLONY,NEAR KADAM CHAURAHA BALL', '1592410329_4701.jpg'),
(2, 'Driver', 'Avinash Singh', '9696746283', 'avi@gmail.com', '145478964885', '25253636258', 'c/o Avinash Singh,GARNET 14D,OPALINE ,CHENNAI', 'C/o POONAM DEVI KASHIPUR NEW COLONY,NEAR KADAM CHAURAHA BALL', '1592410524_7674.jpg');


CREATE TABLE `create_job` (
  `id` int(11) NOT NULL,
  `job_id` varchar(500) NOT NULL,
  `job_title` varchar(500) NOT NULL,
  `skills` varchar(500) NOT NULL,
  `job_location` varchar(500) NOT NULL,
  `timings` varchar(500) NOT NULL,
  `starts_on` varchar(500) NOT NULL,
  `ends_on` varchar(500) NOT NULL,
  `total_post` varchar(255) NOT NULL,
  `salary` varchar(500) NOT NULL,
  `requirments` varchar(500) NOT NULL,
  `education` varchar(500) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `speical_info` varchar(1000) NOT NULL,
  `role_resp` varchar(1000) NOT NULL,
  `published_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `create_job` (`id`, `job_id`, `job_title`, `skills`, `job_location`, `timings`, `starts_on`, `ends_on`, `total_post`, `salary`, `requirments`, `education`, `experience`, `speical_info`, `role_resp`, `published_on`) VALUES
(2, 'JD-365621', 'Java Web Developer', 'Skills with HTML, Javascript, Node.js, bootstrap, three.js, AWS , REST API, GraphQL, Docker, Kubernetes, Bluetooth beacons', 'Hyderabad,Bengaluru,Chennai', '24 x 7', '2021-11-23', '2021-12-23', '25', 'Not-disclosed', 'Build software that fulfills specific needs Skills with HTML, Javascript, Node.js, bootstrap, three.js, AWS , REST API, GraphQL, Docker, Kubernetes, Bluetooth beacons and positioning systems, Google maps Augmented reality and 3d modelling would be nice to have Find solutions to security threats, viruses, or errors that might hinder the performance of applications Carry out regular security and performance checks Remain current on technology trends to keep our software as innovative as possible S', 'Graduate Any', '1-4', 'Perks and Benefits are best in the industry, 100% work from home.', 'Build and maintain both web and mobile applications for our global client  Collaborate with the rest of the team to ensure applications align with the organizations goals, as well as customer needs Oversee the performance of applications to ensure theyre always running properly Improve our overall application development process and continuously find ways to advance our apps', '2021-11-23'),
(3, 'JD-387640', 'Driver', ' REST API, GraphQL, Docker, Kubernetes, Bluetooth', 'Haryana', '24 x 7', '2021-11-23', '2021-11-30', '10', '20,000.00 Rs', 'Build software that fulfills specific needs Skill errors that might hinder the performance of applications Carry out regular security and performance checks Remain current on technology trends to keep our software as innovative as possible Stay on track of the application lifecycle to ensure necessary updates are completed on time', 'Graduate Any', '1-4', 'Perks and Benefits are best in the industry, 100% work from home.', 'Collaborate with the rest of the team to ensure applications align with the organizations goals, as well as customer needs Oversee the performance of applications to ensure theyre always running properly Improve our overall application development process and continuously find ways to advance our apps', '23-11-2021');



CREATE TABLE `mobilenumber` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `quote_id` varchar(255) NOT NULL,
  `sender_names` varchar(30) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `sender_phone` varchar(20) NOT NULL,
  `sender_weight` varchar(20) NOT NULL,
  `sender_fstate` varchar(20) NOT NULL,
  `sender_tstate` varchar(20) NOT NULL,
  `sender_message` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sender_freight_type` varchar(255) NOT NULL,
  `sender_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `quote` (`id`, `quote_id`, `sender_names`, `sender_email`, `sender_phone`, `sender_weight`, `sender_fstate`, `sender_tstate`, `sender_message`, `sender_freight_type`, `sender_time`) VALUES
(64, 'QT-383752', 'Avinash Singh', 'avinashvtu5952@gmail.com', '96968585747', '500', 'Kerala', 'Haryana', ' I hereby allow Aaradhya Cargo Movers to store and save the information entered by me on this page and elsewhere on this website.', 'Railways Transportation', 'Sat Nov 13, 2021 17:42:56 pm'),
(65, 'QT-707159', 'Rakesh Singh', 'rakeshsingh@gmail.com', '9696857485', '200', 'Gujarat', 'Maharashtra', ' We’re always interested in new projects, big or small.\r\nSend us an email and we’ll get in touch shortly, or phone between 8:00 am and 7:00 pm Monday to Saturday.', 'Road Transportation', 'Thu Nov 25, 2021 01:45:19 am'),
(66, 'QT-730995', 'Rakesh Singh', 'rakeshsingh@gmail.com', '9696857485', '100', 'Madhya Pradesh', 'Manipur', 'We’re always interested in new projects, big or small.\r\nSend us an email and we’ll get in touch shortly, or phone between 8:00 am and 7:00 pm Monday to Saturday.', 'Railways Transportation', 'Thu Nov 25, 2021 01:47:49 am');


CREATE TABLE `usercoment` (
  `id` int(11) NOT NULL,
  `feedback_id` varchar(255) NOT NULL,
  `names` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cphone` varchar(20) NOT NULL,
  `ccoment` varchar(1000) NOT NULL,
  `cdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `usercoment` (`id`, `feedback_id`, `names`, `email`, `cphone`, `ccoment`, `cdate`) VALUES
(47, 'FE-699014', 'Avinash Singh', 'avinashsingh4494@gmail.com', '9698585748', ' If you have any questions about the services we provide\r\nsimply use the form below. We try and respond to all queries and comments within 24 hours.', 'Tue Nov 23, 2021 08:47:40 am'),
(48, 'FE-571584', 'Rakesh Verma', 'rakeshverma@gmail.com', '9698585778', ' If you have any questions about the services we provide\r\nsimply use the form below. We try and respond to all queries and comments within 24 hours.', 'Thu Nov 25, 2021 01:38:29 am');



CREATE TABLE `userlike` (
  `id` int(11) NOT NULL,
  `liked` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `userlike` (`id`, `liked`) VALUES
(5, '0'),
(6, ''),
(7, '');


ALTER TABLE `addcourier`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `apply_now_careers`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `create_job`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `mobilenumber`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `usercoment`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `userlike`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `addcourier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;


ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `apply_now_careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `create_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `mobilenumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;


ALTER TABLE `usercoment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;


ALTER TABLE `userlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

