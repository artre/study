;(function($) {

var addRowEnd 	= $("#addrow"),
	myList		= $("#myList");
			
		addRowEnd.click(function() {
			var	rows 		= $(".row"),
				rowLength 	= rows.length,
				lrn			= rowLength + 1;// lrn = last row number
				
				console.log("row lenght: " + rowLength);
				console.log(rows);
			
			row_html =""
			+"<li class='row'>"
				+"<a href='#' data-num='"+lrn+"'>"+lrn+"</a>"
				+"<input id='polla_img_"+lrn+"' name='answer["+lrn+"][p_i]' type='text' value='"+lrn+"' />"
				+"<input name='answer' type='text' value='' />"
			+"</li>";
			
			addRowEnd.css("background-color", "orange");
			myList.append(row_html);
		});


$(document).ready(function(){
	
	myList.sortable({
		deactivate: function(event, ui) {
			var	rows 	= $(".row"),
				rn		= 1;
			
			jQuery.each(rows, function(i, val) {
				var d 	= $(this),
					a 	= d.find("a"),
					an 	= d.find(".a-number");
									
				a.text(rn).attr("data-num", rn);
				an.attr("id", "polla_img_" + rn).attr("name", "answer[" + rn + "][p_i]").attr("value", rn);
				
				rn++
			}); 
			
			addRowEnd.css("background-color", "purple");
		}
	});
	
	
});
	
	
}(jQuery));