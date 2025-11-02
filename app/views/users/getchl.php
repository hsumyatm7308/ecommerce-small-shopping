<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Challenge Code</title>
</head>
<body>
  <h1>Hello Generate challenge code</h1>
  <script>
    fetch("http://localhost/perfumesite/mvcshop/users/getChallengeAPI")
      .then(res => res.json())
      .then(res => console.log("Challenge:", res.challenge))
      .catch(err => console.error("Fetch error:", err));
  </script>
</body>
</html>
