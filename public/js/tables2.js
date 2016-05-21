$('.Table-first > tbody > tr').not('.SubTable2').on('click', function(){
    $(this).find('.iconPlus').toggleClass('open');
    $(this).next().toggle('slow');
});
