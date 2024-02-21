<?php 
    $str = "This is a post #this_is_tag #this_is_another_tag2 helliooo #tag22";

    function getTags($str) {
        $chars = str_split($str);
        $hashTags = "";
        $found_hash = false;
        foreach($chars as $char) {
            // echo $char;
            if($found_hash) {
                $hashTags .= $char;
            }
            if($char == ' ' && $found_hash == true) {
                $found_hash = false;
                $hashTags .= " , "; // space seprator

            }
            if($char == '#') {
                $found_hash = true;
            }

        }

        return $hashTags;
    }


    if(isset($_GET["post"])) {
        print("#Tags : ");
        print(getTags($_GET["post"]));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tags Extractor</title>
</head>
<body>
    <h1>#Tags Finder</h1>
    <h2>Write a Post and this will extract tags</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="post">Write a Post here.</label>
        <input type="text" name="post" id="post">
    </form>
    
</body>
</html>