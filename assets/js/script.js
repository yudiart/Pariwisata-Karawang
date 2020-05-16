function searchMovie(){
$('#movie-list').html('');
	$.ajax({
		url:'http://omdbapi.com',
		type: 'get',
		dataType: 'json',
		data: {
			'apikey' : 'db56a1b2',
			's': $('#search-input').val()
		},
		success: function(result){
			if (result.Response == "True"){
				let movies = 	 result.Search;
				$.each(movies, function(i, data){
					$('#movie-list').append(`
						<div class="col-md-4">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src="`+ data.Poster+`" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">`+ data.Title+`</h5>
						    <p class="card-text">`+data.Year+`</p>
						    <a href="#" class="btn btn-primary">See Detail</a>
						  </div>
						</div>
						</div>
						`)
				})
			}else{
				$('#movie-list').html(`
					<div class="col">
					<h2>`+ result.Error+`</h2>
					</div>
					`)
			}
		}
	});
}

$('#search-button').on('click', function(){
	searchMovie();
});

$('#search-input').on('keyup', function(e){
	if (e.which == 13){
		searchMovie();
	
	}
});
function myFunction(){
    $(document).on('click','.toogler', function(){
    var x =document.getElementById("icongroup");
    if (x.style.display == "none") {
      x.style.display = "block";
    }else{
      x.style.display = "none";
    }
    });
}

$(document).ready(function(){
    $(document).on('click','#booking_detail', function(){
      var kd_kamar = $(this).data('kdkamar');
      var harga = $(this).data('harga');
      var capacity = $(this).data('capacity');
      var nama_kamar = $(this).data('kamarname');
      $('#namakamar').val(nama_kamar);
      $('#kdkamar').val(kd_kamar);
      $('#total_harga').text(harga);  
      $('#harga').text(harga);   
      $('#capacity').text(capacity);      
      $('#dataModal').modal('hide');


    });
    $("#dt1").datepicker({
        dateFormat: "dd-mm-yy",
        minDate: 0,
        onSelect: function () {
            var dt2 = $('#dt2');
            var startDate = $(this).datepicker('getDate');
            //add 30 days to selected date
            startDate.setDate(startDate.getDate() + 30);
            var minDate = $(this).datepicker('getDate');
            var dt2Date = dt2.datepicker('getDate');
            //difference in days. 86400 seconds in day, 1000 ms in second
            var dateDiff = (dt2Date - minDate)/(86400 * 1000);

            //dt2 not set or dt1 date is greater than dt2 date
            if (dt2Date == 1 || dateDiff < 0) {
                    dt2.datepicker('setDate', minDate);
            }
            //dt1 date is 30 days under dt2 date
            else if (dateDiff > 30){
                    dt2.datepicker('setDate', startDate);
            }
            //sets dt2 maxDate to the last day of 30 days window
            dt2.datepicker('option', 'maxDate', startDate);
            //first day which can be selected in dt2 is selected date in dt1
            dt2.datepicker('option', 'minDate', minDate);
        }
    });
    $('#dt2').datepicker({
        dateFormat: "dd-mm-yy",
        minDate: 0,
        onSelect: function(){
        var dt1 = new Date($('#dt1').val());
        var dt2 = new Date($('#dt2').val());
        var timeDifference = dt2.getTime() - dt1.getTime();
        var dayDif = Math.floor(timeDifference/(86400*1000*30));
        var harga = document.getElementById('#harga');
        
      }
    });
  });