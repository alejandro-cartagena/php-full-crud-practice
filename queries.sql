-- Creates users table
CREATE TABLE users (
	id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);

-- Creates a posts table that has a relationship with the users table
CREATE TABLE posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,           -- Unique identifier for each post
    user_id INT NOT NULL,                             -- Foreign key linking to the users table
    post_text TEXT NOT NULL,                          -- The text content of the post
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,   -- Timestamp for when the post is created
    FOREIGN KEY (user_id) REFERENCES users(id)        -- Foreign key constraint linking to users table
)

