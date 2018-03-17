<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>JS NAME</title>
  
  <script>
function sub(){
  product = document.getElementsByName("prod")[0].value;
  shelf = document.getElementsByName("shelf")[0].value;
  
  document.getElementsByName("p")[0].value = shelf;
  
  alert(product+" "+shelf);
};
</script>


</head>
<body>
<h2>product code</h2>
    <form name="form" action="" method="get">
        <input type="text" name="prod">
        <h2>shelf code</h2>
        <input type="button" name="shelf" value="5" onclick="sub()"><br><br>
		<input type="text" name="p">
    </form>

</body>
</html>