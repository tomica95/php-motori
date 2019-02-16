$(document).ready(function(){

  $(".poll-answer").on('click', function()
  {
    var answer = $(this).val();
    var poll_id =$("#poll_id").val();

    $.ajax({
      url: 'php/poll.php',
      method: "POST",
      dataType: 'json',
      data: {
        answer,
        poll_id
      },
      success: function(response)
      {
        if (typeof response == "object")
        {
          var text = '';
          $.each(response, function(key, value)
          {
            console.log(value);
            text+=`
              ${value['answer']}:${value['sum']}
            `;
          })
          $("#poll_result").html(text);
        }
        else
        {
          var text = "Vec ste glasali";
          $("#poll_result").html(text);
        }
      }
    })
  })

});