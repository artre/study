;(function($) {
	
	var defaults = {
		question: "Which is your favourite JavaScript library",
		url: "",
		buttonText:  "Answer!", 
		categories: ["jQuery", "YUI", "Dojo", "ExtJS", "Zepto"],
		containerClass: "nupoll",
		formClass: "nupoll-form",
		buttonClass: "nupoll-submit"
	};
	
	function Nupoll(element, options) {
		
		var widget = this;
		
		widget.config = $.extend({}, defaults, options);
		widget.element = element;
		widget.element.on("submit", function(e) {
			e.preventDefault();
			
			$.ajax({
				type: "POST",
				url: widget.config.url,
				contentType: "application/json; charset=utf=8",
				data: JSON.stringify({ selected: widget.element.find(":checked").val() }),
				dataType: "json"
			}).done(function(data) {
				// consume data!
				widget.labels = widget.elemet.find("label");
				widget.element.width(widget.element.width()).height(widget.element.height()).find("form").remove();
			});
		});
		
		widget.element.one("change", function(e) {
			widget.element.find("button").removeProp("disabled");
		});
		
		widget.init();
	}
	
	Nupoll.prototype.init = function() {
		
		this.element.addClass(this.config.containerClass);
		
		$("<h1/>", {
			text: this.config.question
		}).appendTo(this.element);
		
		var form = $("<form/>").addClass(this.config.formClass).appendTo(this.element);		
		var x, y;
		
		for (x = 0, y = this.config.categories.length; x < y; x++) {
			$("<input/>", {
				type: "radio",
				name: "category",
				name: this.config.categories[x],
				value: this.config.categories[x]
			}).appendTo(form);
			
			$("<label/>", {
				text: this.config.categories[x],
				"for": this.config.categories[x]
			}).appendTo(form);
		}
		
		$("<button/>", {
			text: this.config.buttonText,
			"class": this.config.buttonClass,
			disabled: "disabled"
		}).appendTo(form);
		
	}
	
	
	
	$.fn.nupoll  = function(options) {
		
		new Nupoll(this.first(), options);
				
		return this.first();
	};	
	
	
	
	
}(jQuery));