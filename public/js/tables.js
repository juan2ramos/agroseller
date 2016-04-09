$SubTable = $('.SubTable');
$SubTable_Father = $SubTable.parents('.Table');
$SubTable_Father_tHead = $SubTable_Father.children('thead');
$SubTable_Father_tBody = $SubTable_Father_tHead.siblings();

$count = $SubTable_Father_tHead.children('tr').children('th').length;
$SubTable.children('td').attr("colspan", $count);
$SubTable_Father_tHead.children('tr').prepend('<td></td>');
$SubTable_Father_tBody.children('tr').prepend('<td><button class="iconPlus"></button></td>');

$SubTable.prev().click(function(){
    $(this).children().children('.iconPlus').toggleClass('open');
    $(this).next().children().children('.Table').toggleClass('open');
});

