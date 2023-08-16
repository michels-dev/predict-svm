<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Penderita Stroke</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Gender</th>
    <th>Age</th>
	<th>Hypertension</th>
    <th>Heart Disease</th>
    <th>Ever Married</th>
	<th>Average Glucose Level</th>
	<th>BMI</th>
    <th>Smoking Status</th>
    <th>Stroke</th>
  </tr>
  @php
	$no=1;
  @endphp
  @foreach ($data as $row)
  <tr>
	<td>{{ $no++ }}</td>
	<td>{{ $row->gender }}</td>
	<td>{{ $row->age }}</td>
	<td>{{ $row->hypertension }}</td>
	<td>{{ $row->heart_disease }}</td>
	<td>{{ $row->ever_married }}</td>
	<td>{{ $row->avg_gluose_level }}</td>
	<td>{{ $row->bmi }}</td>
	<td>{{ $row->smoking_status }}</td>
	<td>{{ $row->stroke }}</td>
</tr>
 @endforeach
</table>

</body>
</html>
