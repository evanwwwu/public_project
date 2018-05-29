<?PHP echo $header?>
<body>
	<div class="pure-g-r " id="layout">
		<?PHP echo $menu?>
		<div class="pure-u" id="main">
			<div class="content">
				<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2;?>
				</h2>
				<form id="frm" class="pure-form pure-form-stacked">
					<input type="hidden" id="id" name="id" value="<?PHP echo $data['id']?>">
					<fieldset>
						<label>標題</label>
						<?PHP echo $data['banner_title']?>

						<label>開始日期</label>
						<?PHP echo (isset($data['date_start']))?substr($data['date_start'],0,16):date('Y-m-d 00:00')?>

						<label>結束日期</label>
						<?PHP echo (isset($data['date_end']))?substr($data['date_end'],0,16):date('Y-m-d 23:59')?>
					</fieldset>
					<div id="chart_div" style="max-width:600px;">
					</div>
				</form>
			</div>
			<?PHP echo $footer?>
		</div>
	</div>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'View', 'Click'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</body>
</html>