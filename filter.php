<?php
$json = file_get_contents('reviews.json');
$jsonData = json_decode($json, true);

function filterByMinimumRating($jsonData, $minimumRating){
    foreach($jsonData as $key => $val) {
            if($val['rating'] < $minimumRating) unset($jsonData[$key]);
         }
    return $jsonData;
}

function sortByReviewText($jsonData){
    $reviewsWithoutText = array();
    foreach($jsonData as $key => $val) {
        if($val['reviewText'] == "")  {  
             array_push($reviewsWithoutText, ($jsonData[$key]));  
             unset($jsonData[$key]);    
         }
    }
    return array_merge($jsonData,$reviewsWithoutText);
}

function sortByRating($jsonData,$rating) {
    usort($jsonData, function($a, $b) use ($rating){ 
        if($rating == "high") return $b['rating'] - $a['rating'];
        else return $a['rating'] - $b['rating'];
    });
    return $jsonData;
}

function sortByDate($jsonData,$dateSort) {
        usort($jsonData, function($el1, $el2) use ($dateSort){
              $dat1 = strtotime($el1['reviewCreatedOnDate']);
              $dat2 = strtotime($el2['reviewCreatedOnDate']);
              if($dateSort == "old") return $dat1 - $dat2;
              else return $dat2 - $dat1;
          });
    return $jsonData;
}

if ($_POST){
    
    $sortByText=$_POST['sortByText'];
    $rating = $_POST['rating'];
    $dateSort = $_POST['dateSort'];
    $minimumRating = $_POST['minimumRating'];
   
    $jsonData=filterByMinimumRating($jsonData, $minimumRating);
    $jsonData=sortByDate($jsonData,$dateSort);
    $jsonData=sortByRating($jsonData,$rating);

 	if($sortByText == "true") $jsonData=sortByReviewText($jsonData);

    $filteredData = json_encode($jsonData);
    print($filteredData);

}
?>

