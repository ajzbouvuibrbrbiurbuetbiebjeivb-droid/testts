CREATE TABLE message (
    id INT AUTO_INCREMENT PRIMARY KEY,
    expediteur VARCHAR(255) NOT NULL,
    destinataire VARCHAR(255) NOT NULL,
    sujet VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('lu', 'non lu') DEFAULT 'non lu'
);
