-- Create the database (if not already created)
CREATE DATABASE IF NOT EXISTS arsenalwebsitedb;
USE arsenalwebsitedb;

-- Create the players table
CREATE TABLE matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    badge_url VARCHAR(20) NOT NULL,
    opponent VARCHAR(100) NOT NULL,
    stadium VARCHAR(100) NOT NULL,
    home_away ENUM('Home','Away','Neutral') NOT NULL,
    score VARCHAR(20) NOT NULL,
    comp_url VARCHAR(20) NOT NULL,
    competition VARCHAR(100) NOT NULL,
    season VARCHAR(20) NOT NULL
);
-- Insert data into matches table
INSERT INTO matches (date, badge_url,opponent, stadium, home_away, score, competition, season) VALUES
('2024-01-10', 'teams/chelsea.png','Chelsea Women', 'Emirates Stadium', 'Home', '2-1', 'comp_url/wsl.png' ,'Womens Super League', '2023/24'),
('2024-01-17',  'teams/mancity.png','Manchester City Women', 'Academy Stadium', 'Away', '1-1', 'comp_url/wsl.png' , 'Womens Super League', '2023/24'),
('2024-01-24',  'teams/spurs.png','Tottenham Hotspur Women', 'Tottenham Hotspur Stadium', 'Away', '3-0', 'comp_url/wsl.png' , 'Womens Super League', '2023/24'),
('2024-02-03',  'teams/brighton.png','Brighton & Hove Albion Women', 'Meadow Park', 'Home', '4-2',  'comp_url/wsl.png' ,'Womens Super League', '2023/24'),
('2024-02-10',  'teams/manutd.png','Manchester United Women', 'Leigh Sports Village', 'Away', '0-2', 'comp_url/wsl.png' , 'Womens Super League', '2023/24'),
('2024-02-17',  'teams/astonvilla.png','Aston Villa Women', 'Villa Park', 'Away', '1-1', 'comp_url/wsl.png' , 'Womens Super League', '2023/24'),
('2024-02-24',  'teams/westham.png','West Ham United Women', 'Meadow Park', 'Home', '5-0',  'comp_url/wsl.png' ,'Womens Super League', '2023/24'),
('2024-03-02',  'teams/liverpool.png','Liverpool Women', 'Prenton Park', 'Away', '3-2',  'comp_url/wsl.png' ,'Womens Super League', '2023/24'),
('2024-03-09',  'teams/lcity.png','Leicester City Women', 'Meadow Park', 'Home', '4-1',  'comp_url/wsl.png' ,'Womens Super League', '2023/24'),
('2024-03-16',  'teams/reading.png','Reading Women', 'Select Car Leasing Stadium', 'Away', '0-3',  'comp_url/wsl.png' ,'Womens Super League', '2023/24'),
('2024-03-23',  'teams/bristolcity.png','Bristol City Women', 'Meadow Park', 'Home', '6-1',  'comp_url/wsl.png' ,'Womens Super League', '2023/24'),
('2024-04-01',  'teams/chelsea.png','Chelsea Women', 'Kingsmeadow', 'Away', '1-2',  'comp_url/facup.png' ,'FA Womens Cup', '2023/24'),
('2024-04-08',  'teams/everton.png','Everton Women', 'Meadow Park', 'Home', '2-0',  'comp_url/wsl.png' ,'Womens Super League', '2023/24'),
('2024-04-15',  'teams/bayern.png','Bayern Munich Women', 'Allianz Arena', 'Away', '0-3', 'comp_url/uwcl.png' , 'Womens Champions League', '2023/24'),
('2024-04-22',  'teams/barca.png','Barcelona Women', 'Meadow Park', 'Home', '1-1', 'comp_url/uwcl.png','Womens Champions League', '2023/24'),
('2024-05-01',  'teams/psg.png','Paris Saint-Germain Women', 'Parc des Princes', 'Away', '2-2','comp_url/uwcl.png' , 'Womens Champions League', '2023/24'),
('2024-05-08',  'teams/chelsea.png','Chelsea Women', 'Wembley Stadium', 'Neutral', '1-0','comp_url/facup.png' , 'FA Womens Cup Final', '2023/24');
