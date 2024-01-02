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

-- Create Calendar table
CREATE TABLE Calendar(
  Calendar_ID CHAR(6) NOT NULL UNIQUE,
  Calendar_Owner_ID CHAR(6) NOT NULL UNIQUE,
  CONSTRAINT pk_Calendar PRIMARY KEY(Calendar_ID),
  CONSTRAINT FK_Calendar_Owner FOREIGN KEY (Calendar_Owner_Id) REFERENCES Users (User_ID)
);

-- Create Student_PhoneNumber table
CREATE TABLE Student_PhoneNumber(
  S_ID CHAR(6) NOT NULL,
    VARCHAR(20) NOT NULL,
  CONSTRAINT pk_Student_PhoneNumber PRIMARY KEY(S_ID, S_PhoneNumber),
  CONSTRAINT fk_Student_PhoneNumber FOREIGN KEY(S_ID) REFERENCES Student(S_ID) ON DELETE CASCADE ON UPDATE CASCADE
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

-- Create Student_View_Resources table
CREATE TABLE Student_View_Resource(
  Viewer_ID CHAR(6) NOT NULL,
  Viewed_Resource_ID CHAR(4) NOT NULL,
  Viewed_Date_Time DATETIME NOT NULL UNIQUE,
  CONSTRAINT pk_Student_View_Resources PRIMARY KEY (Viewer_ID, Viewed_Resource_ID, Viewed_Date_Time),
  CONSTRAINT fk1_Student_View_Resources FOREIGN KEY(Viewer_ID) REFERENCES Student(S_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk2_Student_View_Resources FOREIGN KEY(Viewed_Resource_ID) REFERENCES Resources(Resource_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Teacher_View_Resources table
CREATE TABLE Teacher_View_Resource(
  Viewer_ID CHAR(6) NOT NULL,
  Viewed_Resource_ID CHAR(4) NOT NULL,
  Viewed_Date_Time DATETIME NOT NULL UNIQUE,
  CONSTRAINT pk_Teacher_View_Resource PRIMARY KEY (Viewer_ID, Viewed_Resource_ID, Viewed_Date_Time),
  CONSTRAINT fk2_Teacher_View_Resource FOREIGN KEY (Viewer_ID) REFERENCES Teacher(T_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk3_Teacher_View_Resource FOREIGN KEY(Viewed_Resource_ID) REFERENCES Resources(Resource_ID) ON UPDATE CASCADE
);

-- Create Booking table
CREATE TABLE Booking(
  Booking_ID CHAR(5) NOT NULL UNIQUE,
  Booked_Resource_ID CHAR(4),
  Booker_ID CHAR(6) NOT NULL,
  Booking_Date DATE NOT NULL,
  Booking_Start_Time TIME NOT NULL,
  Booking_End_Time TIME NOT NULL,
  Attendee_1_ID CHAR(6) ,
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
  CONSTRAINT fk4_Booking FOREIGN KEY(Attendee_3_ID) REFERENCES Student(S_ID) ,
  CONSTRAINT fk5_Booking FOREIGN KEY(Attendee_4_ID) REFERENCES Student(S_ID) ,
  CONSTRAINT fk6_Booking FOREIGN KEY(Attendee_5_ID) REFERENCES Student(S_ID) ,
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

-- Create ResourceManager_Update_Resource table
CREATE TABLE ResourceManager_Update_Resource(
  Updater_ID CHAR(6) NOT NULL,
  Updated_Resource_ID CHAR(4) NOT NULL,
  Updated_Time_Date DATETIME NOT NULL UNIQUE,
  CONSTRAINT pk_ResourceManager_Update_Resource PRIMARY KEY(Updater_ID, Updated_Resource_ID, Updated_Time_Date),
  CONSTRAINT fk1_ResourceManager_Update_Resource FOREIGN KEY(Updater_ID) REFERENCES ResourceManager(RM_ID) ON UPDATE CASCADE,
  CONSTRAINT fk2_ResourceManager_Update_Resource FOREIGN KEY(Updated_Resource_ID) REFERENCES Resources(Resource_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Notification table
CREATE TABLE Notification(
  Notification_ID CHAR(6) NOT NULL UNIQUE,
  Notification_Description VARCHAR(200) NOT NULL,
  Receiver_ID CHAR(6) NOT NULL,
  Sender_ID CHAR(6) NOT NULL,
  CONSTRAINT pk_Notification PRIMARY KEY(Notification_ID),
  CONSTRAINT fk1_Notification FOREIGN KEY(Sender_ID) REFERENCES ResourceManager(RM_ID) ON UPDATE CASCADE,
  CONSTRAINT FK2_Notification_Receiver FOREIGN KEY (Receiver_ID) REFERENCES Users (USER_ID)
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

-- Create ResourceManager_View_Booking table
CREATE TABLE ResourceManager_View_Booking(
  Viewer_ID CHAR(6) NOT NULL,
  Viewed_Booking_ID CHAR(5) NOT NULL,
  Viewed_Date_Time DATETIME NOT NULL UNIQUE,
  CONSTRAINT pk_ResourceManager_View_Booking PRIMARY KEY(Viewer_ID, Viewed_Booking_ID, Viewed_Date_Time),
  CONSTRAINT fk1_ResourceManager_View_Booking FOREIGN KEY(Viewed_Booking_ID) references Booking(Booking_ID) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT fk2_ResourceManager_View_Booking FOREIGN KEY(Viewer_ID) references ResourceManager(RM_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create ResourceMnager_Update_Calendar table
CREATE TABLE ResourceManager_Update_Calendar(
  Updater_ID char(6) NOT NULL,
  Updated_Calendar_ID char(6) NOT NULL,
  Updated_Date_Time datetime NOT NULL UNIQUE,
  CONSTRAINT pk_ResourceManager_Update_Calendar PRIMARY KEY (Updater_ID, Updated_Calendar_ID, Updated_Date_Time),
  CONSTRAINT fk1_ResourceManager_Update_Calendar FOREIGN KEY (Updated_Calendar_ID) REFERENCES Calendar(Calendar_ID) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT fk2_ResourceManager_Update_Calendar FOREIGN KEY (Updater_ID) REFERENCES ResourceManager(RM_ID) ON UPDATE CASCADE
);

-- Create SystemAdmin table
CREATE TABLE SystemAdmin(
  SA_ID CHAR(6) NOT NULL UNIQUE,
  SA_Password VARCHAR(20) NOT NULL UNIQUE,
  SA_FirstName VARCHAR (100) NOT NULL,
  SA_LastName VARCHAR(100) NOT NULL,
  CONSTRAINT pk_SystemAdmin PRIMARY KEY (SA_ID)
);

-- Create SystemAdmin_PhoneNumber table
CREATE TABLE SystemAdmin_PhoneNumber(
  SA_ID CHAR(6) NOT NULL,
  SA_PhoneNumber VARCHAR(20) NOT NULL,
  CONSTRAINT pk_SystemAdmin_PhoneNumber PRIMARY KEY(SA_ID, SA_PhoneNumber),
  CONSTRAINT fk_SystemAdmin_PhoneNumber FOREIGN KEY(SA_ID) REFERENCES SystemAdmin(SA_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create SystemAdmin_Email table
CREATE TABLE SystemAdmin_Email(
  SA_ID CHAR(6) NOT NULL,
  SA_Email VARCHAR(100) NOT NULL,
  CONSTRAINT pk_SystemAdmin_Email PRIMARY KEY(SA_ID, SA_Email),
  CONSTRAINT fk_SystemAdmin_Email FOREIGN KEY(SA_ID) REFERENCES SystemAdmin(SA_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create SystemAdmin_View_Booking table
CREATE TABLE SystemAdmin_View_Booking(
  Viewer_ID CHAR(6) NOT NULL,
  Viewed_Booking_ID CHAR(5) NOT NULL,
  Viewed_Date_Time DATETIME NOT NULL UNIQUE,
  CONSTRAINT pk_SystemAdmin_View_Booking PRIMARY KEY(Viewer_ID, Viewed_Booking_ID, Viewed_Date_Time),
  CONSTRAINT fk1_SystemAdmin_View_Booking FOREIGN KEY(Viewed_Booking_ID) REFERENCES Booking(Booking_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk2_SystemAdmin_View_Booking FOREIGN KEY (Viewer_ID) REFERENCES SystemAdmin(SA_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Report table
CREATE TABLE Report(
  Report_ID CHAR(5) NOT NULL UNIQUE,
  Report_Type VARCHAR(100),
  Report_Description VARCHAR(200),
  Report_Generator_ID CHAR(6),
  CONSTRAINT pk_Report PRIMARY KEY (Report_ID),
  CONSTRAINT fk_Report FOREIGN KEY(Report_Generator_ID) REFERENCES SystemAdmin(SA_ID) ON UPDATE CASCADE
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
  CONSTRAINT fk1_Feedback FOREIGN KEY(Feedback_Checker_ID) REFERENCES SystemAdmin(SA_ID) ON UPDATE CASCADE,
  CONSTRAINT FK2_Feedback_Sender FOREIGN KEY (Sender_ID) REFERENCES Users (User_ID)
);

-- Create AccountAdmin table
CREATE TABLE AccountAdmin(
  AA_ID CHAR(6) NOT NULL UNIQUE,
  AA_Password VARCHAR(20) NOT NULL UNIQUE,
  AA_FirstName VARCHAR(100),
  AA_LastName VARCHAR(100),
  CONSTRAINT pk_AccountAdmin PRIMARY KEY(AA_ID)
);

-- Create AccountAdmin_PhoneNumber table
CREATE TABLE AccountAdmin_PhoneNumber(
  AA_ID CHAR(6) NOT NULL,
  AA_PhoneNumber VARCHAR(20) NOT NULL,
  CONSTRAINT pk_AccountAdmin_PhoneNumber PRIMARY KEY(AA_ID, AA_PhoneNumber),
  CONSTRAINT fk_AccountAdmin_PhoneNumber FOREIGN KEY(AA_ID) REFERENCES AccountAdmin(AA_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create AccountAdmin_Email table
CREATE TABLE AccountAdmin_Email(
  AA_ID CHAR(6) NOT NULL,
  AA_Email VARCHAR(100) NOT NULL,
  CONSTRAINT pk_AccountAdmin_Email PRIMARY KEY(AA_ID, AA_Email),
  CONSTRAINT fk_AccountAdmin_Email FOREIGN KEY(AA_ID) REFERENCES AccountAdmin(AA_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Create Payement table
CREATE TABLE Payment(
  Payment_ID CHAR(5) NOT NULL UNIQUE,
  Payment_Status VARCHAR(100) NOT NULL,
  Payment_Amount FLOAT NOT NULL,
  Payment_Date DATE,
  Transaction_ID VARCHAR(6) NOT NULL UNIQUE,
  Payer_ID CHAR(6) NOT NULL,
  PaymentChecker_ID char(6) NOT NULL,
  CONSTRAINT pk_Payment PRIMARY KEY (Payment_ID),
  CONSTRAINT fk1_Payment FOREIGN KEY(Payer_ID) REFERENCES Student(S_ID) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk2_Payment FOREIGN KEY(PaymentChecker_ID) REFERENCES AccountAdmin(AA_ID) ON UPDATE CASCADE
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
  
-- Inserting records into the Student_View_Resource table
INSERT INTO
  Student_View_Resource (Viewer_ID, Viewed_Resource_ID, Viewed_Date_Time)
VALUES
  ('ST0001', 'L001', '2023-05-15 09:30:00'),
  ('ST0002', 'L002', '2023-05-16 14:45:00'),
  ('ST0003', 'H001', '2023-05-17 11:00:00'),
  ('ST0004', 'L003', '2023-05-18 16:20:00'),
  ('ST0005', 'H002', '2023-05-19 13:15:00');
  
-- Inserting records into the Teacher_View_Resource table
INSERT INTO
  Teacher_View_Resource (Viewer_ID, Viewed_Resource_ID, Viewed_Date_Time)
VALUES
  ('TEA001', 'L004', '2023-05-20 10:00:00'),
  ('TEA002', 'H003', '2023-05-21 12:30:00'),
  ('TEA003', 'H004', '2023-05-22 14:15:00'),
  ('TEA004', 'L005', '2023-05-23 16:45:00'),
  ('TEA005', 'H005', '2023-05-24 09:00:00');
  
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
  
-- Inserting records into the ResourceManager_Update_Resource table
INSERT INTO
  ResourceManager_Update_Resource (Updater_ID,Updated_Resource_ID,Updated_Time_Date)
VALUES
  ('RM0001', 'L001', '2023-05-15 09:30:00'),
  ('RM0002', 'H002', '2023-05-16 14:45:00'),
  ('RM0003', 'H004', '2023-05-17 11:00:00'),
  ('RM0004', 'L002', '2023-05-18 16:20:00'),
  ('RM0005', 'L005', '2023-05-19 13:15:00');
  
-- Inserting records into the Notification table
INSERT INTO
  Notification (Notification_ID,Notification_Description,Receiver_ID,Sender_ID)
VALUES
  ('NOT001','Your physics lab booking on 2023-06-25 from 9:00 AM to 10:00 AM has been confirmed.','ST0001','RM0001'),
  ('NOT002','Your request for the chemistry lab booking on 2023-06-26 from 1:00 PM to 4:00 PM is awaiting approval.','ST0002','RM0002'),
  ('NOT003','Your lecture hall booking on 2023-06-27  from 11:30 AM to 12:30 PM has been confirmed.','ST0003','RM0003'),
  ('NOT004','Cancellation Notice: Your physics lab booking for 2023-06-28 from 3:30 PM to 5:00 PM has been cancelled because ita has been already booked','TEA001','RM0004'),
  ('NOT005','Your request for the multi purpose hall booking on 2023-06-29 from 12:00 PM to 1:30 PM is awaiting approval.','TEA005','RM0005');
  
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
  
-- Inserting records into the ResourceManager_View_Booking table
INSERT INTO
  ResourceManager_View_Booking (Viewer_ID, Viewed_Booking_ID, Viewed_Date_Time)
VALUES
  ('RM0001', 'BK001', '2023-05-25 09:30:00'),
  ('RM0002', 'BK002', '2023-05-26 14:45:00'),
  ('RM0003', 'BK003', '2023-05-27 11:00:00'),
  ('RM0004', 'BK004', '2023-05-28 16:20:00'),
  ('RM0005', 'BK005', '2023-05-29 13:15:00');
  
-- Inserting records into the ResourceManager_Update_Calendar table
INSERT INTO
  ResourceManager_Update_Calendar (Updater_ID,Updated_Calendar_ID,Updated_Date_Time)
VALUES
  ('RM0001', 'SC0001', '2023-05-01 09:00:00'),
  ('RM0002', 'SC0002', '2023-05-02 14:30:00'),
  ('RM0003', 'SC0003', '2023-05-03 11:45:00'),
  ('RM0004', 'TEC001', '2023-05-04 16:15:00'),
  ('RM0005', 'TEC005', '2023-05-05 13:30:00');
  
-- Inserting records into the SystemAdmin table
INSERT INTO
  SystemAdmin (SA_ID, SA_Password, SA_FirstName, SA_LastName)
VALUES
  ('SA0001', 'chamath123', 'Chamath', 'Fernando'),
  ('SA0002', 'tharindu123', 'Tharindu', 'Silva'),
  ('SA0003', 'malika123', 'Malika', 'Perera'),
  ('SA0004', 'ishara123', 'Ishara', 'Rajapaksa'),
  ('SA0005','nadeesha123','Nadeesha','Gunawardana');
  
-- Inserting records into the SystemAdmin_PhoneNumber table
INSERT INTO
  SystemAdmin_PhoneNumber (SA_ID, SA_PhoneNumber)
VALUES
  ('SA0001', '076-566-6666'),
  ('SA0002', '077-444-6666'),
  ('SA0003', '077-876-9999'),
  ('SA0004', '074-002-7666'),
  ('SA0005', '071-788-5555'),
  ('SA0001', '076-222-1111'),
  ('SA0002', '077-333-2222'),
  ('SA0003', '077-444-3333'),
  ('SA0004', '074-555-4444'),
  ('SA0005', '071-666-5555');
  
-- Inserting records into the SystemAdmin_Email table
INSERT INTO
  SystemAdmin_Email (SA_ID, SA_Email)
VALUES
  ('SA0001', 'chamathfernando123@gmail.com'),
  ('SA0001', 'fernando_chamath098@gmail.com'),
  ('SA0002', 'tharindusilva123@gmail.com'),
  ('SA0002', 'silva_tharindu098@gmail.com'),
  ('SA0003', 'malikaperera123@gmail.com'),
  ('SA0003', 'perera_malika098@gmail.com'),
  ('SA0004', 'ishararajapaksa123@gmail.com'),
  ('SA0004', 'rajapaksa_ishara098@gmail.com'),
  ('SA0005', 'nadeeshagunawardana123@gmail.com'),
  ('SA0005', 'gunawardana_nadeesha098@gmail.com');
  
-- Inserting records into the SystemAdmin_View_Booking table
INSERT INTO
  SystemAdmin_View_Booking (Viewer_ID, Viewed_Booking_ID, Viewed_Date_Time)
VALUES
  ('SA0001', 'BK001', '2023-05-01 09:00:00'),
  ('SA0002', 'BK002', '2023-05-02 14:30:00'),
  ('SA0003', 'BK003', '2023-05-03 18:15:00'),
  ('SA0004', 'BK004', '2023-05-04 10:45:00'),
  ('SA0005', 'BK005', '2023-05-05 16:20:00');
  
-- Inserting records into the Report table
INSERT INTO
  Report (Report_ID,Report_Type,Report_Description,Report_Generator_ID)
VALUES
  ('RP001','Booking Summary','Summary of resource bookings','SA0001'),
  ('RP002','Resource Utilization','Utilization report for school resources','SA0002'),
  ('RP003','Booking History','History of resource bookings','SA0003'),
  ('RP004','Booking Analysis','Analysis of resource booking patterns','SA0004'),
  ('RP005','Booking Trends','Trends and insights on resource bookings','SA0005');
  
-- Inserting records into the Feedback table
INSERT INTO
  Feedback (Feedback_ID,Sender_ID,Feedback_Type,Feedback_Description,Feedback_Status,Feedback_Checker_ID)
VALUES
  ('FB001','ST0005','General','The school facilities need improvement.','Open','SA0001'),
  ('FB002','ST0004','Academic','Request for additional math tutoring sessions.','Pending','SA0002'),
  ('FB003','TEA001','Administrative','Suggestion to streamline the registration process.','Closed','SA0003'),
  ('FB004','TEA002','Facilities','Report of a broken eqiupment in the lab.','Responsed','SA0004'),
  ('FB005','TEA003','Security','Cocerns regarding unauthorized access to the account.','Pending','SA0005');
  
-- Inserting records into the AccountAdmin table
INSERT INTO
  AccountAdmin (AA_ID, AA_Password, AA_FirstName, AA_LastName)
VALUES
  ('AA0001', 'chamari123', 'Chamari', 'Fernando'),
  ('AA0002', 'thilina123', 'Thilina', 'Silva'),
  ('AA0003', 'malini123', 'Malini', 'Perera'),
  ('AA0004', 'ishan123', 'Ishan', 'Rajapaksa'),
  ('AA0005', 'nadeeka123', 'Nadeeka', 'Gunawardana');
  
-- Inserting records into the AccountAdmin_PhoneNumber table
INSERT INTO
  AccountAdmin_PhoneNumber (AA_ID, AA_PhoneNumber)
VALUES
  ('AA0001', '076-123-4567'),
  ('AA0001', '077-234-5678'),
  ('AA0002', '071-345-6789'),
  ('AA0002', '072-456-7890'),
  ('AA0003', '077-567-8901'),
  ('AA0003', '076-678-9012'),
  ('AA0004', '072-789-0123'),
  ('AA0004', '071-890-1234'),
  ('AA0005', '077-901-2345'),
  ('AA0005', '076-012-3456');
  
-- Inserting records into the AccountAdmin_Email table
INSERT INTO
  AccountAdmin_Email (AA_ID, AA_Email)
VALUES
  ('AA0001', 'chamarifernando123@gmail.com'),
  ('AA0001', 'fernando_chamari098@gmail.com'),
  ('AA0002', 'thilinasilva123@gmail.com'),
  ('AA0002', 'silva_thilina098@gmail.com'),
  ('AA0003', 'maliniperera123@gmail.com'),
  ('AA0003', 'perera_malini098@gmail.com'),
  ('AA0004', 'ishanrajapaksa123@gmail.com'),
  ('AA0004', 'rajapaksa_ishan098@gmail.com'),
  ('AA0005', 'nadeekagunawardana123@gmail.com'),
  ('AA0005', 'gunawardana_nadeeka098@gmail.com');
  
-- Inserting records into the Payment table
INSERT INTO
  Payment (Payment_ID,Payment_Status,Payment_Amount,Payment_Date,Transaction_ID,Payer_ID,PaymentChecker_ID)
VALUES
  ('PAY01','Paid',5000.00,'2023-05-01','TID001','ST0001','AA0001'),
  ('PAY02','Pending',21000.00,'2023-05-02','TID002','ST0002','AA0002'),
  ('PAY03','Paid',10000.00,'2023-05-03','TID003','ST0003','AA0003'),
  ('PAY04','Pending',4500.00,'2023-05-04','TID004','ST0004','AA0004'),
  ('PAY05','Paid',7500.00,'2023-05-05','TID005','ST0005','AA0005');