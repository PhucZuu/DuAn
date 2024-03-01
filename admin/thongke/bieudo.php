<div class="row">
<div id="myChart" style="width:100%; max-width:1000px; height:900px;">
</div>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
  <?php
  $tongdm=count($listthongke);
  $i=1;
    foreach($listthongke as $thongke){
        extract($thongke);
        echo '["'.$tendm.'",'.$countsp.']'.($i==$tongdm?"":",").'';
        $i+=1;
    }
    
  ?>
  // ['Italy',54.8],
  // ['France',48.6],
  // ['Spain',44.4],
  // ['USA',23.9],
  // ['Argentina',14.5]
]);

// Set Options
const options = {
  title:'Thống kê số lượng sản phẩm theo danh mục'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>
</div>