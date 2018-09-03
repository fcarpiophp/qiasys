<style>

    .empty_cell {
        display: none;
    }

    .profit_dollar,
    .profit_percent,
    .least_profit,
    .best_seller,
    .poor_seller, 
    .pulse_graph {
	background: url('<?= base_url() ?>application/images/preloader_large.gif') no-repeat 0 0;
	background-position: center;
    }

    /* To override qiasys.css */
    .div_item_description {
	width: 110px;
	min-width: 100px;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	display: block;
    }

    select {
        padding: 0px;
    }
    
    .pulse_graph {
	position: static !important;
    }

</style>

<div class="outer widget_container row-fluid">
    <div class="inner profit_dollar"></div>
    <div id="pulse_graph" class="inner pulse_graph"></div>
    <div class="inner profit_percent"></div>
</div>

    <!-- Start Google Chart -->
    
<input type="hidden" class="base_url" value="<?= base_url() ?>index.php/">
<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
<?
    for($i=0; $i < count($chart); $i++){
	print '['.implode(',', $chart[$i]).']';
	if($i < count($chart) - 1) {
	    print ',';
	}
    }
?>
        ]);

        var options = {
          title: 'Busines Pulse',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0, title: '$USD'},
	  isStacked: true,
	  colors: ['#801515', '#116611']
        };

        var chart = new google.visualization.AreaChart(document.getElementById('pulse_graph'));
        chart.draw(data, options);
      }
    </script>


</script>

    <!-- End Google Chart -->

<script type="text/javascript">
    $(document).ready(function() {

	var width;
	//widget width plus padding.
	var widgetWidth = 375 + 22;

	if ($(window).width() > 397) {
	    width = Math.floor($(window).width() / widgetWidth);
	    $('.widget_container').width(width * widgetWidth);
	}

	width = Math.floor($(window).width() / widgetWidth);
	$('.widget_container').width(width * widgetWidth);

	$(window).resize(function() {
	    if ($(window).width() > 397) {
		width = Math.floor($(window).width() / widgetWidth);
		$('.widget_container').width(width * widgetWidth);
	    }
	});

	$.ajax({
	    type: 'post',
	    context: document.body,
	    url: $('.base_url').val() + 'widget/profit_dollar_widget',
	    beforeSend: function() {
	    },
	    complete: function() {
		$('.profit_dollar').css('background-image', 'none');
		$(".item_description").wrapInner("<div class='div_item_description'></div>");
		$(".item_description").removeClass('item_description');
	    },
	    success: function(widget_table) {
		$('.profit_dollar').html(widget_table);
		$('.pulse_graph_img').show();

	    },
	    error: function() {
		alert('Error loading widget!');
	    }
	});

	$.ajax({
	    type: 'post',
	    context: document.body,
	    url: $('.base_url').val() + 'widget/profit_percent_widget',
	    beforeSend: function() {
	    },
	    complete: function() {
		$('.profit_percent').css('background-image', 'none');
		$(".item_description").wrapInner("<div class='div_item_description'></div>");
		$(".item_description").removeClass('item_description');
	    },
	    success: function(widget_table) {
		$('.profit_percent').html(widget_table);

	    },
	    error: function() {
		alert('Error loading widget!');
	    }
	});
    });

//	alert(
//		'window height: ' + $(window).height() + "\n" +
//		'window width: ' + $(window).width() + "\n" +
//		'document height: ' + $(document).height() + "\n" +
//		'document width: ' + $(document).width() + "\n" +
//		'screen height: ' + screen.height + "\n" +
//		'screen width: ' + screen.width
//	);

</script>
