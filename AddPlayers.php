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
$db_name = "arsenalwebsite";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO players (name, number, position, nationality, flag_reference, date_of_birth, date_joined, description) VALUES
('Manuela Zinsberger', 1, 'Goalkeeper', 'Austrian','aus.png', '1995-10-19', '2019-07-01', 'A commanding goalkeeper known for her shot-stopping and composure.'),
('Daphne Van Domselaar', 14, 'Goalkeeper', 'Dutch','ned.png', '2000-03-06', '2024-07-31', 'A talented Dutch goalkeeper renowned for her quick reflexes, commanding presence, and impressive performances on the international stage.'),
('Laura Wienroither', 26, 'Defender', 'Austrian','aus.png', '1999-01-13', '2022-01-20', 'A talented full-back who provides defensive stability and attacking runs.'),
('Lotte Wubben-Moy', 3, 'Defender', 'English','eng.png', '1999-01-11', '2020-09-09', 'A homegrown talent known for her strong defending and ball-playing ability.'),
('Emily Fox', 2, 'Defender', 'American','usa.png', '1998-07-05', '2024-01-11', 'A dynamic American defender known for her pace, defensive versatility, and ability to contribute effectively in attack and defense.'),
('Laia Codina', 5, 'Defender', 'Spanish', 'spa.png','2000-01-22', '2023-08-29', 'A versatile Spanish defender known for her composure, precise passing, and ability to build play from the back.'),
('Leah Williamson', 6, 'Defender', 'English','eng.png', '1997-03-29', '2014-01-01', 'England captain and Arsenal leader known for her intelligence and composure on the ball.'),
('Steph Catley', 7, 'Defender', 'Australian','oz.png', '1994-01-26', '2020-07-01', 'A versatile left-back with excellent crossing and defensive awareness.'),
('Mariona Caldentey', 8, 'Midfielder', 'Spanish','spa.png', '1996-03-19', '2024-07-02', 'A versatile Spanish Midfielder known for her composure, precise passing, and ability to build play from the back.'),
('Katie McCabe', 11, 'Midfielder/Defender', 'Irish','ire.png', '1995-09-21', '2015-12-01', 'An energetic and versatile player with a lethal left foot.'),
('Kim Little', 10, 'Midfielder', 'Scottish', 'sco.png','1990-06-29', '2017-01-01', 'Arsenal captain and a world-class playmaker with a history of success.'),
('Frida Maanum', 12, 'Midfielder', 'Norwegian', 'nor.png','1999-07-16', '2021-07-01', 'A dynamic midfielder who contributes to both attack and defense.'),
('Lia Wälti', 13, 'Midfielder', 'Swiss','swi.png', '1993-04-19', '2018-07-01', 'A defensive midfielder known for her vision, tactical intelligence, and calmness.'),
('Rosa Kafaji', 16, 'Forward', 'Swedish','swe.png', '2003-07-05', '2024-08-01', 'A skillful Swedish forward known for her aerial ability, versatility, and knack for scoring crucial goals in big moments.'),
('Lina Hurtig', 17, 'Forward', 'Swedish', 'swe.png','1995-09-05', '2022-08-01', 'A promising Swedish forward celebrated for her speed, technical skill, and creativity in the attacking third.'),
('Victoria Pelova', 20, 'Midfielder','Dutch','ned.png', '1999-06-03', '2023-01-01', 'An agile and creative midfielder who excels at dribbling and passing.'),
('Kathrine Kuhl', 22, 'Midfielder', 'Danish','den.png', '2002-02-15', '2023-01-07', 'A talented Danish midfielder known for her vision, technical ability, and composure in controlling the tempo of the game.'),
('Kyra Cooney-Cross', 32, 'Midfielder', 'Australian','oz.png', '2003-07-05', '2023-09-15', 'A dynamic Australian midfielder recognized for her playmaking skills, athleticism, and ability to dictate the flow of the game.'),
('Beth Mead', 9, 'Forward', 'English','eng.png', '1995-05-09', '2017-01-01', 'A prolific winger with a knack for scoring and creating key chances.'),
('Stina Blackstenius', 25, 'Forward', 'Swedish','swe.png', '1996-02-05', '2022-01-14', 'A powerful striker known for her pace and clinical finishing.'),
('Alessia Russo', 23, 'Forward', 'English','eng.png', '1999-02-08', '2023-07-01', 'A rising star and versatile forward with excellent technical skills.'),
('Caitlin Foord', 19, 'Forward', 'Australian','oz.png', '1994-11-11', '2020-01-24', 'A dynamic winger/forward with exceptional dribbling and goal-scoring ability.');";

if (mysqli_query($conn, $sql)) {
    echo "Players added successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>
