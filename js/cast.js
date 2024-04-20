$(document).ready(function () {
    
    
    $('.iment-btn').click(function (e)
    {
        e.preventDefault();
        var qty = $(this).closest('.prod-view').find('.qty-input').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.prod-view').find('.qty-input').val(value);
        }
        
    })

    $('.dment-btn').click(function (e)
    {
        e.preventDefault();
        var qty = $(this).closest('.prod-view').find('.qty-input').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.prod-view').find('.qty-input').val(value);
        }
        
    })


     
    // $('#iment-btn2').click(function (e)
    // {
    //     e.preventDefault();
    //     var qty = $(this).closest('#mycart').find('#qty-input2').val();
    //     var value = parseInt(qty, 10);
    //     value = isNaN(value) ? 0 : value;
    //     if(value < 10)
    //     {
    //         value++;
    //         $(this).closest('#mycart').find('#qty-input2').val(value);
    //     }
        
    // })

    // $('#dment-btn2').click(function (e)
    // {
    //     e.preventDefault();
    //     var qty = $(this).closest('#mycart').find('#qty-input2').val();
    //     var value = parseInt(qty, 10);
    //     value = isNaN(value) ? 0 : value;
    //     if(value > 1)
    //     {
    //         value--;
    //         $(this).closest('#mycart').find('#qty-input2').val(value);
    //     }
        
    // })



    $('#addToCartBtn').click(function (e)
{
    e.preventDefault();

    var qty = $(this).closest('#prod-view').find('#qty-input').val();
    var prod_id = $(this).val();
    //alert(prod_id);
    $.ajax({
        method: "POST",
        url: "/functions/handlecart.php",
        data: {
            "prod_id":  prod_id,
            "prod_qty": qty,
            "scope": "add"
        },
        dataTYpe: "dataType",
        success: function(response)
        {
            if(response == ok)
            {
                alert("Product added to cart");
            }
            if(response == existing)
            {
                alert("Product already in cart");
            }
            
            if(response == login)
            {
                alert("Login to continue");
            }
            
            if(response == error)
            {
                alert("Something wet wrong");
            }
        }
    });
})

$('.updateQty').click(function(){

        var qty = $(this).closest('#mycart').find('#qty-input2').val();
        var prod_id = $(this).closest('#mycart').find('#prodId').val();
        
        //alert(qty);
        $.ajax({
            method: "POST",
            URL: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty" : qty,
                "scope": "update"
            },
            success: function(response) {
               // alert(response);
                
            }
        })
    
    
        });
    
        $('#deleteItem').onclick(function()
        {
            var cart_id = $(this).val();
            //alert(cart_id);
    
            $.ajax({
                method: "POST",
                URL: "functions/handlecart.php",
                data: {
                    "cart_id": cart_id,
                    "scope": "delete"
                },
                success: function(response) {
                    //alert(repsonse);
                    if(response == "ok")
                    {
                        alert("Item delete successfully");
                        $('#cartbody').load(location.href + '#cartbody')
                    }else{
                        alert(response);
    
                    }
                }
            })
        })
    })
    
    //   var url = '/functions/handlecart.php';
    
    //     fetch(url, { method: 'POST',
    //         data: {
    //             "prod_id": prod_id,
    //             "prod_qty" : qty,
    //             "scope": "add"
    //         },
    //         dataType: "dataType"})
    //         .then(function(response){
    //             return response.text();
    //         })
    //             .then(function(data)
    //         {
    //             console.log(prod_id);





// })