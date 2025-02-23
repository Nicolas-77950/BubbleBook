INSERT INTO `Groomer` (`siret_number`, `address`, `city`, `department`) VALUES
('12345678901234', '12 Rue des Éleveurs', 'Paris', '75'),
('98765432109876', '45 Avenue des Animaux', 'Lyon', '69'),
('56789012345678', '78 Boulevard des Chats', 'Marseille', '13');


INSERT INTO `User` (`email`, `password`, `last_name`, `first_name`, `id_groomer`) VALUES
('jean.dupont@example.com', 'password123', 'Dupont', 'Jean', 1),
('marie.durand@example.com', 'password456', 'Durand', 'Marie', NULL),
('pierre.martin@example.com', 'password789', 'Martin', 'Pierre', 2),
('sophie.leroy@example.com', 'password101', 'Leroy', 'Sophie', NULL);


INSERT INTO `Service` (`groomer_id`, `service_name`, `duration`, `price_ht`, `vat`) VALUES
(1, 'Toilettage complet', 120, 50.0, 20.0),
(1, 'Coupe de griffes', 30, 15.0, 20.0),
(2, 'Bain et séchage', 90, 40.0, 20.0),
(3, 'Démêlage et brossage', 60, 30.0, 20.0);

INSERT INTO `Breed` (`breed_name`, `average_weight`, `species`) VALUES
('Labrador Retriever', 30.0, 'Chien'),
('Persan', 5.0, 'Chat'),
('Berger Allemand', 35.0, 'Chien'),
('Siamois', 4.5, 'Chat');

INSERT INTO `Pet` (`user_id`, `breed_id`, `pet_name`, `weight`, `size`) VALUES
(1, 1, 'Rex', 32.0, 60.0),
(2, 2, 'Mimi', 4.8, 25.0),
(3, 3, 'Max', 36.0, 65.0),
(4, 4, 'Luna', 4.7, 24.0);

INSERT INTO `Booking` (`service_id`, `user_id`, `reservation_date`, `is_done`, `is_validated`) VALUES
(1, 1, '2023-10-15 10:00:00', 1, 1),
(2, 2, '2023-10-16 14:00:00', 0, 1),
(3, 3, '2023-10-17 09:30:00', 0, 0),
(4, 4, '2023-10-18 16:00:00', 1, 1);