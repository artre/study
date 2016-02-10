;(function($) {
	
	
	
	
	/*
		"
		<tr class='row'>
					<td class='order ui-sortable-handle'>" + row_num + "<input type='hidden' id='' class='answer-num' name='answer[" + row_num + "][p_n]' value='" + row_num + "'></td>
					<td class='field sub_field field_type-text'>
						<div class='inner'>
							<div class='ak-input-wrap'>
								<!-- ### -->
								<input type='text' id='' class='text' name='answer[" + row_num + "][p_a]' value='' placeholder=''>
							</div>				
						</div>
					</td>
					<td class='field sub_field field_type-image'>
						<div class='inner'>
							<div class='ak-image-uploader clearfix'>
								<!-- ### -->
								<input id='polla_img_" + row_num + "' name='answer[" + row_num + "][p_i]' type='text' value=''/>
								<div class='has-img'>
									<div class='hover'>
										<ul class='bl'>
											<li><a class='ak-button-delete ir' href=''>Remove</a></li>
											<li><a class='ak-button-edit ir' href=''>Edit</a></li>
										</ul>
									</div>
									<div class='img-preview-box'>		
										<div class='img-preview hor'></div>
									</div>
								</div>
								<div class='no-img dnone'>
									<p>No image selected <input id='polla_img_" + row_num + "_button' class='button img-btn' name='polla_img_ak' type='text' value='Add Image'></p>
								</div>
							</div>
						</div>
					</td>
					<td class='remove'>
						<a class='ak-button-add add-row-before' href='' style='margin-top: -23px;'></a>
						<a class='ak-button-remove' href=''></a>
					</td>
				</tr>
		"
*/


		addRowEnd = $("#addrow");
			
		addRowEnd.click(function() {
			var row_num	= "AAA",
				row_html = "<tr class='row'>"
				+ "<td class='order ui-sortable-handle'>" 
				+ row_num + "<input type='hidden' id='' class='answer-num' name='answer[" + row_num + "][p_n]' value='" + row_num + "'>"
				+ "</td>"
				+ "<td class='field sub_field field_type-text'>"
					+ "<div class='inner'>"
						+ "<div class='ak-input-wrap'>"
							+ "<input type='text' id='' class='text' name='answer[" + row_num + "][p_a]' value='' placeholder=''>"
						+ "</div>"
					+ "</div>"
				+ "</td>"
				+ "<td class='field sub_field field_type-image'>"
					+ "<div class='inner'>"
						+ "<div class='ak-image-uploader clearfix'>"
							+ "<input id='polla_img_" + row_num + "' name='answer[" + row_num + "][p_i]' type='text' value=''/>"
							+ "<div class='has-img'>"
								+ "<div class='hover'>"
									+ "<ul class='bl'><li><a class='ak-button-delete ir' href=''>Remove</a></li><li><a class='ak-button-edit ir' href=''>Edit</a></li></ul></div><div class='img-preview-box'><div class='img-preview hor'></div></div></div><div class='no-img dnone'><p>No image selected <input id='polla_img_" + row_num + "_button' class='button img-btn' name='polla_img_ak' type='text' value='Add Image'></p></div></div></div></td><td class='remove'><a class='ak-button-add add-row-before' href='' style='margin-top: -23px;'></a><a class='ak-button-remove' href=''></a></td></tr>";
				addRowEnd.css("background-color", "orange");
				$("#multTbody").append(row_html);
		});
	
	
	
	
	
	
	
	
	
	
	
	
}(jQuery));