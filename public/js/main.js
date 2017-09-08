$( function() {
	var minValue = +($("#amount_min").val());
	var maxValue = +($("#amount_max").val());

    $( "#slider-range" ).slider({
      range: true,
      min: minValue,
      max: maxValue,
      values: [minValue, maxValue],

      slide: function( event, ui ) {
        $( "#amount_min" ).val(ui.values[0]);
        $( "#amount_max" ).val(ui.values[1]);
      }
    });
    $( "#amount_min" ).val($("#slider-range").slider( "values", 0 ));
    $( "#amount_max" ).val($("#slider-range").slider( "values", 1 ));
  } );

$(document).ready(function()
{
	$('#search-btn').click(function (e)
	{
	    e.preventDefault();
	    var data = $("#search-form").serialize();
	    $.ajax({
	        type: "GET",
	        url: '/search',
	        data: data,
	        beforeSend: function()
	        {
            	$("#spinner").show();
            },
	        success: function(results)
	        {
	        	var data = JSON.parse(results);
	        	$("#spinner").hide();
	        	if(data.length === 0)
	        	{
	        		$("#results").html('<div class="text-center"><p>No results</p></div>');
	        	}
	        	else
	        	{
					var output =  '<table class="table"><thead><tr><th>Name</th><th>Bedrooms</th><th>Bathrooms</th><th>Storeys</th><th>Garage</th><th>Price</th></tr></thead><tbody>';
					$.each(data, function(key, val)
					{
					output += '<tr><td>'+val.name+'</td>'+'<td>'+val.bedrooms+'</td>'+'<td>'+val.bathrooms+'</td>'+'<td>'+val.storeys+'</td>'+'<td>'+val.garages+'</td>'+'<td>'+val.price+'</td></tr>';
					});
					output += '</tbody></table>';	
					$("#results").html(output);
	        	}
	        },
	        error: function () {
            	// alert('ERROR');                
        	}
	    });
	});
});