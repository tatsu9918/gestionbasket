INSERT INTO joueurs (Nom, Prenom, Photo, NumLicence, DateNaissance, Taille, Poids, Poste_pref, Statut, Commentaire) VALUES
("James", "LeBron", "lebron.jpg", "123456", "1984-12-30", "2.03", "113", "Ailier fort", 1, "Meilleur joueur de la NBA"),
("Michael", "Jordan", "jordan.jpg", "234567", "1963-02-17", "1.98", "98", "Arriere", 2, "Legende de la NBA"),
("Kobe", "Bryant", "bryant.jpg", "345678", "1978-08-23", "1.98", "96", "Arriere", 1, "Legende de la NBA"),
("Larry", "Bird", "bird.jpg", "456789", "1956-12-07", "2.03", "104", "Ailier fort", 2, "Legende de la NBA"),
("Magic", "Johnson", "johnson.jpg", "567890", "1959-08-14", "2.03", "98", "Meneur", 1, "Legende de la NBA"),
("Tim", "Duncan", "duncan.jpg", "678901", "1976-04-25", "2.11", "111", "Pivot", 2, "Legende de la NBA"),
("Hakeem", "Olajuwon", "olajuwon.jpg", "789012", "1963-01-21", "2.13", "118", "Pivot", 1, "Legende de la NBA"),
("Shaquille", "O'Neal", "oneal.jpg", "890123", "1972-03-06", "2.16", "148", "Pivot", 2, "Legende de la NBA"),
("Wilt", "Chamberlain", "chamberlain.jpg", "901234", "1936-08-21", "2.16", "142", "Pivot", 1, "Legende de la NBA"),
("Bill", "Russell", "russell.jpg", "012345", "1934-02-12", "2.03", "104", "Pivot", 2, "Legende de la NBA"),
("Kareem", "Abdul-Jabbar", "jabbar.jpg", "987654", "1947-04-16", "2.18", "115", "Pivot", 1, "Legende de la NBA"),
("Karl", "Malone", "malone.jpg", "876543", "1963-07-24", "2.03", "104", "Ailier fort", 2, "Legende de la NBA"),
("Scottie", "Pippen", "pippen.jpg", "765432", "1965-09-25", "2.03", "104", "Ailier fort", 1, "Legende de la NBA"),
("Dirk","Nowitzki", "nowitzki.jpg", "6543210", "1978-06-19", "2.13", "108", "Ailier fort", 1, "Legende de la NBA");

DELETE FROM joueurs WHERE Nom IN ("James", "Michael", "Kobe", "Larry", "Magic", "Tim", "Hakeem", "Shaquille", "Wilt", "Bill", "Kareem", "Karl", "Scottie", "Dirk");