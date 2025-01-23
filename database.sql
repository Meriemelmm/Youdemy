CREATE TABLE Users (
   user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    role ENUM('Etudiant', 'teacher', 'admin') NOT NULL,
 status ENUM('ban', 'unban') DEFAULT 'unban';
,    compte_status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   
);

--     CREATE TABLE Teacher (
--     teacher_id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT ,
--    compte_status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
--     FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
-- );

CREATE TABLE Course (
    cours_id INT PRIMARY KEY AUTO_INCREMENT,
   cours_ title VARCHAR(255) NOT NULL,
    cours_description TEXT NOT NULL,
    text_content TEXT DEFAULT NULL ,         
    vedio_content VARCHAR(255),      
    category_id INT default NULL,
   
    teacher_id INT, 

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES Categories(categorie_id)ON DELETE CASCADE,
    FOREIGN KEY (teacher_id) REFERENCES users(user_id)ON DELETE CASCADE,
    
    
);
CREATE TABLE inscrit_etudiant (
    inscrit_id INT AUTO_INCREMENT PRIMARY KEY,
    etudiant_id INT,
    cours_id INT,
    teacher_id INT,
    FOREIGN KEY (etudiant_id) REFERENCES users (user_id) ON DELETE CASCADE, FOREIGN KEY (teacher_id) REFERENCES users (user_id) ON DELETE CASCADE,
    FOREIGN KEY (cours_id) REFERENCES cours(cours_id) ON DELETE CASCADE
);
CREATE TABLE Tags (
    tag_id INT PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(150) NOT NULL UNIQUE
);
CREATE TABLE Categories (
    categorie_id INT PRIMARY KEY AUTO_INCREMENT,
    categorie_name VARCHAR(150) NOT NULL UNIQUE
);
CREATE TABLE tag_course (
    id INT AUTO_INCREMENT PRIMARY KEY,        
    tag_id INT NOT NULL,                      
    cours_id INT NOT NULL,                   

    FOREIGN KEY (tag_id) REFERENCES tags(tag_id) ON DELETE CASCADE,  
    FOREIGN KEY (course_id) REFERENCES cours(cours_id) ON DELETE CASCADE  
);










