<?php

#### Reading File
// While Loop
// feof() function
// fgets() function

### feof() funtion

// feof() >> this funtion return true,if you are able to reach at the end of file.
//        >> this funtion return true,jab ham file ke end me pahoch jate he.
//        >> file ke content ko starting se check karta he aur agar end tak pahoch jata 
//           he to true return karta he.
//           agar aapko ko file ka end nahi malum ho to file ka end pata karne ke   
//           liye ye function ka use karte he.

// Syntax : feof($file_handle);
// Ex :     feof($handle);


## fgets() function
// This funtion reads the line in file.
// This Function is used to read a single line from a file.You can pass this function a file handle corresponding to an open file, and optional length.

// Syntax : fgets($file_handle,length);
// Ex : fgets($handle);


// If no length specified, the length default to 1024 bytes.