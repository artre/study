;(function($) {
	
	var defaults = {
		question: "Which is your favourite JavaScript library",
		ajaxOptions: {
			url: "",
			type: "POST",
			contentType: "application/json; charset=utf=8",
			dataType: "json"	
		},
		url: "",
		buttonText:  "Answer!", 
		categories: ["jQuery", "YUI", "Dojo", "ExtJS", "Zepto"],
		containerClass: "nupoll",
		formClass: "nupoll-form",
		buttonClass: "nupoll-submit",
		errorMessage: "Thanks for your vote, unfortunately an error and the poll results cannot be shown",
		errorClass: "nupoll-error-message"
	};
	
	function Nupoll(element, options) {
		
		var widget = this;
		
		widget.config = $.extend(true, {}, defaults, options);
		widget.element = element;
		widget.element.on("submit", function(e) {
			e.preventDefault();
			
			var dataObj = {
				data: JSON.stringify({ selected: widget.element.find(":checked").val() })
			},
			ajaxSettings = $.extend({}, widget.config.ajaxOptions, dataObj);
			
			
			
			$.ajax(ajaxSettings).done(function(data) {
				// consume data!
				
			}).fail(function(data) {
				
				var returnVal = widget.element.triggerHandler("responseerror.nupoll", data);
				
				if (returnVal !== false) {
					widget.element.append($("<p/>", {
						text: widget.config.erroMessage,
						"class": widget.config.errorClass
					}));
				}
			});
			widget.labels = widget.element.find("label");
			widget.element.width(widget.element.width()).height(widget.element.height()).find("form").remove();
				
			widget.element.trigger("beforeresponse.nupoll");
		});
		
		widget.element.one("change", function(e) {
			widget.element.find("button").removeProp("disabled");
		});
		
		$.each(widget.config, function(key, val) {
			if (typeof val === "function") {
				widget.element.on(key + ".nupoll", function(e, param) {
					return val(e, widget.element, param);
				});
			}
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
		
		this.element.trigger("created.nupoll");
				
	}
	
	
	
	$.fn.nupoll  = function(options) {
		
		new Nupoll(this.first(), options);
				
		return this.first();
	};	
	
	
	
	
}(jQuery));