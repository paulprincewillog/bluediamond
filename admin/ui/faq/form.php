<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST" action="app/faq/submit_faq" dd_submit="yes">

        <input type="text" name="question" placeholder="Place your question here" max="80" required><br>
        
        <textarea name="answer" placeholder="Place your answer here"  cols="40" rows="10" max="200" required >
        </textarea>
        
        <input type="submit" name="submit_button" value="Done">
        
        </form>
</body>
</html>

