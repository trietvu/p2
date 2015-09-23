#**DWA15 Project 2**

##Live URL: [P2 URL](http://p2.medsages.net)

This project is an xkcd Password Generator. It allows the user to generate a password consisting of a 
user specified number of words and includes options to add a number, symbol and/or capital letters.  
Additionally, it allows the user to specify spacing using hyphens, spaces or nothing at all.

The link to the screencast demo for this project can be found at: https://youtu.be/i_vppq_6QTQ

This xkcd Password Generator limits the number of words to no more than 9 words. Additionally, it 
checks to ensure that the user doesn't submit a letter, character/symbol or decimal. If such data is 
submitted, the application will not allow it and instruct the user to input the appropriate numerical 
data.

A uncopyrighted royalty free text file was obtained from Gutenberg.org and used in generating the 
random words. The code was written with the help of instructional content from php.net. The solution to 
add the rand() function after the file_get_contents() function instead of in front of it was found on a 
forum called stackoverflow.com and one issue was identified after uploading the content to the server was provided 
by my TA, Jennifer, and members my section.
