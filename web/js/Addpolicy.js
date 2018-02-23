$(function(){
	//注册
	var registeSwiper = new Swiper('#registerCont',{
	    speed:500,
	    onSlideChangeStart: function(){
	      $("#regUseBtn a").removeClass('regUseCurr')
	      $("#regUseBtn a").eq(registeSwiper.activeIndex).addClass('regUseCurr')  
	    }
	  })
	$("#regUseBtn a").on('touchstart mousedown',function(e){
		e.preventDefault()
		$("#regUseBtn a").removeClass('regUseCurr')
		$(this).addClass('regUseCurr')
		    registeSwiper.slideTo( $(this).index() )
	})   
	$("#regUseBtn a").click(function(e){
	    e.preventDefault()
	})
})