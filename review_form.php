
<a href="index.php"><button>Go to Main Page</button></a>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
</head>
<body>
    <h1>Submit Review</h1>
    <form action="submit_review.php" method="post">
        <input type="hidden" name="idBabyStuff" value="1"> <!-- Replace with actual product ID -->
        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" id="rating" min="1" max="5" required><br>
        <label for="review">Review:</label><br>
        <textarea name="review" id="review" cols="30" rows="5" required></textarea><br>
        <button type="submit">Submit Review</button>
    </form>
</body>
</html>
