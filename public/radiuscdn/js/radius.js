function loader(id){
    var el = $(id);
    el.html('');
    el.removeClass();
    el.addClass('wp-siteLoader');
}

function loadApp(){
    pages('#root', '/master');
}

loadApp();

function pages(el, page){
    
    loader(el);
    
    $.ajax({
        url: '/radius/api',
        type: 'POST',
        data: { api: page },
        success: function(data){
            $(el).removeClass();
            $(el).html(data);
        }
    });
}

