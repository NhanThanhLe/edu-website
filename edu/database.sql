CREATE DATABASE sinhvien;
USE sinhvien;
-- Tạo bảng Class
CREATE TABLE Class (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    class_title VARCHAR(255) NOT NULL
);
-- Tạo bảng Login_level
CREATE TABLE Login_level (
    level_id INT AUTO_INCREMENT PRIMARY KEY,
    level_title VARCHAR(50) NOT NULL
);
-- Tạo bảng Course
CREATE TABLE Course (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_title VARCHAR(255) NOT NULL,
    course_credits INT NOT NULL
);
-- Tạo bảng Teacher
CREATE TABLE Teacher (
    teacher_id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_name VARCHAR(255) NOT NULL,
    teacher_phone VARCHAR(15),
    teacher_email VARCHAR(255) UNIQUE,
    teacher_gender ENUM('Male', 'Female', 'Other'),
    teacher_dob DATE
);
-- Tạo bảng Department
CREATE TABLE Department (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_title VARCHAR(255) NOT NULL
);
-- Tạo bảng Exam_type
CREATE TABLE Exam_type (
    et_id INT AUTO_INCREMENT PRIMARY KEY,
    et_title VARCHAR(50) NOT NULL
);
-- Tạo bảng User
CREATE TABLE User (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_level_id INT,
    user_username VARCHAR(50) UNIQUE NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_level_id) REFERENCES Login_level(level_id)
);
-- Tạo bảng Student
CREATE TABLE Student (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(255) NOT NULL,
    student_phone VARCHAR(15),
    student_email VARCHAR(255) UNIQUE,
    student_gender ENUM('Male', 'Female', 'Other'),
    student_dob DATE
);
-- Tạo bảng Exam
CREATE TABLE Exam (
    exam_id INT AUTO_INCREMENT PRIMARY KEY,
    exam_title VARCHAR(255) NOT NULL,
    exam_etype_id INT,
    exam_date DATE NOT NULL,
    FOREIGN KEY (exam_etype_id) REFERENCES Exam_type(et_id)
);
-- Tạo bảng Marks
CREATE TABLE Marks (
    marks_exam_id INT,
    marks_student_id INT,
    PRIMARY KEY (marks_exam_id, marks_student_id),
    FOREIGN KEY (marks_exam_id) REFERENCES Exam(exam_id),
    FOREIGN KEY (marks_student_id) REFERENCES Student(student_id)
);
-- Tạo bảng CourseTeacher để quản lý quan hệ n-n giữa Course và Teacher
CREATE TABLE CourseTeacher (
    course_id INT,
    teacher_id INT,
    PRIMARY KEY (course_id, teacher_id),
    FOREIGN KEY (course_id) REFERENCES Course(course_id),
    FOREIGN KEY (teacher_id) REFERENCES Teacher(teacher_id)
);
-- Tạo bảng StudentCourse là bảng trung gian
CREATE TABLE StudentCourse (
    student_id INT,
    course_id INT,
    PRIMARY KEY (student_id, course_id),
    FOREIGN KEY (student_id) REFERENCES Student(student_id),
    FOREIGN KEY (course_id) REFERENCES Course(course_id)
);

