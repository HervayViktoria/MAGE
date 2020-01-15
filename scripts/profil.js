if ($('.Success').css('display') === "block") {
    $('.Success').fadeOut(3000);
}

console.log(typeof($('.Success').attr('name')));//string

if ($('.Error').css('display') === "block") {
    $('.Error').fadeOut(3000);
}