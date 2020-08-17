<!DOCTYPE html>
<!--	Project3.php
Uses a function to determine the three most frequently occurring words in the given string, where the words are delimited on the left by spaces and on the right by commas, periods, or question marks
	-->
<html lang = "en">
<head> 
  <title> Project3</title>
  <meta charset = "utf-8" />
</head>
<body>
<?php

// Function the_three
//  Parameter: a string containing words that are delimited
//             on the left by spaces and on the right by
//             commas, periods, or question marks
//  Returns: an array of the three words that occur most often
//           in the given array

function the_three($in_str) {

// Split the string into its words
  preg_match_all("/ +[A-Za-z]+[,.?]/u", $in_str, $word_list);
print("The words are:<br/><br/>");
  foreach ($word_list[0] as $word)
  print( "$word <br />");
// Create the empty word frequency array

  $freq = array();

// Loop to count the words (either increment or initialize to 1)

  foreach ($word_list[0] as $word) {

// First, get rid of the delimiters

        preg_match("/[A-Za-z]+/", $word, $match);
    $word = $match[0];

// Now, get an array of the keys

    $keys = array_keys($freq);

// Set the frequency for the work

    if(in_array($word, $keys))
      $freq[$word]++;
    else
      $freq[$word] = 1;
  }
  
  

// Sort the frequency array in reverse order of values

  arsort($freq);

// Get the keys and return the first three

  $new_keys = array_keys($freq);
  return array($new_keys[0], $new_keys[1], $new_keys[2]);

} #** End of the_three
?>
    
<br>
        Enter Words: <br>
        <form method="POST" >
            <input type="text" name="words" />
            <input type="submit" name="Submit" />
            <br/>
            <form/>
            
          <?php
          if(isset($_POST['words'])) {
          $str = ($_POST['words']);
       
          
          }
// Main test driver

  $test_str = " apples. like. like. are, good? for, you, or, 
    don't? you, like? apples, or. maybe. you, like,
   oranges, better. than. apples?";

  
// Call the function

  $tbl = the_three($str);

// Display the words and their frequencies

  print "<br /> The Three Most Frequently Occurring Words:<br /><br />";
  $sorted_keys = array_keys($tbl);
  sort($sorted_keys);
  foreach ($sorted_keys as $word)
    print "$tbl[$word] <br />";
?>
</body>
</html>
