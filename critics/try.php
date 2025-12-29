<input id="file" type="file" onchange="loadFile(event)" />
<?php echo "<img src='../../src/" . $row['profile_pic'] ."' id='output' width='200' />"; ?>
var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};