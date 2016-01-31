$(document).ready(function(){
	$('#costsearch').css('display','none');
	$('#catesearch').css('display','none');
	$('#productdiv').css('display','none');
	//$('.buy').css('display','none');



	if (location.search.length > 0) {
		var query = location.search;
		if(query[1] == 'i'){
			
				product_click(location.search.substr("?id=".length));
		} else if (query[1] == 'c')
														
		{
			cateselect(location.search.substr("?cate=".length));
		}
		
        
    }


	var dataString = 'hiengiohang=true';
	$.ajax({
	 type: "POST",
	 url: "process.php",
	 data: dataString,
	 success: function(data) {
		if (data!=""){
	 			$("#giohang").html(data);
	 	}

	 }});
	  $('#home_btn').click(function() {
		hideall();
		$('#newdiv').css('display','block');		
		history.pushState({}, "Ống gió Phương Nam", "index.php");
		return false;

		});
	  $('#about_btn').click(function() {
		hideall();									
		$('#aboutdiv').css('display','block');		
		var	loading = '<center><img src="images/loading.gif"></img></center>';
		$("#aboutdiv").html(loading);
			var dataString = 'gioithieu=true';

			$.ajax({
			 type: "POST",
			 url: "process.php",
			 data: dataString,
			 success: function(data) {
				if (data!=""){
						$("#aboutdiv").html(data);
				}
			 }});

		return false;

		});
	  $('#contac_btn').click(function() {
		hideall();
		$('#sending').css('display','none');
		$('#contactdiv').css('display','block');	
		var	loading = '<center><img src="images/loading.gif"></img></center>';
		$("#contactdiv").html(loading);

			var dataString = 'lienhe=true';
			$.ajax({
			 type: "POST",
			 url: "process.php",
			 data: dataString,
			 success: function(data) {
				if (data!=""){
						$("#contactdiv").html(data);
				}

			 }});

		return false;

		});
	  $('#contractor_btn').click(function() {
		hideall();
		$('#contractordiv').css('display','block');	
		var	loading = '<center><img src="images/loading.gif"></img></center>';
		$("#contractordiv").html(loading);

			var dataString = 'congtrinh=true';
			$.ajax({
			 type: "POST",
			 url: "process.php",
			 data: dataString,
			 success: function(data) {
				if (data!=""){
						$("#contractordiv").html(data);
				}

			 }});

		return false;

		});
	
	
	$('#search_btn').click(function(){
        var keyword  = $('#keyword').val();
		var costsearch = $('#costsearch').val();
		var catesearch = $('#catesearch').val();
		
		if (keyword == "") {
			alert("Lạy hồn, ông chưa nhập giá trị tìm kiếm!");
			$("#keyword").focus();
			return false;
		}
		hideall();
		$('#searchdiv').css('display','block');
		var	loading = '<center><img src="images/loading.gif"></img></center>';
		$("#searchdiv").html(loading);
		var typesearch  = $("#typesearch").val();
		if (typesearch == "") {
			typesearch = "ten";
	  	}
		var namebtn  = $("#search_btn").val();

		var dataString = 'keyword='+ keyword + '&typesearch=' + typesearch + '&namebtn=' + namebtn + '&catesearch=' + catesearch + '&costsearch=' + costsearch;
		var	loading = '<center><img src="images/loading.gif"></img></center>';
		$("#searchdiv").html(loading);
		$.ajax({
			type: "POST",
			url: "process.php",
			data: dataString,
			success: function(data) {
			if (data!="fail"){
					$("#searchdiv").html(data);
			} else{

				return false;
			}
			return false;
		}});
		return false;
    });


    $('#typesearch').change(function() {

			$chon = $("#typesearch").val();
		if($chon=="gia"){

					$('#costsearch').css('display','block');
					$('#catesearch').css('display','block');

			} else {
					$('#costsearch').css('display','none');
					$('#catesearch').css('display','none');

			}
		return false;

	});

	

	$('ul.menu li').hover(function(){
		$('ul.menu li ul').removeAttr('style');
	});
	
	$ ('.tablesp').hover (function (){
			$(this).css('box-shadow','0px 0px 20px #6600FF');
			//alert('dmm');
		});
	$(".tablesp").mouseleave(function (){
		$ ('.tablesp').removeAttr('style');
		
	});
	

});

	function sendmail() {
		
		var hoten = $('#emailname').val();
		var email = $('#memail').val();
		var phone = $('#mphone').val();
		var tieude = $('#mtitle').val();
		var noidung = $('#mcontent').val();
		var sendmail = 'true';
		
		$('#sending').html('Đang gửi mail...');
		var dataString = 'hoten='+ hoten+ '&email=' + email + '&phone=' + phone + '&tieude=' + tieude + '&noidung=' + noidung + '&sendmail=' + sendmail;
		
		$.ajax({
		 type: "POST",
		 url: "process.php",
		 data: dataString,
		 success: function(data) {
			if (data!=""){					
					alert("Cảm ơn bạn đã quan tâm, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!");
					$('#sending').html('');
			}
		 }});
		
		return false;

		};
	
	function sanpham_click(){
		hideall();
		$('#newdiv').css('display','block');
		return false;
		
		
	}
	function buy_click(data){

	  var str = data.title;
	  var sl = prompt ("Nhập số lượng muốn mua?","1");
	  if(sl == null || sl == 0){ return false;}
	  var dataString = 'id='+ str + '&sl='+ sl ;
	  var	loading = '<center><img src="images/loading.gif"></img></center>';
	  $("#giohang").html(loading);
      $.ajax({
          type: "POST",
		  url: "process.php",
		  data: dataString,
		  success: function(data) {
			if (data!=""){
					$("#giohang").html(data);
			}

		  }});
	  return false;
	}
	function product_click(data)
	{	
		hideall();
		$('#productdiv').css('display','block');
		
		var idproduct = data;
		var url = "?id="+idproduct;
		var dataString = 'product=true' + '&idproduct=' + idproduct;
		var	loading = '<center><img src="images/loading.gif"></img></center>';
		$("#productdiv").html(loading);
		$.ajax({
			type: "POST",
			url: "process.php",
			data: dataString,
			success: function(data) {
			if (data!="fail"){
					$("#productdiv").html(data);
					data= $('#centercol').html();
					var currentState = { html: data, title: "Sản phẩm"}; 	
					document.title = currentState.title;
		 
					if (history.pushState) history.pushState(currentState, "", url);

			} else{

				return false;
			}
			return false;
		}});
		
		return false;
		
		
		
		}
	function delgiohang(data)
	{
		var	loading = '<center><img src="images/loading.gif"></img></center>';
		$("#giohang").html(loading);
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'delete_product=' + data.name,
			success: function(data)
			{
				if (data!=""){
					$("#giohang").html(data);
				}
			}
		});
		return false;
	}
	function cateselect(idcate)
	{
		//Lam an menu
		hideall();
		$('ul.menu li ul').slideUp();

		$('#contactdiv').css('display','none');
		$('#aboutdiv').css('display','none');
		$('#newdiv').css('display','none');
		$('#searchdiv').css('display','none');
		$('#catediv').css('display','block');
		$('#productdiv').css('display','none');
		var	loading = '<center><img src="images/loading.gif"></img></center>';
		$("#catediv").html(loading);
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'idcate=' + idcate,
			success: function(data)
			{
				if (data!=""){
					
					var url = "?cate="+idcate;
					$("#catediv").html(data);
					data= $('#centercol').html();
					
					var currentState = { html: data, title: "Hạng mục sản phẩm"}; 				
					document.title = currentState.title;
					if (history.pushState) history.pushState(currentState, "", url);
				}
			}
		});

		return false;
	}
	
	function hideall(){
		$('#contactdiv').css('display','none');
		$('#contractordiv').css('display','none');
		$('#aboutdiv').css('display','none');
		$('#newdiv').css('display','none');
		$('#searchdiv').css('display','none');
		$('#catediv').css('display','none');
		$('#productdiv').css('display','none');
		$('#sending').css('display','none');	
	}