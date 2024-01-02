-- Create Student table 
CREATE TABLE Student (
  S_ID CHAR(6) NOT NULL,
  S_Password VARCHAR(20) NOT NULL,
  S_FirstName VARCHAR(100) NOT NULL,
  S_LastName VARCHAR(100) NOT NULL,
  S_Address VARCHAR(100) NOT NULL,
  CONSTRAINT pk_Student PRIMARY KEY (S_ID),
  CONSTRAINT uk_Student_Password UNIQUE (S_Password)
);

-- Create Teacher table
CREATE TABLE Teacher (
  T_ID CHAR(6) NOT NULL UNIQUE,
  T_Password VARCHAR(20) NOT NULL UNIQUE,
  T_FirstName VARCHAR(100) NOT NULL,
  T_LastName VARCHAR(100) NOT NULL,
  T_Address VARCHAR(100) NOT NULL,
  CONSTRAINT pk_Teacher PRIMARY KEY(T_ID)
);

-- Create Users table to hold primary keys from Student and Teacher tables
CREATE TABLE Users (
  User_ID CHAR(6) NOT NULL UNIQUE,
  User_Type VARCHAR(10) NOT NULL,
  CONSTRAINT pk_User PRIMARY KEY (User_ID)
);

-- Create Student_PhoneNumber table
CREATE TABLE Student_PhoneNumber(
  S_ID CHAR(6) NOT NULL,
  S_PhoneNumber VARCHAR(20) NOT NULL,
  CONSTRAINT pk_Student_PhoneNumber PRIMARY KEY(S_ID, S_PhoneNumber),
  CONSTRAINT fk_Student_PhoneNumber FOREIGN KEY(S_ID) REFERENCES Student(S_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Calendar table
CREATE TABLE Calendar(
 Calendar_ID CHAR(6) NOT NULL UNIQUE,
 Calendar_Owner_ID CHAR(6) NOT NULL UNIQUE,
 CONSTRAINT pk_Calendar PRIMARY KEY(Calendar_ID),
 CONSTRAINT FK_Calendar_Owner FOREIGN KEY (Calendar_Owner_Id) REFERENCES Users (User_ID)
);

-- Create Student_Email table
CREATE TABLE Student_Email(
  S_ID CHAR(6) NOT NULL,
  S_Email VARCHAR(100) NOT NULL,
  CONSTRAINT pk_Student_Email PRIMARY KEY(S_ID, S_Email),
  CONSTRAINT fk_Student_Email FOREIGN KEY(S_ID) REFERENCES Student(S_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Teacher_PhoneNumber table
CREATE TABLE Teacher_PhoneNumber(
  T_ID CHAR(6) NOT NULL,
  T_PhoneNumber VARCHAR(20) NOT NULL,
  CONSTRAINT pk_Teacher_PhoneNumber PRIMARY KEY(T_ID, T_PhoneNumber),
  CONSTRAINT fk_Teacher_PhoneNumber FOREIGN KEY(T_ID) REFERENCES Teacher(T_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Teacher_Email table
CREATE TABLE Teacher_Email(
  T_ID CHAR(6) NOT NULL,
  T_Email VARCHAR(100) NOT NULL,
  CONSTRAINT pk_Teacher_Email PRIMARY KEY(T_ID, T_Email),
  CONSTRAINT fk_Teacher_Email FOREIGN KEY(T_ID) REFERENCES Teacher(T_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Resources table
CREATE TABLE Resources(
  Resource_ID CHAR(4) NOT NULL UNIQUE,
  Resource_Type VARCHAR(100) NOT NULL,
  Resource_Availability VARCHAR(100) NOT NULL,
  CONSTRAINT pk_Resources PRIMARY KEY (Resource_ID)
);

-- Create Booking table
CREATE TABLE Booking(
 Booking_ID CHAR(5) NOT NULL UNIQUE,
 Booked_Resource_ID CHAR(4),
 Booker_ID CHAR(6) NOT NULL,
 Booking_Date DATE NOT NULL,
 Booking_Start_Time TIME NOT NULL,
 Booking_End_Time TIME NOT NULL,
 Attendee_1_ID CHAR(6) NULL,
 Attendee_2_ID CHAR(6) NULL,
 Attendee_3_ID CHAR(6) NULL,
 Attendee_4_ID CHAR(6) NULL,
 Attendee_5_ID CHAR(6) NULL,
 Booking_Status VARCHAR(100) NOT NULL,
 Calendar_ID char(6),
 CONSTRAINT pk_Booking PRIMARY KEY(Booking_ID),
 CONSTRAINT fk1_Booking FOREIGN KEY(Booked_Resource_ID) REFERENCES Resources(Resource_ID) ON UPDATE CASCADE,
 CONSTRAINT fk2_Booking FOREIGN KEY(Attendee_1_ID) REFERENCES Student(S_ID),
 CONSTRAINT fk3_Booking FOREIGN KEY(Attendee_2_ID) REFERENCES Student(S_ID),
 CONSTRAINT fk4_Booking FOREIGN KEY(Attendee_3_ID) REFERENCES Student(S_ID),
 CONSTRAINT fk5_Booking FOREIGN KEY(Attendee_4_ID) REFERENCES Student(S_ID),
 CONSTRAINT fk6_Booking FOREIGN KEY(Attendee_5_ID) REFERENCES Student(S_ID),
 CONSTRAINT fk7_Booking FOREIGN KEY(Calendar_ID) REFERENCES Calendar(Calendar_ID),
 CONSTRAINT FK8_Resource_Booker FOREIGN KEY (Booker_ID) REFERENCES Users (User_ID)
);

-- Create ResourceManager table
CREATE TABLE ResourceManager(
  RM_ID CHAR(6) NOT NULL UNIQUE,
  RM_Password VARCHAR(20) NOT NULL UNIQUE,
  RM_FirstName VARCHAR(100) NOT NULL,
  RM_LastName VARCHAR(100) NOT NULL,
  CONSTRAINT pk_ResourceManager PRIMARY KEY(RM_ID)
);

-- Create ResourceManager_PhoneNumber table
CREATE TABLE ResourceManager_PhoneNumber(
  RM_ID CHAR(6) NOT NULL,
  RM_PhoneNumber VARCHAR(20) NOT NULL,
  CONSTRAINT pk_ResourceManager_PhoneNumber PRIMARY KEY(RM_ID, RM_PhoneNumber),
  CONSTRAINT fk_ResourceManager_PhoneNumber FOREIGN KEY(RM_ID)  REFERENCES ResourceManager(RM_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create ResourceManager_Email table
CREATE TABLE ResourceManager_Email(
  RM_ID CHAR(6) NOT NULL,
  RM_Email VARCHAR(100) NOT NULL,
  CONSTRAINT pk_ResourceManager_Email PRIMARY KEY(RM_ID, RM_Email),
  CONSTRAINT fk_ResourceManager_Email FOREIGN KEY(RM_ID) REFERENCES ResourceManager(RM_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Feedback table
CREATE TABLE Feedback(
  Feedback_ID CHAR(5),
  Sender_ID CHAR(6) NOT NULL,
  Feedback_Type VARCHAR(100),
  Feedback_Description VARCHAR(300),
  Feedback_Status VARCHAR(100),
  Feedback_Checker_ID CHAR(6),
  CONSTRAINT pk_Feedback PRIMARY KEY(Feedback_ID),
  CONSTRAINT fk1_Feedback FOREIGN KEY(Feedback_Checker_ID) REFERENCES ResourceManager(RM_ID) ON UPDATE CASCADE,
  CONSTRAINT FK2_Feedback_Sender FOREIGN KEY (Sender_ID) REFERENCES Users (User_ID)
);

-- Table structure for table `calendar2`
CREATE TABLE calendar2 (
  Calendar_id char(11) NOT NULL,
  Booking_ID char(5) NOT NULL,
  Booker_ID char(6) NOT NULL,
  Booked_Resource_ID char(4) NOT NULL,
  Booking_Date date NOT NULL,
  Booking_Start_Time time NOT NULL,
  Booking_End_Time time NOT NULL,
  constraint calendar2_pk primary key(Calendar_id)
  );

 -- Table structure for table `user_profile`

CREATE TABLE user_profile (
  User_ID char(6) NOT NULL,
  username varchar(20) NOT NULL,
  user_password char(20) NOT NULL,
  user_email varchar(100) NOT NULL,
  User_Type varchar(10) NOT NULL,
  user_address varchar(30) NOT NULL,
  user_phone varchar(10) NOT NULL,
  );

  -- Inserting records into the Student table
INSERT INTO
  Student (S_ID,S_Password,S_FirstName,S_LastName,S_Address)
VALUES
  ('ST0001','pethmi123','Pethmi','Vithana','45A, Galle Road Colombo 06'),
  ('ST0002','thakshila123','Thakshila','Fonseka','28, Hill Street Kandy'),
  ('ST0003','pemindi123','Pemindi','Silva','15, Temple Road Galle'),
  ('ST0004','samindi123','Samindi','Perera','72, Negombo Road Ja-Ela'),
  ('ST0005','dulmi123','Dulmi','Fernando','6, Vihara Lane Jaffna');
  
-- Inserting records into the Student_PhoneNumber table
INSERT INTO
  Student_PhoneNumber (S_ID, S_PhoneNumber)
VALUES
  ('ST0001', '071-622-1086'),
  ('ST0001', '071-754-5197'),
  ('ST0002', '076-898-2228'),
  ('ST0002', '071-622-1597'),
  ('ST0003', '071-842-7062'),
  ('ST0003', '071-622-1086'),
  ('ST0004', '078-493-9427'),
  ('ST0004', '071-622-1080'),
  ('ST0005', '070-310-5407'),
  ('ST0005', '071-622-1111');
  
-- Inserting records into the Student_Email table
INSERT INTO
  Student_Email (S_ID, S_Email)
VALUES
  ('ST0001', 'pethmivithana123@gmail.com'),
  ('ST0001', 'pethmi_vi9944@gmail.com'),
  ('ST0002', 'thakshilafonseka123@gmail.com'),
  ('ST0002', 'thakshilanethmini5577@gmail.com'),
  ('ST0003', 'pemindisilva123@gmail.com'),
  ('ST0003', 'pemi12_silva@gmail.com'),
  ('ST0004', 'samindiperera1234@gmail.com'),
  ('ST0004', 'pererasami_128@gmail.com'),
  ('ST0005', 'dulmifernando123@gmail.com'),
  ('ST0005', 'fernandodulmi123@gmail.com');
  
-- Inserting records into the Teacher table
INSERT INTO
  Teacher (T_ID,T_Password,T_FirstName,T_LastName,T_Address)
VALUES
  ('TEA001','dilshan123','Dilshan','Silva','65, Galle Road, Colombo 04'),
  ('TEA002','priya123','Priya','Fernando','10, Hill Street, Negombo'),
  ('TEA003','suresh123','Suresh','Perera','15, Temple Road, Kandy'),
  ('TEA004','nisha123','Nisha','Rajapaksa','22, Havelock Road, Colombo 05'),
  ('TEA005','priyani123','Priyani','Perera','35, D.S. Senanayake Mawatha, Colombo 10');
  
-- Insert primary keys from Student table into Users table
INSERT INTO Users(User_ID, User_Type)
SELECT S_ID,'Student'
FROM Student;

-- Insert primary keys from Teacher table into Users table
INSERT INTO Users(User_ID, User_Type)
SELECT T_ID,'Teacher'
FROM Teacher;

-- Inserting records into the Calendar table
INSERT INTO
 Calendar (Calendar_ID, Calendar_Owner_ID)
VALUES
 ('SC0001', 'ST0001'),
 ('SC0002', 'ST0002'),
 ('SC0003', 'ST0003'),
 ('SC0004', 'ST0004'),
 ('SC0005', 'ST0005'),
 ('TEC001', 'TEA001'),
 ('TEC002', 'TEA002'),
 ('TEC003', 'TEA003'),
 ('TEC004', 'TEA004'),
 ('TEC005', 'TEA005');

INSERT INTO calendar2 (Calendar_id, Booking_ID, Booker_ID, Booked_Resource_ID, Booking_Date, Booking_Start_Time, Booking_End_Time) VALUES
(1, 'BK001', 'ST0001', 'L002', '2023-06-25', '09:00:00', '10:00:00');

-- Inserting records into the Teacher_PhoneNumber table
INSERT INTO
  Teacher_PhoneNumber (T_ID, T_PhoneNumber)
VALUES
  ('TEA001', '076-670-1051'),
  ('TEA001', '077-123-4567'),
  ('TEA002', '071-401-5162'),
  ('TEA002', '077-222-3333'),
  ('TEA003', '076-786-2345'),
  ('TEA003', '073-333-4444'),
  ('TEA004', '076-431-8565'),
  ('TEA004', '074-111-2222'),
  ('TEA005', '077-212-7458'),
  ('TEA005', '079-444-5555');
  
-- Inserting records into the Teacher_Email table
INSERT INTO
  Teacher_Email (T_ID, T_Email)
VALUES
  ('TEA001', 'dilshansilva123@gmail.com'),
  ('TEA001', 'silva.dilshan_12@gmail.com'),
  ('TEA002', 'priyafernando123@gmail.com'),
  ('TEA002', 'priya_fernando12_34@gmail.com'),
  ('TEA003', 'sureshperera123@gmail.com'),
  ('TEA003', 'perera_123suresh@gmail.com'),
  ('TEA004', 'nisharajapaksa123_3@gmail.com'),
  ('TEA004', 'nisha098@gmail.com'),
  ('TEA005', 'priyaniperera123@gmail.com'),
  ('TEA005', 'perera.priyani_67@gmail.com');
  
-- Inserting records into the Resource table
INSERT INTO
  Resources(Resource_ID,Resource_Type,Resource_Availability)
VALUES
  ('L001', 'Physics Lab', 'Booked'),
  ('L002', 'Chemistry Lab', 'Available'),
  ('L003', 'Bio Lab', 'Available'),
  ('L004', 'Computer Lab', 'Available'),
  ('L005', 'Math Lab', 'Available'),
  ('H001', 'Lecture Hall', 'Booked'),
  ('H002', 'Multi-Purpose Hall', 'Available'),
  ('H003', 'Assembly Hall', 'Booked'),
  ('H004', 'Auditorium', 'Available'),
  ('H005', 'Lecture Hall', 'Available');

  -- Inserting records into the Booking table
INSERT INTO
  Booking (Booking_ID,Booked_Resource_ID,Booker_ID,Booking_Date,Booking_Start_Time,Booking_End_Time,Attendee_1_ID,Attendee_2_ID, Attendee_3_ID,Attendee_4_ID,Attendee_5_ID,Booking_Status,Calendar_ID)
VALUES
  ('BK001','L001','ST0001','2023-06-25','09:00:00','10:00:00','ST0002','ST0003','ST0004',NULL,NULL,'Confirmed','SC0001'),
  ('BK002','L002','ST0002','2023-06-26','14:00:00','16:00:00','ST0003','ST0004','ST0005',NULL,NULL,'Pending','SC0002'),
  ('BK003','H001','ST0003','2023-06-27','11:30:00','12:30:00','ST0001','ST0002','ST0004','ST0005',NULL,'Confirmed','SC0003'),
  ('BK004','L001','TEA001','2023-06-28','15:30:00','17:00:00','ST0001','ST0002','ST0003','ST0005',NULL,'Cancelled','TEC001'),
  ('BK005','H002','TEA005','2023-06-29','12:00:00','13:30:00','ST0001','ST0002','ST0003','ST0004',NULL,'Pending','TEC005');
  
  -- Inserting records into the ResourceManager table
INSERT INTO
  ResourceManager (RM_ID, RM_Password, RM_FirstName, RM_LastName)
VALUES
  ('RM0001', 'kamal123', 'Kamal', 'Perera'),
  ('RM0002', 'saman123', 'Saman', 'Silva'),
  ('RM0003', 'nimal123', 'Nimal', 'Fernando'),
  ('RM0004', 'anu123', 'Anu', 'De Silva'),
  ('RM0005','priyankara123','Priyankara','Rajapaksa'
  );

  -- Inserting records into the ResourceManager_PhoneNumber table
INSERT INTO
  ResourceManager_PhoneNumber (RM_ID, RM_PhoneNumber)
VALUES
  ('RM0001', '076-213-5645'),
  ('RM0002', '077-897-5678'),
  ('RM0003', '076-897-4765'),
  ('RM0004', '076-435-5678'),
  ('RM0005', '071-617-7534'),
  ('RM0001', '077-123-4567'),
  ('RM0002', '076-987-6543'),
  ('RM0003', '070-111-2222'),
  ('RM0004', '075-444-5555'),
  ('RM0005', '071-888-9999');
  
-- Inserting records into the ResourceManager_Email table
INSERT INTO
  ResourceManager_Email (RM_ID, RM_Email)
VALUES
  ('RM0001', 'kamalperera123@gmail.com'),
  ('RM0001', 'perera_kamal456@gmail.com'),
  ('RM0002', 'samansilva123@gmail.com'),
  ('RM0002', 'saman_silva789@gmail.com'),
  ('RM0003', 'nimalfernando123@gmail.com'),
  ('RM0003', 'fernando_nimal7889@gmail.com'),
  ('RM0004', 'anudesilva123@gmail.com'),
  ('RM0004', 'silva_anu123@gmail.com'),
  ('RM0005', 'priyankararajapaksa123@gmail.com'),
  ('RM0005', 'rajapaksa_priyankara682@gmail.com');
  
  -- Inserting records into the Feedback table
INSERT INTO
  Feedback (Feedback_ID,Sender_ID,Feedback_Type,Feedback_Description,Feedback_Status,Feedback_Checker_ID)
VALUES
  ('FB001','ST0005','General','The school facilities need improvement.','Open','RM0001'),
  ('FB002','ST0004','Academic','Request for additional math tutoring sessions.','Pending','RM0002'),
  ('FB003','TEA001','Administrative','Suggestion to streamline the registration process.','Closed','RM0003'),
  ('FB004','TEA002','Facilities','Report of a broken eqiupment in the lab.','Responsed','RM0004'),
  ('FB005','TEA003','Security','Cocerns regarding unauthorized access to the account.','Pending','RM0005');

  INSERT INTO user_profile (User_ID, username, user_password, user_email, User_Type, user_address, user_phone) VALUES
('ST0001', 'Pethmi Vithana', 'pethmi123', 'pethmivithana123@gmail.com', 'Student', '45A, Galle Road Colombo 06', '0778653557'),
('ST0003', 'Pemindi Silva', 'ST0003', 'pemi12_silva@gmail.com', ' Student', '15,Temple Road ,Kandy', '0716221086'),
('TEA001', 'Dilshan Silva', 'dilshan123', 'dilshansilva123@gmail.com', ' Teacher', '65,Galle Road ,Colombo 04', '0766701051');
