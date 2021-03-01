$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel();
  });

$(function(){
    $(document).on('submit', '#addCart', function(e) {
        e.preventDefault();
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json"
        })
        .done(function(data) {
            var input = '#addCart input[name=\'quantit\']';
            // var id = '#addCart input[name=\'id\']';
            fbq('track', 'AddToCart', {content_name:  $("input[name='id']").val().value});
            input.value="";
            // window.location.reload();
        })
        .fail(function(data) {
            $.each(data.responseJSON, function (key, value) {
                var input = '#addCart input[name=' + key + ']';
                $(input).parent().addClass('has-error');
            });
        });
    });
})

$(function(){
        $(document).on('submit', '#applyCoupon', function(e) {
            e.preventDefault();
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json"
            })
            .done(function(data) {
                var input = '#formRegister input[name=\'coupon\']';
                input.value="";
                window.location.reload()
            })
            .fail(function(data) {
                $.each(data.responseJSON, function (key, value) {
                    var input = '#applyCoupon input[name=' + key + ']';
                    $(input).parent().addClass('has-error');
                });
            });
        });
    })

$(document).ready(function() {
    $('#show-user').autocomplete({
        // delay: 500,
        minLength: 2,
        source: function(request, response) {
            $.getJSON("/search-product", {
                name: request.term,
            }, function(data) {
                response(data);
            });
        },
        select:function (event,ui) {
            console.log(ui);
            if (ui.item.type==="cat") {
                window.location.href="/store?categorie="+ui.item.link
            } else {
                window.location.href="/store/"+ui.item.link
            }
        },
    });
});

// Update the count down every 1 second
var x = setInterval(function() {
    // Output the result in an element with id="demo"
    var elements = document.body.querySelectorAll('div>.product>div>ul>li>span.countdown');
      for (var i = 0; i < elements.length; i++) {
          var dat = elements[i].dataset.date;
          var date = elements[i].dataset.date.split(" ");
          // Set the date we're counting down to
          var countDownDat = new Date(dat).getTime();
          var countDownDate = new Date(date[0]+"T"+date[1]).getTime();
          // Get todays date and time
          var now = new Date().getTime();
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          elements[i].innerHTML = days + "jrs " + hours + "h "+ minutes + "m " + seconds + "s ";
          if (distance < 0) {
              clearInterval(x);
              elements[i].innerHTML = "EXPIRED";
          }
      }

    // If the count down is over, write some text

  }, 1000);

$(function(){
    $(document).on('submit', '#destroyAvis', function(e) {
        e.preventDefault();
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function(data){
                window.location.reload();
            },
            error: function(data){
                $.each(data.responseJSON.errors, function (key, value) {
                    console.log(key + " => " + value); // view in console for error messages
                });
            }
        });
    });
})

$(function(){
    $(document).on('submit', '#destroyCoupon', function(e) {
        e.preventDefault();
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json"
        })
        .done(function(data) {
            window.location.reload()
        })
        .fail(function(data) {
            $.each(data.responseJSON, function (key, value) {
                var input = '#destroyCoupon input[name=' + key + ']';
                $(input).parent().addClass('has-error');
            });
        });
    });
})

$(function(){
    $(document).on('click', '#obtenirFacture', function(e) {
    var a= document.getElementById("obtenirFacture");
    var id=a.getAttribute("data-id");
        $.getJSON("facture/"+id,function(data){
            console.log(data);
            window.location.reload()
        })
    });
})

$(function(){
    $(document).on('click', '#redirect-avis', function(e) {
        e.preventDefault();
        localStorage.setItem('redirect-avis',1);
        console.log(localStorage.getItem('redirect-avis'));
        window.open($(this).attr('href'),'_blank');
    });
})

if (localStorage.getItem('redirect-avis')==1) {
    var x =  document.querySelectorAll("#product-tab ul li");
    for (var i = 0; i <= 3; i++) {
        x[i].classList.remove("active");
    }
    x[3].classList.add("active");
    document.querySelector('a[href="#tab3"]').click();
    localStorage.removeItem('redirect-avis')
}

function displayDropdown(){
    if (screen.width<=991) {
        window.location.replace("/cart");
    }
}

$(function(){
    $(document).on('submit', '#sendReview', function(e) {
        e.preventDefault();
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json"
        })
        .done(function(data) {
            window.location.reload()
        })
        .fail(function(data) {
            $.each(data.responseJSON, function (key, value) {
                var input = '#sendReview input[name=' + key + ']';
                $(input).parent().addClass('has-error');
            });
        });
    });
})

$(function(){
    $(document).on('submit', '#updateCartItemQuantity', function(e) {
        e.preventDefault();
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json"
        })
        .done(function(data) {
            window.location.reload()
        })
        .fail(function(data) {
            $.each(data.responseJSON, function (key, value) {
                var input = '#updateCartItemQuantity input[name=' + key + ']';
                $(input).parent().addClass('has-error');
            });
        });
    });
})

function validateForm() {
    var y = document.myform.payment.value;
    var x = document.myform.momo_number.value;
    var patt1 = /[0-9]{8}/g;
    var result = x.search(patt1);
   if (y=="Mobile Money/Moov Money"){
    if(result==-1){
            alert("Le format du numéro est erroné.\n\nExemple: 62888588");
            return false;
        }
    else{
        return true;
        }
    }
};

$(document).ready(function(e){
    localStorage.removeItem('ids')
})


$(document).ready(function(e){
    $('.single-item').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
    });
})

