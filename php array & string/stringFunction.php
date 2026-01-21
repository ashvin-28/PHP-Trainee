<?php

  $str="Hello World";
  echo(strtolower($str)). "<br>";
  echo(strtoupper($str)). "<br>";
  echo(strrev($str)). "<br>";
  echo(str_contains($str,"World")). "<br>";
  var_dump(str_contains($str,"World"));
  echo "<br>";
  echo (strpos($str,"World")) ."<br>";
  echo strlen($str) . "<br>";
  echo str_word_count($str) . "<br>";
 echo str_replace("World","Icreative",$str) . "<br>";
 $colorArr=["red","green"];
 $str="sky is blue, grass is green , rose is red";
 echo str_replace($colorArr,"color",$str) . "<br>";

 $str2="   hello      world   ";
 echo trim($str2) . "<br>";


 $fruit="Apple ,Banana ,Grapes";
 $fruitArr= explode(",",$fruit);
 print_r($fruitArr);
 echo "<br>";
 foreach($fruitArr as $f){
    echo $f . " ";
 }
 echo "<br>";

 echo substr($str,6) ."<br>";
 echo substr($str,6,3) ."<br>";
 echo substr($str,-3,4) ."<br>";
 echo substr($str,5,-3) ."<br>";

//  escape character
$x="my name is \"Ashvin\" from Siddhpur";
echo $x . "<br>";
echo "<pre>
hello\rworld
</pre>";

// addcslashes : return string with blackslashes in front of the specefied character
$message="Hello World";
 echo addcslashes($message, "W") . "<br>";
 
//   addslashes : return string with blackslashes in front or predefined character (Single quote (')
// Double quote (") ,Backslash (\) , NUL byte (\0) )
$message=addslashes('Hello "How" are you ?');
echo $message . "<br>";

// chop : remove character from right of string (alias of rtrim)
$name="Ashvin Parmar";
// echo $name;
echo chop($name,"Parmar")."<br>";

// chr : return character vfrom specefied ascii value
echo chr(50) . "<br>";
echo chr(052) . "<br>";
echo chr(0x48) . "<br>";

// chunk_split : split string into series of smaller parts

echo chunk_split("Ashvin Parmar","3",".") . "<br>";

// convert_uudecode : decode uuencoded string
$str = ",2&5L;&\@=V]R;&0A `";
echo convert_uudecode($str) . "<br> ";

// convert_uuencode : encode uudecoded string
echo convert_uuencode($name);
echo "<br>";
echo "Hello" . "<br>";

// count_chars : returns information about charcter used in string (mode 3 return string used all different character)
echo "Count chars:" . "<br>";
echo count_chars('Hello World',3) ."<br>";
echo count_chars('Hello World',4) ."<br>";

// crypt : return hashed string using des blowfish or md5
echo "MD5: " .crypt('Hello','$1$Hell$'). "<br>";     //  12character salt start with $1$\

// fprints : write formated string to specified output stream (file or database)
$name="Ashvin";
$age=21; 
$file=fopen("test.txt","w") or die("Can not open file");

echo fprintf($file, "My name is %s & age is %d", $name,$age) ."<br>";

// join : join array element in string (alias of implode)
$nameArr=["Ashvin","Maulik","Krishna"];
echo join(",", $nameArr) . '<br>';

// lcfirst : convert first character into lowercase
echo lcfirst("Hello Wolrd") . "<br>";

// levenshtein : return levenshtein difference between two stings (insert,replace,delete)
echo "levenshtein" ."<br>";
echo levenshtein("Hello World","ello World") . "<br>";
echo levenshtein("Hello World","erro World", 10,20,30) . "<br>";

// MD5 : calculate MD5 hash of string (is true in paramater raw 16 character binary format otherwise row 32 character hex number )
echo MD5("Ashvin") ."<br>";

// MD5_file : calculate MD5 hash of file
echo md5_file("test.txt") ."<br>";

// metaphone : create same key for simillar sounding word
echo metaphone("Hello World") . "<br>";

// quotemeta : add blackeslashes in front of predefined  character in string
echo quotemeta('Hello.World') . "<br>";

// sha1 : calculate sha1 hash of string
echo sha1("Hello") . "<br> ";

// similar_text : calculate similarity of two string and return matching character 
echo similar_text("Hello World", "Hello Icreative") ."<br>";
similar_text("Hello World", "Hello Icreative",$percent);
echo $percent ."<br>";

// sscanf : parses input from string according  to specefied format parses string into varabile based on 
// the format string (write formatted string  to variable)

$myDetail="Name:Ashvin Age:21";
  sscanf($myDetail, "my name is %s and age is %d",$name,$age) . "<br>";
var_dump($name, $age); 
echo "<br>";

// str_getcsv : parse single line string into array
$subject="PHP,JAVA,JAVASCRIPT,MAGENTO,AJAX";
$subjectArr=str_getcsv($subject);
print_r($subjectArr); 
echo "<br>";

// str_pad : pads string to new length
echo str_pad("Hello World","25", "-") ."<br>";
echo str_pad("Hello World","25", "-", STR_PAD_BOTH) ."<br>";

// str_repeat : repeat string into specefied number of time
echo str_repeat("Hello", 10) . "<br>";

// str_shuflle : randomanly shuflle all character in string

echo str_shuffle('Ashvin') . "<br>";

// str_split : split string into array
print_r(str_split("Ashvin" ,3));
echo "<br>";

// wordwrap : wrap string into new line when reach with specefied length
$companyDetail= "Icreative technolabs is very career growing company";
echo wordwrap($companyDetail,15, "<br>\n") . "<br>";

// substr_replace : replace portion of string with another string
echo substr_replace("Hello", "World",0) ."<br>";
echo substr_replace("Hello", "World",2, 2) ."<br>";

// strtok : split string into smaller string token

$token = strtok("Hello how are you"," ");
while($token){
   echo $token . "<br>";
   $token=strtok(" ");
}

// strstr : search first occurence of string nd return  rest orf string
echo strstr("Hello World","W") . "<br>";

// strspn : return number of character found in string that contain only character in charlist
echo strspn("Ashvin Parmar", "vin",3,2) ."<br>";

// htmlentities : convert character to htmlentities

$googleLink= '<a href="https://www.google.com">Go to google</a>';

 echo htmlentities($googleLink) . "<br>";

//  htmlspecialchars : convert some predefine character to html entities (& (ampersand) becomes &amp;
// " (double quote) becomes &quot; ' (single quote) becomes &#039; < (less than) becomes &lt; > (greater than) becomes &gt;)

$peopleInfo='<p>i am currently pursing <b>MCA</b> in <strong>Ganpat University</strong></p>';
echo $peopleInfo . "<br>";
echo htmlspecialchars($peopleInfo);