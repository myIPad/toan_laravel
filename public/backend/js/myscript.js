
$("div.alert").delay(2000).slideUp();

function xacnhanxoa(msg){
	if(window.confirm(msg)){
		return true;
	}else
	return false;
}
//Js cho đăng nhập
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});