var guavus = {}
guavus.product = function() {
	 
	
	var handleExpand = function() {
		$('#products').on('click','.product-expand',function(event) {
			event.preventDefault();
			
			$(this).closest('.prod-group').find('.prod-items').toggle();
			
			
		})		
		
	}
	var handleGroupCheck = function () {
		$('#products').on('click','.group-check',function(event) {
			$groupItems = $(this).closest('.prod-group').find(".prod-items input[type='checkbox']");
			if ($(this).is(':checked')) {
				$groupItems.attr('checked',true);
    		} else {
    			$groupItems.attr('checked',false);

    		}

		});
		
	}
	var checkGroupIfItemsAre = function ($group) {

		if ($group.find(".prod-items input[type='checkbox']:not(:checked)").size()==0) {
			$group.find('.group-check').attr('checked',true);
		}
	}
	var checkGroups = function () {
		$('.prod-group').each(function(i,el) {
			checkGroupIfItemsAre($(el))
		})
	}
	var handleIndividualCheck = function() {
		$('#products').on('click',".prod-items input[type='checkbox']",function(event) {
			$groupCheck = $(this).closest('.prod-group').find(".group-check");
			if ($(this).is(':checked')) {
				checkGroupIfItemsAre($(this).closest('.prod-group'));
			} else {
				$groupCheck.attr('checked',false);
			}
		});	
	}
	return {
		init : function() {
			handleExpand();
			handleGroupCheck();
			handleIndividualCheck();
			checkGroups();
		}
		
	}
}()
 
$(document).ready(function() { 
 	$( ".datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "/guavus/cakephp/images/calendar.gif",
		buttonImageOnly: true,
		dateFormat: "yy-mm-dd"
	}).attr("readOnly", true);
 
	guavus.product.init();
   
     
});
 
