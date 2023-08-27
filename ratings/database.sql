CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL
);

CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment_id INT NOT NULL,
    action ENUM('helpful', 'not_helpful') NOT NULL,
    user_id INT NOT NULL, -- Você pode adicionar um campo para identificar o usuário
    UNIQUE KEY unique_rating (comment_id, user_id),
    FOREIGN KEY (comment_id) REFERENCES comments(id)
);
