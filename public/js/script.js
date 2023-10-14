var table = document.getElementById('infoTable');
for (var i = 0; i < studentData.length; i++) {
  var row = table.insertRow(-1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  cell1.innerHTML = studentData[i].name;
  cell2.innerHTML = studentData[i].date;
  cell3.innerHTML = studentData[i].teacher;
  cell4.innerHTML = studentData[i].subject;
  cell5.innerHTML = studentData[i].totalMark;
}