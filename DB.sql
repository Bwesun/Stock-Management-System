CREATE TABLE `employees` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `post` varchar(20) NOT NULL,
  `doe` varchar(15) NOT NULL,
  `address` varchar(225) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `employees`
-- 

INSERT INTO `employees` (`id`, `name`, `phone`, `post`, `doe`, `address`, `email`) VALUES 
(1, 'Matur Innoecnt Joshu', '08144529253', 'Control Manager', '2005-02-09', 'Jushi Waje, Sabon Gari, Zaria', 'maturinnocent@gmail.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `invoices`
-- 

CREATE TABLE `invoices` (
  `id` int(7) NOT NULL auto_increment,
  `invoice_no` int(12) NOT NULL,
  `price` varchar(6) NOT NULL,
  `quantity` varchar(6) NOT NULL,
  `total_price` varchar(7) NOT NULL,
  `customer_name` varchar(15) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `posted_by` varchar(20) NOT NULL,
  `trans_date` varchar(12) NOT NULL,
  `status` varchar(15) NOT NULL default 'unchecked',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

-- 
-- Dumping data for table `invoices`
-- 

INSERT INTO `invoices` (`id`, `invoice_no`, `price`, `quantity`, `total_price`, `customer_name`, `customer_phone`, `address`, `product_name`, `posted_by`, `trans_date`, `status`) VALUES 
(38, 75866, '1230', '3', '3690', 'Barmani', '0978965', 'kjhbj', 'Panadol Extra', 'admin', '11-03-21', ''),
(45, 20202, '120', '4', '480', 'Barmani', '8738918', 'uyfg', 'Chloroquine', 'innocent', '17-03-21', ''),
(46, 38750, '210', '2', '420', 'Favie Comp', '08144523940', 'NAF Valley Estate', 'Tetmosol', 'admin', '26-09-21', ''),
(47, 20924, '70', '3', '210', 'Saminu Micah', '09726535566', 'Jushi Waje, S/Gari, Zaria.', 'Septrin', 'admin', '27-09-21', ''),
(48, 41011, '70', '5', '350', 'Favie Comp', '08144523940', 'jhtgysDUHBCs', 'Septrin', 'admin', '27-09-21', 'unchecked');

-- --------------------------------------------------------

-- 
-- Table structure for table `notifications`
-- 

CREATE TABLE `notifications` (
  `id` int(3) NOT NULL auto_increment,
  `notification` varchar(225) NOT NULL,
  `status` varchar(12) NOT NULL default 'unchecked',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `notifications`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `stocks`
-- 

CREATE TABLE `stocks` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `price` varchar(6) NOT NULL,
  `quantity` varchar(6) NOT NULL,
  `quantity_sold` varchar(6) NOT NULL,
  `status` varchar(10) NOT NULL default 'Available',
  `expiry` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `stocks`
-- 

INSERT INTO `stocks` (`id`, `name`, `price`, `quantity`, `quantity_sold`, `status`, `expiry`) VALUES 
(1, 'Panadol Extra', '1230', '10', '2', 'Available', '2021-03-16'),
(2, 'Chloroquine', '120', '11', '9', 'Available', '2021-03-03'),
(3, 'Septrin', '70', '2', '11', 'Available', '2022-02-02'),
(4, 'Tetmosol', '210', '8', '2', 'Available', '2021-10-02');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(3) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES 
(1, 'admin', 'admin', 'Admin'),
(2, 'grace', 'grace', 'Read/Write'),
(3, 'innocent', 'innocent', 'Read/Write'),
(4, 'ebube', '1111', 'Read/Write');