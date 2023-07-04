<?php 
include '../../index.php';
global $conn;
$sql = "CREATE TABLE IF NOT EXISTS Feedback( FeedbackID INT PRIMARY KEY AUTO_INCREMENT, AttractionID int NOT NULL ,   UserID INT NOT NULL, comment varchar(255), Ratting int, CONSTRAINT fk_Feedback_AttractionID FOREIGN KEY (AttractionID) REFERENCES Attraction(ID),
    CONSTRAINT fk_Feedback_UserID FOREIGN KEY (UserID) REFERENCES User(ID))";
mysqli_query($conn, $sql);

function addFeedback($AttractionID, $userid, $comment, $ratting){
    global $conn;
$add = "INSERT INTO Feedback(AttractionID, UserID, comment, Ratting) VALUES('$AttractionID', '$userid', '$comment', '$ratting')";

if(mysqli_query($conn, $add)) {
        // If the query was successful, return a success message
        $response['status'] = '200';
        $response['message'] = 'Feedback added successfully';
        echo json_encode($response);
    } else {
        // If the query failed, return an error message
        $response['status'] = '400';
        $response['message'] = 'Error adding Feedback: ' . mysqli_error($conn);
    }

}
function getFeedback($id){
    global $conn;
 $get = "SELECT * FROM Feedback WHERE AttractionID = $id ";
 $result = mysqli_query($conn,$get);
   $rows = array();
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    echo json_encode($rows,JSON_UNESCAPED_SLASHES);
}
