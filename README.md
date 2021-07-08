# Avatar Image

Demo : coming soon

## Important

The script is intended to create an image and then upload its path to a database, but you can still use it according to your needs.

## What does it do?

This class converts the first character of a word into an image. It has support for several letters. It is still under development. If you want to provide a personalized experience to your users, you can implement this code. In case you use it and find a bug don't forget to inform me.  

It is important to have the GD library for image processing, since, this is just a function which is supported by GD.

## Demonstration and examples

Check out the `script/` directory, which you can load in your browser. You can test the script and its functionality.

## How to use it?

Create a simple HTML file, with a form such as:
```html
<form method="post" action="register.php">
  <input type="text" name="username" placeholder="Please enter your username">
  <button type="submit">Create Image</button>
</form>
```
Create a file called register.php (where the data will be processed):
```php
// We receive the user name from the form
$username = $_POST["username"];
// We obtain the first letter of the word
$letter = $username[0];
// The letter is capitalized
$nameFirstChar = strtoupper($letter);
// This parameter is sent to the function
$target_path = createAvatarImage($nameFirstChar);
```
Create a file called avatar.php (where the function is located)
```php
function createAvatarImage($string)
{
    // The file path
    $imageFilePath = "../assets/avatar/" . $string . ".png";

    // Check that the file does not exist
    if (!file_exists($imageFilePath))
    {
        /*
            Base avatar image that we use to center
            our text string on top of it
        */
        $avatar = imagecreate(185,190);

        /*
            Assign random RGB values
        */

        $r = rand(50,200); /* r (red) */
        $g = rand(50,200); /* g (green) */
        $b = rand(50,200); /* b (blue) */

        imagecolorallocate($avatar, $r, $g, $b);
        $textcolor = imagecolorallocate($avatar, 255, 255, 255);
	
	// The complete route is taken to avoid errors
        $font = 'C:\xampp\htdocs\botsym\assets\fonts\bold.ttf';
        $font = mb_convert_encoding($font, 'big5', 'utf-8');


	// This script sizes letters that have an extraordinary size
        include "../helper/sizeavatar.php";

        imagettftext($avatar, 90, 0, $x, $y, $textcolor, $font, $string);

        /*
            Header("Content-type: image/png");
        */

        imagepng($avatar, $imageFilePath);
        imagedestroy($avatar);
        return $imageFilePath;
    } 
    else 
    {
	//If the file exists, the existing file is returned.
        $imageFilePath = "../assets/avatar/" . $string . ".png";
        return $imageFilePath;
    }
}
```
Create a file called sizeavatar.php (to cover errors by dimension)
```php
// default
$y = 138;
// dimension
if ($string == 'M') {
    $x = 40;
    $y = 140;
} elseif ($string == 'I') {
    $x = 75;
} elseif ($string == 'L') {
    $x = 63;
} elseif ($string == 'S' || $string == 'P' || $string == 'F') {
    $x = 60;
} elseif ($string == 'K') {
    $x = 56.5;
} elseif ($string == 'B' || $string == 'E' || $string == 'J') {
    $x = 55;
} elseif ($string == 'N') {
    $x = 48;
} elseif ($string == 'G' || $string == 'O' || $string == 'Q') {
    $x = 45;
} else {
    $x = 50;
}
```
### How does it work?

The form will send the username to a PHP document. Then the submitted value will be processed in a variable, subsequently set to be sent to the function. Finally, the function generates the background color, sizes the font and generates an image.

## Requirements

It is strongly recommended that you have the GD library enabled.

The function has support for the latest PHP versions.
