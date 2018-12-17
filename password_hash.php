<?php
/**
 * Created by PhpStorm.
 * User: Kous92
 * Date: 2018-12-17
 * Time: 15:36
 */

echo password_hash("EfreiTest2018", PASSWORD_BCRYPT);

// INSERT INTO users('id', 'email', 'password', 'nom', 'prenom', 'visited') VALUES (NULL, 'test@gmail.com', '$2y$10$fUDaQFUhDInDCLfeljLt6uqP7leI/tN/BXhIfUCx7c9T3eNh.gGk2', 'John', 'DOE', 0);
// INSERT INTO users(id, email, password, nom, prenom, visited) VALUES (NULL, 'test@gmail.com', '$2y$10$fUDaQFUhDInDCLfeljLt6uqP7leI/tN/BXhIfUCx7c9T3eNh.gGk2', 'John', 'DOE', 0);
?>