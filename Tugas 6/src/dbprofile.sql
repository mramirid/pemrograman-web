CREATE TABLE `profile` (
	`no` INT NOT NULL AUTO_INCREMENT,
	`nama` varchar(100) DEFAULT NULL,
	`roles` varchar(100) DEFAULT NULL,
	`description` varchar(200) DEFAULT NULL,
	`educations` varchar(100) DEFAULT NULL,
	`skills` varchar(10) DEFAULT NULL,
	`portofolio` varchar(10) DEFAULT NULL,
	`phone` varchar(30) DEFAULT NULL,
	`email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `profile` (
	`nama`, 
	`roles`, 
	`description`, 
	`educations`, 
	`skills`, 
	`portofolio`, 
	`phone`, 
	`email`
) VALUES (
	'Amir Muhammad Hakim', 
	'Android Developer', 
	'Nama saya Amir', 
	'SDN Wonorejo 7,SMP Khadijah SBY,MAN SBY,UPNVJT', 
	'SHOW', 
	'HIDE', 
	'087855777360', 
	'amir.rhythm@gmail.com'
);

INSERT INTO `profile` (
	`nama`, 
	`roles`, 
	`description`, 
	`educations`, 
	`skills`, 
	`portofolio`, 
	`phone`, 
	`email`
) VALUES (
	'Fajar Andhika', 
	'Web Developer', 
	'Fajar asal Tuban', 
	'SDN Tuban 1,SMP Tuban 1,SMAN TUBAN 1,UPNVJT', 
	'HIDE',
	'SHOW', 
	'087445534543', 
	'fajar.andhika@gmail.com'
);

INSERT INTO `profile` (
	`nama`, 
	`roles`, 
	`description`, 
	`educations`, 
	`skills`, 
	`portofolio`, 
	`phone`, 
	`email`
) VALUES (
	'Amir Fanani', 
	'Game Developer', 
	'Amir Fanani asal Jombang', 
	'SDN Jombang 3,SMP Jombang 2,SMAN Jombang 2,UPNVJT', 
	'HIDE',
	'HIDE', 
	'082345654345676', 
	'amir.fanani@gmail.com'
);