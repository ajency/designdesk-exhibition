/* $(document).ready(function(){
    $(document).on('click' , '.menu-item-has-children:not(.clicked) a' ,function(e){
        e.preventDefault();
        $(this).closest('ul').find('.menu-item-has-children').removeClass('clicked');
        $(this).parent('.menu-item-has-children').addClass("clicked").children('.sub-menu').show().addClass("active");
    });
    
    $(document).on('click' , '.menu-item-has-children.clicked a' , function(e){
        $(this).closest('.menu-item-has-children').addClass("grand-child").children('.sub-menu').show().addClass("active");
       $(this).parent('.menu-item-has-children:not(.grand-child)').removeClass("clicked").children('.sub-menu').hide().removeClass("active");
    });
}); */