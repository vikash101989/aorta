<html>
    <head>
    <title></title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script type="text/javascript">
        function PrintPage() {
            document.getElementById('print').style.display = 'none';
            window.resizeTo(960, 600);
            document.URL = "";
            window.location.href = "";
            window.print();
        }
        
        
    </script>

    </head>
<body>
<div>
<style>
body{margin:0;padding:0;line-height:18px;}
html {
  font-family: 'Arial', sans-serif;
  height: 100%;
  font-size: 100%;
  color: #000;
}
h2 {
  margin: 1.75em 0 0;
  font-size: 5vw;
}
h3 { font-size: 1.3em;font-weight:300;text-align:center;color:#15182f!important;}
.tt{border:none;resize:none;width:100%;height:auto; overflow: hidden;font-family: "Arial", sans-serif;  font-size: 100%; min-height: 64px; max-height: 100px; color: #000;}
header>p{text-align:center;padding:0;margin:0;font-size:0.75em;color:#15182f!important;}
header>p>span{font-weight:bold;color:#15182f!important;}
.modal-box {
width: 98%;
background: transparent;
margin:0;
padding:0;
}
.tin {
width: 98%;
padding:0 0.5em;
margin-bottom:5px;
}
.billdata {
width: 100%;
}

.modal-box header,
.modal-box .modal-header {
}
.button{width:100px;margin:10px auto;padding:10px 0;display:block;cursor:pointer;background:#337ab7;color:#fff;border:none;text-transform:uppercase;}
.modal-box header h3,
.modal-box header h4,
.modal-box .modal-header h3,
.modal-box .modal-header h4 { margin: 0; }
.modal-box .modal-body { padding: 0em 0; }

.modal-box footer,
.modal-box .modal-footer {
padding: 1em;
border-top: 1px solid #ddd;
background: rgba(0, 0, 0, 0.02);
text-align: right;
}
.header-top{background:#00395f;color:#fff;border-bottom:5px solid #ffffff;padding:30px 50px 30px 30px;}
.header-top .group{color:#ffbc40;font-size:14px;}
.header-top .group1{color:#fff;font-size:14px;}
.header-top h2{color:#fff;margin:0;font-size:34px;}
.header-top table{width:100%;}
.header-bottom table{width:100%;}
.header-bottom{background:#007cc2;color:#fff;border-bottom:10px solid #ffffff;padding:20px 0px 20px 30px;}
.customer{background:#cbe5f2;height:auto;overflow:hidden;border-bottom:3px solid #ffffff;padding:5px;font-size:16px;color:#333;font-weight:600;}
.customer2{background:#cbe5f2;height:auto;overflow:hidden;padding:10px 5px;font-size:16px;color:#333;font-weight:600;}
label{width:30%;display:block;float:left;margin:4px 0;}
.inp{width:70%;display:block;float:left;background:#cbe5f2;border:1px solid #cbe5f2;margin:4px 0;font-size:16px;color:#333;font-weight:500;}
</style>


                    <div id="popup1" class="modal-box">


<div class="header-top">
<table border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td style="width:20%;"><div class="img1"><img src="image/1.png" width="75" height="73" alt=""></div></td>
<td style="width:80%;text-align:right;">
<h2>Aorta Digital Health Card</h2>
<p class="group">A Group of Aorta Laboratories pvt. Ltd.</p>
<p class="group1">Approved (MCA) Govt. of India Reg. No. U24233MH2011PTC224638</p>
</td>
</tr>
</tbody></table>
</div>

<div class="header-bottom">
<table border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td style="width:30%;"><div class="border"><img src="upload_images/pic 1.jpg" width="190" height="242"></div>
</td>
<td style="width:70%;vertical-align:top;">
                                    <div class="customer">
                                    <label id="number" for="fname">Customer Id. No:</label>
                                    <input type="text" class="inp" name="firstname" id="name" value="156139318615190N" readonly="">
                                    </div>
                                    <div class="customer2">
                                    <label id="number" for="fname">Name:</label>
                                    <input type="text" class="inp" name="firstname" id="name" value="Arun Nandi" readonly="">
                                    <br>
                                    <label id="number" for="fname">Mother's Name:</label>
                                    <input type="text" class="inp" name="firstname" id="name" value="Mukti Nandi" readonly="">
                                    <br>
                                    <label id="number" for="fname">Sex:</label>
                                    <input type="text" class="inp" name="firstname" id="name" value="Male" readonly="">
                                    <br>
                                    <label id="number" for="fname">Date of Birth:</label>
                                    <input type="text" class="inp" name="firstname" id="name" value="02/01/1961" readonly="">
                                    <br>
                                    <label id="number" for="fname">Mob:</label>
                                    <input type="text" class="inp" name="firstname" id="name" value="9903456602" readonly="">
                                    <br>
									<label id="number" for="fname">Date of Issue:</label>
                                    <input type="text" class="inp" name="firstname" id="name" value="30/11/-0001" readonly="">
                                    </div>
</td>
</tr>
</tbody></table>


</div>



</div>

    <div class="row">
        <div class="col-md-6">
            <input type="button" id="print" name="print" value="Print" onclick="javascript:PrintPage();" class="button" style="width:150px;">
        </div>
        <div class="col-md-6">
             <input type="button" id="save" name="save" value="save" onclick="javascript:CreatePDFfromHTML();" class="button" style="width:150px;">
        </div>
    </div>
    
    
   

<script>
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-green";
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-green", "");
    }
}

function myDropFunc() {
    var x = document.getElementById("demoDrop");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-green";
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-green", "");
    }
}


/*save pdf code*/
            function CreatePDFfromHTML() {
                var name="Arun Nandi";
                 var HTML_Width = $("#popup1").width();
                 var HTML_Height = $("#popup1").height();
                 //alert(HTML_Width+" "+HTML_Height);
                 var top_left_margin = 15;
                var PDF_Width = HTML_Width + (top_left_margin * 2);
                var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
                var canvas_image_width = HTML_Width;
                var canvas_image_height = HTML_Height;
            
                var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
            
                html2canvas($("#popup1")[0]).then(function (canvas) {
                    var imgData = canvas.toDataURL("image/jpeg", 1.0);
                    var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                    pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
                    for (var i = 1; i <= totalPDFPages; i++) { 
                        pdf.addPage(PDF_Width, PDF_Height);
                        pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
                    }
                    pdf.save(name+".pdf");
                    $(".html-content").hide();
                });
            }
</script>







</div></body></html>