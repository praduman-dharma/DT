<?php
    // include function - it helps in handling multiple php files in proper way
    include("19_2_header.php");      // this will include content of header file
?>
    <h2>Main Content</h2>

<?php include("19_3_footer.php");   // this will include content of footer

// include - agar file exist nahi hogi to bhi aage ka block of code run karega 
// lekin in 
// require - agar file exist nahi hogi to aage ka block of code run NAHI karega
// Example

require("19_2_head.php");
echo " I will not run";
?>