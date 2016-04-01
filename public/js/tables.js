$Subtable = $('.Subtable');
$Subtable_Father = $Subtable.parents('.Table');
$Subtable_Father_Thead = $Subtable_Father.children('thead');
$Subtable_Father_Tbody = $Subtable_Father_Thead.siblings();

$count = $Subtable_Father_Thead.children('tr').children('th').length;
$Subtable.children('td').attr("colspan", $count);
$Subtable_Father_Thead.children('tr').prepend('<td></td>');
$Subtable_Father_Tbody.children('tr').prepend('<td><button class="iconPlus"></button></td>');

$Subtable.prev().click(function(){
    $(this).children().children('.iconPlus').toggleClass('open');
    $(this).next().children().children('.Table').toggleClass('open');
});

