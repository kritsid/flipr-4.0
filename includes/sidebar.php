<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidepanel  {
  width: 0;
  position: fixed;
  z-index: 1;
  height: 450px;
  top: 0;
  left: 0;
  background-color: #010;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidepanel a:hover {
  color: #f1f1f1;
}

.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color:#444;
}
</style>
</head>
<body>

<div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a class="active" href="../user/user_dash.php">DASHBOARD</a>
  <a href="../user/new_req.php" title="NEW REQUEST">NEW</a>
  <a href="#contact"title="CONTACT DETAILS">CONTACT</a>
  <a href="#about"title="PREVIOUS REQUESTS">PREV</a>
</div>

<button class="openbtn" onclick="openNav()">☰ </button>  


<script>
function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
</script>
   
</body>
</html> 


