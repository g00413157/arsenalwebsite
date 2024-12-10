<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<?php
$servername = "localhost"; // Use "localhost" if it's running locally
$username = "root";
$password = "";
$db_name = "arsenalwebsitedb";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO matches (date, badge_url, opponent, stadium, home_away, score, arsenalb_url, arsenal, comp_url, competition, season) VALUES
('2022-09-10', 'teams/chelsea.png', 'Chelsea Women', 'Kingsmeadow', 'Away', '1-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-09-18', 'teams/reading.png', 'Reading Women', 'Meadow Park', 'Home', '3-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-09-25', 'teams/spurs.png', 'Tottenham Hotspur Women', 'Tottenham Hotspur Stadium', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-10-02', 'teams/mancity.png', 'Manchester City Women', 'Academy Stadium', 'Away', '1-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-10-09', 'teams/astonvilla.png', 'Aston Villa Women', 'Villa Park', 'Away', '0-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-10-16', 'teams/liverpool.png', 'Liverpool Women', 'Meadow Park', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-10-23', 'teams/brighton.png', 'Brighton Women', 'Amex Stadium', 'Away', '4-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-11-01', 'teams/barca.png', 'Barcelona Women', 'Camp Nou', 'Away', '1-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2022/23'),
('2022-11-07', 'teams/bayern.png', 'Bayern Munich Women', 'Meadow Park', 'Home', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2022/23'),
('2022-11-13', 'teams/bristolcity.png', 'Bristol City Women', 'Ashton Gate', 'Away', '2-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-11-20', 'teams/lcity.png', 'Leicester City Women', 'Meadow Park', 'Home', '5-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-11-27', 'teams/psg.png', 'Paris Saint-Germain Women', 'Parc des Princes', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2022/23'),
('2022-12-04', 'teams/chelsea.png', 'Chelsea Women', 'Meadow Park', 'Home', '0-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-12-11', 'teams/everton.png', 'Everton Women', 'Walton Hall Park', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2022-12-18', 'teams/westham.png', 'West Ham Women', 'Meadow Park', 'Home', '3-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2022/23'),
('2024-01-10', 'teams/chelsea.png', 'Chelsea Women', 'Emirates Stadium', 'Home', '2-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-01-17', 'teams/mancity.png', 'Manchester City Women', 'Academy Stadium', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-01-24', 'teams/spurs.png', 'Tottenham Hotspur Women', 'Tottenham Hotspur Stadium', 'Away', '3-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-02-03', 'teams/brighton.png', 'Brighton Women', 'Meadow Park', 'Home', '4-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-02-10', 'teams/manutd.png', 'Manchester United Women', 'Leigh Sports Village', 'Away', '0-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-02-17', 'teams/astonvilla.png', 'Aston Villa Women', 'Villa Park', 'Away', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-02-24', 'teams/westham.png', 'West Ham Women', 'Meadow Park', 'Home', '5-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-03-02', 'teams/liverpool.png', 'Liverpool Women', 'Prenton Park', 'Away', '3-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-03-09', 'teams/lcity.png', 'Leicester City Women', 'Meadow Park', 'Home', '4-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-03-16', 'teams/reading.png', 'Reading Women', 'Select Car Leasing Stadium', 'Away', '0-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-03-23', 'teams/bristolcity.png', 'Bristol City Women', 'Meadow Park', 'Home', '6-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-04-01', 'teams/chelsea.png', 'Chelsea Women', 'Kingsmeadow', 'Away', '1-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2023/24'),
('2024-04-08', 'teams/everton.png', 'Everton Women', 'Meadow Park', 'Home', '2-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2023/24'),
('2024-04-15', 'teams/bayern.png', 'Bayern Munich Women', 'Allianz Arena', 'Away', '0-3', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2023/24'),
('2024-04-22', 'teams/barca.png', 'Barcelona Women', 'Meadow Park', 'Home', '1-1', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2023/24'),
('2024-05-01', 'teams/psg.png', 'Paris Saint-Germain Women', 'Parc des Princes', 'Away', '2-2', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2023/24'),
('2024-05-08', 'teams/chelsea.png', 'Chelsea Women', 'Wembley Stadium', 'Neutral', '1-0', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup Final', '2023/24'),
('2024-09-14', 'teams/mancity.png', 'Manchester City Women', 'Academy Stadium', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
('2024-09-21', 'teams/spurs.png', 'Tottenham Hotspur Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
('2024-09-28', 'teams/liverpool.png', 'Liverpool Women', 'Prenton Park', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
('2024-10-05', 'teams/reading.png', 'Reading Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
('2024-10-12', 'teams/chelsea.png', 'Chelsea Women', 'Kingsmeadow', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
('2024-10-19', 'teams/brighton.png', 'Brighton Women', 'Amex Stadium', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
('2024-10-26', 'teams/westham.png', 'West Ham Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
('2024-11-02', 'teams/psg.png', 'Paris Saint-Germain Women', 'Parc des Princes', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
('2024-11-09', 'teams/astonvilla.png', 'Aston Villa Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
('2024-11-16', 'teams/bayern.png', 'Bayern Munich Women', 'Allianz Arena', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
('2024-11-23', 'teams/barca.png', 'Barcelona Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
('2024-12-01', 'teams/arsenal.png', 'Arsenal Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
('2024-12-08', 'teams/bristolcity.png', 'Bristol City Women', 'Ashton Gate', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/wsl.png', 'Womens Super League', '2024/25'),
('2024-12-15', 'teams/chelsea.png', 'Chelsea Women', 'Wembley Stadium', 'Neutral', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2024/25'),
('2024-12-22', 'teams/mancity.png', 'Manchester City Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2024/25'),
('2025-01-06', 'teams/bayern.png', 'Bayern Munich Women', 'Allianz Arena', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
('2025-01-13', 'teams/barca.png', 'Barcelona Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
('2025-01-20', 'teams/lyon.png', 'Lyon Women', 'Groupama Stadium', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
('2025-01-27', 'teams/real_madrid.png', 'Real Madrid Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
('2025-02-03', 'teams/wolfsburg.png', 'Wolfsburg Women', 'Volkswagen Arena', 'Away', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
('2025-02-10', 'teams/juventus.png', 'Juventus Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25'),
('2025-02-17', 'teams/chelsea.png', 'Chelsea Women', 'Wembley Stadium', 'Neutral', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/facup.png', 'FA Womens Cup', '2024/25'),
('2025-02-24', 'teams/psg.png', 'Paris Saint-Germain Women', 'Meadow Park', 'Home', '', 'teams/arsenal.png', 'Arsenal Women', 'comp/uwcl.png', 'Womens Champions League', '2024/25');









";

if (mysqli_query($conn, $sql)) {
    echo "Matches added successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>









