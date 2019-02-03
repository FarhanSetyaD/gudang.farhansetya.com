$(document).ready(function () {
  let oldNum = $("tbody > tr").length
  console.log('Now num', oldNum)
  $("form").attr("action", "Edit/update/" + (oldNum-1))
  $('#clone-1').click(function () {
    let num = $("tbody > tr").length
    console.log(num-1)
    let newNum = new Number((num-1) + 1)
    let newElement = $("#row-data-" + (num-1)).clone().attr("id", "row-data-" + newNum)
    // newElement.find(".clone").css("display", "none")
    $("#row-data-" + (num-1)).after(newElement)
    $("form").attr("action", "Edit/update/" + newNum)
  })
})