# Steamworks
## Gry
- id_gry INT PRIMARY KEY AUTO_INCREMENT
- nazwa VARCHAR(32) UNIQUE NOT NULL
- id_producenta FOREIGN KEY NOT NULL
- id_wydawcy FOREIGN KEY NOT NULL
- data_wydania DATE NOT NULL
- cena INT NOT NULL
- gatunek_gry FOREIGN KEY NOT NULL
## Przeceny 
- id_przeceny INT PRIMARY KEY AUTO_INCREMENT
- nazwa VARCHAR(32) UNIQUE NOT NULL
- id_gry INT FOREIGN KEY NOT NULL
- przecena INT NOT NULL
- data_konca DATE NOT NULL
## Producenci
- id_producenta INT PRIMARY KEY AUTO_INCREMENT
- nazwa VARCHAR(32) NOT NULL UNIQUE
- typ_producenta VARCHAR(32) NOT NULL
- opis_producenta VARCHAR(64) NOT NULL
- opinia_publiczna DECIMAL NOT NULL
## Wydawcy
- id_wydawcy INT PRIMARY KEY AUTO_INCREMENT
- nazwa VARCHAR(32) NOT NULL
- opis_wydawcy VARCHAR(32) NOT NULL
- opinia_publiczna DECIMAL NOT NULL
## Gatunki gier
- id_gatunku INT PRIMARY KEY AUTO_INCREMENT
- nazwa_gatunku VARCHAR(32) NOT NULL UNIQUE
- opis_gatunku VARCHAR(64) NOT NULL
- preferowana_publicznosc VARCHAR(32) NOT NULL
