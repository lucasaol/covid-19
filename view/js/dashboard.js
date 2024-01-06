$(function () {
    
    $('body').on('click', '.estado', function (e) {
        e.preventDefault();
        
        let name = $(this).attr('name');
        let url = slugify(name);
        
        let link = $('base').attr('href') + 'estado/' + url;
        window.location = link;
    });
});