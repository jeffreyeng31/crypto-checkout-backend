CREATE TABLE transactions (
    id CHAR(36) PRIMARY KEY,
    transaction_id VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    status VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE jobs (
    id CHAR(36) PRIMARY KEY,
    payload TEXT NOT NULL,
    status ENUM('pending', 'processed') DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);