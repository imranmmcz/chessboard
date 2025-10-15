<?php
/**
 * PHP code to generate the HTML for a standard 8x8 chessboard.
 */

// Define the size of the board (8 rows and 8 columns)
$rows = 8;
$cols = 8;

// Start the HTML output for the board
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Chessboard</title>
    <style>
        .chessboard {
            display: grid;
            /* Create an 8x8 grid */
            grid-template-columns: repeat(8, 50px); 
            grid-template-rows: repeat(8, 50px);
            border: 2px solid #333;
            width: 400px; /* 8 * 50px */
            height: 400px; /* 8 * 50px */
            margin: 20px auto;
        }
        .square {
            width: 50px;
            height: 50px;
        }
        .light {
            background-color: #f0d9b5; /* Light square color */
        }
        .dark {
            background-color: #b58863; /* Dark square color */
        }
    </style>
</head>
<body>
    <h1>8x8 Chessboard Generated with PHP</h1>
    <div class="chessboard">';

// Loop through each row
for ($row = 1; $row <= $rows; $row++) {
    // Loop through each column
    for ($col = 1; $col <= $cols; $col++) {
        
        // The chessboard pattern: 
        // A square is dark if the sum of its row and column indices is even (for a 0-indexed board starting at (0,0) as light)
        // OR it's dark if the sum of its row and column indices is odd (for a 1-indexed board starting at (1,1) as light)
        
        // For 1-indexed rows and columns (1-8), we want (1,1) to be light.
        // If (row + col) is even, the square is light.
        // If (row + col) is odd, the square is dark.

        if (($row + $col) % 2 === 0) {
            // Light square (e.g., 1+1=2, 1+3=4, etc.)
            $color_class = 'light';
        } else {
            // Dark square (e.g., 1+2=3, 2+1=3, etc.)
            $color_class = 'dark';
        }

        // Output the HTML for the individual square
        // Added 'data' attributes for demonstration (optional)
        echo '<div class="square ' . $color_class . '" data-row="' . $row . '" data-col="' . $col . '"></div>';
    }
}

// Close the HTML tags
echo '    </div>
</body>
</html>';

?>
