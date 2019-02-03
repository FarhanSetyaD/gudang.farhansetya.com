$(document).ready(function () {
  $('#clone-1').click(function () {
    let num = $("tbody > tr").length
    console.log(num)
    let newNum = new Number(num + 1)
    let newElement = $("#row-data-" + num).clone().attr("id", "row-data-" + newNum)
    newElement.find(".clone").css("display", "none")
    $("#row-data-" + num).after(newElement)
    $("form").attr("action", "Transaction/insert/" + newNum)
  })
})