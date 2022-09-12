<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = [ "","ABM", "CSS", "GAS", "HUMSS", "TECH-DRAFTING", "CCS"];
var yValues = [0,34, 29, 34, 34, 32,32];
var barColors = ["","red", "green","blue","orange","brown","yellow"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "DEIHS Senior High School Enrolled Subjects"
    }
  }
});
</script>

</body>
</html>
