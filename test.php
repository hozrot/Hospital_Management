

<html>
<head></head>
<body>

<form name="TESTING">
<table border="1" width="600" height="200" cellpadding="10" cellspacing="3">
<tr><th colspan="2"><h1>TESTING</h1></th></tr>
<tr>  <th><h3>INPUT</h3></th>
<th><h3>OUTPUT</h3></th>    </tr>
<tr></tr>
<td><input type="number" name="INPUT1" id="input" onchange="calculate();"/></td>
<td><input type="number" name="INPUT2" id="input" onchange="calculate();"/></td>
<td><input type="number" name="OUTPUT1" id="output"></td>
<table>

</form>

<script type="text/javascript">
function calculate() {

var USERINPUT1 = document.TESTING.INPUT1.value;
var USERINPUT2 = document.TESTING.INPUT2.value;
var CALC1 = USERINPUT1/USERINPUT2;

document.TESTING.OUTPUT1.value = CALC1;

}

</script>
</body>
</html>