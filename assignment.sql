--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `views` int(7) DEFAULT '1',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`views`, `date`) VALUES
(1157, '2017-05-12'),
(100, '2017-04-12'),
(75, '2017-03-12'),
(34, '2017-02-12'),
(2, '2016-12-12'),
(23, '2017-01-12'),
(5, '2016-11-16'),
(1, '2016-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `table_bill`
--

CREATE TABLE `table_bill` (
  `bill_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `amount` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_bill`
--

INSERT INTO `table_bill` (`bill_id`, `order_id`, `product_id`, `amount`) VALUES
(1, 3, 16, 1),
(2, 3, 19, 2),
(3, 5, 16, 1),
(4, 5, 17, 1),
(5, 7, 16, 1),
(6, 7, 17, 1),
(7, 8, 16, 2),
(8, 10, 17, 1),
(9, 11, 17, 1),
(10, 13, 24, 1),
(11, 15, 24, 1),
(12, 17, 23, 1),
(13, 17, 24, 1),
(14, 18, 19, 1),
(15, 18, 20, 1),
(16, 19, 5, 1),
(17, 19, 6, 1),
(18, 20, 3, 2),
(19, 21, 3, 1),
(20, 22, 1, 3),
(21, 23, 1, 2),
(22, 24, 2, 1),
(23, 25, 1, 3),
(24, 26, 6, 1),
(25, 26, 5, 1),
(26, 27, 3, 1),
(27, 28, 1, 300),
(28, 29, 5, 1),
(29, 0, 3, 2),
(30, 0, 2, 1),
(31, 0, 6, 1),
(32, 0, 21, 1),
(33, 0, 6, 1),
(34, 31, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_member`
--

CREATE TABLE `table_member` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `date_register` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `picture` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_member`
--

INSERT INTO `table_member` (`member_id`, `username`, `password`, `email`, `firstname`, `lastname`, `date_register`, `status`, `picture`, `address`) VALUES
(4, 'admin', '12345', 'admin@hotmail.com', 'หมู', 'หมา', '2017-04-09 19:48:36', 1, '', 'มจพ.'),
(5, 'test', '1234', 'ccgs1513@hotmail.com', NULL, NULL, '2017-04-09 20:48:09', 0, '', NULL),
(6, 'ccgs', '1234', 'ccgs@gmail.com', NULL, NULL, '2017-04-23 16:21:27', 0, '', NULL),
(7, 'expertep', '1234', 'esred@hotmail.com', 'กวิน', 'เรืองรักษ์ลิขิต', '2017-05-06 00:18:18', 0, '', 'มหาลัยเทคโนโลยี พระจอมเกล้าพระนครเหนือ');

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `pay` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'w',
  `payslip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destination` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`order_id`, `member_id`, `date`, `pay`, `payslip`, `destination`) VALUES
(3, 7, '2017-05-08', 's', 'order/slip/772102.PNG', ''),
(5, 7, '2017-05-08', 's', '', ''),
(7, 7, '2017-05-08', 'f', '', ''),
(8, 7, '2017-05-09', 'f', '', ''),
(10, 7, '2017-05-09', 'f', '', ''),
(11, 7, '2017-05-09', 's', '', ''),
(18, 4, '2017-05-15', 's', 'order/slip/8922424.PNG', ''),
(19, 4, '2017-05-16', 's', NULL, ''),
(20, 4, '2017-04-19', 's', NULL, ''),
(21, 4, '2017-04-13', 's', NULL, ''),
(22, 4, '2017-03-15', 's', NULL, ''),
(23, 4, '2017-02-10', 's', NULL, ''),
(24, 4, '2017-01-19', 's', NULL, ''),
(25, 4, '2017-01-15', 's', NULL, ''),
(26, 4, '2017-05-26', 'f', NULL, ''),
(27, 4, '2017-05-26', 'w', NULL, ''),
(28, 4, '2017-05-26', 'w', NULL, ''),
(29, 4, '2017-05-29', 'w', NULL, ''),
(31, 4, '2017-05-29', 's', NULL, 'บ้าน');

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(7) NOT NULL,
  `product_category` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_number` int(50) NOT NULL,
  `product_desc` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`product_id`, `product_name`, `product_price`, `product_category`, `product_type`, `product_picture`, `product_number`, `product_desc`) VALUES
(1, 'LED Bulb 60W WW E27 PHILIPS', 119, 'ไฟฟ้า', 'หลอดไฟ', 'product/image/1.jpg', 21, 'หลอดแอลอีดี รุ่น Bulb\r\nขั้วเกลียวมาตรฐาน E27\r\nประหยัดไฟ 88% เมื่อเทียบกับหลอดไส้\r\nอายุการใช้งานยาวนาน 15000 ชั่วโมง\r\nเลือกใช้วัสดุที่ให้ความปลอดภัยต่อการใช้งาน และระบายความร้อนได้ดี\r\nให้แสงที่มีความนุ่มนวลสบายตา\r\nไม่กระพริบในระหว่างการใช้งาน\r\nไม่มีสารปรอท และรังสียูวี\r\nรูปทรงสวยงาม ทันสมัย\r\nได้รับมาตรฐาน มอก.1955-2551\r\nคำแนะนำ : ตรวจสอบขั้ว และระบบไฟก่อนติดตั้ง\r\nคำเตือน : ห้ามติดตั้งกับระบบไฟผิดขนาด'),
(2, 'SYLVANIA หลอดไฟ รุ่น Minilynx Mini Spiral 11W/865 E27', 129, 'ไฟฟ้า', 'หลอดไฟ', 'product/image/2.jpg', 19, 'มอบแสงสว่างอย่างมีประสิทธิภาพด้วย หลอดไฟ Sylvania รุ่น Minilynx Mini Spiral 11W/865 E27 - Daylight\r\nอีกหนึ่งสินค้าคุณภาพจาก Sylvania การันตีจากประเทศสหรัฐอเมริกา ด้วยวัสดุที่ได้มาตรฐานอุตสาหกรรม พร้อมอายุการใช้งานที่ยาวนาน 8000 ชั่วโมง\r\n- กำลังไฟ 11 วัตต์\r\n- วัสดุคุณภาพ ได้มาตรฐานการผลิต\r\n- ให้แสงสว่างชัดเจน โทนสีขาว\r\n- ปลอดภัย ใช้งานได้นาน 8000 ชั่วโมง\r\n- การันตีคุณภาพจาก Sylvania ประเทศสหรัฐอเมริกา'),
(3, 'E27 LED Filament Light Bulb Lamp 4W Vintage Retro Edison Style Warm White 2700K', 215, 'ไฟฟ้า', 'หลอดไฟ', 'product/image/3.jpg', 30, 'E27 ST64 AC 110-120V\nEdison LED v\nintage antique Light Bulb'),
(4, 'CATEC หลอดแบล็คไลท์ หลอดBlack Light หลอดไฟดักแมลง', 229, 'ไฟฟ้า', 'หลอดไฟ', 'product/image/4.jpg', 20, 'หลอด Black Light UVA\r\nใช้ในเครื่องดักยุง สำหรับล่อแมลง \r\nให้คลื่นแสงที่มีความยาวคลื่น380-400 นาโนเมตร \r\nประหยัดไฟ สามารถเปิดได้ตลอด 24 ชม.\r\nสามารถใช้ได้กับเครื่องดักยุงหลายยี่ห้อ\r\nขนาด 4W'),
(5, 'Link Cable CAT5E สายแลน เข้าหัวสำเร็จรูป 25 เมตร - สีขาว', 395, 'ไฟฟ้า', 'สายไฟ', 'product/image/5.jpg', 10, '- สาย LINK ชนิด CAT 5E UTP CABLE (CMR) ความเร็วสูงสุดที่ 350 MHz\r\n- สายและหัวของแท้ ใส่บูตทุกเส้น ทดสอบสายทุกเส้นด้วยอุปกรณ์มาตรฐาน Link แท้\r\n- ความยาว 25 เมตร\r\n- เหมาะสำหรับใช้งานภายในอาคาร ใช้เชื่อมต่อสัญญาณอินเตอร์เน็ต\r\n- หัว และ บูต ไม่สามารถระบุสีได้ (ในรูปถ่ายเป็นสีแดง) แต่จะเป็นสีเดียวกันทั้งสองด้าน'),
(6, 'Cable Tie เข็มขัดรัดสายไฟ 6 นิ้ว', 90, 'ยึดติด-เทป-กาว', 'สายรัด', 'product/image/6.jpg', 2, '- เข็มขัดรัดสายไฟคุณภาพสูงรุ่น CT-150-3 6 นิ้ว\r\n- ผลิตจากไนล่อน ตัวสายมีความยืดหยุ่นแข็งแรง \r\n- ฟันภายในออกแบบให้ยึดสายได้ดี \r\n- ใช้สำหรับล็อคสายไฟ รัดสายโทรศัพท์ รัดสายแลน รัดท่อ รัดชิ้นงาน รัดวัสดุชิ้นให้เป็นระเบียบ\r\n- ช่วยประหยัดพื้นที่ในการเดินสายไฟ\r\n- ความยาวสาย 6 นิ้ว\r\n- บรรจุ 100 อัน/แพ็ค'),
(7, 'Cable Tie เข็มขัดรัดสายไฟ 8 นิ้ว', 100, 'ยึดติด-เทป-กาว', 'สายรัด', 'product/image/7.jpg', 4, '- เข็มขัดรัดสายไฟคุณภาพสูงรุ่น CT-150-3 6 นิ้ว\r\n- ผลิตจากไนล่อน ตัวสายมีความยืดหยุ่นแข็งแรง \r\n- ฟันภายในออกแบบให้ยึดสายได้ดี \r\n- ใช้สำหรับล็อคสายไฟ รัดสายโทรศัพท์ รัดสายแลน รัดท่อ รัดชิ้นงาน รัดวัสดุชิ้นให้เป็นระเบียบ\r\n- ช่วยประหยัดพื้นที่ในการเดินสายไฟ\r\n- ความยาวสาย 6 นิ้ว\r\n- บรรจุ 100 อัน/แพ็ค'),
(8, 'Solo กุญแจ รุ่น 4507 SQ-L 40 มม. ', 350, 'กุญแจ', 'แม่กุญแจ', 'product/image/8.jpg', 4, '- ตัวแม่กุญแจผลิตจากทองเหลือง\r\n- เหมาะสำหรับ บ้าน/ทาวน์เฮ้าส์ 1หลัง\r\n- กุญแจเป็นระบบลูกปืน\r\n- ที่คล้องทำจากเหล็กกล้าชุบแข็ง\r\n- ดอกกุญแจทำจากวัสดุอย่างดี\r\n- ไส้กุญแจ เป็นทองเหลือง'),
(9, 'SCG ตะปูเกลียวตราช้าง ปลายสว่าน13มม.', 390, 'ยึดติด-เทป-กาว', 'ตะปูเกลียว', 'product/image/9.jpg', 5, 'ใช้ยึดโครงซีลายน์ ตราช้างกับแบร๊คเก๊ต ตราช้าง โดยไม่ต้องเจาะนำ หรือใช้ยึดแป ตราช้าง เข้ากับจันทัน\r\nใช้กับงานไม้ฝา ยึดโครงซี-ลายน์ตราตราช้าง ให้ติดกับแบร็คเก็ตโดยไม่ต้องเจาะนำ \r\nขนาดบรรจุ 500 ตัว/กล่อง'),
(10, 'D-MAX ปืนยิงตะปูคู่ รุ่น 1022J', 740, 'เครื่องมือไฟฟ้า', 'ปืนยิงตะปู', 'product/image/10.jpg', 3, 'ปืนยิงตะปู D-MAX 1022J\r\nใช้กับตะปูขาคู่ 1004J-1022J ความกว้างลูกตะปู 10 มม. ความยาวลูกตะปูสูงสุด 22 มม.\r\nเหมาะสำหรับยิงไม้ ยิงเบาะหนัง เบาะบุพลาสติก\r\nการใช้งาน:\r\nเหมาะสำหรับยิงไม้ ยิงเบาะหนัง เบาะบุพลาสติก\r\n\r\nSpecifications:\r\nปืนยิงตะปู 1022J D-MAX\r\nขนาด 180x52x230 mm.\r\nน้ำหนัก 1.2 kg.\r\nความดันลม 6-8 Bar\r\nบรรจุตะปู 100 นัด\r\nตะปูที่ใช้ 1004J 1006J 1008J 1010J 1013J 1016J 1022J\r\nปั๊มลมที่ใช้ ตั้งแต่ 1/4 แรง (HP) ขึ้นไป'),
(11, 'PUMPKIN สว่านโรตารี่ 3 ระบบ รุ่น PTT 2-26DFR - สีส้ม', 2299, 'เครื่องมือไฟฟ้า', 'สว่าน', 'product/image/11.jpg', 3, 'มอบแสงสว่างอย่างมีประสิทธิภาพด้วย หลอดไฟ Sylvania รุ่น Minilynx Mini Spiral 11W/865 E27 - Daylight\r\nอีกหนึ่งสินค้าคุณภาพจาก Sylvania การันตีจากประเทศสหรัฐอเมริกา ด้วยวัสดุที่ได้มาตรฐานอุตสาหกรรม พร้อมอายุการใช้งานที่ยาวนาน 8000 ชั่วโมง\r\n- กำลังไฟ 11 วัตต์\r\n- วัสดุคุณภาพ ได้มาตรฐานการผลิต\r\n- ให้แสงสว่างชัดเจน โทนสีขาว\r\n- ปลอดภัย ใช้งานได้นาน 8000 ชั่วโมง\r\n- การันตีคุณภาพจาก Sylvania ประเทศสหรัฐอเมริกา'),
(12, 'ตะกั่ว', 30, 'ไฟฟ้า', 'อุปกรณ์', 'product/image/12.jpg', 20, 'ตะกั่วสำหรับบัดกรี ใช้กับหัวแร้งเท่านั้น'),
(13, 'Anton - คีมตัดลวด สีแดง รุ่น AT-3208  ', 340, 'เครื่องมือ', 'คีมตัด', 'product/image/13.jpg', 5, 'Anton - คีมตัดลวด สีแดง รุ่น AT-3208\r\n- เหมาะสำหรับตัดลวด ตัดพลาสติก\r\n- ชุบแข็งมีความคม และมีความแข็งแรง\r\n- ผลิตจากเหล็กคุณภาพสูง ที่จับยางเพื่อความถนัดมือ ใช้งานสะดวก\r\nWeight - 0.29 kg\r\nDimension - 21.6 x 5.6 x 1.3 cm.'),
(14, 'ALLWAYS คีมปอกสายออโต้+ย้ำสาย+ตัดสาย รุ่น P-60 8" (สีส้ม)', 462, 'เครื่องมือ', 'คีมปอก', 'product/image/14.jpg', 4, '1. 3 in 1 ใช้ปอกสายไฟออโต้ ใช้ย้ำหัวสายไฟ และ ใช้ตัดสายไฟ ในตัวเดียว \r\n2. ใช้สำหรับการปอก พร้อมดึงฉนวนสายไฟออกอัตโนมัติ    \r\nร่องฟันจับแน่นปอกง่าย ไม่ต้องออกแรงดึง \r\nใบมีดทำจากเหล็ก Cr Mo ค่าความแข็ง HRC 55o - 60o \r\nใช้ปอกสายไฟที่มีเส้นผ่านศูนย์กลาง 0.2 - 6 mm2 (10 - 24 AWG)  \r\nมีน๊อตปรับความแรงในการตัด ถ้าสายไฟเส้นเล็กให้หมุนไปทางเครื่องหมายลบ ถ้าสายไฟเส้นใหญ่ให้หมุนไปทางเครื่องหมายบวก  \r\nตัดเฉพาะส่วนที่เป็นฉนวนพลาสติก โดยไม่ตัดเส้นลวดทองแดง \r\nสามารถตั้งค่าความยาวของสายไฟ ก่อนการปลอก      \r\n3. ใช้สำหรับการย้ำหัวสายไฟ ทั้งแบบฉนวนหุ้ม และไม่มีฉนวนหุ้ม ขนาดเส้นผ่านศูนย์กลาง 0.5 - 6 mm2  (22 -10 AWG)  \r\n4. ใช้สำหรับการตัดสายไฟ \r\n5. ปลายด้ามทำจากพลาสติก PVC หุ้มด้วยยางจับกระชับมือ ใช้งานง่าย \r\n6. สำหรับอุตสาหกรรมที่ใช้งานประจำ'),
(15, 'Rhino Brand คีมอเนกประสงค์ ปากแหลมปลายงอ แบบไม่มีฟัน 5 นิ้ว รุ่น 311', 109, 'เครื่องมือ', 'คีมอเนกประสงค์', 'product/image/15.jpg', 5, 'คีมปากปากแหลมปลายงอ แบบไม่มีฟัน 5  นิ้ว จาก Rhino Brand รุ่น 311  ผลิตจากเหล็กคาร์บอน (Carbon Steel)  เหมาะสำหรับใช้หนีบ จับชิ้นงานขนาดเล็ก หรือชิ้นงานที่ไม่สามารถจับด้วยมือเปล่า\r\nสามารถใช้จับ บิด หมุนชิ้นงาน  จับยึดชิ้นงานได้แน่น\r\nมีสปริง\r\nขนาด 5 นิ้ว\r\nจำนวน 1 อัน'),
(16, 'สี่ทางฉาก สี่ทางตั้ง pvc ขนาด 1/2 นิ้ว', 10, 'ประปา', 'ข้อต่อ', 'product/image/16.jpg', 46, 'สี่ทางฉาก pvc ขนาด 1/2 นิ้ว (4 หุน) หนา 8.5 มิล ทำจากวัสดุเกรดดีมีคุณภาพ\r\nเหมาะสำหรับการต่อท่อประปาแยก การประกอบโรงเรือนผักสลัด ผักไฮโดรโปนิกส์ การประกอบคอกกั้นเด็ก'),
(17, 'Stanley # 84-027 คีมตัดปากเฉียง คอสั้น ขนาด 6 นิ้ว  ', 279, 'เครื่องมือ', 'คีมตัด', 'product/image/17.jpg', 7, 'ปากคีมชุบแข็ง\r\nด้ามจับผลิตจากวัสดุผสมระหว่างพลาสติคและยาง\r\nจับกระชับมือ'),
(18, 'กาวยาง PATTEX 650G', 220, 'ยึดติด-เทป-กาว', 'กาว', 'product/image/18.jpg', 4, '- กาวสารพัดประโยชน์ สำหรับปะติด\r\n- ติดแน่น ไม่หลุดล่อน\r\n- ซ่อมแซมไม้ หนัง โลหะ\r\n- เนื้อกาวมีความเหนียว\r\n- ให้แรงยึดสูง\r\n- วัสดุ : ยางพารา\r\n- น้ำหนัก 650 กรัม'),
(19, 'INTER TAPE เทปกาวย่น ขนาด3/4นิ้ว ยาว10หลา', 30, 'ยึดติด-เทป-กาว', 'เทปกาว', 'product/image/19.jpg', 19, 'เทปย่น ตรา อินเตอร์เทป\r\nขนาด 3/4นิ้วx10หลา\r\nบรรจุ 5 ม้วนต่อ 1 แถว\r\n่1 แพ็ค มี 10 แถว(รวม 50 ม้วน)\r\nใช้สำหรับ\r\nอุปกรณ์การเรียน\r\nอุปกรณ์สำนักงาน\r\nมีความเหนียว แน่น ติดทนทาน\r\nเหมาะสำหรับ พ่นสีรถยนต์'),
(20, 'SCG กาวตราช้างทาท่อ PVC ขนิดเข้มข้น ปริมาณ 125 กรัม', 120, 'ประปา', 'กาว', 'product/image/20.jpg', 12, 'SCG กาวตราช้างทาท่อ PVC ขนิดเข้มข้น ปริมาณ 125 กรัมสำหรับท่อพีวีซี และข้อต่อพีวีซี ชนิดเข็มข้นใช้กับท่อพีวีซีและข้อต่อนาดใหญ่ ได้ดีมาก\r\nรับแรงดันน้ำได้สูง มากกว่า น้ำยาประสานท่อพีวีซีแบบกระป๋อง\r\nแห้งเร็ว ซ่อมไว\r\n\r\nสินค้าคุณภาพ ยอดนิยม\r\nProfessional Products\r\n\r\nSCG Apply PVC pipe glue tubes concentration of 2 \r\n125 g tube .\r\n\r\nFor PVC pipe And PVC Type needle with thick PVC pipe and fittings\r\n the large very well.Water pressure has been higher than PVC bonding agents Cans .\r\nFast drying repair deviceTop quality productsProfessional Products'),
(21, 'ข้องอฉาก pvc 4หุน 1/2', 4, 'ประปา', 'ข้อต่อ', 'product/image/21.jpg', 120, 'อุปกรณ์PVCชนิดไม่รับแรงดัน ( ท่อสำหรับใช้เป็นท่อน้ำทิ้ง)\r\n- ผลิตตามมาตรฐานนผลิตภัณฑ์อุตสาหกรรม เลขที่ มอก.17-2532 มีสีฟ้า\r\n- อุปกรณ์ท่อPVC ตราช้าง\r\n- สำหรับใช้เป็นท่อน้ำเสีย  ท่อระบายน้ำทิ้งและสิ่งปฎิกูล'),
(22, 'BCC สายไฟ VAF-GRD 2*2.5/2.5 SQ.MM สีขาว (100 เมตร) ', 3000, 'ไฟฟ้า', 'สายไฟ', 'product/image/22.jpg', 7, 'สายไฟ vaf-grd 2x2.5/2.5 mm2 แบบมีกราวด์สายแบน\r\nสายไฟฟ้าสำหรับงานเดินลอย ตีกิ๊บ ตัวนำผลิตจากทองแดงบริสุทธิ์ สามารถนำกระแสไฟฟ้าได้ดี และมีอายุการใช้งานยาวนาน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_bill`
--
ALTER TABLE `table_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `table_member`
--
ALTER TABLE `table_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_bill`
--
ALTER TABLE `table_bill`
  MODIFY `bill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `table_member`
--
ALTER TABLE `table_member`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
