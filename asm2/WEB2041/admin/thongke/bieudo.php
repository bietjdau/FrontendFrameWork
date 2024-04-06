<div class="row">
<script src="https://www.gstatic.com/charts/loader.js"></script>


<div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

var data = new google.visualization.DataTable();
    data.addColumn('string', 'tendm');
    data.addColumn('number', 'soluong');
    data.addRows([
        <?php 
    $tongdm = count($listthongke);
    $i=1;
    foreach ($listthongke as $thongke) {
        extract($thongke);
        if($i==$tongdm) $dauphay=" "; else $dauphay =",";
        echo '["'.$thongke['tendm'].'", '.$thongke['soluong'].']'.$dauphay;
        $i+=1;
    }
     ?>
    ]);

// Set Options
const options = {
  title:'Thống kê sản phẩm theo danh mục'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>

</div>