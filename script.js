function changeView() {

    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");

}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");


    var f = new FormData();
    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("email", email.value);
    f.append("password", password.value);
    f.append("mobile", mobile.value);
    f.append("gender", gender.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                changeView();
                fname.value = "";
                lname.value = "";
                email.value = "";
                password.value = "";
                mobile.value = "";
                document.getElementById("msg").innerHTML = "";


            } else {
                var l = document.getElementById("msg");
                l.innerHTML = text;
            }

        }

    }
    r.open("POST", "signUpProcess.php", true);
    r.send(f);
}

function signIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var remember = document.getElementById("remember");
    // alert(remember.value);
    // alert(remember.checked);

    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t === "Success") {

                window.location = "home.php";

            } else {
                document.getElementById("msg2").innerHTML = t;

            }
        };
    }
    r.open("POST", "signInProcess.php", true);
    r.send(formData);

}

var bm;

function forgotPassword() {

    var email = document.getElementById("email2")

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Success") {
                alert("Email varification sent. Please check your inbox.");

                var m = document.getElementById("forgetPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                alert(text);
            }
        }
    };
    r.open("GET", "forgotPasswordprocess.php?e=" + email.value, true);
    r.send()

}

function showPassword1() {
    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (npb.innerHTML == "Show") {
        np.type = "text";
        npb.innerHTML = "Hide";
    } else {
        np.type = "password";
        npb.innerHTML = "Show";
    }
}

function showPassword2() {
    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnpb.innerHTML == "Show") {
        rnp.type = "text";
        rnpb.innerHTML = "Hide";
    } else {
        rnp.type = "password";
        rnpb.innerHTML = "Show";
    }
}


function resetPassword() {
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");
    var email = document.getElementById("email2");

    var formData = new FormData();
    formData.append("e", email.value);
    formData.append("np", np.value);
    formData.append("rnp", rnp.value);
    formData.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Success") {
                alert("Password Reset success");

                var m = document.getElementById("forgetPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.close();


            } else {
                alert("Password Reset Fail")
            }
        }
    };
    r.open("POST", "resetpassword.php", true);
    r.send(formData);

}

function goToAddProduct() {
    window.location = "addProduct.php";
}
//image eka  file walin theruwa gaman danata image eka thiyena thanata(box ekata) image eka  add weema .. 
function changeImg() {
    var image = document.getElementById("imguploader"); //file chooser
    var view = document.getElementById("prev"); //image tag

    image.onchange = function() { //onclick wage function ekak
        var file = this.files[0]; //file eka ganima
        var url = window.URL.createObjectURL(file); //tempari url ekak hada ganeema 
        view.src = url; //image tag eka src kiyana url ekata bind kireema 
    }
}

function changeImg1() {
    var image = document.getElementById("imguploader1"); //file chooser
    var view = document.getElementById("prev1"); //image tag

    image.onchange = function() { //onclick wage function ekak
        var file = this.files[0]; //file eka ganima
        var url = window.URL.createObjectURL(file); //tempari url ekak hada ganeema 
        view.src = url; //image tag eka src kiyana url ekata bind kireema 
    }
}

function changeImg2() {
    var image = document.getElementById("imguploader2"); //file chooser
    var view = document.getElementById("prev2"); //image tag

    image.onchange = function() { //onclick wage function ekak
        var file = this.files[0]; //file eka ganima
        var url = window.URL.createObjectURL(file); //tempari url ekak hada ganeema 
        view.src = url; //image tag eka src kiyana url ekata bind kireema 
    }
}

function changeImg3() {
    var image = document.getElementById("profileimg"); //file chooser
    var view = document.getElementById("prv"); //image tag

    image.onchange = function() { //onclick wage function ekak
        var file = this.files[0]; //file eka ganima
        var url = window.URL.createObjectURL(file); //tempari url ekak hada ganeema 
        view.src = url; //image tag eka src kiyana url ekata bind kireema 
    }
}

function addProduct() {
    var category = document.getElementById("ca");
    var brand = document.getElementById("br");
    var model = document.getElementById("mo");
    var title = document.getElementById("ti");
    var condition;

    if (document.getElementById("bn").checked) {
        condition = 1;
    } else if (document.getElementById("us").checked) {
        condition = 2;
    }

    var colour;

    if (document.getElementById("clr1").checked) {
        colour = 1;
    } else if (document.getElementById("clr2").checked) {
        colour = 2;
    } else if (document.getElementById("clr3").checked) {
        colour = 3;
    } else if (document.getElementById("clr4").checked) {
        colour = 4;
    } else if (document.getElementById("clr5").checked) {
        colour = 5;
    } else if (document.getElementById("clr6").checked) {
        colour = 6;
    }

    var qty = document.getElementById("qty");
    var price = document.getElementById("cost");
    var delevery_within_colombo = document.getElementById("dwc");
    var delevery_outof_colombo = document.getElementById("doc");
    var description = document.getElementById("desc");
    var image = document.getElementById("imguploader");

    var form = new FormData();
    form.append("c", category.value);
    form.append("b", brand.value);
    form.append("m", model.value);
    form.append("t", title.value);
    form.append("co", condition);
    form.append("col", colour);
    form.append("qty", qty.value);
    form.append("p", price.value);
    form.append("dwc", delevery_within_colombo.value);
    form.append("doc", delevery_outof_colombo.value);
    form.append("desc", description.value);
    form.append("img", image.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Product Added Successfully") {
                window.location.reload();
            }
            alert(text);
        }
    };
    r.open("POST", "addprocess.php", true);
    r.send(form);
}


function signOut() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {

                window.location = "home.php";

            }

        }
    }
    r.open("GET", "signoutProcess.php", true);
    r.send();
}

function changeProductView() {

    var add = document.getElementById("addProductBox");
    var update = document.getElementById("updateProductBox");




    add.classList.toggle("d-none");
    update.classList.toggle("d-none");

}

function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var city = document.getElementById("city");
    var img = document.getElementById("profileimg");


    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("m", mobile.value);
    f.append("a1", line1.value);
    f.append("a2", line2.value);
    f.append("c", city.value);
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text = "success") {
                alert("Update success");
                window.location = "userProfile.php";

            } else {
                alert(text);
            }

        }
    }
    r.open("POST", "UpdateProfileProcess.php", true);
    r.send(f);
}


function changeStatus(id) {

    var productid = id;
    var statuscheck = document.getElementById("check");
    var statuslabel = document.getElementById("checklabel" + productid);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "deactive") {
                statuslabel.innerHTML = "Make Your Product Active";

            } else if (t == "active") {
                statuslabel.innerHTML = "Make Your Product Deactive";

            }
            window.location = "sellerproductview.php";
        }
    };

    r.open("GET", "statusChangeProcess.php?p=" + productid, true);
    r.send();

}



var k;

function deleteModal(id) {

    var dm = document.getElementById("deleteModal" + id);
    k = new bootstrap.Modal(dm);
    k.show();

}


function deleteProduct(id) {
    // alert(id);

    var productid = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                k.hide();
                window.location = "sellerproductview.php";
            } else {
                alert(text);
            }

        }
    };

    r.open("GET", "deleteProductProcess.php?id=" + productid, true);
    r.send();

}

function addFilters(p) {

    var page = p;

    var search = document.getElementById("search");

    var age;
    if (document.getElementById("late").checked) {
        age = 1;

    } else if (document.getElementById("old").checked) {
        age = 2;
    } else {
        age = 0;
    }


    var qty;
    if (document.getElementById("low").checked) {
        qty = 1;

    } else if (document.getElementById("high").checked) {
        qty = 2;
    } else {
        qty = 0;
    }

    var condition;
    if (document.getElementById("new").checked) {
        condition = 1;

    } else if (document.getElementById("used").checked) {
        condition = 2;
    } else {
        condition = 0;
    }

    var f = new FormData();
    f.append("s", search.value);
    f.append("a", age);
    f.append("q", qty);
    f.append("c", condition);
    f.append("p", page);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;


            document.getElementById("filter_result").innerHTML = text;


        }
    };

    r.open("POST", "filterProcess.php", true);
    r.send(f);
}

function clearFilters() {
    window.location = "sellerproductview.php";
}
// function changeStatus(id) {
//     var productid = id;
//     var statuscheck = document.getElementById("check");
//     var statuslabel = document.getElementById("checklabel" + productid);

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;
//             if (text == "deactive") {
//                 statuslabel.innerHTML = "Make Your Product Active";
//             } else if (text == "active") {
//                 statuslabel.innerHTML = "Make Your Product Deactive";
//             }
//         }
//     };

//     r.open("GET", "statusChangeProcess.php?p=" + productid, true);
//     r.send();
// }
// function deleteModel(id) {

//     var dm = document.getElementById("deleteModel" + id);
// alert(dm);
//     k = new bootstrap.Modal(dm);
//     k.show();



// }

// delete product

// function deleteProduct(id) {

// var productid = id;
// alert(id);

//     var request = new XMLHttpRequest();

//     request.onreadystatechange = function() {
//         if (request.readyState == 4) {
//             var t = request.responseText;
//             if (t == "Success") {
//                 k.hide();
//                 alert("product Deleted Success");
//                 window.location = "sellerProductview.php";
//             } else {
//                 alert(t);
//             }
//         }
//     };

//     request.open("GET", "deleteproductprocess.php?id=" + productid, true);
//     request.send();

// }
// filter

// function addFilters() {
//     var search = document.getElementById("s");


//     var age;
//     if (document.getElementById("n").checked) {
//         age = 1;

//     } else if (document.getElementById("o").checked) {

//         age = 2;
//     } else {
//         age = 0;
//     }

//     var qty;
//     if (document.getElementById("l").checked) {
//         qty = 1;

//     } else if (document.getElementById("h").checked) {
//         qty = 2;
//     } else {
//         qty = 0;
//     }

//     var condition;
//     if (document.getElementById("b").checked) {
//         condition = 1;


//     } else if (document.getElementById("u").checked) {

//         condition = 2;
//     } else {
//         condition = 0;
//     }
//     var h = document.getElementById("pimage");
// alert(search.value);
// alert(age);
// alert(qty);
// alert(condition);


// var f = new FormData();
// f.append("s", search.value);
// f.append("a", age);
// f.append("q", qty);
// f.append("c", condition);

// var r = new XMLHttpRequest();
// r.onreadystatechange = function() {
//     if (r.readyState == 4) {
//         var t = r.responseText;

// alert(t);
// window.location = "filterpage.php";






// var arr = JSON.parse(t);
// for (var i = 0; i < arr.length; i++) {
//     var row = arr[i];
//     alert(row["title"]);
// h.innerHTML = t;














//     }
// }
// r.open("POST", "filterProcess.php", true);
// r.send(f);

// }

// function clearfilter() {
//     window.location.reload();
// }

function searchToUpdate() {
    var id = document.getElementById("searchtoUpdate").value;

    var title = document.getElementById("ti1");



    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            var object = JSON.parse(text);

            alert(object);

            // title.value = object["title"];
        }
    }
    request.open("GET", "searchToUpdateProcess.php?id=" + id, true);
    request.send();
}

function sendID(id) {

    var productid = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                window.location = "updateProduct1.php";

            }
        }
    };

    r.open("GET", "sendProductProcess.php?id=" + productid, true);
    r.send();

}

function updateProduct() {

    var title = document.getElementById("title");
    var qty = document.getElementById("qty");
    var colombo = document.getElementById("colombo");
    var other = document.getElementById("notcolombo");
    var description = document.getElementById("description");

    var img = document.getElementById("imguploader");
    var img1 = document.getElementById("imguploader1");
    var img2 = document.getElementById("imguploader2");

    var f = new FormData();

    f.append("t", title.value);
    f.append("q", qty.value);
    f.append("c", colombo.value);
    f.append("o", other.value);
    f.append("d", description.value);
    f.append("i", img.files[0]);
    f.append("i1", img1.files[0]);
    f.append("i2", img2.files[0]);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alert("Your Product Updated.");
                window.location = "updateProduct1.php";

            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "UpdateProductProcess1.php", true);
    r.send(f);

}


function qty_inc() {
    var input = document.getElementById("qtyinput");
    var newvalue = parseInt(input.value) + 1;

    input.value = newvalue.toString();
}

function qty_dec() {
    var input = document.getElementById("qtyinput");

    if (input.value >= 1) {


        var newvalue = parseInt(input.value) - 1;

        input.value = newvalue.toString();
    } else {
        alert("Minimum quantity count has been achieved.");
    }
}

function basicSearch(x) {
    var page = x;
    var searchText = document.getElementById("basic_search_txt").value;
    var searchSelect = document.getElementById("basic_search_select").value;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "error") {
                // alert("please enter product name or select category first.");
                window.location = "home.php";
            } else {
                document.getElementById("imgslide").className = "d-none";
                document.getElementById("basicresult").innerHTML = text;
            }
        }
    };
    r.open("GET", "invoice2.php?t=" + searchText + "&s=" + searchSelect + "&p=" + page, true);
    r.send();
}



// send id to update

// function sendId(id) {
//     var id = id;
//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;
//             if (t == "success") {
//                 window.location = "updateProduct.php";
//             }
//         }
//     }
//     r.open("GET", "sendproductProcess.php?id=" + id, true);
//     r.send();
// }
///////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////

function addToWatchlist(id) {
    var pid = id;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Product added to the watchlist.");
                window.location = "watchlist.php";
            } else {
                alert(t);
            }
        }
    }
    r.open("GET", "addToWachlistProcess.php?id=" + pid, true);
    r.send();
}

function deletefromwatchlist(id) {
    var wid = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;
            // alert(text);
            if (text == "success") {
                alert("Product removed success.");
                window.location = "watchlist.php";
            }
        }
    }
    request.open("GET", "removeWatchlistProcess.php?id=" + wid, true);
    request.send();
}



function loadmainimg(id) {

    var pid = id;
    var img = document.getElementById("pimg" + pid).src;
    var mainimg = document.getElementById("mainimg");

    mainimg.style.backgroundImage = "url(" + img + ")";

}


function addToCart(id) {

    var qtytxt = document.getElementById("qtytxt" + id).value;
    var pid = id;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "cart.php";
            } else {
                alert(t);
            }
        }
    }
    r.open("GET", "addToCartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
    r.send();

}

function deletefromCart(id) {
    var cid = id;

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert("error");
            }
        }
    }
    r.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
    r.send();
}

function cart() {
    window.location = "cart.php";
}

////////////////////////////////////

function paynow(id) {

    var pid = id;

    var qty = document.getElementById("qtyinput").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var obj = JSON.parse(t);
            var mail = obj["email"];
            var amount = obj["amount"];


            if (t == "1") {
                alert("Please sign in first.");
                window.location = "index.php";

            } else if (t == "2") {
                alert("Please Update your profile first.");
                window.location = "userprofile.php" + mail;

            } else {

                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    saveInvoice(orderId, id, mail, amount, qty);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1217886", // Replace your Merchant ID
                    "return_url": "http://localhost/eShop/singleproductview.php?id=" + id, // Important
                    "cancel_url": "http://localhost/eShop/singleproductview.php?id=" + id, // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount + ".00",
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function(e) {
                payhere.startPayment(payment);
                // };

            }
        }
    }
    r.open("GET", "buynowProcess.php?id=" + pid + "&qty=" + qty, true);
    r.send();

}

function saveInvoice(orderId, id, mail, amount, qty) {
    var orderid = orderId;
    var pid = id;
    var email = mail;
    var total = amount;
    var pqty = qty;



    var f = new FormData();
    f.append("oid", orderid);
    f.append("pid", pid);
    f.append("email", email);
    f.append("total", total);
    f.append("pqty", pqty);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "1") {
                window.location = "invoice.php?id=" + orderid;
            }

        }
    }
    r.open("POST", "saveInvoice.php", true);
    r.send(f);

}

function detailsmodel(id) {
    alert(id);
}

function printDiv() {

    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;

}
// var divContents = document.getElementById("GFG").innerHTML;
// var a = window.open('', '', 'height=500, width=500');
// a.document.write('<html>');
// a.document.write('<body > <h1>Div contents are <br>');
// a.document.write(divContents);
// a.document.write('</body></html>');
// a.document.close();
// a.print();
// feedback

function addfeedback(id) {

    var feedmodel = document.getElementById("feedbackModel" + id);
    k = new bootstrap.Modal(feedmodel);
    k.show();

}

// save feedback

function savefeedback(id) {
    var pid = id;
    var feedtxt = document.getElementById("feedtxt").value;


    var f = new FormData();
    f.append("i", pid);
    f.append("t", feedtxt);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                k.hide();
            }
        }
    };

    r.open("POST", "saveFeedbackProcess.php", true);
    r.send(f);
}

function adminverification() {
    var e = document.getElementById("e").value;

    var f = new FormData();
    f.append("e", e);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                var verificationmodal = document.getElementById("verificationModal");
                k = new bootstrap.Modal(verificationmodal);
                k.show();

            } else {
                alert(t);
            }

        }
    }
    r.open("POST", "adminverificationProcess.php", true);
    r.send(f);
}
// var k;

function Verify() {
    var verificationcode = document.getElementById("v").value;
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                k.hide();
                alert("success to loging...")
                window.location = "adminpanel.php";
            } else {
                alert(t);
            }
        }
    }
    r.open("GET", "verificationprocess.php?v=" + verificationcode, true);
    r.send();
}

function blockusers(email) {

    var mail = email;


    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location.reload();
            }
        }
    }
    r.open("POST", "userBlockProcess.php", true);
    r.send(f);
}

function searchUser() {
    var text = document.getElementById("searchtxt").value;


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "manageusers.php";

            } else {
                alert(t);
            }

        }
    }
    r.open("GET", "searchUser.php?s=" + text, true);
    r.send();
}





// searchProduct

function searchProduct() {

    var text = document.getElementById("searchtxt").value;
    var viewProduct = document.getElementById("viewProduct");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            viewProduct.innerHTML = t;
        }
    }

    r.open("GET", "searchProduct.php?s=" + text, true);
    r.send();
}

// blockProduct

function blockProduct(id) {

    var pid = id;

    var blockbtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("pid", pid);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock";
            } else if (t == "2") {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";
            }
        }
    }

    r.open("POST", "productBlockProcess.php", true);
    r.send(f);

}


function destroysession() {
    window.location.reload();
}


function advancedSearch(x) {
    // alert(x);
    // var x = 1;
    var s = document.getElementById("s1").value;
    var ca = document.getElementById("ca1").value;
    var br = document.getElementById("br1").value;
    var mo = document.getElementById("mo1").value;
    var co = document.getElementById("co1").value;
    var col = document.getElementById("col1").value;
    var prif = document.getElementById("prif1").value;
    var prit = document.getElementById("prit2").value;
    // var sort = document.getElementById("sort").value;

    var form = new FormData();
    form.append("page", x);
    form.append("s", s);
    form.append("c", ca);
    form.append("b", br);
    form.append("m", mo);
    form.append("co", co);
    form.append("col", col);
    form.append("prif", prif);
    form.append("prit", prit);
    // form.append("sort", sort);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // 
            document.getElementById("filter").innerHTML = text;
        }
    };
    r.open("POST", "advancedSearchpro.php", true);
    r.send(form);

}

// function advancedSearch() {

//     var viewResults = document.getElementById("viewResults");

//     var keyword = document.getElementById("k").value;
//     var category = document.getElementById("c").value;
//     var brand = document.getElementById("b").value;
//     var model = document.getElementById("m").value;
//     var condition = document.getElementById("con").value;
//     var color = document.getElementById("clr").value;
//     var pricefrom = document.getElementById("pf").value;
//     var priceto = document.getElementById("pt").value;


//     var f = new FormData();
//     f.append('k', keyword);
//     f.append('c', category);
//     f.append('b', brand);
//     f.append('m', model);
//     f.append('con', condition);
//     f.append('clr', color);
//     f.append('pf', pricefrom);
//     f.append('pt', priceto);

//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var t = r.responseText;



//             viewResults.innerHTML = t;



//         }
//     }
//     r.open("POST", "advancedSearchProcess.php", true);
//     r.send(f);
// }

// dailysellings
function dailysellings() {

    var from = document.getElementById("fromdate").value;
    var to = document.getElementById("todate").value;
    var link = document.getElementById("historylink");



    link.href = "sellinghistory.php?f=" + from + "&t=" + to;



}

// sendmessage

function sendmessage(email) {



    var email = email;
    var msgtxt = document.getElementById("msgtxt").value;

    var pido = document.getElementById("pido").value;






    var f = new FormData();
    f.append("e", email);
    f.append("t", msgtxt);
    f.append("e2", pido);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                msgtxt.value = "";


                refresher(email);


            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "sendmessageprocess.php", true);
    r.send(f);

}

// refresher

function refresher(email) {
    refreshmsgare();
    setInterval(refreshmsgare(email), 500);
    setInterval(refreshrecentarea, 500);
}

// refres msg view area

function refreshmsgare(mail) {

    var chatrow = document.getElementById("chatrow");

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            chatrow.innerHTML = t;

        }
    }

    r.open("POST", "refreshmsgareaprocess.php", true);
    r.send(f);

}

// refreshrecentarea

function refreshrecentarea() {

    var rcv = document.getElementById("rcv");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            rcv.innerHTML = t;
        }
    }

    r.open("POST", "refreshrecentareaprocess.php?rcv=" + rcv, true);
    r.send();

}

function viewmsgmodel() {

    // alert("ok")

    var pop = document.getElementById("msgmodel");
    k = new bootstrap.Modal(pop);
    k.show();

}

function addnewmodal() {



    var pop = document.getElementById("addnewmodal");
    k = new bootstrap.Modal(pop);
    k.show();
}

function saveCategory() {


    var txt = document.getElementById("categorytxt").value;



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                k.hide();
                alert("Category saved success...");

                window.location = "manageproduct.php";
            } else {
                alert(t);
            }
        }
    }
    r.open("GET", "addNewCategoryProcess.php?t=" + txt, true);
    r.send();
}

function singleprductmodal() {


    var pop = document.getElementById("singleproductview");
    k = new bootstrap.Modal(pop);
    k.show();
}


// viewmsgmodal

function viewmsgmodal() {
    // alert("ok");
    var pop = document.getElementById("msgmodal");

    k = new bootstrap.Modal(pop);
    k.show();

}

// singleviewmodel

function singleviewmodal(id) {

    var pop = document.getElementById("singleproductview" + id);
    k = new bootstrap.Modal(pop);
    k.show();

}

function messagebutton() {

}

function sendmessagers(u) {



    var email = document.getElementById("emails").value;
    var msgtxt = document.getElementById("msgtxt").value;

    var pido = document.getElementById("ids").value;

    // alert(email);
    // alert(pido);
    // alert(msgtxt);






    var f = new FormData();
    f.append("e", email);
    f.append("t", msgtxt);
    f.append("e2", pido);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                msgtxt.value = "";


                refresher(email);


            } else {
                refresher(email);
                alert(t);
            }
        }
    }

    r.open("POST", "sendmessageprocess.php", true);
    r.send(f);

}
// function updateProduct(id) {

//     var pid = id;
//     var desc = document.getElementById('desc').value;
//     var title = document.getElementById("ti1").value;
//     var qty = document.getElementById("qty").value;
//     var dwc = document.getElementById("dwc").value;
//     var doc = document.getElementById("doc").value;


//     var form = new FormData();
//     form.append("id", pid);
//     form.append("title", title);
//     form.append("desc", desc);
//     form.append("qty", qty);
//     form.append("dwc", dwc);
//     form.append("doc", doc);




//     var r = new XMLHttpRequest();
//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;
//             if (text == "success") {
//                 alert(text);
//                 window.location.reload();
//             } else {
//                 alert("error");
//             }


//         }
//     }
//     r.open("POST", "updateProductProcess.php", true);
//     r.send(form);


// }
// function addToCart(id) {

//     var qty = document.getElementById("qtytext" + id).value;

//     var pid = id;

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;

//             if (text == "success") {
//                 window.location = "cart.php";
//             } else {
//                 alert(text);
//             }
//         }
//     };

//     r.open("GET", "addToCartProcess.php?id=" + pid + "&text=" + qty, true);
//     r.send();
// }

// function deleteFromCart(id) {

//     var cid = id;

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function() {
//         if (r.readyState == 4) {
//             var text = r.responseText;

//             if (text == "success") {
//                 window.location = "cart.php";

//             }
//         }
//     };

//     r.open("GET", "removeCartItemProcess.php?id=" + cid, true);
//     r.send();
// }